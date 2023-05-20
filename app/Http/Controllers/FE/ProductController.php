<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\ViewProductData;
use Carbon\Carbon;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * Display a listing in shop-page.
     */
    public function index()
    {
        $prods_popular = ViewProductData::orderByDesc('count_order')->limit(6)->get();
        $prods_new = ViewProductData::orderByDesc('created_at')
            ->where('created_at', '>', Carbon::now()->subDays(30))
            ->paginate(6)->appends(request()->query());
        $products = ViewProductData::orderByDesc('amount_sell')->paginate(6)->appends(request()->query());

        $sort_by = $_GET['sort_by'] ?? '';
        $item = $_GET['item'] ?? 6;
        $products = $this->sortBy($sort_by, $item);

        if(isset($_GET['search_name'])){
            $keywords = $_GET['search_name'];
            $products = Product::where('product_name', 'like', '%' . $keywords . '%')
            ->paginate(6)->appends(request()->query());
        }

        if (isset($_GET['price_min']) && isset($_GET['price_max'])) {
            $price_min = $_GET['price_min'];
            $price_max = $_GET['price_max'];

            Session()->put("price_min",$price_min);
            Session()->put("price_max",$price_max);

            if ($price_min >= 0 && $price_max >= $price_min) {
                $products = ViewProductData::orderByDesc('avg_rating')
                    ->whereBetween('price', array($price_min, $price_max))
                    ->paginate(6)->appends(request()->query());
            } else {
                $products = ViewProductData::orderByDesc('avg_rating')
                    ->whereBetween('price', array(75, 300))
                    ->paginate(6)->appends(request()->query());
            }
        }

        return view('fe.shop.shop', compact('products', 'prods_popular'));
    }

    public function sortBy($sort_by, $item)
    {
        $products = ViewProductData::orderByDesc('amount_sell')->paginate($item)->appends(request()->query());
        switch ($sort_by) {
            case 'price':
                $products = ViewProductData::orderby('price')->paginate($item)->appends(request()->query());
                break;
            case 'price-desc':
                $products = ViewProductData::orderbyDesc('price')->paginate($item)->appends(request()->query());
                break;
            case 'name':
                $products = Product::orderby('product_name')->paginate($item)->appends(request()->query());
                break;
            case 'name-desc':
                $products = Product::orderbyDesc('product_name')->paginate($item)->appends(request()->query());
                break;
            case 'rating':
                $products = ViewProductData::orderByDesc('avg_rating')->paginate($item)->appends(request()->query());
                break;
        }
        return $products;
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

    public function searchByCategoryName($category_name)
    {
        $prods_popular = ViewProductData::orderByDesc('count_order')->limit(6)->get();

        $prods_new = ViewProductData::orderByDesc('created_at')->paginate(6)->appends(request()->query());
        $products = ViewProductData::orderByDesc('avg_rating')->paginate(6)->appends(request()->query());

        if ($category_name != null) {
            $products = Product::selectRaw('products.*, categories.*')
                ->join('categories', 'categories.category_id', 'like', 'products.category_id')
                ->where('category_name_1', 'like', $category_name)
                ->orWhere('category_name_2', 'like', $category_name)
                ->paginate(6)->appends(request()->query());
        }

        return view('fe.shop.shop', compact('products', 'prods_popular'));
    }
}
