<!-- <div class="wrap-show-advance-info-box style-1 has-countdown"> -->
<div class="style-1 has-countdown" style="margin-bottom: 5%;text-align: center;">
    <h2 class="title-box">On Sale</h2>
    <div class="wrap-top-banner">
        <a href="#" class="link-banner banner-effect-2">
            <figure><img src="{{ asset('/frontend/images/3-furniture-and-home-decors-banner.jpg') }}" width="1170" height="240" alt=""></figure>
        </a>
    </div>
    <!-- set time -->
    <h3 id="time-cal" class="wrap-countdown" style="color:red;margin:20px" data-expire="2023/05/23 12:00:00"></h3>
    <!-- set time end-->
    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>
        <!-- product 01 loop-->
        @foreach($products_sale as $product)
        <div class="product product-style-2 equal-elem">
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
                <div class="wrap-price">
                    <span class="product-price">
                        ${{number_format($product->product_price - $product->discount,2)}}
                    </span>
                    @if($product->discount > 0)
                    <span style="color:red;text-decoration: line-through;">${{number_format($product->product_price,2)}}</span>
                    @endif
                </div>
            </div>
            <div style="margin:auto 0 0 0;">
                <a href="#" class="btn btn-warning add-to-cart " data-id="{{$product->product_id}}">Add To Cart</a>
            </div>
        </div>
        @endforeach
        <!-- product 01 end -->
    </div>
</div>