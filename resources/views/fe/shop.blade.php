@extends('fe.layout.master')

@section('title', 'products')

@section('content')
<main id="main" class="main-site left-sidebar home-page home-01 ">

	<div class="container">

		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
				<li class="item-link"><span>furniture products</span></li>
			</ul>
		</div>

		<div class="row">

			<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

				<div class="banner-shop">
					<a href="#" class="banner-link">
						<figure><img src="{{ asset('/frontend/images/shop_banner_01_BANNER-SOFA.jpg') }}" alt=""></figure>
					</a>
				</div>

				<div class="wrap-shop-control">
					<h1 class="shop-title">Products</h1>
					<div class="wrap-right">
						<div class="sort-item orderby ">
							<select name="orderby" class="use-chosen">
								<option value="menu_order" selected="selected">Default sorting</option>
								<option value="popularity">Sort by popularity</option>
								<option value="rating">Sort by average rating</option>
								<option value="date">Sort by newness</option>
								<option value="price">Sort by price: low to high</option>
								<option value="price-desc">Sort by price: high to low</option>
							</select>
						</div>

						<div class="sort-item product-per-page">
							<select name="post-per-page" class="use-chosen">
								<option value="12" selected="selected">12 per page</option>
								<option value="16">16 per page</option>
								<option value="18">18 per page</option>
								<option value="21">21 per page</option>
								<option value="24">24 per page</option>
								<option value="30">30 per page</option>
								<option value="32">32 per page</option>
							</select>
						</div>

						<div class="change-display-mode">
							<a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
							<a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
						</div>

					</div>

				</div>
				<!--end wrap shop control-->

				<div class="row">
					<!-- product list start -->
					<ul class="product-list grid-products equal-container">
						@foreach($products as $product)
						<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
							<div class="product product-style-3 equal-elem ">
								<div class="product-thumnail">
									<a href="{{ route('product.show', $product->product_id)}}" title="{{$product->product_name}}">
										<figure><img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}"
												alt="{{$product->product_name}}"></figure>
									</a>
									<div class="group-flash">
										@if($product->discount > 0)
										<span class="flash-item sale-label">
											sale {{number_format($product->discount/$product->product_price*100,0)}}%
										</span>
										@endif
										<!-- <span class="flash-item new-label">new</span> -->
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>

								</div>

								<div class="product-info">
									<a href="{{ route('product.detail', $product->product_slug)}}"
										class="product-name"><span>{{$product->product_name.' - '.$product->product_id}}</span></a>
								</div>
								<div class="wrap-price">
									<span class="product-price">
										${{number_format($product->product_price - $product->discount,2)}}
									</span>
									@if($product->discount > 0)
									<span style="text-decoration: line-through;">${{number_format($product->product_price,2)}}</span>
									@endif
								</div>
								<a href="#" class="btn add-to-cart" data-id="{{$product->product_id}}">Add To Cart</a>
							</div>
						</li>
						@endforeach

					</ul>
					<!-- product list start -->

				</div>

				<div class="wrap-pagination-info">
					<ul class="page-numbers">
						<li class="page-number-item "></li>
					</ul>
				</div>

			</div>
			<!--end main products area-->


			<!-- site bar start -->
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
				<div class="widget mercado-widget categories-widget">
					<h2 class="widget-title">All Categories</h2>
					<div class="widget-content">
						<ul class="list-category">
							<li class="category-item has-child-cate">
								<a href="{{ route('searchByCategoryName',['category_name'=>'Office furniture']) }}"
									class="cate-link">Office Furniture</a>
								<span class="toggle-control">+</span>
								<ul class="sub-cate">
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Desk Office']) }}">Desk
											Office</a></li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Chair Office']) }}">Chair
											Office</a></li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Cabinet-shelves Office']) }}">Cabinet-shelves
											Office</a></li>
								</ul>
							</li>
							<li class="category-item has-child-cate">
								<a href="{{ route('searchByCategoryName',['category_name'=>'Living furniture']) }}"
									class="cate-link">Living Furniture</a>
								<span class="toggle-control">+</span>
								<ul class="sub-cate">
									<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Sofa']) }}">Sofa
									</li>
									<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Sofa table']) }}">Sofa
											table
									</li>
									<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'TV Shelf']) }}">TV
											Shelf
									</li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Bookshelf-Decorative shelf']) }}">Bookshelf-Decorative
											shelf</li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Decorative cabinets']) }}">Decorative
											cabinets</li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Combo living room']) }}">Combo
											living room</li>
								</ul>
							</li>
							<li class="category-item has-child-cate">
								<a href="{{ route('searchByCategoryName',['category_name'=>'Kitchen-Dining furniture']) }}"
									class="cate-link">Kitchen - Dining Furniture</a>
								<span class="toggle-control">+</span>
								<ul class="sub-cate">
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Dining table']) }}">Dining
											table</li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Dining chair']) }}">Dining
											chair</li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Dining table and chair set']) }}">Dining
											table and chair set</li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Kitchen cabinets']) }}">Kitchen
											cabinets</li>
								</ul>
							</li>
							<li class="category-item has-child-cate">
								<a href="{{ route('searchByCategoryName',['category_name'=>'Bedroom furniture']) }}"
									class="cate-link">Bedroom Furniture</a>
								<span class="toggle-control">+</span>
								<ul class="sub-cate">
									<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Bed']) }}">Bed
									</li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Wardrobe-clothes shelves']) }}">Wardrobe
											- clothes shelves</li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Makeup table']) }}">Makeup
											table</li>
									<li class="level-2"><a
											href="{{ route('searchByCategoryName',['category_name'=>'Combo bedroom']) }}">Combo
											bedroom</li>
								</ul>
							</li>

							<li class="category-item">
								<a href="#" class="cate-link">Tools & Equipments</a>
							</li>

						</ul>
					</div>
				</div><!-- Categories widget-->

				<!-- brand Start -->
				<!-- <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Brand</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                            <li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
                            <li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
                            <li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a></li>
                            <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                            <li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div> -->
				<!-- brand widget-->

				<!-- Price-->
				<div class="widget mercado-widget filter-widget price-filter">
					<h2 class="widget-title">Price</h2>
					<div class="widget-content">
						<div id="slider-range"></div>
						<p>
							<label for="amount">Price:</label>
							<input type="text" id="amount" name="searchPrice" readonly>
						<form action="{{route('searchPrice')}}" method="post" id="priceForm">
							@csrf
							<input type="hidden" name="min" id="price_min" value="" readonly>
							<input type="hidden" name="max" id="price_max" value="" readonly>
							<button type="submit" class="filter-submit btn">Filter</button>
						</form>
						</p>
					</div>
				</div>
				<!-- Price end-->

				<div class="widget mercado-widget widget-product">
					<h2 class="widget-title">Popular Products</h2>
					<div class="widget-content">
						<ul class="products">
							<li class="product-item">
								<div class="product product-widget-style">
									<div class="thumbnnail">
										<a href="detail.html" title="Mesh back office chair with footrest GAK-JO813">
											<figure><img src="{{ asset('/frontend/images/products/office_01_ghe-van-phong-GAK-JO813l.jpg') }}"
													alt=""></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
												Speaker...</span></a>
										<div class="wrap-price"><span class="product-price">$168.00</span></div>
									</div>
								</div>
							</li>

							<li class="product-item">
								<div class="product product-widget-style">
									<div class="thumbnnail">
										<a href="detail.html" title="Mesh back office chair with footrest GAK-JO813">
											<figure><img src="{{ asset('/frontend/images/products/office_01_ghe-van-phong-GAK-JO813l.jpg') }}"
													alt=""></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
												Speaker...</span></a>
										<div class="wrap-price"><span class="product-price">$168.00</span></div>
									</div>
								</div>
							</li>

							<li class="product-item">
								<div class="product product-widget-style">
									<div class="thumbnnail">
										<a href="detail.html" title="Mesh back office chair with footrest GAK-JO813">
											<figure><img src="{{ asset('/frontend/images/products/office_01_ghe-van-phong-GAK-JO813l.jpg') }}"
													alt=""></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
												Speaker...</span></a>
										<div class="wrap-price"><span class="product-price">$168.00</span></div>
									</div>
								</div>
							</li>

							<li class="product-item">
								<div class="product product-widget-style">
									<div class="thumbnnail">
										<a href="detail.html" title="Mesh back office chair with footrest GAK-JO813">
											<figure><img src="{{ asset('/frontend/images/products/office_01_ghe-van-phong-GAK-JO813l.jpg') }}"
													alt=""></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Mesh back office chair with footrest GAK-JO813</span></a>
										<div class="wrap-price"><span class="product-price">$168.00</span></div>
									</div>
								</div>
							</li>

						</ul>
					</div>
				</div><!-- brand widget-->

			</div>
			<!--end sitebar-->

		</div>
		<!--end row-->

	</div>
	<!--end container-->

</main>
@endsection