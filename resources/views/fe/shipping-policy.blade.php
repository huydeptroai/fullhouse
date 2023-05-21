@extends('fe.layout.master')

@section('title', 'Shipping Policy')
@section('content')
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Shipping Policy</span></li>
            </ul>
        </div>
    </div>

    <div class="container pb-60">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center;">Shipping Policy</h3>
                <hr>
                <h4>
                    <b>Time application</b>
                    <b style="color:red;">Start : 01/03/2021</b>
                </h4>
                <p></p>

                <h4>1. For orders in City. Ho Chi Minh City</h4>

                <table class="shop_attributes table-bordered text-center">
                    <caption>Table of shipping and assembly fees for delivery</caption>
                    <thead>
                        <tr>
                            <th class="text-center">Value Order</th>
                            <th class="text-center">
                                < 299 USD</th>
                            <th class="text-center"> >= 299 USD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Urban</th>
                            <td>
                                2.00 USD/product
                                
                            </td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <th>Suburban 1</th>
                            <td>
                                2.00 USD/product
                            </td>
                            <td>2.00 USD/product</td>
                        </tr>
                        <tr>
                            <th>Suburban 2</th>
                            <td>4.00 USD/product</td>
                            <td>4.00 USD/product</td>
                        </tr>
                    </tbody>
                </table>

                <b>DETAILS OF DISTRICT, DISTRICT IN INTERNAL AND SURFACE :</b>
                <p> + The inner city includes districts: District 1, District 3, District 4, District 5, District 6, District 8, District 10, Tan Binh District, Tan Phu District, Phu Nhuan District, Go Vap District, Binh Thanh District, Binh Tan District.</p>
                <p> + Suburban 1 includes the areas of District 7, District 12, Thu Duc District</p>

                <p> + Suburban 2 includes the following areas: HoocMon District, Nha Be District, Can Gio District, Cu Chi District. </p>

                <hr>

                <h4>2. For orders from outside provinces</h4>
                <p>Shipping fee: <span style="font-size: 1.2em;font-weight:600;">5.00 USD/product.</span></p>
                
                
                <hr>

                <h4>3. Order confirmation and delivery time</h4>
                <ul>
                    <li>Order confirmation time</li>
                    <p>+ Orders placed during office hours (9am - 6pm) will be confirmed by phone within 30 minutes - 1 hour</p>
                    <p>+ Orders placed outside office hours (after 6pm) will be processed the next day</p>
                    <p>+ Orders placed on Sunday will be processed the following Monday</p>
                    <li>Delivery time</li>
                    <p>+ Exact time will be informed when calling to confirm order</p>
                </ul>
                <p>Other policies and regulations: For orders requiring express delivery, please contact hotline (+84) 853 923 404 for specific advice.</p>
            </div>
        </div>
    </div><!--end container-->

</main>
@endsection
