<?php 
include 'config.php';

//
session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$admin = $_POST['admin'];
	$password = $_POST['password'];

	if ($admin == 'admin') {
		if($password == '1111') {
			$_SESSION['username'] = $_POST['admin'];
			header("Location: admin.php");

		} 
			} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Protibaad</title>
</head>
<body  style="background-image: url('image/bg1.jpg');">
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="admin" name="admin" value="<?php echo $admin; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Admin Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
			<p class="login-register-text">Log-in Page <a href="index.php">Log in </a>.</p>
		</form>

	</div>
</body>
</html>  
