<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
	<div class="widget mercado-widget categories-widget">
		<h2 class="widget-title">All Categories</h2>
		<div class="widget-content">
			<ul class="list-category">
				<li class="category-item has-child-cate">
					<a href="{{ route('searchByCategoryName',['category_name'=>'Office furniture']) }}" class="cate-link">Office
						Furniture</a>
					<span class="toggle-control">+</span>
					<ul class="sub-cate">
						<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Desk Office']) }}">Desk
								Office</a></li>
						<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Chair Office']) }}">Chair
								Office</a></li>
						<li class="level-2"><a
								href="{{ route('searchByCategoryName',['category_name'=>'Cabinet-shelves Office']) }}">Cabinet-shelves
								Office</a></li>
					</ul>
				</li>
				<li class="category-item has-child-cate">
					<a href="{{ route('searchByCategoryName',['category_name'=>'Living furniture']) }}" class="cate-link">Living
						Furniture</a>
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
						<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Dining table']) }}">Dining
								table</li>
						<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Dining chair']) }}">Dining
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
					<a href="{{ route('searchByCategoryName',['category_name'=>'Bedroom furniture']) }}" class="cate-link">Bedroom
						Furniture</a>
					<span class="toggle-control">+</span>
					<ul class="sub-cate">
						<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Bed']) }}">Bed
						</li>
						<li class="level-2"><a
								href="{{ route('searchByCategoryName',['category_name'=>'Wardrobe-clothes shelves']) }}">Wardrobe
								- clothes shelves</li>
						<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Makeup table']) }}">Makeup
								table</li>
						<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Combo bedroom']) }}">Combo
								bedroom</li>
					</ul>
				</li>

				<li class="category-item">
					<a href="#" class="cate-link">Tools & Equipments</a>
				</li>

			</ul>
		</div>
	</div>
	<!-- Categories widget-->

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
			<div class="filter-price">
				<div class="price-search">
					<label for="amount">Price : </label>
					@if(!isset($_GET["price_max"]) || !isset($_GET["price_min"]))
					<input type="text" id="amount" name="searchPrice" readonly>
					@else
					<input type="text" name="searchPrice" readonly>
					${{Session::get("price_min")}} -
					${{Session::get("price_max")}}
					@endif
				</div>
				<form id="priceForm">
					<input type="hidden" name="price_min" id="price_min" value="" readonly>
					<input type="hidden" name="price_max" id="price_max" value="" readonly>
					<button type="submit" class="btn btn-warning filter-submit">Filter</button>
				</form>
			</div>
		</div>
	</div>
	<!-- Price end-->

	<div class="widget mercado-widget widget-product">
		<h2 class="widget-title">Popular Products</h2>
		<div class="widget-content">
			<ul class="products">
				@foreach($prods_popular as $product)
				<li class="product-item">
					<div class="product product-widget-style">
						<div class="thumbnnail">
							<a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}"
								title="{{$product->product_name}}">
								<figure>
									<img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" width="800"
										height="800" alt="{{$product->product_image[0]}}">
								</figure>
							</a>
						</div>
						<div class="product-info">
							<a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name">
								<span>{{$product->product_name}}</span>
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