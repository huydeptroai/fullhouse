<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $prods_popular = "";
        return view('fe.shop', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // $avgRating = Review::where('product_id', $product->product_id)->avg('rating');

        // $reviews = Review::selectRaw('users.name,users.profile, content, avg(rating) as avd_rating')
        //     ->join('users', 'reviews.user_id', '=', 'users.user_id')
        //     ->where('product_id', 'like', $product->product_id)
        //     ->groupBy('product_id')
        //     ->get();

        return view('fe.product-detail', compact('product'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
    
    public function productDetail($slug)
    {
        $product = Product::where('product_slug', 'like', $slug)->first();
        dd($product);
        return view('fe.product-detail', compact('product'));
    }
}
