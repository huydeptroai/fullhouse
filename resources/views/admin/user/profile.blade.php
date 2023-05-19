@extends('admin.layout.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index')}}">User</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{$user->getAvatar() ?? '' }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">{{$user->role == 1 ? 'Admin' : 'User'}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Gender</b>
                                    <a class="float-right">
                                        {{$user->getGender() ?? "" }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Data of birth</b> <a class="float-right">
                                        {{ $user->getDob() }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Account created at</b>
                                    <a class="float-right">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d/m/Y')}}
                                    </a>
                                </li>
                            </ul>

                            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    @if ($errors->userDeletion->isNotEmpty())
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->userDeletion->first('password') }}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Order history</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Information of User</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- The timeline -->
                                    @forelse($user->orders as $order)
                                    <div class="timeline timeline-inverse mt-4">

                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger"><i class="far fa-clock"></i>
                                                @isset($user->created_at)
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->order_date)->format('d/m/Y')}}
                                                @endisset
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <div class="timeline-item">
                                                <h4 class="timeline-header"><a href="#">Order id {{$order->id}}</a></h4>
                                                <div class="timeline-body">
                                                    <table class="table table-striped table-inverse table-responsive">
                                                        <thead class="thead-inverse">
                                                            <tr>
                                                                <th>Info order</th>
                                                                <th>
                                                                    Status: <b>{{ $order->status == 0 ? 'processing' : 'shipped'}}</b>
                                                                </th>
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
                                                                <th class="col-sm-2">Order Details</th>
                                                                <td>
                                                                    @if(isset($order->orderDetails) && is_object($order->orderDetails))

                                                                    <table class="table table-bordered table-striped table-inverse table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No</th>
                                                                                <th>Product</th>
                                                                                <th>Price</th>
                                                                                <th>Quantity</th>
                                                                                <th>Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($order->orderDetails as $k=>$od)
                                                                            <tr>
                                                                                <td>{{$k + 1}}</td>
                                                                                <td>
                                                                                    <p>{{$od->product->product_name}} -
                                                                                        {{$od->product->product_id}}
                                                                                    </p>

                                                                                </td>
                                                                                <td>{{$od->quantity}}</td>
                                                                                <td>$ {{number_format($od->price,2)}}</td>
                                                                                <td>$ {{number_format($od->quantity * $od->price,2)}}</td>
                                                                            </tr>

                                                                            @endforeach
                                                                        </tbody>
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
                                                                <td>{{$order->coupon_id}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Note:</th>
                                                                <td>{{$order->note}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <a href="{{ route('admin.order.invoice', $order->id)}}" class="link-black text-sm mr-2">
                                                        <i class="fas fa-share mr-1"></i> Invoice
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                    </div>
                                    @empty
                                    <p>No orders</p>
                                    @endforelse

                                </div>

                                <!-- info profile -->
                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
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
                                                <p class="text-sm mt-2 text-secondary">
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
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Birthday:</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $user->getDob() ?? '')}}">
                                            </div>
                                        </div>
                                        @php
                                        $male = $user->getGender() === 'Male' ? 'checked' : '';
                                        $female = $user->getGender() === 'Female' ? 'checked' : '';

                                        @endphp

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Gender</label>
                                            <div class="col-sm-10 row align-items-center">
                                                <div class="custom-control custom-radio">

                                                    <input class="custom-control-input" type="radio" name="gender" value="Male" {{$male}}>
                                                    <label for="customRadio1" class="custom-control-label">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio ml-3">
                                                    <input class="custom-control-input" type="radio" name="gender" value="Female" {{$female}}>
                                                    <label for="customRadio2" class="custom-control-label">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                {{$user->getWard()}},
                                                {{$user->getDistrict()}},
                                                {{$user->getCity()}},
                                            </div>

                                        </div>

                                    </form>

                                    <hr>

                                    <!-- delete account -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Delete account</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <p class="mt-1 text-sm">
                                                {{ __('Once this account is deleted, all of its resources and data will be permanently deleted. Before deleting this account, please download any data or information that you wish to retain.') }}
                                            </p>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_delete" onclick.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                                                Delete Account
                                            </button>

                                            <!-- <div name="confirm-user-deletion" show="$errors->userDeletion->isNotEmpty()" focusable> -->
                                            <div name="confirm-user-deletion" focusable>
                                                <div class="modal fade" id="modal_delete">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header alert-danger">
                                                                <h4 class="modal-title">
                                                                    Delete Account
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="post" action="{{ route('admin.user.destroy', $user->id) }}" class="p-6">
                                                                @csrf
                                                                @method('delete')
                                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                                <div class="modal-body">
                                                                    <h2 class="text-lg font-medium text-gray-900">
                                                                        Are you sure you want to delete this account?
                                                                    </h2>
                                                                    <p class="mt-1 text-sm text-gray-600">
                                                                        Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                                                                    </p>
                                                                    <div class="mt-6 form-group row">
                                                                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="password" class="form-control" name="password" placeholder="Enter admin's password">
                                                                            <small class="text-danger">{{$errors->userDeletion->first('password')}}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger ml-3">Delete Account</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- delete account end -->



                                </div>
                                <!-- /.info profile end-->

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection