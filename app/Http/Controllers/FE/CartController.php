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
        $product_popular = Product::limit(4);
        $user = Auth::user();
        $carts = Cart::selectRaw('carts.*, products.*, ((product_price-discount) * carts.quantity) as amount')
            ->join('products', 'carts.product_id', 'like', 'products.product_id')
            ->where('user_id', 1)
            ->get();

        return view('fe.cart', [
            'carts' => $carts,
            'product_popular' => $product_popular
        ]);
    }

    public function showCart()
    {
        $user = Auth::user();
        $list_cart = Cart::where('user_id', 1)->get();

        $carts = Cart::selectRaw(
            'carts.*,
            products.*,
            (product_price - discount) as price,
            ((product_price-discount) * carts.quantity) as amount'
        )->join('products', 'carts.product_id', 'like', 'products.product_id')
            ->where('carts.user_id', 1)
            ->get();

        return response()->json($carts);
        // return response()->json($img);
    }

    public function addCart(Request $request)
    {

        // dd($request);
        // $user = Auth::user();

        $pid = $request->pid;
        $quantity = $request->quantity > 0 ? $request->quantity : 1;
        $prod = Product::find($pid);

        // if ($prod->product_quantity < $quantity) {
        //     return response()->json_last_error_msg('Over quantity!');
        // }

        if ($request->action == null) {
            $cart = Cart::where('product_id', 'like', $pid)->first();
            if ($cart) {
                $quantity += $cart->quantity;
            }
        }

        $cart = Cart::updateOrCreate(
            [
                'user_id' => 1,
                'product_id' => $pid,
            ],
            [
                'quantity' => $quantity
            ]
        );

        // return response()->json($cart);
        // return redirect()->action([CartController::class, 'showCart']);
        $this->showCart();
    }

    public function update(Request $request, Cart $cart)
    {
        $item = $request->all();
        $cart = Cart::find();
        $cart->update($item);
        return;
    }


    public function destroy($cart_id)
    {
        $cart = Cart::find($cart_id);
        $cart->delete();
        return response()->json($cart);
        // return redirect()->action([CartController::class, 'showCart']);
    }

    public function postCoupon(Request $request)
    {
        $code = $request->code;
        $value_order = $request->value_order;

        $coupon = Coupon::where('code', 'like', $code)
            ->where('status','=', 1)
            ->where('value_order', '<=', $value_order)
            ->first();
        $times = Order::where('coupon_id', $coupon->id)->count('id');

        if ($coupon->times > $times) {
            return $coupon->value;
        }
        return 0;
    }
}
