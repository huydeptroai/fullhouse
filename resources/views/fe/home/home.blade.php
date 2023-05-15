@extends('fe.layout.master')

@section('title', 'Home')
@section('content')
<main id="main">
	<!--top banner start -->
	<div class="container-fluid">
		<!--MAIN SLIDE-->
		<div class="wrap-main-slide col-12">
			<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
				<div class="item-slide">
					<img src="{{ asset('/frontend/images/megamenu_furniture_home_decors_1.jpg') }}" alt="main-slider-1-1" class="img-slide">
					<div class="slide-info slide-1">
						<h2 class="f-title">Office chair<b></b></h2>
						<span class="subtitle">Compra todos tus productos Smart por internet.</span>
						<p class="sale-info">Only price: <span class="price">$59.99</span></p>
						<a href="#" class="btn-link">Shop Now</a>
					</div>
				</div>
				<div class="item-slide">
					<img src="{{ asset('/frontend/images/main-slider-1-3.jpg') }}" alt="main-slider-1-2" class="img-slide">
					<div class="slide-info slide-2">
						<h2 class="f-title">Extra 25% Off</h2>
						<span class="f-subtitle">On online payments</span>
						<p class="discount-code">Use Code: #FA6868</p>
						<h4 class="s-title">Get Free</h4>
						<p class="s-subtitle">TRansparent Bra Straps</p>
					</div>
				</div>
				<div class="item-slide">
					<img src="{{ asset('/frontend/images/main-slider-1-3.jpg') }}" alt="main-slider-1-3" class="img-slide">
					<div class="slide-info slide-3">
						<h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
						<span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
						<p class="sale-info">Stating at: <b class="price">$225.00</b></p>
						<a href="#" class="btn-link">Shop Now</a>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="wrap-banner style-twin-default col-12" style="width:80vw;margin:0 auto;">
			<div class="col-6 col-md-3">
				<a href="#" class="link-banner banner-effect-1">
					<figure><img src="{{ asset('/frontend/images/home_01_category_bedroom.png') }}" alt="" width="200" height="200">
						<p>Office</p>
					</figure>
				</a>
			</div>
			<div class="col-6 col-md-3">
				<a href="#living" class="link-banner banner-effect-1 tab-control-item active">
					<figure><img src="{{ asset('/frontend/images/home_02_category_living.png') }}" alt="" width="200" height="200">
						<p>Living</p>
					</figure>
				</a>
			</div>
			<div class="col-6 col-md-3">
				<a href="#" class="link-banner banner-effect-1">
					<figure><img src="{{ asset('/frontend/images/home_03_category_dining.png') }}" alt="" width="200" height="200">
						<p>Dining</p>
					</figure>
				</a>
			</div>
			<div class="col-6 col-md-3">
				<a href="#" class="link-banner banner-effect-1">
					<figure><img src="{{ asset('/frontend/images/home_01_category_bedroom.png') }}" alt="" width="200" height="200">
						<p>Bedroom</p>
					</figure>
				</a>
			</div>
		</div> -->
	</div>
	<!--top banner END -->

	<div class="container">

		@include('fe.home.partials.product-by-categories')
		<hr style="margin-bottom: 5em 0;">

		<!--On Sale-->
		@include('fe.home.partials.product-on-sale')

		<hr style="margin: 5em 0;">

		<!--Latest Products-->
		@include('fe.home.partials.latest-products')

	</div>

</main>
@endsection


@section('time')
<script>
	(function($) {
		"use strict";
		//    Set the date we're counting down to
		var expire = $('#time-cal').data('expire');
		if (expire == "") {
			clearInterval(x);
			return;
		}
		var countDownDate = new Date(expire).getTime();

		//    Update the count down every 1 second
		var x = setInterval(function() {

			// Get todays date and time
			var now = new Date().getTime();

			// Find the distance between now an the count down date
			var distance = countDownDate - now;

			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			// Output the result in an element with id="demo"
			document.getElementById("time-cal").innerHTML = "<span> " + days + " Days </span>" +
				"<span>" + hours + " Hrs </span>" +
				"<span>" + minutes + " Min </span>" +
				"<span>" + seconds + " Sec</span>";

			// If the count down is over, write some text
			if (distance < 0) {
				clearInterval(x);
				document.getElementById("time-cal").innerHTML = "EXPIRED";
			}
		}, 1000);
	})(jQuery);
</script>
@endsection