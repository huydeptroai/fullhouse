<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
	<div class="widget mercado-widget categories-widget">
		<h2 class="widget-title">All Categories</h2>
		<div class="widget-content">
		<ul class="list-category">
				<li class="category-item has-child-cate">
					<a href="#" data-cid="OF" class="cate-link find">Office Furniture</a>
					<span class="toggle-control">+</span>
					<ul class="sub-cate">
						<li class="level-2">
							<a href="#" data-cid="OF01" class="find">Desk Office</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="OF02" class="find">Chair
								Office</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="OF03" class="find">Cabinet-shelves Office</a>
						</li>
					</ul>
				</li>
				<li class="category-item has-child-cate">
					<a href="#" data-cid="LF" class="cate-link find">LivingFurniture</a>
					<span class="toggle-control">+</span>
					<ul class="sub-cate">
						<li class="level-2">
							<a href="#" data-cid="LF01" class="find">Sofa</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="LF02" class="find">Sofa table
						</li>
						<li class="level-2">
							<a href="#" data-cid="LF03" class="find">TV Shelf</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="LF04" class="find">Bookshelf-Decorative shelf</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="LF05" class="find">Decorative
								cabinets</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="LF06" class="find">Combo living room
							</a>
						</li>
					</ul>
				</li>
				<li class="category-item has-child-cate">
					<a href="#" data-cid="KF" class="cate-link find">Kitchen - Dining Furniture</a>
					<span class="toggle-control">+</span>
					<ul class="sub-cate">
						<li class="level-2">
							<a href="#" data-cid="KF01" class="find">Dining table</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="KF02" class="find">Dining chair</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="KF03" class="find">Dining table and chair set
							</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="KF04" class="find">Kitchen cabinets
							</a>
						</li>
					</ul>
				</li>
				<li class="category-item has-child-cate">
					<a href="#" data-cid="BF" class="cate-link find">Bedroom Furniture</a>
					<span class="toggle-control">+</span>
					<ul class="sub-cate">
						<li class="level-2">
							<a href="#" data-cid="BF01" class="find">Bed</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="BF02" class="find">Wardrobe
								- clothes shelves</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="BF03" class="find">Makeup table</a>
						</li>
						<li class="level-2">
							<a href="#" data-cid="BF04" class="find">Combo bedroom</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- Categories widget-->


	<!-- Price-->
	<div class="widget mercado-widget filter-widget price-filter">
		<h2 class="widget-title">Price</h2>
		<div class="widget-content">

			<div id="slider-range"></div>

			<div class="filter-price">
				<div class="price-search">
					<label for="amount">Price : </label>
					<input type="text" id="amount" name="searchPrice" value="" readonly>
				</div>
				<form id="priceForm" method="post" action="{{ route('searchByPrice')}}" >
					@csrf
					<input type="hidden" name="price_min" id="price_min" value="{{old('price_min')}}" readonly>
					<input type="hidden" name="price_max" id="price_max" value="{{old('price_max')}}" readonly>
					<button type="submit" class="btn btn-warning filter-submit">Filter</button>
				</form>
			</div>
		</div>
	</div>
	<!-- Price end-->
	<br>
	<div class="widget mercado-widget widget-product">
		<h2 class="widget-title">Popular Products</h2>
		<div class="widget-content">
			<ul class="products">
				@foreach($prods_popular as $product)
				<li class="product-item">
					<div class="product product-widget-style">
						<div class="thumbnnail">
							<a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" title="{{$product->product_name}}">
								<figure>
									<img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" width="800" height="800" alt="{{$product->product_image[0]}}">
								</figure>
							</a>
						</div>
						<div class="product-info">
							<a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name">
								<span>{{$product->product_name}} - {{$product->product_id}}</span>
							</a>
							<div class="wrap-price">
								<strong class="product-price" style="color:green;">
									$ {{number_format($product->product_price - $product->discount,2)}}
								</strong>
								@if($product->discount > 0)
								<span style="text-decoration: line-through;color:red;">$
									{{number_format($product->product_price,2)}}</span>
								@endif
							</div>
						</div>
					</div>
				</li>
				@endforeach

			</ul>
		</div>
	</div>
	<!-- brand widget-->

</div>