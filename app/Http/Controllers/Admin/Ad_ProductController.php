<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;

class Ad_ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
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

        $categories = Category::all();
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
        $request->has('featured') ? $item['featured'] = 1 : 0;
        Product::create($item); //can co map assignment o Model

        //save file image into product-images table
        if ($request->hasFile('image')) {
            $image_path = public_path('assets/img/upload/product');
            if (!file_exists($image_path)) {
                mkdir($image_path, 0777, true);
            }

            foreach ($request->file('image') as $imageFile) {
                $file_name = trim($imageFile->getClientOriginalName());
                $imageFile->move($image_path, $file_name);
                $product_image = ProductImage::create([
                    'product_id' => $request->product_id,
                    'image_name' => $file_name,
                    'image_path' => $image_path
                ]);
            }
        }



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
        $product_image = DB::table('product_images')
            ->where('product_id', $product->product_id)
            ->get();
        return view('admin.product.product-edit', compact('product', 'categories', 'product_image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $item = $request->all();
        $item['product_slug'] = changeTitle($item['product_name']);
        $request->has('featured') ? $item['featured'] = 1 : 0;
        $product->update($item); //can co map assignment o Model

        //save file image into product-images table
        if ($request->hasFile('image')) {
            $image_path = public_path('assets/img/upload/product');
            if (!file_exists($image_path)) {
                mkdir($image_path, 0777, true);
            }

            foreach ($request->file('image') as $imageFile) {
                $file_name = trim($imageFile->getClientOriginalName());
                $imageFile->move($image_path, $file_name);
                $product_image = ProductImage::create([
                    'product_id' => $request->product_id,
                    'image_name' => $file_name,
                    'image_path' => $image_path
                ]);
            }
        }

        return redirect()->route("admin.product.index")->with('success', "Product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // dd($product->productImage()->get() != null);
        if ($product->productImage()->get() != null) {
            foreach ($product->productImage as $productImage) {
                $path = $productImage->image_path . '/' . $product->image_name;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            $product->productImage()->delete();
        }
        $product->delete();
        // Product::withTrashed()->where('product_id', $product->product_id)->forceDelete();
        return redirect()->route('admin.product.index')->with('deleted', 'Product deleted successfully!');
    }
}
