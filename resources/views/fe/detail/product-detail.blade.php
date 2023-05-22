@extends('fe.layout.master')

@section('title', $product->product_slug)

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
                        <h2 class="product-name">{{$product->product_name ?? ''}}  - {{$product->product_id}}</h2>
                        <div class="product-rating" style="font-size:16px;">
                            <strong>{{number_format( $product->reviews->avg('rating'),2) }} </strong>
                            @for($i=1; $i<=5; $i++) @php $avg=$product->reviews->avg('rating');
                                $color=($i <= round($avg)) ? "color: #ffcc00;" : "color: #ccc;" ; @endphp <i class="fa fa-star" aria-hidden="true" style="cursor:pointer;{{$color}}font-size:30px;"></i>
                                    @endfor
                                    <a href="#review" class="count-review"> ({{count($product->reviews)}} reviews)</a>

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
                        <div class="wrap-price">
                            <span class="product-price">$ {{number_format($product->product_price - $product->discount,2)}}</span>
                            @if($product->discount > 0)
                            <span style="text-decoration: line-through;">${{ number_format($product->product_price,2)}}</span>
                            @endif
                        </div>
                        <div class="stock-info in-stock">
                            <p class="availability">Availability:
                                @if($product->inventory() > 0)
                                <b style="color:green;">In Stock {{ $product->inventory()}} product(s)</b>
                                @else
                                <b style="color:red;">Out Stock</b>
                                @endif
                            </p>
                        </div>
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="number" id="product_quantity_{{$product->product_id}}" name="product-quatity" data-id="{{$product->product_id}}" value="1" data-max="120" pattern="[0-9]*">
                                <a class="btn btn-reduce" href="#"></a>
                                <a class="btn btn-increase" href="#"></a>
                                <span name="error"></span>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            <a href="#" class="btn add-to-cart" data-id="{{$product->product_id}}">Add to Cart</a>
                            <div class="wrap-btn">
                                <!-- <a href="#" class="btn btn-compare">Add Compare</a> -->
                                <!-- <a href="#" class="btn btn-wishlist">Add Wishlist</a> -->
                                <a href="#" class="btn btn-wishlist add-to-wishlist" data-id="{{$product->product_id}}">Add Wishlist</a>
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

                            @include('fe.detail.partials.add-information')

                            <!-- review start -->
                            @include('fe.detail.partials.reviews-product')

                            <!-- review end -->
                        </div>
                    </div>
                    <!-- advance-info end-->
                </div>
            </div>
            <!--end main products area-->

            <!-- related product-->
            @include('fe.detail.partials.related-product')

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
                    // $('#list_comment').append(data);
                    $('#commentform').reset();
                }
            });
            
            location.reload();
        });

        jQuery('body').on('click', '.delete_review', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var url = "{{ url('review-delete') }}" + "/" + id;
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id: id
                },
                function(data) {
                    $('#review_id_' + id).remove();
                }   
            });
            location.reload();
        });

       
    });
</script>
@endsection