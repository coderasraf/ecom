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
<title>View product Catergory</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Product Category</title>
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
			Dashboard / View Product Category
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
				View Product Categroy
			</h3>
		</div><!--panel heading end-->
<div class="panel-body">
<div class="text-center">
</div>
 <div class="table-responsive">
 	<table class="table table-bordered table-striped ">
 		<thead>
 			<tr>
 				<th>Product Categroy ID</th>
 				<th class="text-center">Product Categroy Title</th>
 				<th class="text-center">Product Categroy Desc</th>
 				<th class="text-center">Action</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
 				$select_query = "SELECT * FROM product_category";
 				$run_query = mysqli_query($con,$select_query);
 				$i=0;
 				while ($row=mysqli_fetch_array($run_query)) {
 					$i++
 					?>
 				<tr>
	 				<td>#<?php echo $i; ?></td>
	 				<td class="text-center"><?php echo $row['p_cat_title']; ?></td>
	 				<td class="text-center" width="200px"><?php echo $row['p_cat_desc']; ?></td>
	 				<td class="text-center">
	 					<a href="index.php?edit_p_cat=<?php echo($row['p_cat_id']); ?>" class="btn btn-primary btn-round"><i class="fa fa-pen"></i></a>
	 					<a onclick="return confirm('Are u sure to delete this Product Categroy!');" href="delete_p_cat.php?id=<?php echo($row['p_cat_id']); ?>" class="btn btn-danger btn-round"><i class="fa fa-trash"></i></a>
	 				</td>
 			 </tr>

 				<?php } ?>
 			
 		</tbody>
 	</table>
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

