<div class="wrapper">

	<span class="icon-close">
		<!-- <ion-icon name="close"></ion-icon> -->
		<ion-icon name="arrow-forward"></ion-icon>
	</span>
	<!-- login form -->
	<div class="form-box login">
		<h2>Login</h2>

		<!-- Session Status -->
		@if(session('status') != null)
		<p style="color:green;">{{session('status')}}</p>
		@endif

		<form action="{{ route('login')}}" method="post">
			@csrf
			<!-- email address -->
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-envelope" aria-hidden="true"></i>
				</span>
				<input type="email" name="email" value="{{ old('email') }}" required autofocus>
				<label>Email</label>
				<small class="mt-2">{{$errors->first('email')}}</small>
			</div>
			<!-- password -->
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</span>
				<input type="password" name="password" required>
				<label>Password</label>
				<small class="mt-2">{{$errors->first('password')}}</small>
			</div>

			<div class="remember-forgot">
				<label><input type="checkbox">Remember me</label>
			</div>
			@if (Route::has('password.request'))
			<div class="remember-forgot">
				<a href="{{ route('password.request')}}">Forgot your password?</a>
			</div>
			@endif

			<button type="submit" class="btn">Login</button>
			
			<div class="login-register">
				<p>Don't have account? <a href="#" class="register-link">Register</a></p>
			</div>

			<!-- sign in by social -->
			<div class="social-auth-links text-center mb-3">
				<p>- OR -</p>
				<a href="#" class="btn btn-block btn-primary">
					Sign in using Facebook
				</a>
				<a href="#" class="btn btn-block btn-danger">
					Sign in using Google+
				</a>
			</div>
			<!-- sign in by social -->

		</form>
	</div>
	<!-- register form -->
	<div class="form-box register">
		<h2>Register</h2>
		<form action="{{ Route('register')}}" method="post">
			@csrf
			<!-- name -->
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-user" aria-hidden="true"></i>
				</span>
				<input class="@error('name') border-danger @enderror" type="text" name="name" value="{{ old('name')}}" required autofocus autocomplete="name" />
				<label>Username</label>
				<small class="text-danger">{{ $errors->first('name') }}</small>
			</div>
			<!-- email -->
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-envelope" aria-hidden="true"></i>
				</span>
				<input class="@error('email') border-danger @enderror" type="email" name="email" value="{{ old('email')}}" required autocomplete="username" />
				<label>Email</label>
				<small class="text-danger">{{ $errors->first('email') }}</small>
			</div>
			<!-- phone -->
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-phone" aria-hidden="true"></i>
				</span>
				<input class="@error('phone') border-danger @enderror" type="number" name="phone" value="{{ old('phone')}}" required autocomplete="phone" />
				<label>Phone</label>
				<small class="text-danger">{{ $errors->first('phone') }}</small>
			</div>
			<!-- password -->
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</span>
				<input class="@error('password') border-danger @enderror" type="password" name="password" required autocomplete="new-password">
				<label>Password</label>
				<small class="text-danger">{{ $errors->first('password') }}</small>
			</div>
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</span>
				<input class="@error('password_confirmation') border-danger @enderror" type="password" name="password_confirmation" required autocomplete="new-password">
				<label>Confirm password</label>
				<small class="text-danger">{{$errors->first('password_confirmation')}}</small>
			</div>

			<div class="remember-forgot">
				<label><input type="checkbox"> I agree to the terms & conditions</label>
			</div>

			<button type="submit" class="btn">Register</button>
			<div class="login-register">
				<p>Already have an account? <a href="#" class="login-link">Login</a></p>
			</div>

		</form>
	</div>
</div>

<form action="">
	<div class="model hide">
		<div class="model_inner">
			<div class="model_header">
				<p>Password Recovery</p>
			</div>
			<div class="model_body">
				<div class="input-box">
					<span class="icon">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
					<input type="email" required />
					<label>Email</label>
				</div>
			</div>
			<div class="model_footer">
				<input type="submit" class="btn " value="Send">
				<button class="btn">Close</button>
			</div>
		</div>
	</div>
</form>