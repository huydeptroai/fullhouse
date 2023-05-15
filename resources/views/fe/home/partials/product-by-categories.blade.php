<!-- <div class="wrap-show-advance-info-box style-1"> -->
<div class="style-1" style="margin-bottom: 5%">
    <div class="wrap-products">
        <div class="wrap-product-tab tab-style-1 border-0" style="border:none;margin: 0 auto;">
            <div class="tab-control">
                <a href="#living" class="tab-control-item active">
                    <div class="link-banner banner-effect-1">
                        <figure><img src="{{ asset('/frontend/images/home_02_category_living.png') }}" alt="" width="200" height="200">
                            <p>Living</p>
                        </figure>
                    </div>
                </a>
                <a href="#dining" class="tab-control-item">
                    <div class="link-banner banner-effect-1">
                        <figure><img src="{{ asset('/frontend/images/home_03_category_dining.png') }}" alt="" width="200" height="200">
                            <p>Dining</p>
                        </figure>
                    </div>
                </a>
                <a href="#bedroom" class="tab-control-item">
                    <div class="link-banner banner-effect-1">
                        <figure><img src="{{ asset('/frontend/images/home_01_category_bedroom.png') }}" alt="" width="200" height="200">
                            <p>Bedroom</p>
                        </figure>
                    </div>
                </a>
                <a href="#office" class="tab-control-item">
                    <div class="link-banner banner-effect-1">
                        <figure><img src="{{ asset('/frontend/images/home_01_category_bedroom.png') }}" alt="" width="200" height="200">
                            <p>Office</p>
                        </figure>
                    </div>
                </a>
            </div>
            <div class="tab-contents">
                <!-- tab-content: 01 -->
                <div class="tab-content-item active" id="living">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>
                        @forelse($products_living as $product)
                        <div class="product product-style-2 equal-elem" style="display: flex;flex-direction: column;justify-content: space-between;align-items: stretch;">
                            <div class="product-thumnail">
                                <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" title="{{$product->product_name}}">
                                    <figure>
                                        <img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" width="800" height="800" alt="{{$product->product_image[0]}}">
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
                                    <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="function-link">quick view</a>
                                    <a href="#" class="function-link add-to-wishlist" data-id="{{$product->product_id}}">Wishlist</a>
                                </div>
                            </div>
                            <div class="product-info" style="margin-top: auto;">
                                <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name">
                                    <span>{{$product->product_name}}</span>
                                </a>
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
                        @empty
                        <p>No data</p>
                        @endforelse

                    </div>
                </div>
                <!-- tab-content: 01 -->
                <!-- tab-content: 02 -->
                <div class="tab-content-item" id="dining">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"1"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>

                        @forelse($products_dining as $product)
                        <div class="product product-style-2 equal-elem" style="display: flex;flex-direction: column;justify-content: space-between;align-items: stretch;">
                            <div class="product-thumnail">
                                <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" title="{{$product->product_name}}">
                                    <figure>
                                        <img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" width="800" height="800" alt="{{$product->product_image[0]}}">
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
                                    <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="function-link">quick view</a>
                                    <a href="#" class="function-link add-to-wishlist" data-id="{{$product->product_id}}">Wishlist</a>
                                </div>
                            </div>
                            <div class="product-info" style="margin-top: auto;">
                                <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name">
                                    <span>{{$product->product_name}}</span>
                                </a>
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
                        @empty
                        <p>No data</p>
                        @endforelse


                    </div>
                </div>
                <!-- tab-content: 02 end -->
                <!-- tab-content: 03 -->
                <div class="tab-content-item" id="bedroom">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"1"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>

                        @forelse($products_bedroom as $product)
                        <div class="product product-style-2 equal-elem" style="display: flex;flex-direction: column;justify-content: space-between;align-items: stretch;">
                            <div class="product-thumnail">
                                <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" title="{{$product->product_name}}">
                                    <figure>
                                        <img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" width="800" height="800" alt="{{$product->product_image[0]}}">
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
                            <div class="product-info" style="margin-top: auto;">
                                <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name">
                                    <span>{{$product->product_name}}</span>
                                </a>
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
                        @empty
                        <p>No data</p>
                        @endforelse

                    </div>
                </div>
                <!-- tab-content: 03 end -->
                <!-- tab-content: 04 -->
                <div class="tab-content-item" id="office">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"1"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>

                        @forelse($products_office as $product)
                        <div class="product product-style-2 equal-elem" style="display: flex;flex-direction: column;justify-content: space-between;align-items: stretch;">
                            <div class="product-thumnail">
                                <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" title="{{$product->product_name}}">
                                    <figure>
                                        <img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" width="800" height="800" alt="{{$product->product_image[0]}}">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    @if($product->discount > 0)
                                    <span class="flash-item sale-label">
                                        sale {{ $product->saleOff() }}%
                                    </span>
                                    @endif

                                    @if( $product->newProduct() )
                                    <span class="flash-item new-label">new</span>
                                    @endif

                                    @if($product->avgRating() > 3)
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                    @endif
                                </div>

                                <div class="wrap-btn">
                                    <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="function-link">quick view</a>
                                    <a href="#" class="function-link add-to-wishlist" data-id="{{$product->product_id}}">Wishlist</a>
                                </div>
                            </div>

                            <div class="product-info" style="margin-top: auto;">
                                <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name">
                                    <span>{{$product->product_name}}</span>
                                </a>
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
                        @empty
                        <p>No data</p>
                        @endforelse

                    </div>
                </div>
                <!-- tab-content: 04 end -->
            </div>
        </div>
    </div>
</div>