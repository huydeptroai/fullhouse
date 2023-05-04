<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $product_sale = Product::where('discount', '>', 0)->get();
        $product_latest = Product::orderByDesc('updated_at')->get();
        return view('fe.home', [
            'product_sale' => $product_sale,
            'product_latest' => $product_latest
        ]);
    }

    public function about()
    {
        return view('fe.about');
    }

    public function contact()
    {
        return view('fe.contact');
    }

    public function cart()
    {
        return view('fe.cart');
    }

    public function checkout()
    {
        return view('fe.checkout');
    }

    public function login()
    {
        return view('fe.login');
    }

    public function register()
    {
        return view('fe.register');
    }
    public function register_socialite()
    {
        return view('fe.register_socialite');
    }

    public function shippingPolicy()
    {
        return view('fe.shipping-policy');
    }
    public function warrantyPolicy()
    {
        return view('fe.warranty-policy');
    }
}
