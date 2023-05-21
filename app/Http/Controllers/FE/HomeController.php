<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\ViewProductData;
use App\Models\Order;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $products_sale = Product::where('discount', '>', 0)->limit(8)->get();

        $products_latest = Product::orderByDesc('created_at')->orderBy('product_price','asc')
            ->whereMonth('created_at', Carbon::now()->month)
            ->limit(8)->get();

        $products_living = Product::where('category_id', 'like', 'LF%')->limit(8)->get();
        $products_dining = Product::where('category_id', 'like', 'KF%')->limit(8)->get();
        $products_bedroom = Product::where('category_id', 'like', 'BF%')->limit(8)->get();
        $products_office = Product::where('category_id', 'like', 'OF%')->limit(8)->get();

        return view('fe.home.home', [
            'products_sale' => $products_sale,
            'products_latest' => $products_latest,
            'products_living' => $products_living,
            'products_dining' => $products_dining,
            'products_bedroom' => $products_bedroom,
            'products_office' => $products_office
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


    public function shippingPolicy()
    {
        return view('fe.shipping-policy');
    }
    public function warrantyPolicy()
    {
        return view('fe.warranty-policy');
    }


    public function newLetter(Request $request)
    {
        $email = $request->email;
        $data = Newsletter::where('email', 'like', $email)->first();
        if ($data) {
            return response()->json($data);
        }
        $data = Newsletter::create([
            'email' => $email
        ]);
        return response()->json($data);
    }
}