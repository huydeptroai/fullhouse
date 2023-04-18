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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
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
                                    <small class="float-right">Date: 2/10/2014</small>
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
                                    <strong>John Doe</strong><br>
                                    795 Truong Chinh Street<br>
                                    HCM City<br>
                                    Phone: (555) 539-1037<br>
                                    Email: john.doe@example.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #007612</b><br>
                                <br>
                                <b>Order ID:</b> 4F3S8J<br>
                                <b>Account No:</b> 96845-34567-1234 <br>
                                <b>At Bank:</b> BIDV
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
                                            <th>Product</th>
                                            <th>Code</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Desk</td>
                                            <td>PS01001</td>
                                            <td>1</td>
                                            <td>$64.50</td>
                                            <td>$64.50</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="{{ asset('admin/dist/img/credit/visa.png')}}" alt="Visa">
                                <img src="{{ asset('admin/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                                <img src="{{ asset('admin/dist/img/credit/american-express.png')}}" alt="American Express">
                                <img src="{{ asset('admin/dist/img/credit/paypal2.png')}}" alt="Paypal">

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>$64.50</td>
                                        </tr>
                                        <tr>
                                            <th>Tax (8%)</th>
                                            <td>$5.16</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>$5.80</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>$69.66</td>
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
                                <a href="#" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
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