<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function searchByCategoryName($category_name)
    {
        $products = Product::selectRaw('products.*, categories.*')
        ->join('categories', 'categories.category_id', 'like', 'products.category_id')
        ->where('category_name_1', 'like', $category_name)
        ->orWhere('category_name_2', 'like', $category_name)
        ->get();

        return view('fe.shop', compact('products'));
    }

    public function searchPrice(Request $request)
    {
        $min = $request->input('min');
        $max = $request->input('max');
        $products = Product::where('product_price','>=',$min)->where('product_price','<=',$max)->get();

        return view('fe.shop', compact('products'));
    }


}
