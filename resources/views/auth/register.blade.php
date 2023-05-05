@extends('fe.layout.master')

@section('title', 'Register')
@section('content')
<main class="main-site left-sidebar">

    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Register</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12 col-md-offset-3">
                <div class="main-content-area">
                    <div class="wrap-login-item">
                        <div class="register-form form-item">
                            <form method="POST" action="{{ route('register') }}" class="form-stl">
                                @csrf

                                <!-- Name -->
                                <fieldset class="wrap-input">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name')}}" required autofocus placeholder="name" />
                                    <small class="mt-2">{{$errors->first('name')}}</small>
                                </fieldset>

                                <!-- Email Address -->
                                <fieldset class="wrap-input">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email')}}" required placeholder="username" />
                                    <small class="mt-2">{{$errors->first('email')}}</small>
                                </fieldset>

                                <!-- Phone -->
                                <fieldset class="wrap-input">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone')}}" required placeholder="phone" />
                                    <small class="mt-2">{{$errors->first('phone')}}</small>
                                </fieldset>

                                <!-- Password -->
                                <fieldset class="wrap-input item-width-in-half left-item">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" required placeholder="new-password">
                                    <small class="mt-2">{{$errors->first('password')}}</small>
                                </fieldset>

                                <!-- Confirm Password -->
                                <fieldset class="wrap-input item-width-in-half">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="new-password">
                                    <small class="mt-2">{{$errors->first('password_confirmation')}}</small>
                                </fieldset>

                                <p>
                                    <a href="{{ route('login') }}">
                                        Already have an account?
                                    </a>
                                    <button class="btn btn-sign col-md-offset-3" type="submit">
                                        {{ __('Register') }}
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection