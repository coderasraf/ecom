<?php 

include 'includes/db.php';
if (isset($_GET['del_order'])) {
	$id = base64_decode($_GET['del_order']);
	$del = "DELETE FROM customer_order WHERE order_id='$id'";
	$run_customer = mysqli_query($con,$del);
	if ($run_customer) {
		echo "<script>alert('Your order deleted successfully!')</script>";
		echo "<script>window.open('index.php?view_order','_self')</script>";
	}
}

 ?>