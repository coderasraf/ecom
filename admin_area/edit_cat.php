<?php include 'includes/db.php'; ?>
<?php 
	
	if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
}else{

 ?>
	
	<?php $id =$_GET['edit_cat']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Insert Catergory</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert Category</title>
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
			Dashboard / Insert Category
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
				Insert Categroy
			</h3>
		</div><!--panel heading end-->
<div class="panel-body">
 <form action="" method="post">
 	<?php
 		$select = "SELECT * FROM categories WHERE cat_id ='$id'";
 		$run_query = mysqli_query($con,$select);
 		$row = mysqli_fetch_array($run_query);
 	 ?>
 	<div class="form-group">
 		<label for="">Category Title</label>
 		<input type="text" value="<?php echo($row['cat_title']); ?>" class="form-control" name="cat_title" placeholder="Product Category Title">
 	</div>
 	<div class="form-group">
 		<label for="">Description</label>
 		<textarea name="cat_desc" id="" cols="10" class="form-control" rows="5" placeholder="Description"><?php echo $row['cat_desc']; ?></textarea>
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

<?php 
	 
	if (isset($_POST['submit'])) {
		$cat_title = $_POST['cat_title'];
		$cat_desc  = $_POST['cat_desc'];
		if (!empty($cat_desc) && !empty($cat_title)) {
			$insert_query = "UPDATE `categories` SET `cat_title`='$cat_title',`cat_desc`='$cat_desc' WHERE cat_id ='$id'";

			$run_query = mysqli_query($con,$insert_query);
			if ($run_query) {
				echo "<script>alert('Your category has been updated!')</script>";
			echo "<script>window.open('index.php?view_categories','_self')</script>";

			}else{
				$not = 'Data Not updated!';
			}
		}else{
			$empty = 'Please Fill up all fields!';
		}
	}
 ?>