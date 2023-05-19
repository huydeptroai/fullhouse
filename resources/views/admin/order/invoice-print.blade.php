@extends('admin.layout.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Full house, Inc.
                                    <small class="float-right">Date:
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $order->order_date)->format('d/m/Y')}}
                                    </small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Full house, Inc.</strong><br>
                                    391a Nam Ky Khoi Nghia Street<br>
                                    District 3, HCM City<br>
                                    Phone: (84) 12346789 <br>
                                    Email: fullhouse@gmail.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{strtoupper($order->user->name)}}</strong><br>
                                    Phone: {{$order->receiver_phone}} <br>
                                    {{ $order->user->getWard() }}
                                    {{ $order->user->getDistrict() }}<br>
                                    {{ $order->user->getCity() }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice: {{$order->id}}</b><br>
                                <br>
                                <b>Order ID:</b> FH{{$order->id}}<br>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th style="width: 300px;">Product</th>
                                            <th>Code</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderDetails as $k=>$od)
                                        <tr>
                                            <td>{{$k + 1}}</td>
                                            <td>{{$od->product->product_name}}</td>
                                            <td>{{$od->product->product_id}}</td>
                                            <td>{{$od->quantity}}</td>
                                            <td>$ {{number_format($od->price,2)}}</td>
                                            <td>$ {{number_format($od->quantity * $od->price,2)}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6">Note: {{$order->note}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <form action="{{route('admin.order.update', $order->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$order->id}}">
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <b class="lead">Order Status:</b>
                                    <div class="form-group">
                                        <label for="">Shipping status:</label>
                                        <select class="custom-select" name="status" id="status" @if($order->status === 5) disabled @endif
                                            >
                                            <option value="1" @if($order->status === 1) selected @endif>1 - Order received</option>
                                            <option value="2" @if($order->status === 2) selected @endif>2 - Confirmed</option>
                                            <option value="3" @if($order->status === 3) selected @endif>3 - Packaging process</option>
                                            <option value="4" @if($order->status === 4) selected @endif>4 - Package on delivery</option>
                                            <option value="5" @if($order->status === 5) selected @endif>5 - Package received</option>
                                            <option value="6" @if($order->status === 6) selected @endif>6 - Cancel</option>
                                        </select>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Payment method:</label>
                                                <select class="custom-select" name="payment_method" id="payment_method" @if($order->payment_status === 2) disabled @endif >
                                                    <option value="1" @if($order->payment_method === 1) selected @endif>COD</option>
                                                    <option value="2" @if($order->payment_method === 2) selected @endif>PayPal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Payment Status:</label>
                                                <select class="custom-select" name="payment_status" id="payment_status" @if($order->payment_status === 2) disabled @endif
                                                    >
                                                    <option value="1" @if($order->payment_status === 1) selected @endif>Not yet</option>
                                                    <option value="2" @if($order->payment_status === 2) selected @endif>Finished</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-6 px-4">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>$ {{number_format($order->getTotal(),2) }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">Discount (coupon):</th>
                                                <td>($ {{number_format($order->getValueCoupon(),2) }})</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping fee:</th>
                                                <td>$ {{number_format($order->shipping_fee,2)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <th>$ {{number_format($order->getTotal(),2)}}</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="{{ route('admin.order.printInvoice',['order_id'=>$order->id])}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                    <a href="{{ route('admin.order.index')}}" type="button" class="btn btn-default float-right">
                                        Back order list
                                    </a>
                                    <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        Submit edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.control-sidebar -->
@endsection

@section('myJS02')
<script>
    window.addEventListener("load", window.print());
</script>
@endsection