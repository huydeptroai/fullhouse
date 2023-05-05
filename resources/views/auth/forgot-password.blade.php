@extends('fe.layout.master')

@section('title', 'Forgot Password')
@section('content')

<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Forgot password</span></li>
            </ul>
        </div>
    
        <div class="row">
            <div class="col-sm-6 col-xs-12 col-md-offset-3">
                <div class="main-content-area">
                    <div class="wrap-login-item">
                        <div class="login-form form-item form-stl">
                            <div class="wrap-title">
                                <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                            </div>
    
                            <!-- Session Status -->
                            @if(session('status') !== null)
                            <p>{{ session('status')}}</p>
                            @endif
    
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
    
                                <!-- Email Address -->
                                <fieldset class="wrap-input">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus />
                                    <small>{{ $errors->first('email')}}</small>
    
                                </fieldset>
    
                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="btn btn-submit">
                                        {{ __('Email Password Reset Link') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection