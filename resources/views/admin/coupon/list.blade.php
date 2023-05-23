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
                    <h1>Coupons List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li> -->
                        <li class="breadcrumb-item active">Coupons</li>
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
                            <h3 class="card-title">Table coupons</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-head-fixed table-bordered table-striped table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>Value</th>
                                        <th>Status</th>
                                        <th>Times</th>
                                        <th>Value_Order</th>
                                        <th>Used</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="coupon-crud">
                                    @forelse($coupons as $item)
                                    <tr id="coupon_id_{{$item->id}}">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->code}}</td>
                                        <td>{{$item->value}}</td>
                                        <td>{{$item->status === 1 ? 'active' : ''}}</td>
                                        <td>{{$item->times}}</td>
                                        <td>{{$item->value_order}}</td>
                                        <td>{{$item->orders->count('*') ?? 0}}</td>

                                        <td>
                                            <div class="row px-3 justify-content-center">
                                                <a class="btn btn-info mr-2" href="#" id="edit-coupon" data-id="{{$item->id}}">Edit</a>
                                                <a class="btn btn-danger" href="#" id="delete-coupon" data-id="{{$item->id}}"> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">
                                            <p>You don't have code coupon</p>
                                        </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="7">
                                            <a class="btn btn-success" href="#" id="create-new-coupon">Create new Coupon</a>
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

        <!-- mode -->
        <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="couponCrudModal"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="couponForm" name="couponForm">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id" value="">
                            <div class="row">
                                <!-- left-column cart -->
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="category_id">Code Coupon</label>
                                            <input type="text" id="code" name="code" class="form-control" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name_1">Value Coupon</label>
                                            <input type="number" step="0.01" min="0" id="value" name="value" class="form-control" value="" required>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input custom-control-input-danger" type="checkbox" id="status" name="status" checked="">
                                            <label for="status" class="custom-control-label">Coupon status</label>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- left-column cart end-->
                                <!-- right-column cart -->
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5>Conditions of coupon</h5>
                                        <div class="form-group">
                                            <label for="category_name_1">Times</label>
                                            <input type="number" step="1" min="0" id="times" name="times" class="form-control" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name_1">Value Order</label>
                                            <input type="number" step="0.01" min="0" id="value_order" name="value_order" class="form-control" value="" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- right-column cart end-->
                            </div>
                            <!-- button action -->
                            <!-- button action end -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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

<!-- CRUD script -->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //create new
        $('#create-new-coupon').click(function() {
            $('#btn-save').val("create-coupon");
            $('#couponForm').trigger("reset");
            $('#couponCrudModal').html("Add New Coupon");
            $('#ajax-crud-modal').modal('show');
        });

        //edit record
        $('body').on('click', '#edit-coupon', function() {
            var id = $(this).data('id');
            $.get('coupon/' + id + '/edit', function(data) {
                $('#couponCrudModal').html("Edit coupon");
                $('#btn-save').val("edit-coupon");
                $('#ajax-crud-modal').modal('show');
                //add value to input
                $('#id').val(data.id);
                $('#code').val(data.code);
                $('#value').val(data.value);

                data.status == 1 ? $('#status').prop('checked', true) : $('#status').prop('checked', false);

                $('#times').val(data.times);
                $('#value_order').val(data.value_order);
            });
        });
        //delete record
        $('body').on('click', '#delete-coupon', function() {
            var id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/coupon')}}" + '/' + id,
                success: function(data) {
                    $("#coupon_id_" + id).remove();
                },
                error: function(data) {
                    // console.log('Error:', data);
                    console.log(JSON.stringify(data));
                }
            });
        });

        if ($('#couponForm').length > 0) {
            $('#couponForm').submit(function(form) {
                var actionType = $('#btn-save').val();

                $('#btn-save').html('Sending..');

                let url_store = "{{ route('admin.coupon.store') }}";

                $.ajax({
                    data: $('#couponForm').serialize(),
                    url: url_store,
                    type: "POST",
                    dataType: "json",
                    success: function(data) {

                        var coupon = `<tr id="coupon_id_${data.id}">
                                <td>${data.id}</td>
                                <td>${data.code}</td>
                                <td>${data.value}</td>
                                <td>${data.status}</td>
                                <td>${data.times}</td>
                                <td>${data.value_order}</td>
                                <td>
                                <div class="row px-3 justify-content-center">
                                <a class="btn btn-info" href="#" id="edit-coupon" data-id="${data.id}">Edit</a>
                                <a class="btn btn-danger" href="#" id="delete-coupon" data-id="${data.id}"> Delete</a>
                                </div>
                                </td>
                                </tr>`;

                        if (actionType == "create-coupon") {
                            // $('#coupon-crud').prepend(coupon);
                            $('#coupon-crud').append(coupon);

                        } else {
                            $("#coupon_id_" + data.id).replaceWith(coupon);
                            
                        }

                        $('#couponForm').trigger("reset");
                        $('#ajax-crud-modal').modal('hide');
                        $('#btn-save').html('Save Changes');
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#btn-save').html('Save Changes');
                    }
                });
            });
        }
    });
</script>
<!--/ CRUD script -->

@endsection