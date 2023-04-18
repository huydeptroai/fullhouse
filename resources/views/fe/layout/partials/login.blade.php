<div class="wrapper">

	<span class="icon-close">
		<!-- <ion-icon name="close"></ion-icon> -->
		<ion-icon name="arrow-forward"></ion-icon>
	</span>
	<!-- login form -->
	<div class="form-box login">
		<h2>Login</h2>
		<form method="post" action="">
			@csrf
			<div class="input-box">
				<span class="icon">
					<ion-icon name="mail"></ion-icon>
				</span>
				<input type="email" required>
				<label>Email</label>
			</div>
			<div class="input-box">
				<span class="icon">
					<ion-icon name="lock-closed"></ion-icon>
				</span>
				<input type="password" required>
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
		<form action="">
			<div class="input-box">
				<span class="icon">
					<ion-icon name="person"></ion-icon>
				</span>
				<input type="text" name="name" required>
				<label>Username</label>
			</div>

			<div class="input-box">
				<span class="icon">
					<ion-icon name="mail"></ion-icon>
				</span>
				<input type="text" name="email" required>
				<label>Email</label>
			</div>
			<div class="input-box">
				<span class="icon">
					<ion-icon name="call"></ion-icon>
				</span>
				<input type="text" name="phone" required>
				<label>Phone</label>
			</div>
			<div class="input-box">
				<span class="icon">
					<ion-icon name="lock-closed"></ion-icon>
				</span>
				<input type="password" name="password" required>
				<label>Password</label>
			</div>
			<div class="input-box">
				<span class="icon">
					<ion-icon name="lock-closed"></ion-icon>
				</span>
				<input type="password" name="confirm" required>
				<label>Confirm password</label>
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