@extends('admin.layout.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li> -->
                        <li class="breadcrumb-item active"><a href="{{ route('admin.category.index')}}">Category</a></li>
                        <li class="breadcrumb-item active">Category Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content mx-md-3">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">General information of category</h3>
            </div>

            <form action="{{ Route('admin.category.update', $category->category_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                <div class="row">
                    <!-- left-column cart -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_id">Category ID</label>
                                <input type="text" id="category_id" name="category_id" class="form-control" value="{{$category->category_id}}">
                            </div>
                            <div class="form-group">
                                <label for="category_name_1">Category Name 1</label>
                                <input type="text" id="category_name_1" name="category_name_1" class="form-control" value="{{$category->category_name_1}}">
                            </div>
                            <div class="form-group">
                                <label for="category_name_2">Category Name 2</label>
                                <input type="text" id="category_name_2" name="category_name_2" class="form-control" value="{{$category->category_name_2}}">
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- left-column cart end-->
                    <!-- right-column cart -->
                    <div class="col-md-6">
                        <div class="card-body">
                            @if($category->category_image != null)
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/upload/category/'.$category->category_image)}}" alt="" style="width: 45px; height: 45px" class="rounded-circle">
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="product_image">File image input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="category_image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file image</label>
                                    </div>
                                </div>
                                <div id=image-grid></div>
                            </div>
                            <div class="form-group">
                                <label for="category_intro">Category description</label>
                                <textarea id="category_intro" name="category_intro" class="form-control" rows="4">{{$category->category_intro}}</textarea>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="cart-footer">
                            <div class="px-5 m-3">
                                <input type="submit" value="Update" class="btn btn-success float-right" style="width:150px">
                            </div>
                        </div>
                    </div>
                    <!-- right-column cart end-->
                </div>
                <!-- button action -->

                <!-- button action end -->
            </form>

        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('myJS01')
<!-- bs-custom-file-input -->
<script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endsection

@section('myJS02')
<!-- Page specific script -->
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<script>
    $(document).ready(function(e) {
        const imageGrid = document.getElementById('image-grid');
        $('#image').change(function(e) {
            const files = e.target.files;
            let reader = new FileReader();
            for (const file of files) {
                const img = document.createElement('img');
                imageGrid.appendChild(img);
                img.src = URL.createObjectURL(file);
                img.alt = file.name;
                img.style.width = '85px';
                img.style.height = '85px';
            }
        });
    });
</script>
@endsection