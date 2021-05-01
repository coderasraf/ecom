<div class="box"> <!--start box -->
	<center>
	<h1>My Order</h1>
	<p class="text-muted">
		If you have any problem.Please, let us know as soon as possible.We are ready to help you and help to your business and also u can  <a href="../contact.php">
			contact us
		</a>
		24/7.. Thanks!
	</p>	
</center>
<hr>
<div class="table-responsive"><!--start table-resposive -->
	<table class="table table-bordered table-striped table-hover"><!--table table-bordered -->
		<thead>
			<tr>
				<th>Sr. NO</th>
				<th>Due Amount</th>
				<th>Invoice Number</th>
				<th>Quantity</th>
				<th>Size</th>
				<th>Order Date</th>
				<th>Paid/Unpaid</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$customer_session = $_SESSION['customer_email'];
				$get_customer = "SELECT * FROM customers WHERE customer_email='$customer_session'";
				$run_customer = mysqli_query($con,$get_customer);
				$row_customer = mysqli_fetch_assoc($run_customer);
				$customer_id = $row_customer['customer_id'];
				$get_order = "SELECT * FROM customer_order WHERE customer_id = '$customer_id'";
				$run_order = mysqli_query($con,$get_order);
				$i = 0;
				while ($row = mysqli_fetch_assoc($run_order)) {
					$order_id = $row['order_id'];
					$due_amount = $row['due_amount'];
					$invoice_no = $row['invoice_no'];
					$qty = $row['qty'];
					$size = $row['size'];
					$order_date = substr($row['order_date'], 0,11);
					$order_status = $row['order_status'];
					$i++;
					if ($order_status == 'Pending') {
						$order_status = "<p class='text-danger' style='font-weight:bold'>Unpaid!</p>";
					}else{
						$order_status = "<p class='text-success' style='font-weight:bold'>Paid!</p>";
					}
			 ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td>$<?php echo $due_amount; ?></td>
				<td><?php echo $invoice_no; ?></td>
				<td><?php echo $qty; ?></td>
				<td><?php echo $size; ?></td>
				<td><?php echo $order_date; ?></td>
				<td><?php echo $order_status; ?></td>
				<td colspan="2">
					<?php 
						if ($order_status=='Complete') {
							?>
								<a href="javascript.avoid(0)">Confirmed</a>
						<?php }else{
							?>
    					<a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_self" class="btn btn-primary btn-sm">Confirm!</a>
						<?php } ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table><!--table table-bordered end -->
</div><!--start table-resposive -->
</div><!--end box -->