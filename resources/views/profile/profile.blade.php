@extends('fe.layout.master')

@section('myCss')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- IonIcons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- Theme style -->
<!-- <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}"> -->
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="col-12">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-warning card-outline">
                    <div class="card-body box-profile">


                        <!-- Profile Image -->
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ $user->getAvatar() ?? '' }}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{$user->name}}</h3>
                        <p class="text-muted text-center">{{$user->role === 1 ? 'Admin' : 'User'}}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Gender</b>
                                <a class="float-right">
                                    {{$user->getGender() ?? "" }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Data of birth</b>
                                <a class="float-right">
                                    {{ $user->getDob() }}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Created at</b>
                                <a class="float-right">
                                    @isset($user->created_at)
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d-m-Y') }}
                                    @endisset
                                </a>
                            </li>
                        </ul>
                        <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- Update Password -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input class="form-control" type="password" name="current_password" placeholder="current password">
                                <small>{{$errors->updatePassword->first('current_password') }}</small>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="new password">
                                <small>{{$errors->updatePassword->first('password') }}</small>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation" placeholder="password_confirmation">
                                <small>{{$errors->updatePassword->first('password_confirmation') }}</small>
                            </div>

                            <div class="flex items-center gap-4 mt-2">
                                <button class="btn btn-primary btn-block" type="submit">{{ __('Save') }}</button>

                                @if (session('status') === 'password-updated')
                                <p data="{ show: true }" show="show" transition init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">

                    @if (session('status') === 'profile-updated')
                    <h4 class="text-sm text-info">{{ __('Saved change.') }}</h4>
                    @endif

                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Comment</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Order history</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit information</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                @forelse($user->reviews as $review)
                                <hr>
                                <div class="time-label">
                                    <span class="bg-danger"><i class="far fa-clock"></i>
                                        @isset($user->created_at)
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->created_at)->format('d-m-Y')}}
                                        @endisset
                                    </span>
                                </div>
                                <div class="post clearfix">
                                    <span class="col-sm-3">
                                        <img class="img-circle img-bordered-sm" src="{{  asset('assets/img/upload/product/'.$review->product->product_image['0']) }}" alt="user image" height="100" width="100">

                                    </span>
                                    <!-- /.user-block -->
                                    <span class="col-sm-9">
                                        <p>
                                            <span>
                                                <a href="{{ route('productDetail',['product_slug' => $review->product->product_slug]) }}">
                                                    <b>{{$review->product->product_name}} - {{$review->product_id}}</b>
                                                </a>
                                                <a href="#" class="btn"><i class="fas fa-times"></i></a>
                                            </span>
                                            <br>
                                            <span class="description">Create at -
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->created_at)->diffForHumans()}}
                                            </span>
                                        </p>

                                        <p>@if($review->product->avgRating() > 0)

                                        <div class="col-12" style="display:flex-item;font-size:12px;">
                                            <strong>Rating: {{number_format( $review->rating,2) }} </strong>
                                            @for($i=1; $i<=5; $i++) @php $color=($i <=$review->rating) ? "color: #ffcc00;" : "color: #ccc;";
                                                @endphp
                                                <i class="fa fa-star" aria-hidden="true" style="cursor:pointer;<?php echo $color ?> font-size:15px;"></i>
                                                @endfor

                                        </div>
                                        @endif</p>

                                        <b>Comment:</b>
                                        <p>{{$review->content}}</p>
                                    </span>

                                    <!-- <p>
                                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>

                                        <span class="float-right">
                                            <a href="#" class="link-black text-sm">
                                                <i class="far fa-comments mr-1"></i> Comments (5)
                                            </a>
                                        </span>
                                    </p>

                                    <form class="form-horizontal">
                                        <div class="input-group input-group-sm mb-0">
                                            <input class="form-control form-control-sm" placeholder="Response">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-danger">Send</button>
                                            </div>
                                        </div>
                                    </form> -->

                                </div>
                                @empty
                                <div class="post">No data</div>
                                @endforelse
                                <!-- /.post -->

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                @forelse($user->orders as $order)
                                <div class="timeline timeline-inverse mt-4">

                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-danger"><i class="far fa-clock"></i>
                                            @isset($user->created_at)
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d-m-Y')}}
                                            @endisset
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <div class="timeline-item">
                                            <h4 class="timeline-header">
                                                <a href="#">Order id {{$order->id}}</a>
                                                @php
                                                $c = $order->status === 6 ? "color:red;" : "color:green;";
                                                @endphp
                                                <div style="<?php echo $c ?> text-align:right;">
                                                    Order Status: <b>{{ $order->getShippingStatus()}}</b>
                                                </div>
                                            </h4>
                                            <div class="timeline-body">
                                                <table class="table table-striped table-inverse table-responsive">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th colspan="2">Info order</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Name:</th>
                                                            <td>{{$order->receiver_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone:</th>
                                                            <td>{{$order->receiver_phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping to:</th>
                                                            <td>{{$order->shipping_address}}, {{$order->shipping_district}}, {{$order->shipping_city}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Order Details</th>
                                                            <td>
                                                                @if(isset($order->orderDetails) && is_object($order->orderDetails))

                                                                <table class="table table-bordered table-striped table-inverse table-responsive">
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
                                                                            <td>$ {{number_format($od->amount(),2)}}</td>
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
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping fee:</th>
                                                            <td> $ {{ number_format($order->shipping_fee,2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Coupon:</th>
                                                            <td>{{$order->coupon}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Payment Status:</th>
                                                            <td><b>{{ $order->getPaymentStatus()}}</b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                </div>
                                @empty
                                <p>No orders</p>
                                @endforelse


                            </div>
                            <!-- /.tab-pane -->
                            <!-- edit profile -->
                            <div class="tab-pane" id="settings">

                                <header>
                                    <h2 class="text-lg font-medium text-gray-900">
                                        {{ __('Profile Information') }}
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600">
                                        {{ __("Update your account's profile information and email address.") }}
                                    </p>
                                </header>
                                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                    @csrf
                                </form>

                                <form class="form-horizontal" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Avatar</label>
                                        <div class="col-sm-5 input-group custom-file">
                                            <input type="file" class="custom-file-input" id="avatar" name="avatar" value="{{old('avatar')}}">
                                            <small class="mt-2">{{$errors->first('avatar')}}</small>
                                        </div>
                                        <div class="col-sm-5" id=image-grid></div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name)}}" placeholder="Name" required>
                                            <small class="mt-2">{{$errors->first('name')}}</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email)}}" placeholder="Email" required>
                                            <small class="mt-2">{{$errors->first('email')}}</small>
                                        </div>

                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                        <div>
                                            <p class="text-sm mt-2 text-gray-800">
                                                {{ __('Your email address is unverified.') }}

                                                <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    {{ __('Click here to re-send the verification email.') }}
                                                </button>
                                            </p>

                                            @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                            @endif
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone)}}" placeholder="Phone" required>
                                            <small class="mt-2">{{$errors->first('phone')}}</small>
                                        </div>
                                    </div>


                                    <div class="form-group row align-items-center">
                                        <label for="" class="col-sm-2 col-form-label">Birthday:</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control-date" id="dob" name="dob" value="{{ old('dob', $user->getDob() ?? '') }}">
                                            <small class="mt-2">{{$errors->first('phone')}}</small>
                                        </div>
                                    </div>

                                    @php
                                    $male = $user->getGender() === 'Male' ? 'checked' : '';
                                    $female = $user->getGender() === 'Female' ? 'checked' : '';
                                    $male = $female === 'checked' ? '' : 'checked';
                                    @endphp

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10 row align-items-center">
                                            <div class="row-in-form">
                                                <label class="checkbox-field">
                                                    <input name="gender" id="male" value="Male" type="checkbox" {{$male}} />
                                                    <span> Male</span>
                                                </label>
                                                <label class="checkbox-field">
                                                    <input name="gender" id="female" value="Female" type="checkbox" {{$female}} />
                                                    <span> Female</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <select name="" id="">
                                        <option value="" selected disabled>Select Country</option>
                                        <option value="" selected disabled>Select Country</option>
                                        <option value="" selected disabled>Select Country</option>
                                        <option value="" selected disabled>Select Country</option>
                                        <option value="" selected disabled>Select Country</option>
                                    </select>

                                    <!-- address -->
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-3">
                                            <select class="use-chosen choose city" name="city" id="city" value="{{ old('city')}}">
                                                <option>---City/Province---</option>
                                                @foreach($provinces as $item)
                                                <option value="{{$item->code}}">{{$item->full_name_en}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <select class="form-control province choose" name="district" id="district" value="{{ old('district')}}">
                                                <option selected>---District---</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="ward" id="ward" value="{{ old('ward')}}" required>
                                                <option>--- Ward ---</option>
                                            </select>
                                        </div>
                                    </div>



                                    <!-- submit -->
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Update</button>
                                        </div>

                                        @if (session('status') === 'profile-updated')
                                        <p data="{ show: true }" show="show" transition init="setTimeout(() => show = false, 2000)" class="text-sm text-info">{{ __('Saved change.') }}</p>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <!-- /.edit profile end-->

                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('myJS_profile')
<!-- jQuery -->
<script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Page specific script -->
<script>
    $(document).ready(function(e) {
        const imageGrid = document.getElementById('image-grid');
        $('#avatar').change(function(e) {
            const files = e.target.files;
            let reader = new FileReader();
            for (const file of files) {
                const img = document.createElement('img');
                imageGrid.appendChild(img);
                img.src = URL.createObjectURL(file);
                img.alt = file.name;
                img.style.width = '85px';
                img.style.height = '85px';
                img.classList.add('profile-user-img', 'img-fluid', 'img-circle');
            }
            //<img class="profile-user-img img-fluid img-circle" src="{{ asset('admin/dist/img/'.'user1-128x128.jpg') }}" alt="User profile picture">
        });
    });
</script>

<!-- ajax address -->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.choose').change(function() {
            var action = $(this).attr('id');
            var code = $(this).val();
            var result = '';
            result = action == 'city' ? 'district' : 'ward';
            console.log('action ' + action + ' code ' + code + ' result ' + result);
            $.ajax({
                url: "{{ url('/select-delivery')}}",
                method: 'POST',
                data: {
                    action: action,
                    code: code
                },
                success: function(data) {
                    console.log(data);
                    $('#' + result).html(data);

                }
            })
        });


    });
</script>
@endsection