
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form 6</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="http://infiniteiotdevices.com/images/logo.png" rel="icon" sizes="16x16" type="image/gif" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/csslogin/login-form-6.css">
</head>
<body>
	<div class="form">
		<form action="<?=site_url('auth/process')?>" method="post">
			<h2>Sign In</h2>
			<div class="input-box">
				<i class="fa fa-user"></i>
				<input type="text" name="username" placeholder="Username" required autofocus>
			</div>
			<div class="input-box">
				<i class="fa fa-lock"></i>
				<input type="password" name="password" placeholder="Password" required>
			</div>
			<div class="input-box">
				<input type="submit" name="login" value="Login">
			</div>
			<span>Forget Password? Contact <a href="">Admin</a></span>
			
		</form>
	</div>
</body>
</html>