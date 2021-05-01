<div class="box">
	<div class="box-header">
		<center>
			<h2>Login</h2>
			<p class="lead">Already Our customer</p>
		</center>
	</div>

	<form action="checkout.php" method="POST">
		<div class="form-group">
			<label for="">Email :- </label>
			<input type="email" placeholder="Enter your email" class="form-control" required="" name="c_email">
		</div>
		<div class="form-group">
			<label for="">Password :-</label>
			<input type="password" placeholder="Enter your password" class="form-control" required="" name="c_password">
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-primary" name="login" ><i class="fa fa-user mr-3"></i>Login</button>
		</div>
	</form>
	<center class='mt-3'>
		<h3><a href="customer_registration.php">New? Registar</a></h3>
	</center>
</div>


<?php 

	if (isset($_POST['login'])) {
		 
		$customer_email = $_POST['c_email'];
		$customer_pass  = $_POST['c_password'];
		$select_customer= "SELECT * FROM customers WHERE customer_email='$customer_email' AND  	customer_pass='$customer_pass'";
		$run_customer   = mysqli_query($con,$select_customer);
		$get_ip  = getUserIp();
		$check_cust = mysqli_num_rows($run_customer);
		$select_cart = "SELECT * FROM cartitem WHERE ip_add ='$get_ip'";
		$run_cart   =  mysqli_query($con,$select_cart);
		$check_cart = mysqli_num_rows($run_cart);
		if ($check_cust==0) {
			echo "<script>alert('Your email & password is wrong!')</script>";
			exit();
		}

		if ($check_cust==1 AND $check_cart ==0) {
			$_SESSION['customer_email'] = $customer_email;
			echo "<script>alert('Your are logged in!')</script>";
			echo "<script>window.open('customer/my_account.php', '_self')</script>";
		}
		else{
			$_SESSION['customer_email'] = $customer_email;
			echo "<script>alert('Your are logged in!')</script>";
			echo "<script>window.open('checkout.php', '_self')</script>";
		}


	}

 ?>

