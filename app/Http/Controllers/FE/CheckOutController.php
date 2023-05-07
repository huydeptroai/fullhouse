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

class CheckOutController extends Controller
{
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
        //1. crete order
        // dd($request);
        $data = $request->all();
        // Shipping fee
        $shipping_fee = 0;


        if ($request->method_shipping == 1) {

            $shipping_fee = $this->shippingFee($data);
        }
        dd($request);
        $user_id = Auth::id();

        $order = Order::create([
            'order_date' => date('Y-m-d', time()),
            'receiver_name' => $data['receiver_name'],
            'receiver_phone' => $data['receiver_phone'],
            'shipping_city' => $data['receiver_city'],
            'shipping_district' => $data['receiver_district'],
            'shipping_fee' => $shipping_fee,
            'payment_method' => $data['payment_method'],
            'note' => $data['note'],
            'status' => 0,
            'user_id' => $user_id,
            'coupon_id' => $data['coupon_id']
        ]);

        $carts = Cart::where('user_id', $user_id)->get();
        foreach ($carts  as $cart) {
            $product = Product::selectRaw('(product_price - discount) as price')
                ->where('product_id', 'like', $cart->product_id)
                ->first();

            $order_detail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'price' => $product->price,
                'quantity' => $cart->quantity
            ]);

            $cart->delete();
        }

        //2. delete all cart
        // Cart::where('user_id', $user_id)->delete();

        return redirect()->route('checkout')->with('success', 'You are order successfully! Your order is processing');
    }

    public function shippingFee($data)
    {
        define('AMOUNT', 250);
        define('MIN', 5);
        define('MAX', 50);

        $city_code = $data->city;
        $district_code = $data->district;
        $value_order = $data->value_order;


        if ($city_code != '79') {
            if ($value_order < AMOUNT) {
                $shipping_fee = $value_order * 0.1;

                if ($shipping_fee < MIN) {
                    return MIN;
                } elseif ($shipping_fee > MAX) {
                    return MAX;
                }
                return $shipping_fee;
            }
        }
        return 0;
    }

    public function postCoupon(Request $request)
    {
        $code = trim($request->code);
        $value_order = $request->value_order;

        $order_coupon = [];
        if (session()->has('order_coupon')) {
            $order_coupon = session()->get('order_coupon');
        }

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
