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
                <select name="orderby" class="use-chosen">
                    <option value="menu_order" selected="selected">Default sorting</option>
                    <option value="popularity">Sort by popularity</option>
                    <option value="rating">Sort by average rating</option>
                    <option value="date">Sort by newness</option>
                    <option value="price">Sort by price: low to high</option>
                    <option value="price-desc">Sort by price: high to low</option>
                </select>
            </div>

            <div class="sort-item product-per-page">
                <select name="post-per-page" class="use-chosen">
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
                <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
            </div>

        </div>

    </div>
    <!--end wrap shop control-->

    <div class="row">
        <!-- product list start -->
        <ul class="product-list grid-products equal-container">
            @foreach($products as $product)
            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{ route('product.show', $product->product_id)}}" title="{{$product->product_name}}">
                            <figure><img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" alt="{{$product->product_name}}"></figure>
                        </a>
                        <div class="group-flash">
                            @if($product->discount > 0)
                            <span class="flash-item sale-label">
                                sale {{number_format($product->discount/$product->product_price*100,0)}}%
                            </span>
                            @endif
                            <!-- <span class="flash-item new-label">new</span> -->
                            <span class="flash-item bestseller-label">Bestseller</span>
                        </div>

                    </div>

                    <div class="product-info">
                        <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name"><span>{{$product->product_name.' - '.$product->product_id}}</span></a>
                    </div>
                    <div class="wrap-price">
                        <span class="product-price">
                            ${{number_format($product->product_price - $product->discount,2)}}
                        </span>
                        @if($product->discount > 0)
                        <span style="text-decoration: line-through;">${{number_format($product->product_price,2)}}</span>
                        @endif
                    </div>
                    <a href="#" class="btn add-to-cart" data-id="{{$product->product_id}}">Add To Cart</a>
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