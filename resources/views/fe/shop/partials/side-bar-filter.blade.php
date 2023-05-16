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
					<label for="amount">Price:</label>
					<input type="text" id="amount" name="searchPrice" readonly>
				</div>
				<form id="priceForm">
					<input type="hidden" name="price_min" id="price_min" value="" readonly>
					<input type="hidden" name="price_max" id="price_max" value="" readonly>
					<button type="submit" class="filter-submit">Filter</button>
				</form>
			</div>
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