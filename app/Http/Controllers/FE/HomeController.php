<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Category;

class HomeController extends Controller
{
    public function home()
    {
        $product_sale = Product::where('discount', '>', 0)->get();
        $product_latest = Product::orderByDesc('updated_at')->get();
        $categories = Category::all();
        return view('fe.home', [
            'product_sale' => $product_sale,
            'product_latest' => $product_latest,
            'categories' => $categories
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
