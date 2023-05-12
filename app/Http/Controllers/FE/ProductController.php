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
     * Display a listing in shop-page.
     */
    public function index()
    {
        $products = Product::all();
        $prods_popular = "";
        return view('fe.shop.shop', compact('products'));
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
        $avgRating = Review::where('product_id', $product->product_id)->avg('rating');
        // $avgRating = round($avgRating);
        $prods_related = Product::where('category_id', 'like', $product->category_id)
            ->limit(8)
            ->get();
        return view('fe.detail.product-detail', [
            'product' => $product,
            'avgRating' => $avgRating,
            'prods_related' => $prods_related
        ]);
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

    public function productDetail($product_slug)
    {
        $product = Product::where('product_slug', 'like', $product_slug)->first();

        $avgRating = Review::where('product_id', $product->product_id)->avg('rating');
        $prods_related = Product::where('category_id', 'like', $product->category_id)
            ->limit(8)
            ->get();
        return view('fe.detail.product-detail', [
            'product' => $product,
            'avgRating' => $avgRating,
            'prods_related' => $prods_related
        ]);
    }
}