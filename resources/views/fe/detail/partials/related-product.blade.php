<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="wrap-show-advance-info-box style-1 box-in-site">
        <h3 class="title-box">Related Products</h3>
        <div class="wrap-products">
            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>
                @foreach($prods_related as $product)
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{route('product.show', $product->product_id)}}" title="{{$product->product_name}}">
                            <figure>
                                <img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" alt="{{$product->product_image['0']}}" width="214" height="214">
                            </figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item new-label">new</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="{{route('product.show', $product->product_id)}}" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="{{route('product.show', $product->product_id)}}" class="product-name">
                            <span>{{$product->product_name}}</span>
                        </a>
                        <div class="wrap-price">
                            <span class="product-price">${{ number_format($product->product_price - $product->discount,2)}}</span>
                            @if($product->discount > 0)
                            <span style="text-decoration: line-through;">${{ number_format($product->product_price,2)}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div><!--End wrap-products-->
    </div>
</div>