@extends('fe.layout.master')

@section('title', 'Login')
@section('content')

<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
            <li class="item-link"><span>login</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xs-12 col-md-offset-3">
            <div class="main-content-area">
                <div class="wrap-login-item">
                    <div class="login-form form-item form-stl">
                        <!-- Session Status -->
                        @if(session('status') != null)
                        <p style="color:green;">{{session('status')}}</p>
                        @endif

                        <h3 class="form-title">Log in to your account</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email Address -->
                            <fieldset class="wrap-input" style="margin-top:20px;">
                                <label for="email">Email (<span style="color:red;">*</span>)</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                                <small class="mt-2">{{$errors->first('email')}}</small>
                            </fieldset>

                            <!-- Password -->
                            <fieldset class="wrap-input">
                                <label for="password">Password (<span style="color:red;">*</span>)</label>
                                <input type="password" name="password" id="password" required placeholder="Enter your password">
                                <small class="mt-2">{{$errors->first('password')}}</small>
                            </fieldset>

                            <!-- Remember Me -->
                            <fieldset class="wrap-input">
                                <label class="remember-field">
                                    <input class="frm-input " name="remember" id="remember" type="checkbox"><span>{{ __('Remember me') }}</span>
                                </label>

                                @if (Route::has('password.request'))
                                <a class="link-function left-position" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                            </fieldset>

                            <fieldset class="wrap-input">
                                <button type="submit" class="btn btn-submit col-md-offset-6">
                                    {{ __('Log in') }}
                                </button>
                            </fieldset>
                            <div class="login-register">
                                <p>Don't have account? <a href="{{ route('register')}}" class="register-link">Register</a></p>
                            </div>
                        </form>
                        <hr>
                        <h3 class="form-title" style="text-align:center;">-- or sign in with ---</h3>
                        <div style="display: flex;  justify-content: space-around;">
                            <a href="{{ route('google')}}" style="width: 30px;">
                                <button class="btn" style="background-color: #EA4335;">
                                    Google+
                                    <!-- <ion-icon name="logo-google"></ion-icon> -->
                                </button>
                            </a>
                            <a href="#" class="mt-3">
                                <button class="btn" style="background-color: #4267b2;">
                                    Facebook
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection