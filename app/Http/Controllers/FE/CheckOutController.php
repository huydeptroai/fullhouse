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
use App\Models\ViewProductData;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CheckOutController extends Controller
{
    //show information in checkout-page
    public function viewOrder(Request $request)
    {
        $provinces = Province::orderby("administrative_region_id", "asc")
            ->select('code', 'full_name_en')
            ->get();
        $user = Auth::user();
        $product = ViewProductData::orderByDesc('count_review')->limit(6)->get();
        return view('fe.order.checkout', [
            'user' => $user,
            'provinces' => $provinces,
            'products' => $product
        ]);
    }

    public function getDistricts($province_code = null)
    {
        $districts = District::orderby("full_name_en", "asc")
            ->select('code', 'full_name_en')
            ->where('province_code', 'like', $province_code)
            ->get();
        return response()->json($districts);
    }


    public function createOrder(Request $request)
    {
        //1. Insert Order
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['total_quantity'] = Cart::where('user_id', $data['user_id'])->count('product_id');
        if ($request->method_shipping == 1) {
            if ($request->shipping_city != null && $request->shipping_district != null) {
                //shipping fee
                $data['shipping_fee'] = $this->shippingFee($data);

                //get name city/district
                $data['shipping_city'] = Province::where('code', 'like', $request->shipping_city)
                    ->first()
                    ->full_name_en ?? '';
                $data['shipping_district'] = District::where('code', 'like', $request->shipping_district)
                    ->first()
                    ->full_name_en ?? '';
            }
        } else {
            $data['shipping_fee'] = 0;
            $data['shipping_city'] = 'HCM City';
            $data['shipping_district'] = 'District 3';
            $data['shipping_address'] = 'No 391A, Nam Ky Khoi Nghia Street';
        }

        $data['order_date'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['status'] = 1; //ordered
        
        $data['payment_status'] = 1; //not paid

        if($data['coupon_code'] != null && $data['coupon_code'] != ''){
            $coupon = $this->calcCoupon($data['coupon_code'], $data['value_order']);
            $data['coupon_id'] = $coupon['id'];
        }else{
            $data['coupon_id'] = null;
        }
        
        $order = Order::create($data);

        //2. Insert OrderDetail
        $carts = Cart::where('user_id', $data['user_id'])->get();

        foreach ($carts as $cart) {
            //Insert Order Detail
            $od = OrderDetail::insert([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'price' => $cart->product->product_price - $cart->product->discount,
                'quantity' => $cart->quantity,
            ]);

            //3. delete cart-item
            $cart->delete();
        }
        Session::put('order', $order);

        return view('fe.order.confirm', [
            'order' => $order
        ]);
    }

    //======= Shipping fee ======
    public function shippingFee($data)
    {
        define('AMOUNT', 299);

        $city_code = $data['shipping_city'];
        $district_code = $data['shipping_district'];
        $value_order = $data['value_order'];
        $total_quantity = $data['total_quantity'];

        $shipping_fee = 0;
        switch ($city_code) {
                //HCM city
            case 79:
                if ($this->isUrban($district_code)) {
                    if ($value_order >= AMOUNT) {
                        $shipping_fee = 0;
                    } else {
                        $shipping_fee = 2 * $total_quantity;
                    }
                } elseif ($this->isSuburban($district_code)) {
                    $shipping_fee = 2 * $total_quantity;
                } else {
                    $shipping_fee = 4 * $total_quantity;
                }
                break;
                //City/Province other
            default:
                $shipping_fee = 5 * $total_quantity;
                break;
        }
        Session::put('shipping_fee', $shipping_fee);
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


    public function postShippingFee(Request $request)
    {
        $data = $request->all();
        $shipping_fee = $this->shippingFee($data);
        Session::put('shipping_fee', $shipping_fee);
        return response()->json($shipping_fee);
    }



    //======= Coupon ======
    public function calcCoupon($code = '', $value_order = 0)
    {
        $value = 0;
        $id = '';
        if ($code != null && $code != '') {
            try {
                $coupon = Coupon::where('code', 'like', $code)
                    ->where('status', 1)
                    ->where('value_order', '<=', $value_order)
                    ->first();
                if ($coupon) {
                    $times = Order::where('coupon_id', $coupon->id)->where('status', '<>', 6)->count('*');
                    $value = ($coupon->times > $times) ? $coupon->value : 0;
                    $id = $coupon->id;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        } else {
            $value = 0;
        }

        Session::put('code', $code);
        Session::put('order_coupon', $value);
        // return $order_coupon;
        return [
            'id'=>$id,
            'code'=>$code,
            'value'=>$value
        ];
    }


    public function postCoupon(Request $request)
    {
        $code = trim($request->code);
        $value_order = $request->value_order;
        $coupon = $this->calcCoupon($code, $value_order);

        return response()->json($coupon['value']);
    }

    public function showInformationOrder()
    {
        $data = [];
        $data['code'] = Session::has('code') ? Session::get('code') :"";
        $data['order_coupon'] = Session::has('order_coupon') ? Session::get('order_coupon') : 0;
        $data['shipping_fee'] = Session::has('shipping_fee') ? Session::get('shipping_fee') : 0;

        $user_id = Auth::id();
        $carts = Cart::selectRaw(
            'carts.*,
            products.*,
            (product_price - discount) as price,
            ((product_price-discount) * carts.quantity) as amount'
        )->join('products', 'carts.product_id', 'like', 'products.product_id')
            ->where('carts.user_id', $user_id)
            ->orderBy('id', 'desc')
            ->get();
        $sum = 0;
        foreach($carts as $k=>$v){
            $sum += $v->amount;
        }
        $data['value_cart'] = $sum ?? 0;
        $data['value_order'] = $data['value_cart'] - $data['order_coupon']+ $data['shipping_fee'];
        // dd($data);
        
        return response()->json($data);
    }


    public function confirmOrder()
    {
        return view('fe.order.confirm');
    }

    public function cancelOrder($order_id)
    {
        $order = Order::find($order_id);
        $order->status = 6;
        $order->save();
        Session::forget('success_paypal');
        Session::forget('total_paypal');
        
        Session::forget('shipping_fee');
        Session::forget('order_coupon');
        Session::forget('code');
        Session::forget('order');
        
        // return redirect()->back()->with('success', 'Đơn hàng đã bị hủy');
        return redirect()->route('product.index');
    }

    public function updateStatusOrder(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = 2;
        $order->payment_method = Session::get('success_paypal') == true ? 2 : 1;
        $order->payment_status = Session::get('success_paypal') == true ? 2 : 1;

        //save information
        $order->save();

        Session::forget('success_paypal');
        Session::forget('total_paypal');

        Session::forget('shipping_fee');
        Session::forget('order_coupon');
        Session::forget('code');
        Session::forget('order');

        return redirect()->route('product.index');
    }
}
