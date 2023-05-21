@extends('admin.layout.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Product</a></li>
            <li class="breadcrumb-item active">{{$product->product_slug}}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none">{{$product->product_name}}</h3>

            <div class="d-flex flex-column justify-content-around align-content-center">
              <div class="col-12">
                <img src="{{ asset('assets/img/upload/product/'.$product->product_image['0'])}}" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs mb-0">
                @foreach($product->product_image as $pImage)
                <div class="product-image-thumb"><img src="{{ asset('assets/img/upload/product/'.$pImage)}}" alt="Product Image" style="width:200px;height:auto;"></div>
                @endforeach
              </div>
            </div>

          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3">{{$product->product_name}}</h3>
            <!-- <p>{{ $product->product_description}}</p> -->

            <hr>
            <h4>Available Colors</h4> {{$product->product_color}}

            <h4 class="mt-3">Size 
            </h4> {{$product->product_size}}

            <div class="bg-gray py-2 px-3 mt-4">
              <h2 class="mb-0">
                <p class="fw-bold mb-1"> $ {{$product->product_price - $product->discount}}</p>
                @if($product->discount > 0)
                <p class="text-muted mb-0">$ <del>{{$product->product_price}}</del></p>
                @endif
              </h2>
              <h4 class="mt-0">
                <small>Include Tax</small>
              </h4>
            </div>


          </div>
        </div>
        <div class="row mt-4">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
              <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
              <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
            </div>
          </nav>
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              {{$product->product_description}}

            </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
              
            </div>
            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
              
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('myJS02')
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
@endsection