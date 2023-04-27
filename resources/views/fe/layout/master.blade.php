<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="T12206M1 Team 1">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/frontend/images/icon.jpg')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/color-01.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/login.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/site-cart.css') }}">
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

	<!-- footer start-->
	@include('fe.layout.partials.footer')
	<!-- footer end -->

	@include('fe.layout.partials.login')

	@include('fe.layout.partials.site_cart')

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

	<!-- login show -->
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<script>
		const wrapper = document.querySelector('.wrapper');
		const loginLink = document.querySelector('.login-link');
		const registerLink = document.querySelector('.register-link');
		const btnPopup = document.querySelector('.btnLogin-popup');
		const iconClose = document.querySelector('.icon-close');

		const wrapper_cart = document.querySelector('.wrapper-cart');
		const btnCart = document.querySelector('.btnCart-popup');
		const iconCloseCart = document.querySelector('.icon-close-cart');
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
		});
		//close-login
		iconClose.addEventListener('click', () => {
			wrapper.classList.remove('active-popup');
		});

		// site-cart actions
		btnCart.addEventListener('click', () => {
			wrapper_cart.classList.add('active-popup');
			wrapper.classList.remove('active-popup');
		});
		//close-cart
		iconCloseCart.addEventListener('click', () => {
			wrapper_cart.classList.remove('active-popup');
		});
	</script>

	@yield('myJS_profile')

	<!-- add to cart -->
	@yield('myJS')
	<script>
		$(document).ready(function() {
			const url = "{{ Route('addCart') }}" ?? "";

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('.add-to-cart').click(function(e) {
				e.preventDefault();
				let pid = $(this).data("id") ?? '';
				let quantity = $('input[name="product-quatity"]').val() ?? 1;
				$.ajax({
					type: "POST",
					url: url,
					data: {
						pid: pid,
						quantity: quantity,
						// _token: '{{ csrf_token() }}',
					},
					success: function(data) {
						alert('add product to cart successfully.');
						//show site-cart
						wrapper_cart.classList.add('active-popup');

					},
				});
				setTimeout(getCart, 1000);
			});

			function getCart() {
				$.get(
					"{{ route('showCart')}}",
					function(data) {
						// console.log(data);
						var cart = '';
						let count = 0;
						let total = 0;
						let img = '';
						$.each(data, function(k, v) {
							var arr_img = JSON.parse(v.product_image);
							count++;
							total += parseInt(v.amount);
							let path = "{{ asset('assets/img/upload/product') }}" + "/" + arr_img[0];
							let id = v.product_id;
							let detail = "{{ route('product.show', " + id + ") }}";

							cart += `<div class="product-box" id="cart_id_${v.id}">
									<span class="icon-close delete-cart" data-id="${v.id}">
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
										<span class="product-quantity"> <input type="number" class="" value="${v.quantity}"></span>
										<span class="product-amount">$${v.amount}</span>
									</div>
								</div>`;
						});

						$('#content-cart').html(cart);
						$('#count').html(count + ' items');
						$('.total-cart').html('Total: $' + total);
					}
				);
			};
			getCart();

			//edit cart
			$('body').on('keyup', '#edit-cate', function() {
				var category_id = $(this).data('id');
				$.get('admin/category/' + category_id + '/edit', function(data) {
					$('#cateCrudModal').html("Edit cate");
					$('#btn-save').val("edit-cate");
					$('#ajax-crud-modal').modal('show');
					$('#category_id').val(data.category_id);
					$('#category_name_1').val(data.category_name_1);
					$('#category_name_2').val(data.category_name_2);
					$('#category_intro').val(data.category_intro);
				});
			});

			//delete cart
			$('body').on('click', '.delete-cart', function(e) {
				e.preventDefault();

				let cart_id = $(this).data("id") ?? '';

				if (confirm('Delete this cart-item?')) {
					$.ajax({
						type: "DELETE",
						url: "{{ url('delete-cart')}}" + '/' + cart_id,
						success: function(data) {
							$("#cart_id_" + cart_id).remove();
						},
						error: function(data) {
							// console.log('Error:', data);
							console.log(JSON.stringify(data));
						}
					});
				}

			});


		});
	</script>




</body>

</html>