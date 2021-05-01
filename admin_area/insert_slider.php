<?php include 'includes/db.php'; ?>
<?php 
	
	if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
}else{

 ?>
	

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Insert Slider</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert Slider</title>
<style>
.section{
	width: 70vw;
	margin: 0 auto;
	padding: 20px;
	box-shadow: 0 0 10px #ddd;
	border-radius: 5px;
	-webkit-animation: slide .7s ease-in-out;
	-o-animation: slide .7s ease-in-out;
	animation: slide .7s ease-in-out;
	position: relative;
	transition: transform .7s ease-in-out;
}
@keyframes slide{
	from{
		transform: translateX(-100px);
		box-shadow: 0 0 10px #ddd;
	}
	to{
		transform: translateX(0);
		box-shadow: 0 0 20px #ddd;
	}
}
</style>
</head>

<div class="section">
<div class="row"> <!--breadcrumb row start-->
<div class="col-lg-12">
	<div class="breadcrumb">
		<li class="active">
			<i class="fa fa-power-off"></i>
			Dashboard / Insert Slider
		</li>
	</div>
</div>
</div><!--breadcrumb row end-->	
<div class='row'>
<div class='col-lg-12'>
	<div class='panel panel-default'>
		<div class='panel-heading'> <!--panel heading start-->
			<h3 class='panel-title mb-3'>
				<i class='fa fa-money-check fa-fw'></i>
				Insert Slider
			</h3>
		</div><!--panel heading end-->
<div class="panel-body">
<div class="text-center">
</div>
<?php 
	
	$select_slider = "SELECT * FROM slider";
	$run_slider = mysqli_query($con,$select_slider);
	$row = mysqli_fetch_assoc($run_slider);
	$count = mysqli_num_rows($run_slider);
	if (isset($_POST['submit'])) {
		$slider_title = $_POST['slider_title'];
		$slider_image = $_FILES['slider_image']['name'];
		$slider_image = explode('.', $slider_image);
		$slider_image = end($slider_image);
		$slider_name = "img".rand().'.'.$slider_image;
		$slider_tmp = $_FILES['slider_image']['tmp_name'];
		move_uploaded_file($slider_tmp, "slider_images/$slider_name");
		if (!empty($slider_title) && !empty($slider_image)) {
			if ($count < 4) {
				$insert = "INSERT INTO slider (slider_name,slider_image) VALUES('$slider_title','$slider_name')";
				$run_query = mysqli_query($con,$insert);
				if ($run_query) {
					echo "<script>alert('Slider Inserted!')</script>";
					echo "<script>window.open('index.php?view_slider','_self')</script>";
				}else{
					echo "<script>alert('Slider Not Inserted!')</script>";
				}
			}else{
				echo "<script>alert('You must be added 4 slider')</script>";
				echo "<script>window.open('index.php?view_slider','_self')</script>";			
			}
		}else{
			echo "<script>alert('Please Fill up the all fields!')</script>";
		}
	}

 ?>
 <form action="" method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label for="">Slider Title</label>
 		<input type="text" class="form-control" required="" name="slider_title" placeholder="Slider Title">
 	</div>
 	<div class="form-group">
 		<label for="">Slider Image</label>
 		<input type="file" name="slider_image" class="form-control" required="">
 		
 	</div>
 	<input type="submit" name="submit" value="Insert Category" class="btn btn-info btn-block">
 </form>
</div>
</div>
</div>
	


<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/js/owl-carousel.min.js"></script>
<script src="assets/vendors/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
<?php } ?>

