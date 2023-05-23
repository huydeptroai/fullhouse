<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Review;
use App\Models\ViewProductData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;
use App\Http\Requests\ProductRequest;

class Ad_ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderByDesc('created_at')->get();
        return view('admin.product.product-list', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if (!Gate::allows("create-product")) {
        //     abort(403);
        // }

        $categories = Category::orderByDesc('created_at')->get();
        return view('admin.product.product-create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->category_id);
        $item = $request->all();
        $item['product_slug'] = changeTitle($item['product_name']);
        $item['featured'] = $request->has('featured') ? 1 : 0;

        //save file image table
        $image_name = [];
        if ($request->hasFile('image')) {
            // $image_path = public_path('assets/img/upload/product');
            $image_path = 'assets/img/upload/product';
            if (!file_exists($image_path)) {
                mkdir($image_path, 0777, true);
            }

            foreach ($request->file('image') as $imageFile) {
                $file_name = trim($imageFile->getClientOriginalName());
                $imageFile->move($image_path, $file_name);

                $image_name[] = $file_name;
            }
        }
        $item['product_image'] =  $image_name;
        $item['discount'] =  $request->discount > 0 ? $request->discount : 0;

        Product::create($item); //can co map assignment o Model
        return redirect()->route("admin.product.index")->with('success', "Added Product : {$item['product_name']} ID : {$item['product_id']} Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // dd($product);
        // $review = Review::where('product_id', $product->product_id);
        // $count = $review->count();
        // $sum_rating = $review->rating->sum();
        // $rating = $count > 0 ? ($sum_rating/$count) : 0;

        // $list_review = $review->get();

        // return view('admin.product.product_detail', compact('product', 'list_view', 'rating'));
        return view('admin.product.product_detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // dd($product->productImage()->get());
        $categories = Category::all();

        return view('admin.product.product-edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $item = $request->all();
        $item['product_slug'] = changeTitle($item['product_name']);
        $item['featured'] = $request->has('featured') ? 1 : 0;

        //save file image table
        $image_name = [];
        if ($request->hasFile('image')) {
            // $image_path = public_path('assets/img/upload/product');
            $image_path = 'assets/img/upload/product';
            if (!file_exists($image_path)) {
                mkdir($image_path, 0777, true);
            }

            foreach ($request->file('image') as $imageFile) {
                $file_name = trim($imageFile->getClientOriginalName());
                $imageFile->move($image_path, $file_name);

                $image_name[] = $file_name;
            }
            $item['product_image'] =  $image_name;
        }

        $product->update($item);
        return redirect()->route("admin.product.index")->with('success', "Product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //1. check product in order
        if($product->orderDetails()->count('*')){
            return redirect()->route('admin.product.index')->with('deleted', 'Cannot deleted product! This product had exist in the order!');
        }
        //2. delete product
        $imageFolder = 'assets/img/upload/product/';
        if ($product->product_image != null) {
            foreach ($product->product_image as $productImage) {
                $path = $imageFolder . $productImage;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('deleted', 'Product deleted successfully!');
    }

    public function reportProduct()
    {
        $productCancel = OrderDetail::join('orders', 'orders.id', '=', 'order_details.order_id')
        ->where('status',6)->pluck('product_id')->toArray();
        $products = ViewProductData::whereNotIn('product_id', $productCancel)->get();

        $quantityTotal = ViewProductData::whereNotIn('product_id', $productCancel)->sum('product_quantity');
        $quantitySell = ViewProductData::whereNotIn('product_id', $productCancel)->sum('quantity_sell');
        return view('admin.report.report-product', compact('products','quantityTotal', 'quantitySell'));
    }

    public function reportSales()
    {
        $productCancel = OrderDetail::join('orders', 'orders.id', '=', 'order_details.order_id')
        ->where('status',6)->pluck('product_id')->toArray();

        $products = ViewProductData::whereNotIn('product_id', $productCancel)->whereNotNull('quantity_sell')->get();
        $quantitySell = ViewProductData::whereNotIn('product_id', $productCancel)->sum('quantity_sell');
        $amountSell = ViewProductData::whereNotIn('product_id', $productCancel)->sum('amount_sell');
        return view('admin.report.report-sales', compact('products','amountSell', 'quantitySell'));
    }

}