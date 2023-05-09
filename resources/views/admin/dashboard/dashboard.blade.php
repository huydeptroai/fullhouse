@extends('admin.layout.admin')
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
						<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
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