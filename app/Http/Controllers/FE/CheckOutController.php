<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderRequest;

class CheckOutController extends Controller
{
    //show information in checkout-page
    public function viewOrder(Request $request)
    {
        $provinces = Province::orderby("administrative_region_id", "asc")
            ->select('code', 'full_name_en')
            ->get();
        $user = Auth::user();
        $product = Product::all();
        return view('fe.checkout', [
            'user' => $user,
            'provinces' => $provinces,
            'products' => $product
        ]);
    }

    public function getDistricts($province_code = null)
    {
        // dd($province_code);
        $districts = District::orderby("full_name_en", "asc")
            ->select('code', 'full_name_en')
            ->where('province_code', 'like', $province_code)
            ->get();
        // dd($districts);
        return response()->json($districts);
    }


    public function createOrder(Request $request)
    {
        //1. Insert Order
        $data = $request->all();
        $data['shipping_fee'] = $request->method_shipping == 1 ? $this->shippingFee($data) : 0;

        try {
            $data['shipping_city'] = Province::where('code', 'like', $request->shipping_city)
                ->first()
                ->full_name_en ?? '';
            $data['shipping_district'] = District::where('code', 'like', $request->shipping_district)
                ->first()
                ->full_name_en ?? '';
        } catch (\Throwable $th) {
            //throw $th;
        }

        $data['user_id'] = Auth::id();
        $data['order_date'] = date('Y-m-d', time());
        $data['status'] = 0; //order dang xu ly

        $od_coupon = $this->calcCoupon($data['coupon_code'], $data['value_order']);

        
        $data['note'] .= " (The customer has coupon ".$data['coupon_code'].")";


        $order = Order::create($data);

        //2. Insert OrderDetail
        $carts = Cart::where('user_id', $data['user_id'])->get();

        foreach ($carts as $cart) {
            //Insert thao tác dưới dạng query builder, nên lúc build như nào, nó sẽ ra như vậy
            $od = OrderDetail::insert([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'price' => $cart->product->product_price - $cart->product->discount,
                'quantity' => $cart->quantity,
            ]);

            //3. delete cart-item
            $cart->delete();
        }

        return redirect()->route('thankyou')->with('success', 'You are order successfully! Your order is processing');
    }

    public function shippingFee($data)
    {
        define('AMOUNT', 250);

        $city_code = $data['shipping_city'];
        $district_code = $data['shipping_district'];
        $value_order = $data['value_order'];

        if ($value_order >= AMOUNT) {
            return 0;
        }
        
        $shipping_fee = 0;
        switch ($city_code) {
                //HCM city
            case 79:
                if ($this->isUrban($district_code)) {
                    $shipping_fee = $this->check_range($value_order * 0.04);
                } elseif ($this->isSuburban($district_code)) {
                    $shipping_fee = $this->check_range($value_order * 0.06);
                } else {
                    $shipping_fee = $this->check_range($value_order * 0.08);
                }
                break;
                //City/Province other
            default:
                $shipping_fee = $this->check_range($value_order * 0.1);
                break;
        }

        return $shipping_fee;
    }

    //The inner city includes  districts: District 1 (760), Go Vap District (764), Binh Thanh District (765),Tan Binh District (766), Tan Phu District (767), Phu Nhuan District (768), District 3 (770), District 10 (771), District 4 (773),  District 5 (774), District 6 (775), District 8 (776), Binh Tan District.
    public function isUrban($district_code = null)
    {
        $urban_code = array(760, 764, 765, 766, 767, 768, 770, 771, 773, 774, 775, 776, 777);
        foreach ($urban_code as $item) {
            if ($district_code == $item) {
                return true;
            }
        }
        return false;
    }

    public function isSuburban($district_code = null)
    {
        // Suburban 1  includes the areas of District 7, District 12, Thu Duc District
        $suburban_code_1 = array(761, 769, 778);
        foreach ($suburban_code_1 as $item) {
            if ($district_code == $item) {
                return true;
            }
        }
        return false;
    }

    public function check_range($fee = 0)
    {
        define('MIN', 5);
        define('MAX', 50);
        if ($fee < MIN) {
            return MIN;
        } elseif ($fee < MAX) {
            return $fee;
        } else {
            return MAX;
        }
    }

    //Coupon
    public function calcCoupon($code, $value_order)
    {
        $order_coupon = [];

        $coupon = Coupon::where('code', 'like', $code)
            ->where('status', 1)
            ->where('value_order', '<=', $value_order)
            ->first();

        $times = Order::where('coupon_id', $coupon->id)->count('*');

        $value = 0;
        if ($coupon->times > $times) {
            $value = $coupon->value;
        }

        $order_coupon[$code] = [
            'coupon' => $coupon,
            'value' => $value
        ];

        return $order_coupon;
    }


    public function postCoupon(Request $request)
    {
        $code = trim($request->code);
        $value_order = $request->value_order;

        $order_coupon = [];
        if (session()->has('order_coupon')) {
            $order_coupon = session()->get('order_coupon');
        }

        $order_coupon = $this->calcCoupon($code, $value_order);

        session()->put('order_coupon', $order_coupon);

        return response()->json($order_coupon);
    }

    public function showCoupon(Request $request)
    {
        if ($request->session()->has('order_coupon')) {
            $order_coupon = $request->session()->get('order_coupon');
            return response()->json($order_coupon);
        }
    }
}
