@extends('fe.layout.master')

@section('title', 'Reset password')
@section('content')

<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
            <li class="item-link"><span>Reset password</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-offset-3">
            <div class="main-content-area">
                <div class="wrap-login-item">
                    <div class="login-form form-item form-stl">
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                            <fieldset class="wrap-input">
                                <label for="email">Email</label>
                                <input class="block mt-1 w-full" type="email" name="email" id="email" value="{{ old('email', $request->email) }}" required autofocus placeholder="username">
                                <small class="mt-2">{{$errors->first('email')}}</small>
                            </fieldset>

                            <!-- Password -->
                            <fieldset class="wrap-input">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" required placeholder="new-password">
                                <small class="mt-2">{{$errors->first('password')}}</small>
                            </fieldset>

                            <!-- Confirm Password -->
                            <fieldset class="wrap-input">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="new-password">
                                <small class="mt-2">{{$errors->first('password_confirmation')}}</small>
                            </fieldset>

                            <button type="submit" class="btn btn-submit col-md-offset-5">
                                {{ __('Reset Password') }}
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection