<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/frontend/images/favicon.ico')}}">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/bootstrap.min.css') }}">
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/owl.carousel.min.css') }}"> -->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/chosen.min.css') }}"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/color-01.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/login.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/site-cart.css') }}">

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


</body>

</html>