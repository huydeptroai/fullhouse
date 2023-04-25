<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        $cart = Cart::where();
        return view('fe.checkout');
    }

    public function createOrder(Request $request)
    {
        //1. crete order
        $data = $request->all();
        // Shipping fee
        $data['shipping_fee'] = $this->shippingFee($request->city, $request->value_order);

        $order = Order::create($data);
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
        if ($city != 'HCM') {
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

    
}
