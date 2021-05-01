<?php 
session_start();
include 'includes/db.php';
if (!isset($_SESSION['admin_email'])) {
	echo "<script>window.open('login.php')</script>";
}else{
	echo "<script>window.open('index.php?dashboard','_self')</script>";
}
	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="ass
	">
	<link rel="stylesheet" href="assets/font-awesome/css/all.min.css">
	 <link rel="stylesheet" href="assets/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
	<div class="container">
		<form action="" class="form-login" method="post">
			<h2 class="form-login-heading mb-5 text-center">Admin Login</h2>
			<input type="text" class="form-control mb-3" name="admin_email" placeholder="Email Address" required="required">
			<input type="password" class="form-control mb-3" name="admin_pass" placeholder="Enter Your password" required="required">
			<button type="submit" class="btn btn-primary btn-lg btn-block" name="admin_login">Login <i class="fa fa-user"></i></button>
			<hr>
			<h4>Forgot Password</h4>
			<a href="forgot_password.php">Lost Your Password? Forgot Password</a>
		</form>
	</div>


	<script src="assets/js/jquery.min.js"></script>
</body>
</html>

<?php 
	if (isset($_POST['admin_login'])) {
		$admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
		$admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
		$get_admin = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_pass='$admin_pass'";
		$run_admin = mysqli_query($con,$get_admin);
		$count = mysqli_num_rows($run_admin);
		if ($count==1) {
			$_SESSION['admin_email'] = $admin_email;
			echo "<script>alert('You are logged!')</script>";
			echo "<script>window.open('index.php?dashboard', '_self')</script>";
		}else{
			echo "<script>alert('Your email password is incorrect!')</script>";
		}

	}
 ?>