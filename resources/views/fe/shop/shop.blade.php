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

			<!--main products area-->
			@if(isset($_GET['list']))
			@include('fe.shop.partials.products-area-list')
			@else
			@include('fe.shop.partials.products-area')
			@endif
			<!--end main products area-->

			<!-- site bar start -->
			@include('fe.shop.partials.side-bar-filter')

			<!--end sitebar-->

		</div>
		<!--end row-->

	</div>
	<!--end container-->

</main>
@endsection