@extends('admin.layout.admin')
@section('myCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                        @if ($message = Session::get('deleted'))
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @endif

                        <div class="card-header">
                            <h3 class="card-title">Table product</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Featured</th>
                                        <th>Price ($)</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $item)
                                    <tr>
                                        <td>{{$item->product_id}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @foreach($item->productImage as $pImage)
                                                <img src="{{ asset('assets/img/upload/product/'.$pImage->image_name)}}" alt="productImage" style="width: 45px; height: 45px" class="rounded-circle">
                                                @endforeach
                                            </div>

                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">{{$item->product_name}}</p>
                                                    <p class="text-muted mb-0">{{$item->category_id}}</p>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            @if($item->featured == 1)
                                                Featured
                                            @endif
                                        </td>
                                        <td>
                                            <p class="fw-bold mb-1">{{$item->product_price - $item->discount}}</p>
                                            @if($item->discount > 0)
                                            <p class="text-muted mb-0"><del>{{$item->product_price}}</del></p>
                                            @endif
                                        </td>
                                        <td>{{$item->product_quantity}}</td>
                                        <td>
                                            <div class="row px-3 justify-content-center">
                                                <a class="btn btn-primary" href="{{ route('admin.product.show', $item->product_id)}}">View</a>

                                                <a class="btn btn-warning mx-2" href="{{ Route('admin.product.edit', $item->product_id)}}">Edit</a>

                                                <form action="{{Route('admin.product.destroy', $item->product_id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure to delete this?')" />

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="7">
                                            <a href="{{ route('admin.product.create')}}">Create new Product</a>
                                        </th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('myJS01')
<!-- DataTables  & Plugins -->
<script src="{{ asset('/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection

@section('myJS02')
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection