<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

    <div class="banner-shop">
        <a href="#" class="banner-link">
            <figure><img src="{{ asset('/frontend/images/shop_banner_01_BANNER-SOFA.jpg') }}" alt=""></figure>
        </a>
    </div>

    <div class="wrap-shop-control">
        <h1 class="shop-title">Products</h1>
        <div class="wrap-right">
            <div class="sort-item orderby ">
                <select id="orderby" name="orderby" class="use-chosen">
                    <option value="menu_order" selected="selected">Default sorting</option>
                    <option value="popularity">Sort by popularity</option>
                    <option value="rating">Sort by average rating</option>
                    <option value="date">Sort by newness</option>
                    <option value="price">Sort by price: low to high</option>
                    <option value="price-desc">Sort by price: high to low</option>
                </select>
            </div>

            <div class="sort-item product-per-page">
                <select id="post_per_page" name="post-per-page" class="use-chosen">
                    <option value="12" selected="selected">12 per page</option>
                    <option value="16">16 per page</option>
                    <option value="18">18 per page</option>
                    <option value="21">21 per page</option>
                    <option value="24">24 per page</option>
                    <option value="30">30 per page</option>
                    <option value="32">32 per page</option>
                </select>
            </div>

            <div class="change-display-mode">
                <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                <a href="#" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
            </div>

        </div>

    </div>
    <!--end wrap shop control-->

    <div class="row">
        <!-- product list start -->
        <ul class="product-list grid-products equal-container">
            @foreach($products as $product)
            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="product product-style-2 equal-elem " style="display: flex;flex-direction: column;justify-content: space-between;align-items: stretch;">
                    <div class="product-thumnail">
                        <a href="{{ route('productDetail',['product_slug' => $product->product_slug])}}" title="{{$product->product_name}}">
                            <figure><img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" alt="{{$product->product_name}}"></figure>
                        </a>
                        <div class="group-flash">
                            @if($product->discount > 0)
                            <span class="flash-item sale-label">
                                sale {{ $product->saleOff() }}%
                            </span>
                            @endif

                            @if( $product->isNewProduct() )
                            <span class="flash-item new-label">new</span>
                            @endif

                            @if($product->avgRating() > 3)
                            <span class="flash-item bestseller-label">Bestseller</span>
                            @endif

                        </div>
                    </div>

                    <div class="product-info">
                        <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name"><span>{{$product->product_name.' - '.$product->product_id}}</span></a>
                    </div>


                    <div class="col-12" style="display: flex;flex-direction: column;justify-content: space-between;align-items:flex-end;">
                        <div class="col-12" style="display:flex-item;font-size:16px;">
                            <strong class="product-price" style="color:green;">
                                $ {{number_format($product->product_price - $product->discount,2)}}
                            </strong>
                            @if($product->discount > 0)
                            <span style="text-decoration: line-through;color:red;">$ {{number_format($product->product_price,2)}}</span>
                            @endif
                        </div>
                        @if($product->avgRating() > 0)
                        <div class="col-12" style="display:flex-item;font-size:12px;">
                            <strong>{{number_format( $product->reviews->avg('rating'),2) }} </strong>
                            @for($i=1; $i<=5; $i++) @php $avg=$product->reviews->avg('rating');
                                $color=($i <=round($avg)) ? "color: #ffcc00;" : "color: #ccc;" ; @endphp <i class="fa fa-star" aria-hidden="true" style="cursor:pointer;{{$color}}font-size:15px;"></i>
                                    @endfor
                                    <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="count-review"> ({{count($product->reviews)}} reviews)</a>
                        </div>
                        @endif
                    </div>
                    <button style="margin:auto 0 0 0;width: 100%;" class="btn btn-success add-to-cart" data-id="{{$product->product_id}}">Add To Cart</button>

                </div>
            </li>
            @endforeach

        </ul>
        <!-- product list start -->

    </div>

    <div class="wrap-pagination-info">
        <ul class="page-numbers">
            <li class="page-number-item "></li>
        </ul>
    </div>

</div>