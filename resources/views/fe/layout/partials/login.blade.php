<div class="wrapper">

	<span class="icon-close">
		<!-- <ion-icon name="close"></ion-icon> -->
		<ion-icon name="arrow-forward"></ion-icon>
	</span>
	<!-- login form -->
	<div class="form-box login">
		<h2>Login</h2>
		<form action="" method="post">
			@csrf
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-envelope" aria-hidden="true"></i>
				</span>
				<input type="email" name="email">
				<label>Email</label>
			</div>
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</span>
				<input type="password" name="password" required>
				<label>Password</label>
			</div>

			<div class="remember-forgot">
				<label><input type="checkbox">Remember me</label>
			</div>
			<div class="remember-forgot">
				<a href="#">Forgot password</a>
			</div>

			<button type="submit" class="btn">Login</button>
			<div class="login-register">
				<p>Don't have account? <a href="#" class="register-link">Register</a></p>
			</div>
			<div class="social-auth-links text-center mb-3">
				<p>- OR -</p>
				<a href="#" class="btn btn-block btn-primary">
					Sign in using Facebook
				</a>
				<a href="#" class="btn btn-block btn-danger">
					Sign in using Google+
				</a>
			</div>
		</form>
	</div>
	<!-- register form -->
	<div class="form-box register">
		<h2>Register</h2>
		<form action="{{Route('RegisterAcc')}}" method="post">
			@csrf
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-user" aria-hidden="true"></i>
				</span>
				<input class="@error('name') border-danger @enderror" type="text" name="name" required>
				<label>Username</label>
				<small class="text-danger">{{ $errors->first('name') }}</small>
			</div>

			<div class="input-box">
				<span class="icon">
					<i class="fa fa-envelope" aria-hidden="true"></i>
				</span>
				<input class="@error('email') border-danger @enderror" type="email" name="email" required>
				<label>Email</label>
				<small class="text-danger">{{ $errors->first('email') }}</small>
			</div>
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-phone" aria-hidden="true"></i>
				</span>
				<input class="@error('phone') border-danger @enderror" type="number" name="phone" required>
				<label>Phone</label>
				<small class="text-danger">{{ $errors->first('phone') }}</small>
			</div>
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</span>
				<input class="@error('password') border-danger @enderror" type="password" name="password" required>
				<label>Password</label>
				<small class="text-danger">{{ $errors->first('password') }}</small>
			</div>
			<div class="input-box">
				<span class="icon">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</span>
				<input class="@error('confirm') border-danger @enderror" type="password" name="confirm" required>
				<label>Confirm password</label>
				<small class="text-danger">{{ $errors->first('confirm') }}</small>
			</div>

			<div class="remember-forgot">
				<label><input type="checkbox">I agree to the terms & conditions</label>
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