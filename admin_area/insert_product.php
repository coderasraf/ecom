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
<title>Insert Product</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert Products</title>
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
			Dashboard / Insert Product
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
				Insert Product
			</h3>
		</div><!--panel heading end-->
<div class="panel-body">
<div class="text-center">
</div>
<form action="" class="form-horizontal mt-3" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Title</label>
		<input type="text" placeholder="Product Title" name="product_title" class="form-control" required="">

	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Category</label>
		<select name="product_cat" class="form-control" id="" required="">
			<option value="">Select A Product Category</option>
			<?php 
				$select_p_cat = 'SELECT * FROM product_category';
				$run_p_product = mysqli_query($con, $select_p_cat);
				while($rows = mysqli_fetch_assoc($run_p_product)){
					$p_cat_id = $rows['p_cat_id'];
					$p_cat_title = $rows['p_cat_title'];
					$p_cat_desc = $rows['p_cat_desc'];
					echo '<option value="'.$p_cat_id.'">'.$p_cat_title.'</option>';
				}
			?>
				</select>
			</div>
			<div class="form-group">
				<label for="" class="col-md-3 control-label">Categories</label>
				<select name="cat" id="" class="form-control" required="">
					<option value="">Select Category</option>
					<?php 
					 $selec_cat = 'SELECT * FROM categories';
					 $run_cat = mysqli_query($con, $selec_cat);
					 while ($rows = mysqli_fetch_assoc($run_cat)) {
					 	$cat_id = $rows['cat_id'];
					 	$cat_title = $rows['cat_title'];
					 	$cat_desc = $rows['cat_desc'];
					 	echo "<option value='$cat_id'>$cat_title</option>";
					 }
					 ?>
				</select>


			</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Image 1</label>
		<input type="file" name="product_img1" class="form-control" required="">
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Image 2</label>
		<input type="file"name="product_img2" class="form-control" required="">
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Image 3</label>
		<input type="file"name="product_img3" class="form-control" required="">
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Price</label>
		<input type="text" placeholder="Product Price" name="product_price" class="form-control" required="">
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Keyword</label>
		<input type="text" placeholder="Product Keywords" name="product_keywords" class="form-control" required="">
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Description</label>
		<textarea name="product_desc" class="form-control" placeholder="Product Description" id="" cols="30" rows="6" required=""></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" value="Insert Product" class="form-control btn btn-primary " >
	</div>
		</form>
		</div>
	</div>
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

$product_title 		= $_POST['product_title'];
$product_cat 		= $_POST['product_cat'];
$cat 				= $_POST['cat'];
$product_price 		= $_POST['product_price'];
$product_keywords 	= $_POST['product_keywords'];
$product_desc 		= $_POST['product_desc'];

$product_img1 		= $_FILES['product_img1']['name'];
$product_img2 		= $_FILES['product_img2']['name'];
$product_img3 		= $_FILES['product_img3']['name'];

$tmp_name1 			= $_FILES['product_img1']['tmp_name'];
$tmp_name2 			= $_FILES['product_img2']['tmp_name'];
$tmp_name3 			= $_FILES['product_img3']['tmp_name'];


move_uploaded_file($tmp_name1, "product_images/$product_img1");
move_uploaded_file($tmp_name2, "product_images/$product_img2");
move_uploaded_file($tmp_name3, "product_images/$product_img3");

$insert_product = "INSERT INTO products(product_cat_id,cat_id,dates,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keyword) 
VALUES('$product_cat','$product_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keywords')";

$run_product = mysqli_query($con, $insert_product);
if ($run_product) {
	echo "<script>window.open('index.php?view_product','_self')</script>";
}
}

?>