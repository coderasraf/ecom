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
                                <th>Customer Email</th>
                                <th>Product Title</th>
                                <th>Invoice No</th>
                                <th>Size</th>
                                <th>Qty</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Action</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                         <?php 

                          $i = 0;
                          $get_product = "SELECT * FROM customer_order";
                          $run_products = mysqli_query($con,$get_product);
                          while ($row=mysqli_fetch_array($run_products)) {
                            $order_id = $row['order_id'];
                            $customer_id = $row['customer_id'];
                            $product_id  = $row['product_id'];
                            $due_amount   = $row['due_amount'];
                            $invoice_no  = $row['invoice_no'];
                            $qty   		= $row['qty'];
                            $size  		= $row['size'];
                            $order_date = $row['order_date'];
                            $order_status = $row['order_status'];
                            $get_products = "SELECT * FROM products WHERE product_id='$product_id'";
                            $run_product  = mysqli_query($con,$get_products);
                            $row_products = mysqli_fetch_array($run_product);
                            $product_title = $row_products['product_title'];
                            
                            $i++;
                            ?>

                              
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <?php 
                                    $select = mysqli_query($con,"SELECT * FROM customers WHERE customer_id='$customer_id'");
                                    $row_customr = mysqli_fetch_array($select);
                                    echo $row_customr['customer_email'];
                                 ?>
                            </td>
                            <td><?php echo $product_title; ?></td>
                            <td><?php echo $invoice_no; ?></td> 
                            <td><?php echo $size; ?></td>
                            <td><?php echo $qty; ?></td>
                            <td><?php echo ($order_date); ?></td>
                            <td><?php echo $order_status; ?></td>
                            <td><a href="index.php?del_order=<?php echo(base64_encode($order_id)); ?>" onclick="return confirm('Are u sure to delete this file!')"  class="btn btn-danger btn-round"><i class="fa fa-trash"></i></a>
                            <a href="../details.php?pro_id=<?php echo($product_id); ?>" class="btn btn-primary btn-round"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                           
                         <?php } ?>
                            
                            
                            
                        </tbody>
                    </table>
                    </div>


<?php } ?>