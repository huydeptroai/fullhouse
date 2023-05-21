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
			@include('fe.shop.partials.products-area')
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

@section('myJS')
<script>
	$(document).ready(function(e) {
		$('#slider-range').on('change',function(e){
			e.preventDefault();
			alert("change");

			var min = $('#slider-range').data('min');
		});

		var min = 0;
		var max = 0;

		// if ($("#slider-range").length > 0) {
		// 	$("#slider-range").slider({
		// 		range: true,
		// 		min: 0,
		// 		max: 2000,
		// 		// values: [75, 300],
		// 		slide: function(event, ui) {
		// 			$("#amount").val(
		// 				"$" + ui.values[0] + " - $" + ui.values[1]
		// 			);
		// 			$("#price_min").val(ui.values[0]);
		// 			$("#price_max").val(ui.values[1]);
		// 			min = ui.values[0];
		// 			min = ui.values[0];
		// 			console.log(min);
		// 			console.log(max);
		// 		},
		// 	});
		// 	$("#amount").val(
		// 		"$" +
		// 		$("#slider-range").slider("values", 0) +
		// 		" - $" +
		// 		$("#slider-range").slider("values", 1)
		// 	);
		// }
	});
</script>

@endsection