<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ViewProductData;

class CartController extends Controller
{

    /**
     * Display the cart page.
     */
    public function cart()
    {
        if (Auth::check()) {

            $product_popular = ViewProductData::orderByDesc('avg_rating')->limit(8)->get();
            $user_id = Auth::id();
            $carts = $this->listCart($user_id);

            return view('fe.order.cart', [
                'carts' => $carts,
                'products' => $product_popular
            ]);
        }
    }

    /**
     * Display the side_cart : master-page.
     */

    public function showCart()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $carts = $this->listCart($user_id);
            return response()->json($carts);
        } else {
            response()->json(['status' => 'error']);
        }
    }

    public function listCart($user_id = '')
    {
        return Cart::selectRaw(
            'carts.*,
            products.*,
            (product_price - discount) as price,
            ((product_price-discount) * carts.quantity) as amount'
        )->join('products', 'carts.product_id', 'like', 'products.product_id')
            ->where('carts.user_id', $user_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function addCart(Request $request)
    {
        if (Auth::check()) {

            $user_id = Auth::id();
            $pid = $request->pid;
            $quantity = $request->quantity;


            //set quantity for Cart-item
            if ($request->action != 'edit') {
                $cartExist = Cart::where('product_id', 'like', $pid)->where('user_id', $user_id)->first();
                if ($cartExist) {
                    $quantity += $cartExist->quantity;
                }
            }

            $product = Product::where('product_id', 'like', $pid)->first();
            if ($product->inventory() < $quantity) {
                return response()->json(['status' => 'error','pid'=>$pid, 'message' => 'Insufficient inventory']);
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
    }


    public function destroy($cart_id)
    {
        $cart = Cart::find($cart_id);
        $cart->delete();
        return response()->json($cart);
    }

}
