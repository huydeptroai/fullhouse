<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function searchByCategoryId($category_id)
    {
        $categories = Category::where('category_id', $category_id)->get();

        $products = Product::where('category_id', 'like', $category_id)->get();
        $products = Product::selectRaw('products.*, categories.*')
        ->join('categories', 'categories.category_id', 'like', 'products.category_id')
        ->where('category_id', 'like', $category_id)
        ->orWhere('category_id', 'like', $category_id)
        ->get();

        return view('fe.shop', compact('products'));
    }
}
