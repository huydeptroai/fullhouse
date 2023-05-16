<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="wrap-show-advance-info-box style-1 box-in-site">
        <h3 class="title-box">Related Products</h3>
        <div class="wrap-products">
            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>
                @foreach($prods_related as $product)
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

                            @if( $product->isNewProduct() )
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
                    <div class="product-info">
                        <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name">
                            <span>{{$product->product_name}} - {{$product->product_id}}</span>
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
                @endforeach

            </div>
        </div><!--End wrap-products-->
    </div>
</div>