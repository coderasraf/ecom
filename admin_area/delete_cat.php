<?php 
	include 'includes/db.php';

	if (isset($_GET['delete_cat'])) {
		$id = $_GET['delete_cat'];
		$select = "DELETE  FROM categories WHERE  cat_id='$id'";
		$run = mysqli_query($con,$select);
		if ($run) {
			echo "<script>alert('Your category has been deleted!')</script>";
			echo "<script>window.open('index.php?view_categories','_self')</script>";
		}else{
			echo "Not";
		}

	}
 ?>