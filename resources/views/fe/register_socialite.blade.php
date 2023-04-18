@extends('fe.layout.master')

@section('content')
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Register</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" action="#" name="frm-login" method="get">
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Create an account</h3>
                                    <h4 class="form-subtitle">Personal infomation</h4>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-email">Phone *</label>
                                    <input type="text" id="frm-reg-email" name="reg-email" placeholder="023658541">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-email">Address *</label>
                                    <input type="text" id="frm-reg-email" name="reg-email" placeholder="hcm">
                                </fieldset>
                                <input type="submit" class="btn btn-sign" value="Register" name="register">
                            </form>
                        </div>
                    </div>
                </div><!--end main products area-->
            </div>
        </div><!--end row-->

    </div><!--end container-->

</main>
@endsection