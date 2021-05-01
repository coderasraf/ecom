<?php 

	$customer_email = $_SESSION['customer_email'];
	$get_customer = "SELECT * FROM customers WHERE customer_email='$customer_email'";
	$run_customer = mysqli_query($con,$get_customer);
	$row_customer = mysqli_fetch_array($run_customer);
	$customer_id  = $row_customer['customer_id'];
	$customer_name = $row_customer['customer_name'];
	$customer_photo = $row_customer['customer_image'];
	$customer_country = $row_customer['customer_country'];
	$customer_city = $row_customer['customer_city'];
	$customer_contact = $row_customer['customer_contact'];
	$customer_addr = $row_customer['customer_address'];
	$customer_pass = $row_customer['customer_pass'];



 ?>


<div class="box">
	<center>
		<h2>Edit Your Account</h2>
		<p class="text-muted">
		If you have any problem.Please, let us know as soon as possible.We are ready to help you and help to your business and also u can  <a href="../contact.php">
			contact us
		</a>
		24/7.. Thanks!
	</p>	
	</center>
	<hr>
	<form action="my_account.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
		<label for="name">Customer Name</label>
		<input name="c_name" type="text" value="<?php echo $customer_name ?>" class="form-control" placeholder="Name" id="name" required="">
	</div>
	<div class="form-group">
		<label for="email">Customer Email</label>
		<input name="c_email" value="<?php echo $customer_email ?>" type="email" class="form-control" placeholder="Email" id="email" required="">
	</div>
	<div class="form-group">
		<label for="Password">Password</label>
		<input name="c_name" value="<?php echo $customer_pass ?>" type="password" class="form-control" placeholder="Enter Password" id="Password" required="">
	</div>
	<div class="form-group">
		<label for="cuntry">Customer Country</label>
		<input name="c_country" value="<?php echo $customer_country ?>" type="text" class="form-control" placeholder="Your Country" id="country" required="">
	</div>
	<div class="form-group">
		<label for="c_city">Customer City</label>
		<input name="c_city" value="<?php echo $customer_city ?>" type="text" class="form-control" placeholder="Your City" id="c_city" required="">
	</div>
	<div class="form-group">
		<label for="Contact">Customer Contact</label>
		<input name="c_contact" value="<?php echo $customer_contact ?>" type="contact" class="form-control" placeholder="+03" id="Contact" required="">
	</div>
	<div class="form-group">
		<label for="Address">Customer Address</label>
		<input name="c_address" value="<?php echo $customer_addr ?>" type="text" class="form-control" placeholder="Address" id="Address" required="">
	</div>
	<div class="form-group">
		<label for="c_image">Udate profile picture</label>
		<input name="c_image" type="file" class="form-control" id="c_image" required="">
		<img style="width:100px;" class="img-responsive rounded-img" src="assets/customer_images/<?php echo $customer_photo; ?>" alt="">
	</div>
	<div class="text-center">
		<input type="submit" name="update" value="Upadate Account" class="btn btn-primary">
	</div>
	</form>
</div>

<?php 
	
	if (isset($_POST['update'])) {
		
		$update_id = $customer_id;
		$c_name   = $_POST['c_name'];
		$c_email  = $_POST['c_email'];
		$c_pass   = $_POST['c_pass'];
		$c_country = $_POST['c_country'];
		$c_city   = $_POST['c_city'];
		$c_contact= $_POST['c_contact'];
		$c_address = $_POST['c_address'];
		$c_image   = $_FILES['c_image']['name'];
		$c_tmp_name = $_FILES['c_image']['tmp_name'];

		move_uploaded_file($c_tmp_name, "assets/customer_images/$c_image");
		$update_customer = "UPDATE customers SET customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact', 	customer_address='$c_address',customer_image='$c_image' WHERE customer_id='$update_id'";
		$run_update = mysqli_query($con,$update_customer);
		if ($run_update) {
			echo "<script>alert('Your profile has been updated!')</script>";
			echo "<script>window.open('logout.php', '_self')</script>";


		}else{
			echo mysqli_error();
		}
	}

 ?>