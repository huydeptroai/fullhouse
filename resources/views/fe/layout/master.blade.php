<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="author" content="T12206M1 Team 1">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/frontend/images/icon.jpg')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<link
		href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
		rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
		rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/color-01.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/login.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/site-cart.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/wish-list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/reset.css') }}">

	@yield('myCss')


</head>

<body class="home-page home-01">

	<!-- mobile menu -->
	<div class="mercado-clone-wrap">
		<div class="mercado-panels-actions-wrap">
			<a class="mercado-close-btn mercado-close-panels" href="#">x</a>
		</div>
		<div class="mercado-panels"></div>
	</div>

	<!--header start-->
	@include('fe.layout.partials.header')
	<!--header end-->

	<!--main start-->
	@yield('content')
	<!--main end-->

	@include('fe.layout.partials.chatbox')
	
	<!-- footer start-->
	@include('fe.layout.partials.footer')
	<!-- footer end -->
	
	@include('fe.layout.partials.login')
	
	@include('fe.layout.partials.side_cart')
	@include('fe.layout.partials.wish_list')
	
	<!-- jQuery -->
	<!-- <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script> -->
	
	<!-- JavaScript start -->
	<script src="{{ asset('/frontend/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('/frontend/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/frontend/js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('/frontend/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/frontend/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('/frontend/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('/frontend/js/functions.js') }}"></script>
	@yield('time')
	
	@include('fe.layout.partials.hotline')
	<!-- login/cart show -->
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<script>
	//login/register
	const wrapper = document.querySelector('.wrapper');
	const loginLink = document.querySelector('.login-link');
	const registerLink = document.querySelector('.register-link');
	const btnPopup = document.querySelector('.btnLogin-popup');
	const iconClose = document.querySelector('.icon-close');
	//cart
	const wrapper_cart = document.querySelector('.wrapper-cart');
	const btnCart = document.querySelector('.btnCart-popup');
	const iconCloseCart = document.querySelector('.icon-close-cart');
	//wish-list
	const wrapper_wl = document.querySelector('.wrapper-wish-list');
	const btnWL = document.querySelector('.btnWL-popup');
	const iconCloseWL = document.querySelector('.icon-close-wl');

	//register
	registerLink.addEventListener('click', () => {
		wrapper.classList.add('active');
	});
	// login
	loginLink.addEventListener('click', () => {
		wrapper.classList.remove('active');
	});
	//btn-login
	btnPopup.addEventListener('click', () => {
		wrapper.classList.add('active-popup');
		wrapper_cart.classList.remove('active-popup');
		wrapper_wl.classList.remove('active-popup');
	});
	//close-login
	iconClose.addEventListener('click', () => {
		wrapper.classList.remove('active-popup');
	});

	// site-cart actions
	btnCart.addEventListener('click', () => {
		wrapper_cart.classList.add('active-popup');
		wrapper.classList.remove('active-popup');
		wrapper_wl.classList.remove('active-popup');
	});
	//close-cart
	iconCloseCart.addEventListener('click', () => {
		wrapper_cart.classList.remove('active-popup');
	});

	// wish-list actions
	btnWL.addEventListener('click', () => {
		wrapper_wl.classList.add('active-popup');
		wrapper.classList.remove('active-popup');
		wrapper_cart.classList.remove('active-popup');
	});
	//close-wish-list
	iconCloseWL.addEventListener('click', () => {
		wrapper_wl.classList.remove('active-popup');
	});
	</script>

	@yield('myJS_profile')

	<!-- add to cart -->
	<script>
	$(document).ready(function() {

		const url = "{{ Route('addCart') }}" ?? "";

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		//create cart
		$('.add-to-cart').click(function(e) {
			e.preventDefault();
			let pid = $(this).data("id") ?? '';
			let quantity = $('#product_qty_' + pid).val() ?? 1;

<<<<<<< HEAD
			var data = {
				pid: pid,
				quantity: quantity
			};
			postAjax(data);
		});

		function postAjax(data) {
			$.ajax({
				type: "POST",
				url: url,
				data: data,
				success: function(data) {
					//show site-cart
					wrapper_cart.classList.add('active-popup');
					getCart();
				},
			});
		}
=======
			//display site cart
			function getCart() {
				$.get(
					"{{ route('showCart')}}",
					function(data) {
						// console.log(data);
						var cart = '';
						let count = 0;
						let total_qty = 0;
						let total = 0;
						let img = '';
						var cart_page = '';

						$.each(data, function(k, v) {
							var arr_img = JSON.parse(v.product_image);
							count++;
							total_qty += parseInt(v.quantity);
							total += parseFloat(v.amount);
							let path = "{{ asset('assets/img/upload/product') }}" + "/" + arr_img[0];
							let id = v.product_id;
							let detail = "{{ url('/product')}}" + "/" + id;
>>>>>>> 1792bd46822fb1cc4dcf727b3b3d281885a0a64b

		//display site cart
		function getCart() {
			$.get(
				"{{ route('showCart')}}",
				function(data) {
					// console.log(data);
					var cart = '';
					let count = 0;
					let total = 0;
					let img = '';
					var cart_page = '';

					$.each(data, function(k, v) {
						var arr_img = JSON.parse(v.product_image);
						count++;
						total += parseInt(v.amount);
						let path = "{{ asset('assets/img/upload/product') }}" + "/" + arr_img[0];
						let id = v.product_id;
						let detail = "{{ url('/product')}}" + "/" + id;

						cart += `<div class="product-box" id="cart_id_${v.id}">
										<span class="icon-close delete-cart" data-cid="${v.id}">
											<ion-icon name="close-outline"></ion-icon>
										</span>
										<a class="p-image" href="${detail}">
											<div class="product-image" style="width:100px">
												<figure><img src="${path}" alt="${v.product_image}" width="100" height="100"></figure>
											</div>
											<p class="product-name">${v.product_name}</p>
										</a>
										<div class="p-info">
											<span class="product-price">$${v.price}</span>
											<span class="product-quantity">
												<input type="number" id="product_qty_${v.product_id}" name="product-quatity" value="${v.quantity}" data-id="${v.product_id}" pattern="[0-9]*">
											</span>
											<span class="product-amount">$${v.amount}</span>
										</div>
									</div>`;

						cart_page += `<li class="pr-cart-item" id="cart_id_${v.id}">
									<div class="product-image">
										<figure><img src="${path}" alt="${v.product_name}"></figure>
									</div>
									<div class="product-name">
										<a class="link-to-product" href="${detail}">
											<p>${v.product_name}</p>
											<small>${v.product_id}</small>
										</a>
									</div>
									<div class="price-field product-price">
										<p class="price">$${v.product_price}</p>
										<p class="price" style="text-decoration: line-through;color:red">$${v.discount}</p>
									</div>
									<div class="quantity">
										<div class="quantity-input">
											<input type="text" name="product-quatity" value="${v.quantity}" data-id="${v.product_id}" data-max="120" pattern="[0-9]*">
											<a class="btn btn-increase btn-qty" href="#"></a>
											<a class="btn btn-reduce btn-qty" href="#"></a>
										</div>
									</div>
									<div class="price-field sub-total">
										<p class="price">$${v.amount}</p>
									</div>
									<div class="delete delete-cart" data-cid="${v.id}">
										<a href="#" class="btn btn-delete" title="">
											<span>Delete from your cart</span>
											<i class="fa fa-times-circle" aria-hidden="true"></i>
										</a>
									</div>
								</li>`;
<<<<<<< HEAD
=======
						});

						$('#cart-page').html(cart_page);
						$('#content-cart').html(cart);
						$('#count').html(count + ' items');
						$('.total-cart').html(' $ ' + total.toFixed(2));
						$('input[name="value_order"]').val(total);
						$('input[name="total_quantity"]').val(total_qty);
						
					}
				);
			};

			$('.view-cart').attr("href", "{{route('cart')}}");
			$('.view-checkout').attr("href", "{{route('checkout')}}");

			getCart();

			//edit side-cart
			$('body').on('change', 'input[name="product-quatity"]', function(e) {
				e.preventDefault();
				//Note: we have many input with this name;
				let pid = $(this).data("id") ?? '';
				let quantity = $('#product_qty_' + pid).val() ?? '';

				var data = {
					pid: pid,
					quantity: quantity,
					action: 'edit'
				};
				if (data.quantity == 0) {
					return;
				}
				postAjax(data);
			});

			//edit quantity in cart by button
			$("body").on('click', ".btn-qty", function(e) {
				e.preventDefault();
				var _this = $(this);
				var _input = $(this).siblings('input[name=product-quatity]');
				var _current_value = _input.val();
				var _max_value = _input.attr("data-max");

				var data = {};
				data.pid = _input.attr("data-id");
				data.quantity = _current_value;
				data.action = "edit";

				if (_this.hasClass("btn-reduce")) {
					if (parseInt(_current_value, 10) > 1) {
						data.quantity = parseInt(_current_value, 10) - 1;
						_input.val(data.quantity);
					}
				} else {
					if (parseInt(_current_value, 10) < parseInt(_max_value, 10)) {
						data.quantity = parseInt(_current_value, 10) + 1;
						_input.val(data.quantity);
					}
				}
				// console.log(data);
				postAjax(data);

			});

			//delete cart
			$('body').on('click', '.delete-cart', function(e) {
				e.preventDefault();

				let cart_id = $(this).data("cid") ?? '';

				if (confirm('Delete this cart-item?')) {
					$.ajax({
						type: "DELETE",
						url: "{{ url('delete-cart')}}" + '/' + cart_id,
						success: function(data) {
							$("#cart_id_" + cart_id).remove();
							setTimeout(getCart, 1000);
						},
						error: function(data) {
							// console.log('Error:', data);
							console.log(JSON.stringify(data));
						}
>>>>>>> 1792bd46822fb1cc4dcf727b3b3d281885a0a64b
					});

					$('#cart-page').html(cart_page);
					$('#content-cart').html(cart);
					$('#count').html(count + ' items');
					$('.total-cart').html(' $ ' + total.toFixed(2));
					$('input[name="value_order"]').val(total.toFixed(2));
				}
			);
		};


		$('.view-cart').attr("href", "{{route('cart')}}");
		$('.view-checkout').attr("href", "{{route('checkout')}}");

		getCart();

		//edit side-cart
		$('body').on('change', 'input[name="product-quatity"]', function(e) {
			e.preventDefault();
			//Note: we have many input with this name;
			let pid = $(this).data("id") ?? '';
			let quantity = $('#product_qty_' + pid).val() ?? '';

			var data = {
				pid: pid,
				quantity: quantity,
				action: 'edit'
			};
			if (data.quantity == 0) {
				return;
			}
			postAjax(data);
		});

		//edit quantity in cart by button
		$("body").on('click', ".btn-qty", function(e) {
			e.preventDefault();
			var _this = $(this);
			var _input = $(this).siblings('input[name=product-quatity]');
			var _current_value = _input.val();
			var _max_value = _input.attr("data-max");

			var data = {};
			data.pid = _input.attr("data-id");
			data.quantity = _current_value;
			data.action = "edit";

			if (_this.hasClass("btn-reduce")) {
				if (parseInt(_current_value, 10) > 1) {
					data.quantity = parseInt(_current_value, 10) - 1;
					_input.val(data.quantity);
				}
			} else {
				if (parseInt(_current_value, 10) < parseInt(_max_value, 10)) {
					data.quantity = parseInt(_current_value, 10) + 1;
					_input.val(data.quantity);
				}
			}
			// console.log(data);
			postAjax(data);

		});

		//delete cart
		$('body').on('click', '.delete-cart', function(e) {
			e.preventDefault();

			let cart_id = $(this).data("cid") ?? '';

			if (confirm('Delete this cart-item?')) {
				$.ajax({
					type: "DELETE",
					url: "{{ url('delete-cart')}}" + '/' + cart_id,
					success: function(data) {
						$("#cart_id_" + cart_id).remove();
						setTimeout(getCart, 1000);
					},
					error: function(data) {
						// console.log('Error:', data);
						console.log(JSON.stringify(data));
					}
				});
			}
		});


		//create wish-list
		$('.add-to-wishlist').click(function(e) {
			e.preventDefault();
			let pid = $(this).data("id") ?? '';
			alert(pid);
			$.ajax({
				type: "POST",
				url: "{{route('addWishList')}}",
				data: {
					pid: pid
				},
				success: function(data) {
					setTimeout(getWishList(), 1000);
				}
			});
		});

		getWishList();

		function getWishList() {
			$.get("{{ route('showWishList')}}", function(data) {
				// console.log(data);
				var wl = '';
				let count = 0;
				let img = '';

				$.each(data, function(k, v) {
					var arr_img = JSON.parse(v.product_image);
					count++;
					let path = "{{ asset('assets/img/upload/product') }}" + "/" + arr_img[0];
					let id = v.product_id;
					let detail = "{{ url('/product')}}" + "/" + id;

					wl += `<div class="product-box" id="wl_id_${v.id}">
										<span class="icon-close delete-wl" data-wid="${v.id}">
											<ion-icon name="close-outline"></ion-icon>
										</span>
										<a class="p-image" href="${detail}">
											<div class="product-image" style="width:100px">
												<figure><img src="${path}" alt="${v.product_image}" width="100" height="100"></figure>
											</div>
											<p class="product-name">${v.product_name}</p>
										</a>
										<div class="p-info">
										<span class="product-price">$${v.product_price - v.discount}</span>
										<span class="product-price" style="text-decoration: line-through;color:red;"> $${v.product_price}</span>
										</div>
									</div>`;

				});

				$('#content-wish-list').html(wl);
				$('#count-wl').html(count + ' items');
			});
		}

		//delete wl
		$('body').on('click', '.delete-wl', function(e) {
			e.preventDefault();

			let wl_id = $(this).data("wid") ?? '';

			if (confirm('Delete this item?')) {
				$.ajax({
					type: "DELETE",
					url: "{{ url('delete-wishlist')}}" + '/' + wl_id,
					success: function(data) {
						$("#wl_id_" + wl_id).remove();
						setTimeout(getWishList, 1000);
					},
					error: function(data) {
						// console.log('Error:', data);
						console.log(JSON.stringify(data));
					}
				});
			}
		});

		//subscribe input email
		$('#frm_new_letter').submit(function(e) {
			e.preventDefault();
			var email = $('#email_new_letter').val();
			var url = "{{ route('newLetter')}}";
			$.ajax({
				url: url,
				method: "POST",
				data: {
					email: email
				},
				success: function(data) {
					$('#result_new_letter').html('Thank you for your subscribe');
				}
			});
		});


	});
	</script>

	<script>
	$(document).ready(function() {
		$('#orderby').on('change', function() {
			var url = $(this).val();
			// alert(url);
			if (url) {
				window.location = url;
			}
			return false;
		});
	});

	$(document).ready(function() {
		$('#post_per_page').on('change', function() {
			var url = $(this).val();
			// alert(url);
			if (url) {
				window.location = url;
			}
			return false;
		});
	});

	$(document).ready(function() {
		$('#list_page #grid_page').on('click', function() {
			var url = $(this).val();
			// alert(url);
			if (url) {
				window.location = url;
			}
			return false;
		});
	});
	</script>

	


	@yield('myJS')



</body>

</html>