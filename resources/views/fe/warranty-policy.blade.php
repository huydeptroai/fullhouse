@extends('fe.layout.master')

@section('title', 'Shipping Policy')
@section('content')
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Warranty Policy</span></li>
            </ul>
        </div>
    </div>

    <div class="container pb-60">
        <div class="row">
            <div class="col-md-12">
                <h3>WARRANTY POLICY</h3>
                <h4><b>1. Warranty period: </b></h4>
                <p> + 3 years from the date of purchase. Lifetime maintenance of the product.</p>
                <hr>
                <h4><b>2. Implementation process:</b></h4>
                <p>Full House will check the product and take responsible for warranty if the fault is from the 
                    manufacturer or under warranty conditions. We will repair or replace free of charge an equivalent 
                    product for customer. In this case, Full House will be responsible for the cost of repairs, spare 
                    parts, labor and travel expenses, for only products provided by Full House. All accessories, defective
                    parts or products replaced under this warranty will become the property of Full House.</p>
                <hr>
                <h4><b>3. Warranty conditions:</b></h4>
                <ul>
                    <li>Details: </li>
                    <p>+ Warranty period is valid from the date of purchase. Customers need to provide original invoice to confirm product transaction.</p>
                    <p>+ The warranty only applies to products manufactured and distributed by Full House; the function of 
                        accessories belongs to the original design of the product or the arising technique and problems related to 
                        product installation (if performed by the Full House technical team).</p>
                    <p>+ Disclaims all warranties, both express and implied, with respect to the product, including, but not limited to, 
                        any storage, assembled or used products in a wrong way, have been replaced, improperly used or cleaned; 
                        wear, crack, surface scratches or damage due to strong impact; placed products outdoors, in wet environments. 
                        The warranty is the customer’s rights when buying the product.</p>
                </ul>
                <hr>
               <h4><b>4. Customers will be free to repair or replace materials and accessories in the following cases:</b></h4>
               <ul>
                    <p>+ The product is still in the warranty period.</p>
                    <p>+ Customers present warranty paper or purchase order from Full House.</p>
                    <p>+ The product is properly used according to the product usage instructions.</p>
                    <p>+ Product defect is caused by defective parts, components or faults from the manufacturer.</p>
                </ul>
                <hr>
                <h4><b>5. Legal rights:</b></h4>
                <p>+ The warranty is legal right of the customer and does not affect other customer’s rights.</p>
                <hr>
                <h4><b>6. Contact:</b></h4>
                <p>+ Address and phone number of Full House showroom are listed in the Contact Page. 
                    Keep your purchase invoice to activate the warranty.</p>
                <hr>
                
                <h4>PRODUCT WARRANTY POLICY AT FULLHOUSE</h4>
                <hr>
                
            </div>
        </div>
    </div><!--end container-->

</main>
@endsection