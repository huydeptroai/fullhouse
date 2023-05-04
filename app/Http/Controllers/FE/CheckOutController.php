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
        // $orders = Order::where('user_id', $request->param('user_id'))->get();
        $orders =  Order::all();
        $provinces = Province::orderby("administrative_region_id", "asc")
            // ->select('code', 'full_name_en')
            ->get();
        $product = Product::all(); 
        return view('fe.checkout', [
            'orders' => $orders,
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
        dd($request);
        //1. crete order
        $data = $request->all();
        $user = Auth::user();
        // Shipping fee
        $data['shipping_fee'] = $this->shippingFee($request->shipping_city, $request->value_order);
        $data['order_date'] = date('Y-m-d',time());
        $data['user_id'] = $user->id;

        $order = Order::create([
            'order_date' => date('Y-m-d',time()),
            'receiver_name' => $request->receiver_name,
            'receiver_phone' => $request->receiver_phone,
            'shipping_city' => $request->receiver_city,
            'shipping_district' => $request->receiver_district,
            'shipping_fee' => $data['shipping_fee'],
            'payment_method' => $request->payment_method,
            'note' => $request->note,
            'status' => 0,
            'user_id' => $user->id,
            'coupon_id' => $request->coupon_id
        ]);

        $carts = Cart::where('user_id', $request->user_id)->get();
        foreach( $carts  as $cart){
            $product = Product::selectRaw('(product_price - discount) as price')->where('product_id', 'like', $cart->product_id)->first();
            
            $order_detail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'price' => $product->price,
                'quantity' => $cart->quantity
            ]);
        }

        //2. delete all cart
        Cart::where('user_id', $request->user_id)->delete();

        return redirect()->route('checkout')->with('success', 'You are order successfully! Your order is processing');
    }

    public function shippingFee($city, $value_order)
    {
        $shipping_fee = 0;
        if ($city != 'Ho Chi Minh City') {
            if ($value_order < 250) {
                $shipping_fee = $value_order * 0.1;
                if ($shipping_fee < 5) {
                    return $shipping_fee = 5;
                } elseif ($shipping_fee > 50) {
                    return $shipping_fee = 50;
                }
            }
        }
        return $shipping_fee;
    }

    public function postCoupon(Request $request)
    {
        $code = $request->code;
        $value_order = $request->value_order;

        $coupon = Coupon::where('code', 'like', $code)
            ->where('status','=', 1)
            ->where('value_order', '<=', $value_order)
            ->first();
        // if($coupon);
        // {
        //     return 0;
        // }
        $times = Order::where('coupon_id', $coupon->id)->count('id');
        if ($coupon->times > $times) {
            return $coupon->value;
        }
        return 0;
    }

    
}
