<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

	<div class="banner-shop">
		<a href="#" class="banner-link">
			<figure><img src="{{ asset('/frontend/images/shop_banner_01_BANNER-SOFA.jpg') }}" alt=""></figure>
		</a>
	</div>

	<div class="wrap-shop-control">
		<form>
			<h1 class="shop-title">Products</h1>
			<div class="wrap-right">
				<div class="sort-item orderby ">
					@csrf
					<select id="orderby" name="orderby" class="use-chosen" style="width:180px" value="">
						<option value="all" selected>--Sort by--</option>
						<option value="rating">Sort by average rating</option>
						<option value="name">Sort by name form A -> Z</option>
						<option value="name-desc">Sort by name form Z -> A</option>
						<option value="price">Sort by price: low to high</option>
						<option value="price-desc">Sort by price: high to low</option>
					</select>
				</div>

				<div class="change-display-mode">
					<a href="#" id="grid_page" class="grid-mode display-mode"><i class="fa fa-th"></i>Grid</a>
				</div>

			</div>
		</form>

	</div>
	<!--end wrap shop control-->
	
	<div>
		<div class="row">
			<!-- product list start -->
			<ul class="product-list grid-products equal-container" id="shop" style="display: flex;flex-wrap: wrap;justify-content: center;align-items:center;align-content: flex-start;">
				@foreach($products as $product)
				<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
					<div class="product product-style-2 equal-elem " style="display: flex;flex-direction: column;justify-content: space-between;align-items: stretch;">
						<div class="product-thumnail">
							<a href="{{ route('productDetail',['product_slug' => $product->product_slug])}}" title="{{$product->product_name}}">
								<figure><img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" alt="{{$product->product_name}}"></figure>
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
								<!-- <a href="#" class="function-link add-to-wishlist" data-id="{{$product->product_id}}">Wishlist</a> -->
							</div>
						</div>
						<div class="product-info">
							<a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="product-name"><span>{{$product->product_name.' - '.$product->product_id}}</span></a>
						</div>
						<div class="col-12" style="display: flex;flex-direction: column;justify-content: space-between;align-items:flex-end;">
							<div class="col-12" style="display:flex-item;font-size:16px;">
								<strong class="product-price" style="color:green;">
									$ {{number_format($product->product_price - $product->discount,2)}}
								</strong>
								@if($product->discount > 0)
								<span style="text-decoration: line-through;color:red;">$
									{{number_format($product->product_price,2)}}</span>
								@endif
							</div>
							@if($product->avgRating() > 0)
							<div class="col-12" style="display:flex-item;font-size:12px;">
								<strong>{{number_format( $product->reviews->avg('rating'),2) }} </strong>
								@for($i=1; $i<=5; $i++) @php $avg=$product->reviews->avg('rating');
									$color=($i <=round($avg)) ? "color: #ffcc00;" : "color: #ccc;" ; @endphp <i class="fa fa-star" aria-hidden="true" style="cursor:pointer;{{$color}}font-size:15px;"></i>
										@endfor
										<a href="{{ route('productDetail',['product_slug' => $product->product_slug]) }}" class="count-review">
											({{count($product->reviews)}} reviews)</a>
							</div>
							@endif
						</div>
						<!-- <button style="margin:auto 0 0 0;width: 100%;" class="btn btn-success add-to-cart" data-id="{{$product->product_id}}">Add To Cart</button> -->
					</div>
				</li>
				@endforeach
			</ul>
			<!-- product list start -->
		</div>
		<div class="wrap-pagination-info">
			<ul class="page-numbers">
				<li class="page-number-item ">{{ $products->onEachSide(5)->links() }}</li>
			</ul>
		</div>
	</div>

</div>