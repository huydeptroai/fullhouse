<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Category;
use App\Models\Newsletter;


class HomeController extends Controller
{
    public function home()
    {
        $products_sale = Product::where('discount', '>', 0)->limit(8)->get();
        $products_latest = Product::orderByDesc('updated_at')->limit(8)->get();

        $products_living = Product::where('category_id', 'like', 'L%')->limit(8)->get();
        $products_dining = Product::where('category_id', 'like', 'K%')->limit(8)->get();
        $products_bedroom = Product::where('category_id', 'like', 'B%')->limit(8)->get();
        $products_office = Product::where('category_id', 'like', 'O%')->limit(8)->get();

        return view('fe.home.home', [
            'products_sale' => $products_sale,
            'products_latest' => $products_latest,
            'products_living' => $products_living,
            'products_dining' => $products_dining,
            'products_bedroom' => $products_bedroom,
            'products_office' => $products_office
        ]);
    }

    public function searchName(Request $request)
    {
        $keywords = $request->search;
        $products = Product::selectRaw('products.*, categories.*')
            ->join('categories', 'categories.category_id', 'like', 'products.category_id')
            ->where('product_name', 'like', '%' . $keywords . '%')
            ->orWhere('category_name_1', 'like', '%' . $keywords . '%')
            ->orWhere('category_name_2', 'like', '$' . $keywords . '$')->get();
        return view('fe.shop', compact('products'));
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

    public function thankyou()
    {
        return view('fe.thankyou');
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
