<?php 
include ('includes/db.php');
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
}
else{

?>

<div class="row">
	<div class="col-lg-12">
	<div class="breadcrumb">
		<li class="active">
			<h3><i class="fa fa-power-off"></i>
      Dashboard / Customers</h3>
		</li>
	</div>
</div>
</div>
       <div class="table-responsive">
                        <table id="data" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                            	<th>SL.No</th>
                                <th>Customer Name</th>
                                <th>Invoice No</th>
                                <th>Amount Paid</th>
                                <th>Payments Method</th>
                                <th>Reference No.</th>
                                <th>Payment Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php 

                          $i = 0;
                          $get_product = "SELECT * FROM payments";
                          $run_products = mysqli_query($con,$get_product);
                          while ($row=mysqli_fetch_array($run_products)) {
                            $payment_id = $row['payment_id'];
                            $invoice_id  = $row['invoice_id'];
                            $amount  = $row['amount'];
                            $payment_mode  = $row['payment_mode'];
                            $ref_no    = $row['ref_no'];
                            $payment_date = $row['payment_date'];
                            $get_products = "SELECT * FROM customers WHERE customer_id='$payment_id'";
                            $run_product  = mysqli_query($con,$get_products);
                            $row_products = mysqli_fetch_array($run_product);
                            $customer_name = $row_products['customer_name'];
                            
                            $i++;
                            ?>

                              
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $customer_name; ?></td>
                            <td><?php echo $invoice_id; ?></td> 
                            <td><?php echo $amount; ?></td>
                            <td><?php echo $payment_mode; ?></td>
                            <td><?php echo ($ref_no); ?></td>
                            <td><?php echo $payment_date; ?></td>
                            <td><a href="index.php?del_payments=<?php echo(base64_encode($payment_id)); ?>" onclick="return confirm('Are u sure to delete this file!')"  class="btn btn-danger btn-round"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>  
                         <?php } ?>
                            
                            
                            
                        </tbody>
                    </table>
                    </div>


<?php } ?>