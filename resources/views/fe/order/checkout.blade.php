@extends('fe.layout.master')

@section('title', 'Checkout')

@section('myCss')
@endsection

@section('content')
<main id="main" class="main-site checkout page">

	<div class="container">
		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
				<li class="item-link"><a href="{{route('cart')}}" class="link">Cart</a></li>
				<li class="item-link"><span>checkout</span></li>
			</ul>
		</div>
		<div class=" main-content-area">

			@if (session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
			@endif

			<form action="{{ route('createOrder') }}" method="post" name="frm-billing">
				@csrf
				<div class="wrap-address-billing col-12 col-md-8 px-3">
					<h3 class="box-title">Information Order</h3>
					<div class="">
						<div class="col-12 col-md-6 form-group">
							<label for="receiver_name">Full name<span>*</span></label>
							<input class="form-control" name="receiver_name" value="{{old('receiver_name', $user->name)}}" required placeholder="Your receiver's name">
							<small class="text-danger">{{$errors->first('receiver_name')}}</small>
						</div>
						<div class="col-12 col-md-6 form-group">
							<label for="">Phone number<span>*</span></label>
							<input class="form-control" id="phone" name="receiver_phone" value="{{old('receiver_phone', $user->phone)}}" required placeholder=" receiver_phone - 10 digits format">
							<small class="text-danger">{{$errors->first('receiver_phone')}}</small>
						</div>

						<div class="col-12 form-group" style="padding: 0 12px;">
							<label for="country">Note: </label>
							<textarea class="form-control" name="note" id="note" cols="27" rows="5" placeholder="Note for this order, if have">{{old('note')}}</textarea>
						</div>
						<!-- <p class="row-in-form fill-wife">
							<label class="checkbox-field">
								<input name="create-account" id="create-account" value="forever" type="checkbox">
								<span>Create an account?</span>
							</label>
							<label class="checkbox-field">
								<input name="different-add" id="different-add" value="forever" type="checkbox">
								<span>Ship to a different address?</span>
							</label>
						</p> -->

						<!-- shipping -->
						<div class="summary-item shipping-method">
							<h4 class="title-box f-title">Shipping method</h4>
							<div class="choose-payment-methods" style="padding: 0 12px;">
								<!-- at store -->
								<label class="payment-method">
									<input name="method_shipping" id="method_shipping_no" value="0" type="radio" checked>
									<span>No Shipping</span>
									<span class="payment-desc">Please you call before.
										<p>Address at: No 391A, Nam Ky Khoi Nghia Street, District 3, HCM City</p>
									</span>
								</label>

								<!-- shipping to address -->
								<label class="payment-method">
									<input name="method_shipping" id="method_shipping" value="1" type="radio">
									<span>Shipping to: </span>
									<span class="payment-desc">
									</span>
								</label>

								<table class="shop_attributes">
									<tbody>
										<tr>
											<td class="col-4 form-group">
												<select id="shipping_city" name="shipping_city" class="use-chosen" value="{{ old('shipping_city')}}">
													<option value="" selected="selected">Select city/province</option>
													@foreach($provinces as $item)
													<option value="{{$item->code}}">{{$item->full_name_en}}</option>
													@endforeach
												</select>
											</td>
											<td class="col-4 form-group">
												<select class="use-chosen form-control" name="shipping_district" id="shipping_district" value="{{old('shipping_district')}}">
													<option value="">-- Select district --</option>
												</select>
												<small class="text-danger">{{$errors->first('shipping_district')}}</small>
											</td>
											<td class="col-4 form-group">
												<input class="col-12" id="shipping_address" type="text" name="shipping_address" value="{{ old('shipping_address')}}" placeholder="Enter No.house, street..">
												<small class="text-danger">{{ $errors->first('shipping_address') }}</small>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>

				<div class="col-12 col-md-4">
					<div class="summary summary-checkout">
						<div class="col-12">
							<h4 class="title-box f-title">Total cart: <span class="total-cart" style="text-align: right;">$ 0.00</span> </h4>
							<input type="hidden" class="total-cart" id="value_order" name="value_order" value="">
						</div>
						<hr>

						<div class="col-12">
							<h5 class="">Shipping fee:
								<span class="shipping_fee">$ 0.00</span>
								<input type="hidden" id="shipping_fee" name="shipping_fee" value="">
								<a href="#" id="calculator_fee">
									<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
									Calculator fee
								</a>
							</h5>
						</div>
						<hr>
						<div class="col-12">
							<label class="">Coupon code:</label>
							<input class="form-control col-5" id="coupon-code" type="text" name="coupon_code" value="{{ old('coupon_code')}}" placeholder="Enter Your Coupon code">

							<div class="row" style="margin:0 20px;">
								<span class="title"> => Discount:</span>
								<b class="value-coupon" style="font-size: 16px;">$ 0.00</b>
							</div>
						</div>

						<hr>
						<div class="col-12">
							<h4 class="summary-info grand-total">
								<span>Grand Total: </span>
								<span class="grand-total-price total-cart" style="font-size: 2em;text-align:right;"> $ 0.00</span>
							</h4>
							<button type="submit" class="btn btn-warning btn-block">Place order now</button>
						</div>
					</div>
				</div>
			</form>


			<div style="clear: left;"></div>
			<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;"></p>
			<!-- products most view -->
			<!-- <div class="wrap-show-advance-info-box style-1 box-in-site"> -->
			<div class="style-1" style="margin-top: 5%;">
				<h3 class="title-box">Most Viewed Products</h3>
				<div class="wrap-products">
					<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"4"}}'>

						@foreach($products as $product)
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
			<!-- products most view end-->

		</div><!--end main content area-->
		<!--end main content area-->
	</div>
	<!--end container-->

