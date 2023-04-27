<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Cart;
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
        $product_popular = Product::all()->limit(4);
        $user = Auth::user();
        $cart = Cart::selectRaw('carts.*, products.*, (product_price * carts.quantity) as amount')
            ->join('products', 'carts.product_id', 'like', 'products.product_id')
            ->where('user_id', $user->id)
            ->groupBy('carts.product_id')
            ->get();

        return view('fe.cart', [
            'cart' => $cart,
            'product_popular' => $product_popular
        ]);
    }

    public function showCart()
    {
        $user = Auth::user();
        $list_cart = Cart::where('user_id', 1)->get();

        $cart = Cart::selectRaw(
            'carts.id,
            carts.product_id,
            product_name,
            product_image,
            quantity,
            (product_price - discount) as price,
            ((product_price-discount) * carts.quantity) as amount'
        )->join('products', 'carts.product_id', 'like', 'products.product_id')
            ->where('carts.user_id', 1)
            ->get();




        return response()->json($cart);
        // return response()->json($img);
    }

    public function addCart(Request $request)
    {

        // dd($request);
        $user = Auth::user();
        // $cart = $request->all();

        $pid = $request->pid;
        $quantity = $request->quantity;
        $prod = Product::find($pid);

        if ($prod->product_quantity < $quantity) {
            return response()->json_last_error_msg('Over quantity!');
        }

        $cart = Cart::where('product_id', 'like', $pid)->first();
        if ($cart) {
            $quantity += $cart->quantity;
        }

        $cart = Cart::updateOrCreate(
            [
                'user_id' => 1,
                'product_id' => $pid
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
}
