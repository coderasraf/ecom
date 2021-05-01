<?php 

	if (isset($_GET['del_payments'])) {
		$id = $_GET['del_payments'];
		$id = base64_decode($id);
		$del = "DELETE FROM payments WHERE payment_id='$id'";
		$run_del = mysqli_query($con,$del);
		if ($run_del) {
			echo "<script>alert('Your payment deleted successfully!')</script>";
			echo "<script>window.open('index.php?view_payments','_self')</script>";
		}

	}
 ?>