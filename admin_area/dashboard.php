<div class="row"> <!--First row start-->
	<div class="col-md-12">
		<div class="page-header">
			<h1 class="page-header-text">Dashboard</h1>
		</div>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-file"></i> Dashboard
			</li>
		</ol>
	</div>
</div><!--First row end-->
<div class="div-cat-container"><!-- div-cat-container start -->
	<div class="div-cat-main-single"><!-- div-cat-main-single start -->
		<div class="div-top-title">
			<div class="icon">
			<i class="fa fa-tasks fa-5x"></i>
		</div>
		<div class="qty"><?php echo $count_pro; ?> <br> Products</div>
		</div>
		<div class="bottom-link">
			<a href="index.php?view_product">
				View Details
			</a>
			<a href="index.php?view_product">
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div><!-- div-cat-main-single start -->

	<div class="div-cat-main-single red"><!-- div-cat-main-single start -->
		<div class="div-top-title">
			<div class="icon">
			<i class="fa fa-comment-alt fa-5x"></i>
		</div>
		<div class="qty">
			<?php echo $count_coust; ?> <br>
			Customers
		</div>
		</div>
		<div class="bottom-link">
			<a href="index.php?view_customer">
				View Details
			</a>
			<a href="index.php?view_customer">
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div><!-- div-cat-main-single start -->

	<div class="div-cat-main-single green"><!-- div-cat-main-single start -->
		<div class="div-top-title">
			<div class="icon">
			<i class="fa fa-shopping-cart fa-5x"></i>
		</div>
		<div class="qty">
			<?php echo $count_p_cats; ?> <br>
			 Categories
		</div>
		</div>
		<div class="bottom-link">
			<a href="index.php?view_product_cat">
				View Details
			</a>
			<a href="index.php?view_product_cat">
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div><!-- div-cat-main-single start -->

	<div class="div-cat-main-single yellow"><!-- div-cat-main-single start -->
		<div class="div-top-title">
			<div class="icon">
			<i class="fa fa-bus fa-5x"></i>
		</div>
		<div class="qty">
			<?php echo $count_order; ?> <br>
			Orders
		</div>
		</div>
		<div class="bottom-link">
			<a href="index.php?view_order">
				View Details
			</a>
			<a href="index.php?view_order">
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div><!-- div-cat-main-single start -->

</div><!-- div-cat-container start -->

<div class="table-container-start mt-3">
	<div class="table-main-container">
		<div class="table-title mb-3 bg-primary p-2 text-light">
			<h3> 
				<i class="fa fa-bus"></i> New Orders
			</h3>
		</div>
		<table class="table table-responsive table-hovered table-striped table-bordered">
			<thead class="table-info">
				<th>
					Order No :
				</th>
				<th>
					Customer Email :
				</th>
				<th>
					Invoice No :
				</th>
				<th>
					Total :
				</th>
				<th>
					Date :
				</th>
				<th>
					Stauts :
				</th>
			</thead>
			<tbody>

				<?php 
					$i = 0;
					$get_order = "SELECT * FROM customer_order ORDER BY 1 DESC LIMIT 0,20";
					$run_order = mysqli_query($con,$get_order);
					while ($row_order = mysqli_fetch_array($run_order)) {
						$order_id = $row_order['order_id'];
						$customer_id = $row_order['customer_id'];
						$pro_id  = $row_order['product_id'];
						
						$invoice_number = $row_order['invoice_no'];
						$qty = $row_order['qty'];
						$size = $row_order['size'];
						$date = $row_order['order_date'];
						$status = $row_order['order_status'];
						$i++;
					

				 ?>
				<tr>
					<td># <?php echo $i; ?></td>
					<td><?php echo $customer_id; ?></td>
					<td><?php echo $invoice_number; ?></td>
					<td></td>
					<td><?php echo $date; ?></td>
					<td><?php echo $status; ?></td>
				</tr>
			<?php } ?>
			</tbody>

		</table>
		<div class="all-order">
			<a href="">View All Orders <i class="fa fa-angle-right"></i></a>
		</div>
	</div>
	<?php 
		$admin_email = $_SESSION['admin_email'];
		$select_admin = "SELECT * FROM admins WHERE admin_email='$admin_email'";
		$run_admin = mysqli_query($con,$select_admin);
		$row_admin = mysqli_fetch_array($run_admin);


	 ?>
	<div class="profile-main-container">
		<div class="admin-photo">
			<img src="assets/admin_images/asraf.jpeg" width="200px" class="img-thumbnail" style="background: #ddd" alt="">
		</div>
		<div class="admin-info">
				<h4><?php echo $row_admin['admin_name']; ?> <br> <span class="admin-title"><?php echo $row_admin['admin_job']; ?></span></h4>
		</div>
		<div class="admin-contact">
			<p>
				<i class="fa fa-user"></i> <strong>Email :</strong> <?php echo $row_admin['admin_email']; ?>
			</p>
			<p>
				<i class="fa fa-globe"></i> <strong>Country :</strong> <?php echo $row_admin['admin_country']; ?>
			</p>
			<p>
				<i class="fa fa-phone"></i> <strong>Contact :</strong> <?php echo $row_admin['admin_contact']; ?>
			</p>
		</div>
		<div class="admin-about-text">
			<h4 class="about">About</h4>

			<p>
				<?php echo $row_admin['admin_about']; ?>
			</p>
		</div>

	</div>
</div>