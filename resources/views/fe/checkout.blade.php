@extends('fe.layout.master')
@section('title', 'Checkout')
@section('content')
<main id="main" class="main-site checkout page">

	<div class="container">

		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
				<li class="item-link"><span>checkout</span></li>
			</ul>
		</div>
		<div class=" main-content-area">
			<form action="#" method="post">
				<div class="wrap-address-billing">
					<h3 class="box-title">Billing Address</h3>
					<div name="frm-billing">
						<p class="row-in-form">
							<label for="fname">Full name<span>*</span></label>
							<input id="fname" type="text" name="receiver_name" value="" placeholder="Your name">
						</p>
						<p class="row-in-form">
							<label for="phone">Phone number<span>*</span></label>
							<input id="phone" type="number" name="receiver_phone" value="" placeholder="10 digits format">
						</p>
						<p class="row-in-form">
							<label for="phone">City/Province <span>*</span></label>
							<select name="city" id="city">
								<option value="000">-- Select city/province --</option>
								@foreach($provinces as $item)
								<option value="{{$item->code}}">{{$item->full_name_en}}</option>
								@endforeach
							</select>
						</p>
						<p class="row-in-form">
							<label for="phone">District: <span>*</span></label>
							<select name="district" id="district">
								<option value="000">-- Select district --</option>
							</select>
						</p>
						<p class="row-in-form">
							<label for="add">Address:</label>
							<input id="shipping_address" type="text" name="shipping_address" value="" placeholder="Street at apartment number">
						</p>
						<p class="row-in-form">
							<label for="country">Note: </label>
							<textarea name="note" id="note" cols="30" rows="10" placeholder="Note for this order, if have"></textarea>
						</p>
						<p class="row-in-form fill-wife">
							<label class="checkbox-field">
								<input name="create-account" id="create-account" value="forever" type="checkbox">
								<span>Create an account?</span>
							</label>
							<label class="checkbox-field">
								<input name="different-add" id="different-add" value="forever" type="checkbox">
								<span>Ship to a different address?</span>
							</label>
						</p>
					</div>
				</div>

				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
						<p class="summary-info"><span class="title">Check / Money order</span></p>
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" id="payment-method-bank" value="bank" type="radio">
								<span>Direct Bank Transder</span>
								<span class="payment-desc">
									<table class="shop_attributes">
										<tbody>
											<tr>
												<th>Account Name:</th>
												<td>FULL HOUSE</td>
											</tr>
											<tr>
												<th>Account No:</th>
												<td>0123456789</td>
											</tr>
											<tr>
												<th>At Bank:</th>
												<td>BIDV - ABC</td>
											</tr>
										</tbody>
									</table>
								</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-visa" value="visa" type="radio">
								<span>visa</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
						</div>
						<p class="summary-info grand-total">
							<span>Grand Total</span> <span class="grand-total-price">$100.00</span>
						</p>

						<a href="#" type="submit" class="btn btn-medium">Place order now</a>

					</div>

					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed $50.00</span></p>

						<h4 class="title-box">Discount Codes</h4>
						<p class="row-in-form">
							<label for="coupon-code">Enter Your Coupon code:</label>
							<input class="col-8" id="coupon-code" type="text" name="coupon-code" value="" placeholder="Enter Your Coupon code" data-total="1000">
						</p>
						<p class="summary-info">
							<span class="title">Discount:</span>
							<b class="index value-coupon">0</b>
						</p>
						<a href="#" class="btn btn-small">Apply</a>
					</div>
				</div>
			</form>


			<!-- products most view -->
			<div class="wrap-show-advance-info-box style-1 box-in-site">
				<h3 class="title-box">Most Viewed Products</h3>
				<div class="wrap-products">
					<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"4"}}'>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="{{ asset('frontend/images/products/digital_04.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item new-label">new</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="{{ asset('frontend/images/products/digital_17.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item sale-label">sale</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><ins>
										<p class="product-price">$168.00</p>
									</ins> <del>
										<p class="product-price">$250.00</p>
									</del></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="{{ asset('frontend/images/products/digital_15.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><ins>
										<p class="product-price">$168.00</p>
									</ins> <del>
										<p class="product-price">$250.00</p>
									</del></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="{{ asset('frontend/images/products/digital_01.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item bestseller-label">Bestseller</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="{{ asset('frontend/images/products/digital_21.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="{{ asset('frontend/images/products/digital_03.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item sale-label">sale</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><ins>
										<p class="product-price">$168.00</p>
									</ins> <del>
										<p class="product-price">$250.00</p>
									</del></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="{{ asset('frontend/images/products/digital_04.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item new-label">new</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="{{ asset('frontend/images/products/digital_05.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item bestseller-label">Bestseller</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div>
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
<!-- cal coupon -->
<script>
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$('body').on('keyup', '#coupon-code', function() {
			setTimeout(post_coupon, 1000);
		});
		post_coupon();

		function post_coupon() {
			let coupon_code = $('#coupon-code').val() ?? '';
			let value_order = $('#coupon-code').data('total');

			if (coupon_code == "") {
				return;
			}
			console.log('code ' + coupon_code + ' value order: ' + value_order);
			$.ajax({
				type: 'post',
				url: "{{route('postCoupon')}}",
				data: {
					code: coupon_code,
					value_order: value_order
				},
				success: function(data) {
					$('.value-coupon').html("$" + parseFloat(data).toFixed(2));
					let total = (value_order - data).toFixed(2);
					$('.result').html("$" + total);

				}
			});
		}
	});
</script>
<!-- select city/district -->
<script type='text/javascript'>
	jQuery(document).ready(function() {
		// $('#district').html("<option value='0'>-- Select district --</option>");

		$('#city').change(function() {
			var code = $(this).val();
			// Empty the dropdown
			// $('#district').find('option').not(':first').remove();
			// var option = '';

			// AJAX request 
			$.ajax({
				url: 'district/' + code,
				type: 'get',
				dataType: 'json',
				success: function(response) {
					console.log(response);
					console.log(response.length);
					$.each(response, function(k, v) {
						// option += `<option value="${v.code}">${v.full_name_en}</option>`;
						var option = `<option value="${v.code}">${v.full_name_en}</option>`;
						$("#district").append(option);
						console.log(option);
					});
					// console.log(option);
					// $("#district").html(option);
				}
			});
		});
	});
</script>
@endsection