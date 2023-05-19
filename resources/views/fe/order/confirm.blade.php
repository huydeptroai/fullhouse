@extends('fe.layout.master')

@section('myCss')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
@endsection

@section('title', 'Order')
@section('content')
<!--main area-->
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Confirm Order</span></li>
            </ul>
        </div>
    </div>

    <div class="container pb-60">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Thank you for your order</h2>
                <p>Date: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $order->order_date)->format('d/m/Y')}}</p>
                <hr>
                <div class="row">
                    @if(\Session::has('error'))
                    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    {{ \Session::forget('error') }}
                    @endif
                    @if(\Session::has('success'))
                    <div class="alert alert-success">{{ \Session::get('success') }}</div>
                    {{ \Session::forget('success') }}
                    @endif
                </div>
                <!-- info row -->
                <div class="row invoice-info text-left">
                    <div class="col-sm-4 invoice-col">
                        <p>Buyer:</p>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Name: </th>
                                    <td><strong>{{ strtoupper($order->user->name) }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{ $order->shipping_address }}, {{ $order->shipping_district }}, {{ $order->shipping_city }}</td>
                                </tr>
                                <tr>
                                    <th>Phone: </th>
                                    <td>{{$order->user->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$order->user->email}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <p>Shipping To:</p>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Name: </th>
                                    <td><strong>{{ strtoupper($order->receiver_name) }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{ $order->shipping_address }}, {{ $order->shipping_district }}, {{ $order->shipping_city }}</td>
                                </tr>

                                <tr>
                                    <th>Phone: </th>
                                    <td>{{$order->user->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$order->user->email}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <i>(Note: My staff will call to confirm before delivery)</i>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order ID:</th>
                                    <th style="width: 200px;">{{$order->id}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Subtotal Order:</th>
                                    <td style="font-size: 1.2em;text-align: right;"> $ {{ number_format($order->getSubtotal(),2) ?? 0}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping fee:</th>
                                    <td style="font-size: 1.2em;text-align: right;"> $ {{ number_format($order->shipping_fee,2) ?? 0 }}</td>
                                </tr>
                                @if(isset($order->coupon))
                                <tr>
                                    <th>Coupon:</th>
                                    <td style="font-size: 1.2em;text-align: right;">($ {{ number_format($order->getValueCoupon(),2) ?? 0 }})</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Total:</th>
                                    <th style="font-size: 2em;text-align: right;text-decoration: underline black double;"> $ {{ number_format($order->getTotal(),2) ?? 0 }}</th>

                                    @php
                                    $total_paypal = $order->getTotal();
                                    \Session::put('total_paypal', $total_paypal);
                                    @endphp
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        @if(\Session::get('success_paypal') == true)
                        <div class="alert alert-success" style="padding:9px;font-size: 1.2em;">The order had been paid</div>
                        {{ \Session::forget('success') }}
                        @else
                        <div style="border:1px dashed red;padding:9px;color:red;font-size:1.2em;">
                            The order has not been paid
                        </div>
                        @endif

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="text-align: center;">Product</th>
                                    <th>Code</th>
                                    <th>Unit price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderDetails as $k=>$od)
                                <tr>
                                    <td>{{$k + 1}}</td>
                                    <td>{{$od->product->product_name}}</td>
                                    <td>{{$od->product->product_id}}</td>
                                    <td>$ {{$od->price}}</td>
                                    <td>{{$od->quantity}}</td>
                                    <td>$ {{number_format($od->amount(),2)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row text-left">
                    
                        <div class="col-md-6">
                            @if(!Session::get('success_paypal') == true)
                            <div class="summary-item choose-payment-methods mt-3">
                                <h4 class="title-box f-title">Payment method</h4>
                                <div style="padding: 0 12px;">
                                    <label class="payment-method">
                                        <input name="payment_method" id="payment-method-visa" value="1" type="radio" checked>
                                        <span>COD</span>
                                    </label>
                                    <label class="payment-method">
                                        <input name="payment_method" id="payment-method-paypal" value="2" type="radio">
                                        <span>
                                            <img src="{{ asset('admin/dist/img/credit/paypal2.png')}}" alt="Paypal"> PayPal
                                        </span>
                                        <span class="payment-desc">
                                            <p><a class="btn btn-default m-3" href="{{ route('processTransaction') }}">Pay ${{\Session::get('total_paypal')}}</a></p>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-6" style="display: flex;flex-direction: column;justify-content:end;align-items: center;">
                            <a href="{{Route('updateStatusOrder', ['order_id'=>$order->id])}}" type="submit" class="btn btn-success" style="width:200px;padding:10px;">Confirm order</a>
                            <br>
                            @if(!\Session::get('success_paypal') == true)
                            <a href="{{ route('cancelOrder', ['order_id'=>$order->id]) }}" class="btn btn-danger" style="width: 200px;padding:10px;">Cancel order</a>
                            @endif

                        </div>
                    

                </div>
                <br>
                <div class="text-muted well well-sm shadow-none" style="margin-top: 10px;"></div>
                <!-- <p>A confirmation email was sent.</p> -->
                <!-- <a href="{{ route('product.index')}}" class="btn btn-warning">Continue Shopping</a> -->
            </div>
        </div>
    </div><!--end container-->

</main>
@endsection