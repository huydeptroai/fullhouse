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
        $prods_popular = "";
        if(isset($_GET['sort_by'])){
           $sort_by = $_GET['sort_by'];
            if($sort_by == 'price-desc'){
                $products = Product::orderby('product_price','ASC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'price'){
                $products = Product::orderby('product_price','DESC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'name-desc'){
                $products = Product::orderby('product_name','DESC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'name'){
                $products = Product::orderby('product_name','ASC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'rating'){
                $products = Product::selectRaw('products.*, reviews.*')
                ->join('reviews', 'reviews.product_id', 'like', 'products.product_id')
                ->orderby('rating','ASC')
                ->paginate(6)->appends(request()->query());
            }
        }elseif(isset($_GET['price_min']) && $_GET['price_min']){
            $price_min = $_GET['price_min'];
            $price_max = $_GET['price_max'];

            // $products = Product::where('product_price', '>=', ($price_min.'-discount'))
            //     ->where('product_price', '<=', ($price_min.'-discount'))
            //     ->get();
            // $products = DB::table('products')
            // ->select('product_id','product_price','discount','product_slug','product_name','product_image')
            // ->groupBy('product_id','product_price','discount','product_slug','product_name','product_image')
            //     ->havingRaw('product_price - discount >='.$price_min)->get();


            // $products = $prods->whereBetween('price_brand',[$price_min,$price_max])->get();
        }
        else{
            $products = Product::all();
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