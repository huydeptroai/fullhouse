@extends('admin.layout.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index')}}">Product</a></li>
                        <li class="breadcrumb-item active">Product Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">General information of product</h3>
            </div>

            <form action="{{route('admin.product.update', $product->product_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                <div class="row">
                    <!-- left-column cart -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="product_id">Product ID</label>
                                <input type="text" id="product_id" name="product_id" class="form-control" value="{{$product->product_id}}">
                            </div>
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" id="product_name" name="product_name" class="form-control" value="{{$product->product_name}}">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category 1</label>
                                <select id="category_id" name="category_id" class="form-control custom-select">
                                    @foreach($categories as $cate)
                                    <option value="{{$cate->category_id}}" @if($product->product_id === $cate->category_id) selected @endif>
                                        {{$cate->category_name_1." - ".$cate->category_name_2." (".$cate->category_id.")"}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="product_quantity">Quantity</label>
                                    <input type="number" id="product_quantity" name="product_quantity" class="form-control" value="{{$product->product_quantity}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="product_price">Unit price</label>
                                    <input type="number" step="0.01" min="0" id="product_price" name="product_price" class="form-control" value="{{$product->product_price}}">
                                </div>
                            </div>
                            <!-- Date and time -->
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="discount">Discount price</label>
                                    <input type="number" step="0.01" min="0" id="discount" name="discount" class="form-control" value="{{$product->discount}}">
                                </div>
                                <div class="form-group col-4">
                                    <label>From date:</label>
                                    <input type="datetime" name="date_from" class="form-control" />
                                </div>
                                <div class="form-group col-4">
                                    <label>From date:</label>
                                    <input type="datetime" name="date_from" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload file image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image[]" multiple>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- left-column cart end-->
                    <!-- right-column cart -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="product_material">Project material</label>
                                <input type="text" id="product_material" name="product_material" class="form-control" value="{{$product->product_material}}">
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="product_color">Project color</label>
                                    <input type="text" id="product_color" name="product_color" class="form-control" value="{{$product->product_color}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="product_size">Project size</label>
                                    <input type="text" id="product_size" name="product_size" class="form-control" value="{{$product->product_size}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_description">ProductDescription</label>
                                <textarea id="product_description" name="product_description" class="form-control" rows="4">{{$product->product_description}}</textarea>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input custom-control-input-danger" type="checkbox" id="featured" name="featured"  @if($product->featured === 1) checked @endif>
                                <label for="featured" class="custom-control-label"> Product Featured</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="cart-footer">
                            <div class="px-5 m-3">
                                <input type="reset" class="btn btn-secondary" style="width:120px" value="Cancel">
                                <input type="submit" value="Create" class="btn btn-warning float-right" style="width:120px">
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
@endsection