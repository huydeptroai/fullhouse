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
                    <h1>User List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- <div class="card-body table-responsive p-0" style="height: 300px;"> -->
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Position</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">John Doe - 0123456789</p>
                                                    <p class="text-muted mb-0">john.doe@gmail.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">Admin</p>
                                            <p class="text-muted mb-0">VIP</p>
                                        </td>
                                        <td>
                                            <span class="badge badge-success rounded-pill d-inline">Active</span>
                                        </td>
                                        <td>Senior</td>
                                        <td>
                                            <button type="button" class="btn btn-link btn-sm btn-rounded">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle" alt="" style="width: 45px; height: 45px" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">Alex Ray - 08888888</p>
                                                    <p class="text-muted mb-0">alex.ray@gmail.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">User</p>
                                            <p class="text-muted mb-0">Silver</p>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary rounded-pill d-inline">Active</span>
                                        </td>
                                        <td>Junior</td>
                                        <td>
                                            <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle" alt="" style="width: 45px; height: 45px" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">Kate Hunington - 0987654321</p>
                                                    <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">User</p>
                                            <p class="text-muted mb-0">Gold</p>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning rounded-pill d-inline">Active</span>
                                        </td>
                                        <td>Senior</td>
                                        <td>
                                            <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">
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