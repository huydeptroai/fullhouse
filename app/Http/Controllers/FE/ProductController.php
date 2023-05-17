<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\ViewProductData;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * Display a listing in shop-page.
     */
    public function index()
    {
        $prods_popular = ViewProductData::orderByDesc('count_order')->paginate(6)->appends(request()->query());
        $prods_new = ViewProductData::orderByDesc('created_at')->paginate(6)->appends(request()->query());
        $products = Product::all();

        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'price-desc') {
                $products = Product::orderby('product_price', 'ASC')->paginate(6)->appends(request()->query());
            } elseif ($sort_by == 'price') {
                $products = Product::orderby('product_price', 'DESC')->paginate(6)->appends(request()->query());
            } elseif ($sort_by == 'name-desc') {
                $products = Product::orderby('product_name', 'DESC')->paginate(6)->appends(request()->query());
            } elseif ($sort_by == 'name') {
                $products = Product::orderby('product_name', 'ASC')->paginate(6)->appends(request()->query());
            } elseif ($sort_by == 'rating') {
                $products = Product::selectRaw('products.*, reviews.*')
                    ->join('reviews', 'reviews.product_id', 'like', 'products.product_id')
                    ->orderby('rating', 'ASC')
                    ->paginate(6)->appends(request()->query());
            }
        }
        if (isset($_GET['price_min']) && isset($_GET['price_max'])) {
            $price_min = $_GET['price_min'];
            $price_max = $_GET['price_max'];

            if ($price_min >= 0 && $price_max >= $price_min) {
                $products = ViewProductData::where('price', '>=', $price_min)
                    ->where('price', '<=', $price_max)
                    ->get();
            }
        }

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
        $prods_related = Product::where('category_id', 'like', $product->category_id)
            ->limit(8)
            ->get();
        return view('fe.detail.product-detail', [
            'product' => $product,
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
