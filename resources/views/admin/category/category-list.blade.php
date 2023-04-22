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
                    <h1>Manager Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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

                        <div class="card-header bg-success">
                            <h3 class="card-title">Category List Table</h3>

                            <!-- <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 500px">
                            <table class="table table-head-fixed table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th style="width:10px;">Category_No</th>
                                        <th>Image</th>
                                        <th>Category 1</th>
                                        <th>Category 2</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cates as $item)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>{{ $item->category_id}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/upload/category/'.$item->category_image)}}" alt="" style="width: 45px; height: 45px" class="rounded-circle">
                                            </div>
                                        </td>
                                        <td>{{ $item->category_name_1}}</td>
                                        <td>{{ $item->category_name_2}}</td>
                                        <td>
                                            <div class="row px-3 justify-content-center">
                                                <a class="btn btn-warning" href="{{ Route('admin.category.edit', $item->category_id)}}">Edit</a>
                                                <form action="{{Route('admin.category.destroy', $item->category_id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure to delete this?')" />

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- <tr class="expandable-body">
                                        <td colspan="5" style="width: 100%;">
                                            <p style="max-width:100vw;overflow-x:auto;">
                                                {{ $item->category_intro}}
                                            </p>
                                        </td>
                                    </tr> -->
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan=5>
                                            <a href="{{ route('admin.category.create')}}" class="btn btn-success">Create new Category</a>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
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