</main>
@endsection

@section('myJS')
<script>
	// <!-- cal coupon -->
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('body').on('change', '#coupon-code', function() {
			post_coupon();
		});
		post_coupon();

		function post_coupon() {
			let coupon_code = $('#coupon-code').val().toUpperCase() ?? '';
			let value_order = $('input[name="value_order"]').val() ?? 0;
			if (coupon_code == "") {
				return;
			}
			$.ajax({
				type: 'post',
				url: "{{route('postCoupon')}}",
				data: {
					code: coupon_code,
					value_order: value_order
				},
				success: function(data) {
					let discount = 0;
					$.each(data, function(k, v) {
						if (k === coupon_code) {
							discount = v.value;
							return;
						}
					});
					// console.log(discount);
					$('.value-coupon').html("$" + parseFloat(discount).toFixed(2));
					let total = (value_order - discount).toFixed(2);
					$('.result').html("$" + total);
				}
			});
		}

	});

	// <!-- select city/district -->
	jQuery(document).ready(function() {

		$('#shipping_city').change(function() {
			var code = $(this).val();
			// Empty the dropdown
			$('#shipping_district').find('option').not(':first').remove();

			// AJAX request
			$.ajax({
				url: 'district/' + code,
				type: 'get',
				dataType: 'json',
				success: function(response) {
					$.each(response, function(k, v) {
						var option = `<option value="${v.code}">${v.full_name_en}</option>`;
						$("#shipping_district").append(option);
						$("#shipping_district").trigger("chosen:updated");
						// console.log(option);
					});
				}
			});
		});

		//shipping fee
		$('#calculator_fee').click(function(e) {
			e.preventDefault();
			showShippingFee();
			// var method_shipping = $('#method_shipping').is(":checked") ? $('#method_shipping').val() : 0;
			// var method_shipping = $('#method_shipping:checked').val() ?? 0;
			// if (method_shipping == 1) {
			// 	let data = {
			// 		'shipping_city': $('#shipping_city').val() ?? 0,
			// 		'shipping_district': $('#shipping_district').val() ?? 0,
			// 		'value_order': $('#value_order').val() ?? 0
			// 	}
			// 	// console.log(data);
			// 	$.ajax({
			// 		url: "{{ route('postShippingFee') }}",
			// 		type: 'POST',
			// 		data: data,
			// 		success: function(data) {
			// 			console.log(data);
			// 			$('.shipping_fee').html("$ " + data.toFixed(2));
			// 			$('#shipping_fee').val(data.toFixed(2));
			// 		}
			// 	});
			// }
		});

		showShippingFee();

		function showShippingFee(){
			var method_shipping = $('#method_shipping:checked').val() ?? 0;
			if (method_shipping == 1) {
				let data = {
					'shipping_city': $('#shipping_city').val() ?? 0,
					'shipping_district': $('#shipping_district').val() ?? 0,
					'value_order': $('#value_order').val() ?? 0
				}
				// console.log(data);
				$.ajax({
					url: "{{ route('postShippingFee') }}",
					type: 'POST',
					data: data,
					success: function(data) {
						console.log(data);
						$('.shipping_fee').html("$ " + data.toFixed(2));
						$('#shipping_fee').val(data);
					}
				});
			}
		}


	});
</script>
@endsection