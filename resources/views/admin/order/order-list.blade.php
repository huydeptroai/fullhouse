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
                    <h1>Order List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li> -->
                        <li class="breadcrumb-item active">Manager Order</li>
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
                            <h3 class="card-title">Table order list</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-head-fixed table-bordered table-striped table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Order date</th>
                                        <th>Customer</th>
                                        <th>Shipping to</th>
                                        <th>Total Order</th>
                                        <th>Order Status</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td><a href="{{ route('admin.order.invoice', $order->id)}}">{{$order->id}}</a></td>
                                        <td>
                                            {{$order->order_date}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.show', $order->user->id)}}">
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-1">
                                                            {{$order->user->name}} - {{$order->user->phone}} <br>
                                                            {{$order->user->email}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.order.invoice', $order->id)}}">
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-3">
                                                        {{$order->receiver_name}} <br>
                                                        {{$order->receiver_phone}} <br>
                                                        {{$order->shipping_address}}, {{$order->shipping_district}}, {{$order->shipping_city}}
                                                    </div>
                                                </div>
                                            </a>

                                        </td>
                                        <td>$ {{number_format($order->getTotal(),2)}}</td>

                                        <td>
                                            @php $badge_ss = $order->status === 6 ? 'badge-danger' : 'badge-success'; @endphp

                                            <span class="badge {{$badge_ss}} rounded-pill d-inline">{{$order->getShippingStatus() }}</span>
                                        </td>
                                        <td>
                                            {{$order->getPaymentMethod() }}
                                        </td>
                                        <td>
                                            @php $badge_ps = $order->payment_status === 1 ? 'badge-danger' : 'badge-success'; @endphp

                                            <span class="badge {{$badge_ps}} rounded-pill d-inline">{{$order->getPaymentStatus() }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <a class="btn btn-info" href="{{ route('admin.order.invoice', $order->id)}}" data-id="{{$order->id}}">
                                                    <svg style="width:20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                    </svg>
                                                    Edit
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
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