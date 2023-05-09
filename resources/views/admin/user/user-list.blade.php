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
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
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

                    @if ($message = Session::get('deleted'))
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @endif

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
                                        <th>Create Account</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.user.show', $user->id)}}">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('admin/dist/img/'.$user->profile['avatar']) }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-1">{{$user->name}} - {{$user->phone}}</p>
                                                        <p class="text-muted mb-0">{{$user->email}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">{{$user->role == 1 ? 'Admin' : 'User'}}</p>
                                            <!-- <p class="text-muted mb-0">VIP</p> -->
                                        </td>
                                        <td>
                                            <span class="badge badge-success rounded-pill d-inline">Active</span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->diffForHumans()}}</td>
                                        
                                    </tr>

                                    @empty
                                    <tr>
                                        <td>No data</td>
                                    </tr>
                                    @endforelse


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">
                                            <a href="#">Create new</a>
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