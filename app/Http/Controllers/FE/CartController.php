<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // $cart = Cart::all();
        $user = Auth::user();
        $cart = Cart::selectRaw('carts.*, products.*, (product_price * carts.quantity) as amount')
            ->join('products', 'carts.product_id', 'like', 'products.product_id')
            ->where('user_id', $user->id)
            ->groupBy('carts.product_id')
            ->get();

        return view('fe.cart', [
            'cart' => $cart
        ]);
    }

    public function showCart()
    {
        $user = Auth::user();
        $cart = Cart::selectRaw('carts.*, products.*, (product_price * carts.quantity) as amount')
            ->join('products', 'carts.product_id', 'like', 'products.product_id')
            ->where('user_id', $user->id)
            ->groupBy('carts.product_id')
            ->get();

        return response()->json($cart);
    }
    
    public function store(Request $request)
    {
        $cart = $request->all();
        Cart::create($cart);
        return redirect()->action([CartController::class, 'showCart']);
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
