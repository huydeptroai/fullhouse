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
					<div class="slide-info slide-3">
						<h2 class="f-title">Office chair<b></b></h2>
						<span class="f-subtitle">With a whole collection of office chairs for all objects used in the office, including staff chairs, manager chairs, director chairs, meeting room chairs,... With more than 100 models of chairs being traded, the product lines of office chairs are diverse in different models, designs, and colors.</span><br>
						<!-- <p class="sale-info">Only price: <span class="price">$99.99</span></p> -->
						<a href="{{route('product.index')}}" class="btn-link">Shop Now</a>
					</div>
				</div>
				<div class="item-slide">
					<img src="{{ asset('/frontend/images/main-slider-1-3.jpg') }}" alt="main-slider-1-3" class="img-slide">
					<div class="slide-info slide-3">
						<h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
						<span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
						<p class="sale-info">Stating at: <b class="price">$225.00</b></p>
						<a href="{{route('product.index')}}" class="btn-link">Shop Now</a>
					</div>
				</div>
			</div>
		</div>

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