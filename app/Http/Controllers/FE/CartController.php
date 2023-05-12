<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the cart page.
     */
    public function cart()
    {
        // $cart = Cart::all();
        $product_popular = Product::all();
        $user_id = Auth::id();
        $carts = Cart::selectRaw('carts.*, products.*, ((product_price-discount) * carts.quantity) as amount')
            ->join('products', 'carts.product_id', 'like', 'products.product_id')
            ->where('user_id', $user_id)
            ->get();

        return view('fe.cart', [
            'carts' => $carts,
            'products' => $product_popular
        ]);
    }

    public function showCart()
    {
        $user_id = Auth::id();
        $carts = Cart::selectRaw(
            'carts.*,
            products.*,
            (product_price - discount) as price,
            ((product_price-discount) * carts.quantity) as amount'
        )->join('products', 'carts.product_id', 'like', 'products.product_id')
            ->where('carts.user_id', $user_id)
            ->get();

        return response()->json($carts);
    }

    public function addCart(Request $request)
    {

        $user_id = Auth::id();
        $pid = $request->pid;
        $quantity = $request->quantity;

        //set quantity
        if ($request->action != 'edit') {
            $cartExist = Cart::where('product_id', 'like', $pid)->where('user_id', $user_id)->first();
            if ($cartExist != null) {
                $quantity += $cartExist->quantity;
            }
        }

        //save cart item
        $cart = Cart::updateOrCreate(
            [
                'user_id' => $user_id,
                'product_id' => $pid
            ],
            [
                'quantity' => $quantity
            ]
        );
        return response()->json($cart);
    }

    

    public function destroy($cart_id)
    {
        $cart = Cart::find($cart_id);
        $cart->delete();
        return response()->json($cart);
    }

    // public function postCoupon(Request $request)
    // {
    //     $code = $request->code;
    //     $value_order = $request->value_order;

    //     $coupon = Coupon::where('code', 'like', $code)
    //         ->where('status','=', 1)
    //         ->where('value_order', '<=', $value_order)
    //         ->first();
    //     // dd($coupon);
    //     $times = Order::where('coupon_id', $coupon->id)->count('id');

    //     if ($coupon->times > $times) {
    //         return $coupon->value;
    //     }
    //     return 0;
    // }

}
