@extends('admin.layout.admin')

@section('myJSChart')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
@endsection

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header border-0">
							<div class="d-flex justify-content-between">
								<h3 class="card-title">Product Sales</h3>
								<a href="{{route('admin.order.index')}}">View Report</a>
							</div>
						</div>
						<div class="card-body">
							<div class="d-flex">
								<p class="d-flex flex-column">
									<span class="text-bold text-lg">820</span>
									<span>Visitors Over Time</span>
								</p>
								<p class="ml-auto d-flex flex-column text-right">
									<span class="text-success">
										<i class="fas fa-arrow-up"></i> 12.5%
									</span>
									<span class="text-muted">Since last week</span>
								</p>
							</div>
							<!-- /.d-flex -->

							<div class="position-relative mb-4">
								<!-- <canvas id="visitors-chart" height="200"></canvas> -->
								<div id="product_chart" style="height: 200px;"></div>
							</div>

							<div class="d-flex flex-row justify-content-end">
								<span class="mr-2">
									<i class="fas fa-square text-primary"></i> This Week
								</span>

								<span>
									<i class="fas fa-square text-gray"></i> Last Week
								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<!-- Visitors -->
					@include('admin.dashboard.dashboard-visitors')

					<!-- /.card -->
					<!-- Products -->
					@include('admin.dashboard.dashboard-products')
					<!-- /.card -->
				</div>
				<!-- /.col-md-6 -->
				<div class="col-lg-6">
					<!-- Online Store Overview -->
					@include('admin.dashboard.dashboard-sales')
					<!-- /.card -->

					<!-- Online Store Overview -->
					@include('admin.dashboard.dashboard-overview')

				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->


</div>
@endsection

@section('myJS01')
<script>
	$(document).ready(function() {
		var product_data = '';
		var productChart = new Morris.Bar({
			// ID of the element in which to draw the chart.
			element: 'product_chart',
			// Chart data records -- each entry in this array corresponds to a point on
			// the chart.
			// data: [{
			// 		year: '2008',
			// 		value: 20
			// 	},
			// 	{
			// 		year: '2009',
			// 		value: 10
			// 	},
			// 	{
			// 		year: '2010',
			// 		value: 5
			// 	},
			// 	{
			// 		year: '2011',
			// 		value: 5
			// 	},
			// 	{
			// 		year: '2012',
			// 		value: 20
			// 	}
			// ],
			data: product_data,
			// The name of the data record attribute that contains x-values.
			xkey: 'product_id',
			// A list of names of data record attributes that contain y-values.
			ykeys: ['quantity_sell'],
			// Labels for the ykeys -- will be displayed when you hover over the
			// chart.
			labels: ['quantity_sell']
		});

		$.ajax({
			type: "POST",
			url: "{{route('admin.productSales')}}",
			data: {
				_token: '{{ csrf_token() }}'
			},
			dataType: "json",
			success:function(data){
				product_data = data;
			}
		});
	});
</script>
@endsection