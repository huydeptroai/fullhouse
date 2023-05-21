<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\ViewProductData;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


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

        if (isset($_GET['search_name'])) {
            $keywords = $_GET['search_name'];
            $products = Product::where('product_name', 'like', '%' . $keywords . '%')
                ->paginate(6)->appends(request()->query());
        }

        return view('fe.shop.shop', compact('products', 'prods_popular'));
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
        $products = ViewProductData::orderByDesc('avg_rating')->paginate(9)->appends(request()->query());

        if ($category_name != null) {
            $products = Product::selectRaw('products.*, categories.*')
                ->join('categories', 'categories.category_id', 'like', 'products.category_id')
                ->where('category_name_1', 'like', $category_name)
                ->orWhere('category_name_2', 'like', $category_name)
                ->paginate(9)->appends(request()->query());
        }

        return view('fe.shop.shop', compact('products', 'prods_popular'));
    }


    //function use in the shop page (return display)
    public function sortBy(Request $request)
    {
        $sort_by = $request->sortby;

        $column = 'amount_sell';
        $sort = 'desc';
        switch ($sort_by) {
            case 'price':
                $column = 'price';
                $sort = 'asc';
                break;
            case 'price-desc':
                $column = 'price';
                $sort = 'desc';
                break;
            case 'name':
                $column = 'product_name';
                $sort = 'asc';
                break;
            case 'name-desc':
                $column = 'product_name';
                $sort = 'desc';
                break;
            case 'rating':
                $column = 'avg_rating';
                $sort = 'desc';
                break;
        }
        $products = ViewProductData::orderBy($column, $sort)->paginate(9)->appends(request()->query());
        $this->displayList($products);
        
    }


    public function searchByPrice(Request $request)
    {
        $prods_popular = ViewProductData::orderByDesc('count_order')->limit(6)->get();

        $price_min = $request->price_min;
        $price_max = $request->price_max;
        if ($price_min >= 0 && $price_max >= $price_min) {
            $products = ViewProductData::orderByDesc('avg_rating')
                ->whereBetween('price', array($price_min, $price_max))
                ->paginate(9)->appends(request()->query());

            $this->displayList($products);
        }
        if ($price_min == 0 && $price_max == 0) {
            $products = ViewProductData::orderByDesc('avg_rating')
                ->paginate(9)->appends(request()->query());
            
            $this->displayList($products);
        }
    }


    //search By Category (side bar)
    public function searchByCategory(Request $request)
    {
        $cid = $request->cid;

        $products = ViewProductData::orderByDesc('avg_rating')
            ->where('category_id', 'like', $cid . "%")
            ->paginate(9)->appends(request()->query());
        Session::put('products', $products);
        $this->displayList($products);
    }


    public function displayList($products)
    {
        $list = '';
        
        foreach ($products as $product) {

            $list .= '<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6" style="display:flex-item;">';
            $list .= '<div class="product product-style-2 equal-elem" style="display: flex;flex-direction: column;justify-content: space-between;align-items: stretch;">';
            $list .= '<div class="product-thumnail">';

            $list .= '<a href="' . route('productDetail', ['product_slug' => $product->product_slug]) . '" >';
            $list .= '<figure><img src="' . asset('assets/img/upload/product/' . $product->product_image['0']) . '" ></figure></a>';

            $list .= '<div class="group-flash">';
            if ($product->discount > 0) {
                $list .= '<span class="flash-item sale-label">';
                $list .= 'sale ' . $product->saleOff() . '% </span>';
            }
            if ($product->isNewProduct()) {
                $list .= '<span class="flash-item new-label">new</span>';
            }
            if ($product->avgRating() > 3) {
                $list .= '<span class="flash-item bestseller-label">Bestseller</span>';
            }
            $list .= '</div>';
            $list .= '<div class="wrap-btn">';
            $list .= '<a href="' . route('productDetail', ['product_slug' => $product->product_slug]) . ' " class="function-link">quick view</a>';
            // $list .= '<a href="#" class="function-link add-to-wishlist" data-id="' . $product->product_id . '">Wishlist</a></div>';
            $list .= '</div>';

            $list .= '<div class="product-info">';
            $list .= '<a href="' . route('productDetail', ['product_slug' => $product->product_slug]) . '"                class="product-name"><span>' . $product->product_name . ' - ' . $product->product_id . '</span></a>';

            $list .= '</div>';
            $list .= '<div class="col-12" style="display: flex;flex-direction: column;justify-content: space-between;align-items:flex-end;">';
            $list .= '<div class="col-12" style="display:flex-item;font-size:16px;">';
            $list .= '<strong class="product-price" style="color:green;">';
            $list .= '$' . number_format($product->product_price - $product->discount, 2);
            $list .= '</strong>';

            if ($product->discount > 0) {
                $list .= ' <span style="text-decoration: line-through;color:red;">';
                $list .= '$ ' . number_format($product->product_price, 2);
                $list .= '</span>';
            }
            $list .= '</div>';
            if ($product->avgRating() > 0) {

                $list .= '<div class="col-12" style="display:flex-item;font-size:12px;">';
                $list .= '<strong>' . number_format($product->avgRating(), 2) . ' </strong>';

                for ($i = 1; $i <= 5; $i++) {
                    $avg = $product->reviews->avg('rating');
                    $color = ($i <= round($avg)) ? "color: #ffcc00;" : "color: #ccc;";
                    $list .= ' <i class="fa fa-star" aria-hidden="true" style="cursor:pointer;' . $color . 'font-size:15px;"></i>';
                }

                $list .= '<a href="' . route('productDetail', ['product_slug' => $product->product_slug]) . '" class="count-review">(' . count($product->reviews) . ' reviews)</a>';
                $list .= '</div>';
            }
            // $list .= '</div><a href="#" type="button" style="margin:auto 0 0 0;width: 100%;" class="btn btn-success add-to-cart" data-id="' . $product->product_id . '">Add To Cart</a></div>';
            $list .= '</li>';
        }
       
        echo $list;
    }
}
