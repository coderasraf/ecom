<?php include 'includes/db.php'; ?>
<?php 
	
	if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
}else{

		isset($_GET['edit_product']);
		$id = $_GET['edit_product'];
		$select_product = "SELECT * FROM products WHERE product_id='$id'";
		$run_query      = mysqli_query($con,$select_product);
		$row_query      = mysqli_fetch_assoc($run_query);
		$p_cat_id     	= $row_query['product_cat_id'];
		$cat_id         = $row_query['cat_id'];
		$product_img1   = $row_query['product_img1'];
		$product_img2   = $row_query['product_img2'];
		$product_img3   = $row_query['product_img3'];
		
		$select_p_cat   = "SELECT * FROM product_category WHERE p_cat_id='$p_cat_id'";
		$run_p_cat      = mysqli_query($con,$select_p_cat);
		$row_p_cat      = mysqli_fetch_array($run_p_cat);
		$p_cat_title    = $row_p_cat['p_cat_title'];
		$select_cat    = "SELECT * FROM categories WHERE cat_id='$cat_id'";
		$run_cat = mysqli_query($con,$select_cat);
		$row_cat = mysqli_fetch_array($run_cat);
		$cat_title = $row_cat['cat_title'];
	

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
		<input type="text" placeholder="Product Title" value="<?php echo $row_query['product_title']; ?>" name="product_title" class="form-control" id="">

	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Category</label>
		<select name="product_cat"  class="form-control" id="" id="">
			<?php 
				$query = "SELECT * FROM product_category"
			 ?>
			<option value="<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?>
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
				<select name="cat" id="" class="form-control" id="">
					<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
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
		<input type="file" name="product_img1" class="form-control" id="">
		 <img src="product_images/<?php echo($row_query['product_img1']); ?>" width="70px" class="img-thumbnail" alt="">
	</div>
	
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Price</label>
		<input type="text" placeholder="Product Price" value="<?php echo $row_query['product_price']; ?>" name="product_price" class="form-control" id="">
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Keywords</label>
		<input type="text" placeholder="Product Keywords"  name="keywords" class="form-control" id="">
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Product Description</label>
		<textarea name="product_desc" class="form-control" placeholder="Product Description" id="" cols="30" rows="6" id=""><?php echo $row_query['product_desc']; ?></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="update" value="Insert Product" class="form-control btn btn-primary " >
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

   if (isset($_POST['update'])) {
   
	   	$p_title        = $_POST['product_title'];
	   	$product_cat    = $_POST['product_cat'];
	   	$cat  			= $_POST['cat'];
	   	$product_price  = $_POST['product_price'];
	   	$product_desc   = $_POST['product_desc'];
	   	$keywords       = $_POST['keywords'];
	   	$p_img1  = $_FILES['product_img1']['name'];
	   	$new1  = explode('.', $p_img1);
	   	$new1  = end($new1);
	   	$new1  = time().rand(0,10).'.'.$new1;

	   	$update_query = "UPDATE `products` SET `product_cat_id`='$product_cat',`cat_id`='$cat',`product_title`='$p_title',`product_img1`='$new1',`product_price`='$product_price',`product_desc`='$product_desc',`product_keyword`='$keywords' WHERE product_id='$id'";

	   		
	   		move_uploaded_file($_FILES['product_img1']['tmp_name'], "product_images/$new1"); 

	    
	   if (mysqli_query($con,$update_query)) {
	   	  	
	   	  		   		
	   		echo "<script>alert('Product Updated successfully!')</script>";
	   		
	   		echo "<script>window.open('index.php?view_product','_self')</script>";

	   }else{

	   		 echo "<script>alert('Product NOT Updated successfully!')</script>";
	   }



   }

 ?>