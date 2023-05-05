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

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <fieldset class="wrap-title">
                                <h3 class="form-title">Log in to your account</h3>
                            </fieldset>

                            <!-- Email Address -->
                            <fieldset class="wrap-input">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder="username">
                                <small class="mt-2">{{$errors->first('email')}}</small>
                            </fieldset>

                            <!-- Password -->
                            <fieldset class="wrap-input">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" required placeholder="current-password">
                                <small class="mt-2">{{$errors->first('password')}}</small>
                            </fieldset>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" name="remember">
                                    <span class="">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div style="margin-top: 20px;display: flex;justify-content: flex-end;">
                                @if (Route::has('password.request'))
                                <a class="" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif

                                <button type="submit" class="btn btn-submit col-md-offset-3">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection