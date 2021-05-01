<?php 

	include 'includes/db.php';
	if (isset($_GET['del_customer'])) {
		$id = $_GET['del_customer'];
		$id = base64_decode($id);
		$del_customer = "DELETE FROM customers WHERE customer_id='$id'";
		$del_run = mysqli_query($con,$del_customer);
		if ($del_run) {
			echo "<script>alert('Your customre deleted successfully!')</script>";
			echo "<script>window.open('index.php?view_customer','_self')</script>";

		}
	}
	

 ?>