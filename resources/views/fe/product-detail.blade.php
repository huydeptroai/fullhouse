@extends('fe.layout.master')

@section('title', '{{$product->product_slug}}')
@section('content')
<main id="main" class="main-site">
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><a href="{{ route('product.index')}}" class="link">products</a></li>
                <li class="item-link"><span>{{ $product->product_name}}</span></li>
            </ul>
        </div>
        <div class="row">

            <!-- <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area"> -->
            <div class="col-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <ul class="slides">
                                @foreach($product->product_image as $pImage)
                                <li data-thumb="{{ asset('assets/img/upload/product/'.$pImage) }}">
                                    <img src="{{ asset('assets/img/upload/product/'.$pImage) }}" alt="product thumbnail" />
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="detail-info">
                        <h2 class="product-name">{{$product->product_name ?? ''}}</h2>
                        <div class="product-rating">
                            <strong>{{number_format($avgRating,2) }} </strong>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <a href="#review" class="count-review"> ({{count($reviews)}} review)</a>

                        </div>
                        <div class="short-desc">
                            <table class="shop_attributes">
                                <tbody>
                                    <tr>
                                        <th>Material</th>
                                        <td>{{$product->product_material}}</td>
                                    </tr>
                                    <tr>
                                        <th>Size:</th>
                                        <td>{{$product->product_size}}</td>
                                    </tr>
                                    <tr>
                                        <th>Color</th>
                                        <td>
                                            <p>{{$product->product_color}}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <!-- <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{ asset('/frontend/images/social-list.png') }}" alt=""></a>
                        </div> -->
                        <div class="wrap-price">
                            <span class="product-price">$ {{number_format($product->product_price - $product->discount,2)}}</span>
                            @if($product->discount > 0)
                            <span style="text-decoration: line-through;">${{ number_format($product->product_price,2)}}</span>
                            @endif
                        </div>
                        <div class="stock-info in-stock">
                            <p class="availability">Availability:
                                @if($product->product_quantity > 0)
                                <b>In Stock</b>
                                @else
                                <b>Out Stock</b>
                                @endif
                            </p>
                        </div>
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" id="product_qty" name="product-quatity qty_{{$product->product_id}}" value="1" data-max="120" pattern="[0-9]*">
                                <a class="btn btn-reduce" href="#"></a>
                                <a class="btn btn-increase" href="#"></a>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            <a href="#" class="btn add-to-cart" data-id="{{$product->product_id}}">Add to Cart</a>
                            <div class="wrap-btn">
                                <a href="#" class="btn btn-compare">Add Compare</a>
                                <a href="#" class="btn btn-wishlist">Add Wishlist</a>
                            </div>
                        </div>

                    </div>
                    <!-- advance-info -->
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">Description</a>
                            <a href="#add_information" class="tab-control-item">Information</a>
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>
                        <div class="tab-contents">

                            <div class="tab-content-item active" id="description">
                                <p>{{ $product->product_description}}</p>
                            </div>

                            <div class="tab-content-item " id="add_information">
                                <!-- service widget start-->
                                <div class="widget widget-our-services ">
                                    <div class="widget-content">
                                        <ul class="our-services">
                                            <li class="service">
                                                <a class="link-to-service" href="#">
                                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                                    <div class="right-content">
                                                        <b class="title">Free Shipping</b>
                                                        <span class="subtitle">On Oder Over $99</span>
                                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="service">
                                                <a class="link-to-service" href="#">
                                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                                    <div class="right-content">
                                                        <b class="title">Special Offer</b>
                                                        <span class="subtitle">Get a gift!</span>
                                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="service">
                                                <a class="link-to-service" href="#">
                                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                                    <div class="right-content">
                                                        <b class="title">Order Return</b>
                                                        <span class="subtitle">Return within 7 days</span>
                                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- service widget end-->
                            </div>
                            <!-- review start -->
                            <div class="tab-content-item " id="review">
                                <div class="wrap-review-form">

                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">
                                            {{ $count_reviews }} review(s) for <span>{{$product->product_name}}</span>
                                        </h2>

                                        <ol class="commentlist" id="list_comment">
                                            @foreach($reviews as $review)
                                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="review_id_{{ $review->id }}">
                                                <div id="comment-20" class="comment_container">
                                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('admin/dist/img/'.$review->user->profile['avatar']) ?? 'user1-128x128.jpg' }}" alt="User profile picture" height="80" width="80">

                                                    <div class="comment-text">
                                                        <!-- <div class="star-rating"> -->
                                                        <div class="">
                                                            <span class="width-80-percent">Rated <strong class="rating">{{$review->rating}}</strong> out of 5</span>
                                                        </div>
                                                        <p class="meta">
                                                            <strong class="woocommerce-review__author">{{$review->user->name}}</strong>
                                                            <span>–</span>
                                                            <time class="woocommerce-review__published-date">
                                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->updated_at)->diffForHumans()}}
                                                            </time>
                                                        </p>
                                                        <div class="description">
                                                            <p>{{$review->content}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ol>

                                    </div><!-- #comments -->

                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                @if(Auth::check())

                                                <hr>
                                                <p class="comment-notes">
                                                    <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                                </p>
                                                <form action="{{ route('review.store')}}" method="post" id="commentform" class="comment-form" novalidate="">
                                                    <input type="hidden" name="product_id" value="{{$product->product_id}}">

                                                    <div class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                                        <div id="comment-20" class="comment_container">
                                                            <div class="comment-text">
                                        
                                                                <div class="col-md-3">
                                                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('admin/dist/img/'.Auth::user()->profile['avatar']) ?? 'user1-128x128.jpg' }}" alt="User profile picture" height="80" width="80">
                                                                    <div class="comment-form-rating">
                                                                        <span>Your rating: </span>
                                                                        <p class="stars">
                                                                            <label for="rated-1"></label>
                                                                            <input type="radio" id="rated-1" name="rating" value="1">
                                                                            <label for="rated-2"></label>
                                                                            <input type="radio" id="rated-2" name="rating" value="2">
                                                                            <label for="rated-3"></label>
                                                                            <input type="radio" id="rated-3" name="rating" value="3">
                                                                            <label for="rated-4"></label>
                                                                            <input type="radio" id="rated-4" name="rating" value="4">
                                                                            <label for="rated-5"></label>
                                                                            <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                                                                        </p>
                                                                    </div>
                                                                    <p class="meta">
                                                                        <strong class="woocommerce-review__author">
                                                                            {{ Auth::user()->name}}
                                                                        </strong>
                                                                    </p>
                                                                </div>
                                                                <div class="description col-md-9">
                                                                    <textarea id="content" name="content" rows="8" placeholder="You can enter here..." style="border:1px solid gray;width:100%;padding: 5px;"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="submit" value="Send">
                                                    </p>
                                                </form>
                                                @else
                                                <a href="{{ route('login')}}">Please login before to comment!</a>
                                                @endif
                                            </div><!-- .comment-respond-->
                                        </div><!-- #review_form -->
                                    </div><!-- #review_form_wrapper -->

                                </div>
                            </div>
                            <!-- review end -->
                        </div>
                    </div>
                    <!-- advance-info end-->
                </div>
            </div>
            <!--end main products area-->

            <!-- related product-->

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
            <!-- related product end-->

        </div><!--end row-->

    </div><!--end container-->

</main>
@endsection

@section('myJS')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#commentform').submit(function(e) {
            e.preventDefault();

            let url_store = "{{ route('review.store') }}";

            $.ajax({
                data: $('#commentform').serialize(),
                url: url_store,
                type: "POST",
                dataType: "json",
                success: function(data) {
                    alert('success!');
                }
            });

        });
    });
</script>
@endsection