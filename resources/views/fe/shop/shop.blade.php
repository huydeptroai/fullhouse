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
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('.find').on('click', function(e) {
			e.preventDefault();
			var cid = $(this).data('cid');
			$.ajax({
				type: "post",
				url: "{{ route('searchCategory')}}",
				data: {
					cid: cid
				},
				success: function(data) {
					// console.log(data);
					$('#shop').html(data);
				}
			});
		});

		if ($("#slider-range").length > 0) {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 1500,
				values: [0, 0],
				slide: function(event, ui) {
					$("#amount").val(
						"$" + ui.values[0] + " - $" + ui.values[1]
					);
					$("#price_min").val(ui.values[0]);
					$("#price_max").val(ui.values[1]);
				},
			});
			$("#amount").val(
				"$" +
				$("#slider-range").slider("values", 0) +
				" - $" +
				$("#slider-range").slider("values", 1)
			);

			$('#priceForm').submit(function(e) {
				e.preventDefault();
				var min = $("#price_min").val();
				var max = $('#price_max').val();
				// var _token = $('input[name="_token"]').val();
				$.ajax({
					type: "POST",
					url: "{{ route('searchByPrice')}}",
					data: {
						price_min: min,
						price_max: max
					},
					success: function(data){
						$('#shop').html(data);
					}
				});
			});
		}
		$('#orderby').on('change', function(e){
			e.preventDefault();
			var sortby = $(this).val();
			$.ajax({
				type: "POST",
				url: "{{ route('sortBy')}}",
				data: {
					sortby: sortby
				},
				success:function(data){
					$('#shop').html(data);
				}
			});
		});


	});
</script>
@endsection