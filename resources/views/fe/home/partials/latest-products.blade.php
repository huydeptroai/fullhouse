<!-- <div class="wrap-show-advance-info-box style-1"> -->
<div class="style-1" style="margin-bottom: 5%">
    <h2 class="title-box">Latest Products</h2>
    <div class="wrap-top-banner">
        <a href="#" class="link-banner banner-effect-2">
            <figure><img src="{{ asset('/frontend/images/shop_banner_01_BANNER-SOFA.jpg') }}" width="1170" height="240" alt=""></figure>
        </a>
    </div>
    <div class="wrap-products">
        <!-- <div class="wrap-product-tab tab-style-1"> -->
        <div class="tab-contents">
            <div class="tab-content-item active" id="digital_1a">
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>
                    @foreach($products_latest as $product)
                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" title="{{$product->product_name}}">
                                <figure>
                                    <img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" width="800" height="800" alt="{{$product->product_image['0']}}">
                                </figure>
                            </a>
                            <div class="group-flash">
                                @if($product->discount > 0)
                                <span class="flash-item sale-label">
                                    sale {{number_format($product->discount/$product->product_price*100,0)}}%
                                </span>
                                @endif
                            </div>
                            <div class="wrap-btn">
                                <a href="{{route('product.show', $product->product_id)}}" class="function-link">quick view</a>
                                <a href="#" class="function-link add-to-wishlist" data-id="{{$product->product_id}}">Wishlist</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name"><span>{{$product->product_name}}</span></a>
                            <div class="wrap-price">
                                <span class="product-price">
                                    ${{number_format($product->product_price - $product->discount,2)}}
                                </span>
                                @if($product->discount > 0)
                                <span style="text-decoration: line-through;">${{number_format($product->product_price,2)}}</span>
                                @endif
                            </div>
                        </div>
                        <div style="margin:auto 0 0 0;">
                            <a href="#" class="btn btn-warning add-to-cart " data-id="{{$product->product_id}}">Add To Cart</a>
                        </div>
                    </div>

                    @endforeach

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                    [White]</span></a>
                            <div class="wrap-price"><ins>
                                    <p class="product-price">$168.00</p>
                                </ins> <del>
                                    <p class="product-price">$250.00</p>
                                </del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                    [White]</span></a>
                            <div class="wrap-price"><ins>
                                    <p class="product-price">$168.00</p>
                                </ins> <del>
                                    <p class="product-price">$250.00</p>
                                </del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item bestseller-label">Bestseller</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                    [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                    [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                    [White]</span></a>
                            <div class="wrap-price"><ins>
                                    <p class="product-price">$168.00</p>
                                </ins> <del>
                                    <p class="product-price">$250.00</p>
                                </del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                    [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item bestseller-label">Bestseller</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                    [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>