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
                            <table id="laravel_crud" class="table table-head-fixed table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th style="width:10px;">Category_No</th>
                                        <th>Image</th>
                                        <th>Category 1</th>
                                        <th>Category 2</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="cates-crud">
                                    @foreach($cates as $item)
                                    <tr id="cate_id_{{$item->category_id}}" data-widget="expandable-table" aria-expanded="false">
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
                                                <a class="btn btn-info" href="#" id="edit-cate" data-id="{{$item->category_id}}">Edit</a>
                                                <a class="btn btn-danger" href="#" id="delete-cate" data-id="{{$item->category_id}}"> Delete</a>


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
                                            <a href="#" class="btn btn-success mb-2" id="create-new-cate">Create new Category</a>
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

        <!-- mode create-category -->
        <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="cateCrudModal"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="cateForm" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <!-- left-column cart -->
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="category_id">Category ID</label>
                                            <input type="text" id="category_id" name="category_id" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name_1">Category Name 1</label>
                                            <input type="text" id="category_name_1" name="category_name_1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name_2">Category Name 2</label>
                                            <input type="text" id="category_name_2" name="category_name_2" class="form-control">
                                        </div>


                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- left-column cart end-->
                                <!-- right-column cart -->
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="product_image">File image input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="product_image" name="category_image">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file image</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_intro">Category description</label>
                                            <textarea id="category_intro" name="category_intro" class="form-control" rows="4"></textarea>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <!-- right-column cart end-->
                            </div>
                            <!-- button action -->

                            <!-- button action end -->
                        </form>


                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-save" value="create">Save</button>
                    </div>
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
<!-- CRUD script -->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //create new
        $('#create-new-cate').click(function() {
            $('#btn-save').val("create-cate");
            $('#cateForm').trigger("reset");
            $('#cateCrudModal').html("Add New Category");
            $('#ajax-crud-modal').modal('show');
        });
        //edit record
        $('body').on('click', '#edit-cate', function() {
            var category_id = $(this).data('id');
            $.get('admin/category/' + category_id + '/edit', function(data) {
                $('#cateCrudModal').html("Edit cate");
                $('#btn-save').val("edit-cate");
                $('#ajax-crud-modal').modal('show');
                $('#category_id').val(data.category_id);
                $('#category_name_1').val(data.category_name_1);
                $('#category_name_2').val(data.category_name_2);
                $('#category_intro').val(data.category_intro);
            });
        });
        //delete record
        $('body').on('click', '.delete-cate', function() {
            var category_id = $(this).data("id");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/category')}}" + '/' + category_id,
                success: function(data) {
                    $("#cate_id_" + category_id).remove();
                },
                error: function(data) {
                    // console.log('Error:', data);
                    console.log(JSON.stringify(data));
                }
            });
        });
    });

    if ($("#cateForm").length > 0) {

        var actionType = $('#btn-save').val();

        $('#btn-save').html('Sending..');

        $.ajax({
            data: $('#postForm').serialize(),
            url: "{{ route('admin.category.store') }}",
            type: "POST",
            dataType: "json",
            success: function(data) {
                var image = 'assets/img/upload/category/' + data.category_image;

                var cate = `<tr id="cate_id_${data.category_id}" data-widget="expandable-table" aria-expanded="false">`;
                cate += `<td>${data.category_id}</td>`;
                cate += `<td><div class="d-flex align-items-center">`;
                cate += `<img src="{{ asset('${image}') }}" alt="" style="width: 45px; height: 45px" class="rounded-circle"></div></td>`;
                cate += `<td>${data.category_name_1}</td>`;
                cate += `<td>${data.category_name_2}</td>`;
                cate += `<td><div class="row px-3 justify-content-center">`;
                cate += `<a class="btn btn-info" href="#" id="edit-cate" data-id="${data.category_id}">Edit</a>`;
                cate += `<a class="btn btn-danger" href="#" id="delete-cate" data-id="${data.category_id}"> Delete</a></div>`;
                cate += `</td></tr>`;


                if (actionType == "create-cate") {
                    $('#cates-crud').prepend(cate);
                    
                } else {
                    $("#cate_id_" + data.id).replaceWith(cate);
                }

                $('#cateForm').trigger("reset");
                $('#ajax-crud-modal').modal('hide');
                $('#btn-save').html('Save Changes');
            },
            error: function(data) {
                console.log('Error:', data);
                $('#btn-save').html('Save Changes');
            }
        });


    }
</script>
<!--/ CRUD script -->
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