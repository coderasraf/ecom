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
<title>Insert product Catergory</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert Product Category</title>
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
			Dashboard / Insert Product Category
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
				Insert Product Categroy
			</h3>
		</div><!--panel heading end-->
<div class="panel-body">
<div class="text-center">
</div>
 <form action="" method="post">
 	<div class="form-group">
 		<label for="">Product Category Title</label>
 		<input type="text" class="form-control" name="p_cat_title" placeholder="Product Category Title">
 	</div>
 	<div class="form-group">
 		<label for="">Description</label>
 		<textarea name="p_cat_desc" id="" cols="10" class="form-control" rows="5" placeholder="Description"></textarea>
 	</div>
 	<input type="submit" name="submit" value="Insert Product Category" class="btn btn-info btn-lg">
 </form>
</div>
</div>
</div>
	
<?php 

	if (isset($_POST['submit'])) {
		$p_cat_title = $_POST['p_cat_title'];
		$p_cat_desc  = $_POST['p_cat_desc'];
		if (!empty($p_cat_desc) && !empty($p_cat_title)) {
			$insert_query = "INSERT INTO product_category(p_cat_title,p_cat_desc) VALUES('$p_cat_title','$p_cat_desc')";
			$run_query = mysqli_query($con,$insert_query);
			if ($run_query) {
				echo "<script>alert('Your product_category has been inserted!')</script>";
			echo "<script>window.open('index.php?view_p_cats','_self')</script>";

			}else{
				echo "Data not inserted!";
			}
		}
	}
 ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/js/owl-carousel.min.js"></script>
<script src="assets/vendors/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
<?php } ?>

