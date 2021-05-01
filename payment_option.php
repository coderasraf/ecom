<div class="box">
	
	<?php 

	$session_email = $_SESSION['customer_email'];
	$select_customer = "SELECT * FROM customers WHERE customer_email='$session_email'";
	$run_cust = mysqli_query($con, $select_customer);
	$row_cust = mysqli_fetch_array($run_cust);
	$customer_id = $row_cust['customer_id'];



	 ?>

	<h1 class="text-center">Payment Option</h1>
	<p class="lead text-center"><a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Offline</a></p>
	<center>
		<p class="lead">
			<a href="#">Pay Wity paypal
			<img src="assets/images/mastercard.jpg" alt="">
			</a>
		</p>
	</center>
</div>