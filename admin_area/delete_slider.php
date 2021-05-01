<?php 
	include 'includes/db.php';
	if (isset($_GET['delete_slider'])) {
		$id = $_GET['delete_slider'];
		$delete = "DELETE FROM slider WHERE id='$id'";
		$run = mysqli_query($con,$delete);
		if ($run) {
			echo "<script>alert('Your slider has been deleted succesfully!')</script>";
			echo "<script>window.open('index.php?view_slider','_self')</script>";
		}
	}

 ?>