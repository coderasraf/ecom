<div class="box">
	<center>
		<h2>Do you really want to <span class="text-danger">delete</span> this account</h2>
		<p class="text-muted">
		If you have any problem.Please, let us know as soon as possible.We are ready to help you and help to your business and also u can  <a href="../contact.php">
			contact us
		</a>
		24/7.. Thanks!
	</p>	
	<hr>
	<form action="" method="post" class="my-3">
		<div class="form-group">
			<input type="submit" value="Yes, I want Delete" name="yes" class="btn btn-primary btn-lg">
			<input type="submit" class="btn btn-danger btn-lg" name="no" value="No, I Don't Delete">
		</div>
	</form>
	</center>

</div>

<?php 

	$c_email = $_SESSION['customer_email'];
	if (isset($_POST['yes'])) {
		$delete_q = "DELETE FROM customers WHERE customer_email='$c_email'";
		$run_query = mysqli_query($con,$delete_q);
		if ($run_query) {
			session_destroy();
			echo "<script>alert('Your Accoutn has been deleted!')</script>";
			echo "<script>window.open('../index.php', '_self')</script>";
		}
	}


 ?>