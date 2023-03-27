<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./auth.css" class="css">
	<link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
	<title>Sign in | Benna</title>
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="signup.php" method="post">
				<h1>Create Account</h1>
				<input type="text" placeholder="Username" name="username" />
				<input type="text" placeholder="Full Name" name="name" />
				<input type="email" placeholder="Email" name="email" />
				<input type="password" placeholder="Password" name="password" />
				<input type="password" placeholder="Confirm password" name="repeatPassword" />
				<button type="submit" value="submit" name="submit">Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="signin.php" method="get">
				<h1>Sign in</h1>
				<input type="text" placeholder="Email OR Username" />
				<input type="password" placeholder="Password" />
				<a href="forgetPassword.php">Forgot your password?</a>
				<button type="submit" value="submit" name="submit">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Have an account!</h1>
					<p>Keep yourself connected</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>You don't have an account ? <br> become one of ours!</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="./auth.js"></script>
</body>

</html>