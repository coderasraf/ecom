<?php 
session_start();
include ("includes/db.php" );
include ('functions/functions.php');
?>


<?php 
	
	if (isset($_GET['c_id'])) {
		$customer_id = $_GET['c_id'];

		$ip_add = getUserIp();
		$status = 'Pending';
		$invoice_no = mt_rand();
		$select_cart = "SELECT * FROM cartitem WHERE ip_add='$ip_add'";
		$run_cart = mysqli_query($con,$select_cart);
		while ($row = mysqli_fetch_array($run_cart)) {
			$pro_id = $row['p_id'];
			$pro_size = $row['size'];
			$pro_qty = $row['qty'];

			$get_product = "SELECT * FROM products WHERE product_id='$pro_id'";
			$run_product = mysqli_query($con, $get_product);
			while ($row = mysqli_fetch_array($run_product)) {
				$sub_total = $row['product_price'] * $qty;

				$insert_customer_order = "INSERT INTO customer_order (customer_id,product_id,due_amount,invoice_no,qty,size,order_date,order_status) VALUES ('$customer_id','$pro_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";

				$run_cust_order = mysqli_query($con, $insert_customer_order);

				$insert_pending_order = "INSERT INTO pending_order(customer_id,invoice_no,product_id,qty,size,order_status) VALUES ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";
				$run_pending_order = mysqli_query($con,$insert_pending_order);
				$delete_cart = "DELETE FROM cartitem WHERE ip_add='$ip_add'";
				$run_delete = mysqli_query($con, $delete_cart);
				echo "<script>alert('Your Order has been submitted!')</script>";
				echo "<script>window.open('customer/my_account.php?my_order', '_self')</script>";



			}
		}
	}

	

 ?>
