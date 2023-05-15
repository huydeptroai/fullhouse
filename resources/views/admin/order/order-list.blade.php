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
                    <h1>Manager Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
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
                            <table id="order1" class="table table-head-fixed table-bordered table-striped table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width:20px;">No</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>{{$order->id}}</td>
                                        <td>
                                            @isset($order->order_date)
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->order_date)->format('d/m/Y')}}
                                            @endisset
                                        </td>
                                        <td>
                                            <p>{{$order->receiver_name}}</p>
                                            <p>{{$order->receiver_phone}}</p>
                                            <p>{{$order->shipping_address}}, {{$order->shipping_district}}, {{$order->shipping_city}}</p>
                                        </td>
                                       
                                        <td>{{$order->status == 0 ? 'Processing' : 'Shipped'}}</td>
                                        <td>{{$order->note}}</td>
                                        <td>Edit</td>
                                    </tr>
                                    <tr class="expandable-body">
                                        <td colspan="6">
                                            <div style="max-width:100vw;overflow-x:auto;">
                                                @if(isset($order->orderDetails) && is_object($order->orderDetails))
                                                <table class="table table-bordered table-striped table-inverse">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Product</th>
                                                            <th>Unit price</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($order->orderDetails as $k=>$od)
                                                        <tr>
                                                            <td>{{$k + 1}}</td>
                                                            <td>
                                                                <p>{{$od->product->product_name}}</p>
                                                                <p>
                                                                    {{$od->product->product_id}} -
                                                                </p>
                                                            </td>
                                                            <td>{{$od->quantity}}</td>
                                                            <td>$ {{number_format($od->price,2)}}</td>
                                                            <td>$ {{number_format($od->quantity * $od->price,2)}}</td>
                                                        </tr>

                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="4" class="text-right">Total Amount</th>
                                                            <th>$ {{number_format( $order->getTotal(),2) }}</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No orders</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Simple Full Width Table</h3>

                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Task</th>
                                        <th>Progress</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Update software</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">55%</span></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Clean database</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">70%</span></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Cron job running</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">30%</span></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Fix and squish bugs</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-success" style="width: 90%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">90%</span></td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Fix and squish bugs</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-success" style="width: 90%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">90%</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Status</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Task</th>
                                        <th>Range</th>
                                        <th style="width: 50px">Count_Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Progress</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">55%</span></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Confirm</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning" style="width: 70%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">70%</span></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Shipped</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">30%</span></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Payment</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-success" style="width: 90%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">90%</span></td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Cancel</td>
                                        <td>
                                            <div class="progress progress-xs progress-striped active">
                                                <div class="progress-bar bg-danger" style="width: 10%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">10%</span></td>
                                    </tr>
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

        </div><!-- /.container-fluid -->
    </section>
</div>
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
        $("#order1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#order1_wrapper .col-md-6:eq(0)');
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