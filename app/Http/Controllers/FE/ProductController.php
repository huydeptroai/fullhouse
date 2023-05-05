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
        $avgRating = Review::where('product_id', $product->product_id)->avg('rating');

        $reviews = Review::where('product_id', $product->product_id)->get();
        $count_reviews = Review::where('product_id', $product->product_id)->count('*');
        $prods_popular = Product::limit(4)->get();

        $prods_related = Product::where('category_id', 'like', $product->category_id)
            ->limit(8)
            ->get();
        return view('fe.product-detail', [
            'product' => $product,
            'reviews' => $reviews,
            'count_reviews' => $count_reviews,
            'avgRating' => $avgRating,
            'prods_related' => $prods_related,
            'prods_popular' => $prods_popular
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
        dd($product_slug);
        try {
            $product = Product::where('product_slug', 'like', $product_slug)->first();
        } catch (\Throwable $th) {
            abort(404);
        }
        return view('fe.product-detail', compact('product'));
    }

}
