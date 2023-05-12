@extends('fe.layout.master')
@section('title', 'Cart')
@section('content')
<main id="main" class="main-site shopping-cart page">
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>cart</span></li>
            </ul>
        </div>

        <div class="main-content-area">
            <!--1 cart start -->
            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart" id="cart-page">
                    <!-- cart 1 start -->
                    @php
                    $total = 0
                    @endphp
                    @forelse($carts as $cart)
                    <li class="pr-cart-item" id="cart_id_{{$cart->id}}">
                        <!-- image start -->
                        <div class="product-image">
                            <figure><img src="{{  asset('assets/img/upload/product/'.$cart->product->product_image['0']) }}" alt=""></figure>
                        </div>
                        <!-- image end-->
                        <!-- name start-->
                        <div class="product-name">
                            <a class="link-to-product" href="{{ route('productDetail',['product_slug' => $cart->product->product_slug]) }}">
                                <p>{{$cart->product_name}}</p>
                                <small>{{$cart->product_id}}</small>
                            </a>
                        </div>
                        <!-- name end-->
                        <!-- price -->
                        <div class="price-field product-price">
                            <p class="price">${{$cart->product_price}}</p>
                            <p class="price" style="text-decoration: line-through;color:red">${{$cart->discount}}</p>
                        </div>
                        <!-- price end -->
                        <!-- quantity start -->
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="{{$cart->quantity}}" data-id="{{$cart->product_id}}" data-max="120" pattern="[0-9]*">
                                <a class="btn btn-increase" href="#"></a>
                                <a class="btn btn-reduce" href="#"></a>
                            </div>
                        </div>
                        <!-- quantity end -->
                        <!-- amount start-->
                        <div class="price-field sub-total">
                            <p class="price">${{$cart->amount}}</p>
                        </div>
                        <!-- amount end-->
                        <!-- action delete -->
                        <div class="delete delete-cart" data-cid="{{$cart->id}}">
                            <a href="#" class="btn btn-delete" title="">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                        <!-- action delete end -->
                    </li>
                    <?php $total += $cart->amount ?>
                    @empty
                    <li class="pr-cart-item">
                        <p>No thing</p>
                        <p><a href="{{Route('product.index')}}">Go back to the shop</a></p>
                    </li>
                    @endforelse
                    <!-- cart 1 end -->

                </ul>
            </div>
            <!-- cart end -->
            <!--2 summary start -->
            <div class="summary">
                <div class="order-summary">
                    <!-- <h4 class="title-box">Order Summary</h4> -->
                    <h4 class="summary-info" style="font-size: 1.5em;">
                        <span class="title">Subtotal: </span>
                        <span class="index total-cart">${{ $total }}</span>
                    </h4>

                    <!-- <div class="summary-item">
                        <p class="row-in-form">
                            <label class="col-4" for="coupon-code">Discount code:</label>
                            <input class="col-8" id="coupon-code" type="text" name="coupon-code" value="" placeholder="Enter Your Coupon code" data-total="{{$total}}">
                        </p>
                        <a href="#" class="title">
                            Check coupon code
                        </a>
                    </div>

                    <p class="summary-info">
                        <span class="title">Discount:</span>
                        <b class="index value-coupon">0</b>
                    </p>
                    <p class="summary-info total-info ">
                        <span class="title">Total</span>
                        <b class="index result">${{ $total }}</b>
                    </p> -->
                </div>

                <div class="checkout-info">
                    <a class="btn btn-checkout" href="{{route('checkout')}}">Check out</a>
                    <a class="link-to-shop" href="{{route('product.index')}}">
                        Continue Shopping
                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    </a>
                </div>
                <!-- <div class="update-clear">
                    <a class="btn btn-clear" href="#">Clear Shopping Cart</a>
                    <a class="btn btn-update" href="#">Update Shopping Cart</a>
                </div> -->
            </div>
            <!-- summary end -->


        </div><!--end main content area-->

        <!--3 most viewed products  -->
        <!-- <div class="wrap-show-advance-info-box style-1 box-in-site"> -->
        <div class="style-1" style="margin-top: 5%;">
            <h3 class="title-box">Most Viewed Products</h3>
            <div class="wrap-products">
                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>
                    <!-- product 1 -->
                    @foreach($products as $product)
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
                                <a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="function-link">quick view</a>
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
                    </div>

                    @endforeach
                    <!-- product 1 -->

                    <!-- product end -->
                </div>
            </div><!--End wrap-products-->
        </div>

    </div><!--end container-->

</main>
@endsection