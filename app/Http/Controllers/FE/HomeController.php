<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('fe.home');
    }

    public function shop()
    {
        return view('fe.shop');
    }

    public function detail()
    {
        return view('fe.product_detail');
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
}
