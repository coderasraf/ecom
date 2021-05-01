<div class="box">
	<div class="panel panel-default sidebar-menu">
	<div class="panel-heading mb-2"> <!--panel heading start -->
		<div class="img" style="height: 400px; width: 300px;background-image:url('assets/customer_images/man.jpeg');background-size: cover;background-position: center top"></div>
		<?php 

			$session_customer = $_SESSION['customer_email'];
			$get_customer = "SELECT * FROM customers WHERE customer_email='$session_customer'";
			$run_cust = mysqli_query($con,$get_customer);
			$row_customer = mysqli_fetch_array($run_cust);
			$customer_name = $row_customer['customer_name'];
			$customer_photo= $row_customer['customer_image'];

			if (!isset($_SESSION['customer_email'])) {
				
			}else{
				echo '<center>
			<a href="my_account.php">
			</a></center><h5  class="p-2 panel-title" align="center">Name:'."$customer_name".' </h5></div>';
			}


		 ?>
	<div class="panel-body"><!--panel body start -->
		<ul class="nav nav-pills flex-column">
			<li class="nav-item ">
				<a class="nav-link <?php if(isset($_GET['my_order'])){echo"active";}?>" href="my_account.php?my_order"> <i class="fa fa-list mr-2"></i>My Order</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link <?php if(isset($_GET['pay_offline'])) {echo"active";} ?> " href="my_account.php?pay_offline"><i class="fa fa-bolt mr-2"></i>Pay Offline</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link <?php if(isset($_GET['my_address'])) {echo"active";} ?> " href="my_account.php?my_address"><i class="fa fa-map-marker mr-2"></i>My Address</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link <?php if(isset($_GET['edit_act'])) {echo"active";} ?> " href="my_account.php?edit_act"><i class="fa fa-pen mr-2"></i>Edit Account</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link <?php if(isset($_GET['change_pass'])) {echo"active";} ?> " href="my_account.php?change_pass"><i class="fa fa-bolt mr-2"></i>Change Password</a>
			</li>

			<li class="nav-item ">
				<a class="nav-link <?php if(isset($_GET['delete_ac'])) {echo"active";} ?> " href="my_account.php?delete_ac"><i class="fa fa-trash mr-2"></i>Delete Account</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link <?php if(isset($_GET['logout'])) {echo"active";} ?> " href="my_account.php?logout"><i class="fa fa-user mr-2"></i>Logout</a>
			</li>

			
		</ul>
	</div><!--panel body end -->
</div>
</div>