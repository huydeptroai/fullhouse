<header id="header" class="header header-style-1">
	<div class="container-fluid">
		<div class="row">
			<div class="topbar-menu-area">
				<div class="container">
					<div class="topbar-menu left-menu">
						<ul>
							<li class="menu-item">
								<a title="Hotline: (+123) 456 789" href="#"><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
							</li>
						</ul>
					</div>
					<div class="topbar-menu right-menu">
						<ul>
							<li class="menu-item">
								<a title="Register or Login" href="#" class="btnLogin-popup" style="font-size: 1.2em;">
									@if(!Auth::check())
									<strong>{{__('Login')}}</strong>
									@endif
								</a>
							</li>

							<!-- my account user -->
							@if(Auth::check())
							<li class="menu-item menu-item-has-children parent">
								<a title="My Account" href="#">
									Welcome, <strong>{{ Auth::user()->name }}</strong>
									<i class="fa fa-angle-down" aria-hidden="true"></i>
								</a>
								<ul class="submenu user">
									@if(Auth::user()->role === 1)
									<li class="menu-item"><a href="{{route('admin.dashboard')}}">
											<strong>Managers</strong>
										</a></li>
									@endif

									<li class="menu-item"><a href="{{route('profile.edit')}}">Profile</a></li>
									<li class="menu-item"><a href="{{route('profile.edit')}}">Orders History</a></li>
									<li class="menu-item">
										<!-- Authentication -->
										<form method="POST" action="{{ route('logout') }}">
											@csrf
											<a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
												Log Out
											</a>
										</form>
									</li>
								</ul>
							</li>
							@endif
							<!-- my account user -->
						</ul>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="mid-section main-info-area">

					<div class="wrap-logo-top left-section">
						<a href="{{ route('home') }}" class="link-to-home"><img src="{{ asset('/frontend/images/logo-top-1.jpg') }}" alt="mercado"></a>
					</div>

					<div class="wrap-search center-section">
						<div class="wrap-search-form">
							<form method="post" action="{{route('searchName')}}" id="form-search-top" name="form-search-top">
								@csrf
								<input type="text" name="search" placeholder="Search here...">
								<button form="form-search-top" type="submit">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>

								<div class="wrap-list-cate">
									<input type="hidden" name="product-cate" value="" id="product-cate">
									<a href="#" class="link-control">All Category</a>
									<ul class="list-cate">
										<li class="level-0"><a href="{{ route('product.index')}}">All Category</a></li>

										<li class="level-1"><a href="{{ route('searchByCategoryName',['category_name'=>'Office furniture']) }}">-Office
												furniture</a></li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Desk Office']) }}">Desk
												Office</a></li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Chair Office']) }}">Chair
												Office</a></li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Cabinet-shelves Office']) }}">Cabinet-shelves
												Office</a></li>
										<li class="level-1"><a href="{{ route('searchByCategoryName',['category_name'=>'Living furniture']) }}">-Living
												furniture</a></li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Sofa']) }}">Sofa
										</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Sofa table']) }}">Sofa table
										</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'TV Shelf']) }}">TV
												Shelf
										</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Bookshelf-Decorative shelf']) }}">Bookshelf-Decorative
												shelf</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Decorative cabinets']) }}">Decorative
												cabinets</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Combo living room']) }}">Combo
												living room</li>
										<li class="level-1"><a href="{{ route('searchByCategoryName',['category_name'=>'Kitchen-Dining furniture']) }}">-Kitchen
												- Dining furniture</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Dining table']) }}">Dining
												table</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Dining chair']) }}">Dining
												chair</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Dining table and chair set']) }}">Dining
												table and chair set</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Kitchen cabinets']) }}">Kitchen
												cabinets</li>
										<li class="level-1"><a href="{{ route('searchByCategoryName',['category_name'=>'Bedroom furniture']) }}">-Bedroom
												furniture</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Bed']) }}">Bed
										</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Wardrobe-clothes shelves']) }}">Wardrobe
												- clothes shelves</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Makeup table']) }}">Makeup
												table</li>
										<li class="level-2"><a href="{{ route('searchByCategoryName',['category_name'=>'Combo bedroom']) }}">Combo
												bedroom</li>
									</ul>
								</div>
							</form>
						</div>
					</div>

					<div class="wrap-icon right-section">

						<div class="wrap-icon-section wishlist">
							<a href="#" class="link-direction btnWL-popup">
								<i class="fa fa-heart" aria-hidden="true"></i>
								<div class="left-info">
									<span class="index count-product-wish" id="count-wl">0 item(s)</span>
									<span class="title">Wishlist</span>
								</div>
							</a>
						</div>

						<div class="wrap-icon-section minicart">
							<a href="#" class="link-direction btnCart-popup">
								<i class="fa fa-shopping-basket" aria-hidden="true"></i>
								<div class="left-info">
									<span class="index count-product-cart" id="count">0 items(s)</span>
									<span class="title">CART</span>
								</div>
							</a>
						</div>

						<div class="wrap-icon-section show-up-after-1024">
							<a href="#" class="mobile-navigation">
								<span></span>
								<span></span>
								<span></span>
							</a>
						</div>
					</div>


				</div>
			</div>

			<div class="nav-section header-sticky">

				<div class="primary-nav-section">
					<div class="container">
						<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
							<li class="menu-item home-icon">
								<a href="{{route('home')}}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
							</li>
							<li class="menu-item">
								<a href="{{route('about')}}" class="link-term mercado-item-title">About Us</a>
							</li>
							<li class="menu-item">
								<a href="{{route('product.index')}}" class="link-term mercado-item-title">Products</a>
							</li>
							<li class="menu-item">
								<a href="{{ route('cart') }}" class="link-term mercado-item-title">Cart</a>
							</li>
							<li class="menu-item">
								<a href="{{route('contact')}}" class="link-term mercado-item-title">Contact Us</a>
							</li>
							@if(!Auth::check())
							<li class="menu-item">
								<a title="Register or Login" href="{{route('login')}}" class="">
									<strong>{{__('Login')}}</strong>
								</a>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>