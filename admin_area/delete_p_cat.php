<?php
	
	include 'includes/db.php';

	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$delete_query = "DELETE FROM `product_category` WHERE p_cat_id='$id'";
		$run_query = mysqli_query($con,$delete_query);
		if ($run_query) {
			echo "<script>alert('Your Product Category has been deleted!')</script>";
			// header("Location:index.php?view_p_cats");
			echo "<script>window.open('index.php?view_p_cats','_self')</script>";
		}
	}



 ?>