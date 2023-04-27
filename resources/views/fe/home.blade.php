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
					<img src="{{ asset('/frontend/images/main-slider-1-3.jpg') }}" alt="main-slider-1-1" class="img-slide">
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

		<div class="wrap-banner style-twin-default col-12" style="width:80vw;margin:0 auto;">
			<div class="col-6 col-md-3">
				<a href="#" class="link-banner banner-effect-1">
					<figure><img src="{{ asset('/frontend/images/home_01_category_bedroom.png') }}" alt="" width="200" height="200">
						<p>Office</p>
					</figure>
				</a>
			</div>
			<div class="col-6 col-md-3">
				<a href="#" class="link-banner banner-effect-1">
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
		</div>


		<!--BANNER-->
		<!-- <div class="col-12">
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{ asset('/frontend/images/home-1-banner-1.jpg') }}" alt="" width="580" height="190">
						</figure>
					</a>
				</div>
			</div>
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="{{ asset('/frontend/images/home-1-banner-2.jpg') }}" alt="" width="580" height="190">
						</figure>
					</a>
				</div>
			</div>
		</div> -->

	</div>
	<!--top banner END -->

	<div class="container">

		<hr style="margin-bottom: 5em 0;">

		<!--On Sale-->
		<!-- <div class="wrap-show-advance-info-box style-1 has-countdown"> -->
		<div class="style-1 has-countdown" style="margin-bottom: 5%;text-align: center;">
			<h2 class="title-box">On Sale</h2>
			<!-- set time -->
			<h3 id="time-cal" class="wrap-countdown" style="color:red;margin:20px" data-expire="2023/05/09 12:00:00"></h3>
			<!-- set time end-->
			<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>
				<!-- product 01 loop-->
				@foreach($product_sale as $product)
				<div class="product product-style-2 equal-elem">
					<div class="product-thumnail">
						<a href="{{route('product.show', $product->product_id)}}" title="{{$product->product_name}}">
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
							<a href="{{route('product.show', $product->product_id)}}" class="function-link">quick view</a>
							<a href="#" class="function-link add-to-wishlist" data-id="{{$product->product_id}}">Wishlist</a>
						</div>
					</div>
					<div class="product-info" style="margin-top: auto;">
						<a href="{{route('product.show', $product->product_id)}}" class="product-name">
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

		<hr style="margin: 5em 0;">

		<!--Latest Products-->
		<!-- <div class="wrap-show-advance-info-box style-1"> -->
		<div class="style-1" style="margin-bottom: 5%">
			<h2 class="title-box">Latest Products</h2>
			<div class="wrap-top-banner">
				<a href="#" class="link-banner banner-effect-2">
					<figure><img src="{{ asset('/frontend/images/shop_banner_01_BANNER-SOFA.jpg') }}" width="1170" height="240" alt=""></figure>
				</a>
			</div>
			<div class="wrap-products">
				<!-- <div class="wrap-product-tab tab-style-1"> -->
				<div class="tab-contents">
					<div class="tab-content-item active" id="digital_1a">
						<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>
							@foreach($product_latest as $product)
							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="{{route('product.show', $product->product_id)}}" title="{{$product->product_name}}">
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
										<a href="{{route('product.show', $product->product_id)}}" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="{{route('product.show', $product->product_id)}}" class="product-name"><span>{{$product->product_name}}</span></a>
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

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
											[White]</span></a>
									<div class="wrap-price"><ins>
											<p class="product-price">$168.00</p>
										</ins> <del>
											<p class="product-price">$250.00</p>
										</del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
											[White]</span></a>
									<div class="wrap-price"><ins>
											<p class="product-price">$168.00</p>
										</ins> <del>
											<p class="product-price">$250.00</p>
										</del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
											[White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
											[White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
											[White]</span></a>
									<div class="wrap-price"><ins>
											<p class="product-price">$168.00</p>
										</ins> <del>
											<p class="product-price">$250.00</p>
										</del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
											[White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
											[White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- </div> -->
			</div>
		</div>

		<hr style="margin: 5em 0;">
		<!--Product Categories-->
		<!-- <div class="wrap-show-advance-info-box style-1"> -->
		<div class="style-1" style="margin-bottom: 5%">
			<h2 class="title-box">Product Categories</h2>

			<div class="wrap-top-banner">
				<a href="#" class="link-banner banner-effect-2">
					<figure><img src="{{ asset('/frontend/images/shop_banner_01_BANNER-SOFA.jpg') }}" width="1170" height="240" alt=""></figure>
				</a>
			</div>


			<div class="wrap-products">
				<div class="wrap-product-tab tab-style-1 border-0" style="border:none;margin: 0 auto;">
					<div class="tab-control">
						<a href="#living" class="tab-control-item active">Living</a>
						<a href="#dining" class="tab-control-item">Dining</a>
						<a href="#bedroom" class="tab-control-item">Bedroom</a>
						<a href="#office" class="tab-control-item">Office</a>
					</div>
					<div class="tab-contents">
						<!-- tab-content: 01 -->
						<div class="tab-content-item active" id="living">
							<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Lois Caron LCS-4027 Analog Watch - For Men</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Business Men Leather Laptop Tote Bags Man Crossbody
											</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Alberto Torresi Borgo Yellow Shoes - Alberto
												Torresi</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
										<a href="#" class="product-name"><span>Alberto Torresi Borgo Yellow Shoes - Alberto
												Torresi</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

							</div>
						</div>
						<!-- tab-content: 01 -->
						<!-- tab-content: 02 -->
						<div class="tab-content-item" id="dining">
							<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"1"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quic view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/office_02_ban-cum4-go-plywood-van-soi-chan-con-hbco027-03.jpeg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

							</div>
						</div>
						<!-- tab-content: 02 end -->
						<!-- tab-content: 03 -->
						<div class="tab-content-item" id="bedroom">
							<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"1"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_02.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_03.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_04.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_05.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_06.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_07.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_08.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quic view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_09.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quic view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

							</div>
						</div>
						<!-- tab-content: 03 end -->
						<!-- tab-content: 04 -->
						<div class="tab-content-item" id="office">
							<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"1"},"768":{"items":"2"},"992":{"items":"3"},"1200":{"items":"4"}}'>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_05.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="product-rating">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_04.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quic view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="product-rating">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_03.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quic view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="product-rating">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_02.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quic view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="product-rating">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_01.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="wrap-btn">
											<a href="#" class="function-link">quic view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="product-rating">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_06.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quic view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="product-rating">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_08.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quic view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="product-rating">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{ asset('/frontend/images/products/fashion_09.jpg') }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quic view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
												[White]</span></a>
										<div class="product-rating">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="wrap-price"><ins>
												<p class="product-price">$168.00</p>
											</ins> <del>
												<p class="product-price">$250.00</p>
											</del></div>
									</div>
								</div>

							</div>
						</div>
						<!-- tab-content: 04 end -->
					</div>
				</div>
			</div>
		</div>

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