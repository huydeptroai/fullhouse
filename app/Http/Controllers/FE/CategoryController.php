<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function search(Request $request)
    {
        $categories = Category::where()->get();
        $products = Product::all();

        return view('fe.shop', compact('products'));
    }
}
