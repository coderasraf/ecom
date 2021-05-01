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
                                <th>Customer Email</th>
                                <th>Customer Country</th>
                                <th>Customer City</th>
                                <th>Customer Contact</th>
                                <th>Customer Address</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                         <?php 

                          $i = 0;
                          $get_product = "SELECT * FROM customers";
                          $run_products = mysqli_query($con,$get_product);
                          while ($row=mysqli_fetch_array($run_products)) {
                            $customer_id = $row['customer_id'];
                            $customer_name = $row['customer_name'];
                            $customer_email  = $row['customer_email'];
                            $customer_country  = $row['customer_country'];
                            $customer_city  = $row['customer_city'];
                            $customer_contact  = $row['customer_contact'];
                            $customer_address  = $row['customer_address'];
                            $i++;
                            ?>
                              
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $customer_name; ?></td>
                            <td><?php echo $customer_email; ?></td>
                            <td><?php echo $customer_country; ?></td>
                            <td><?php echo $customer_city; ?></td>
                            <td><?php echo $customer_contact; ?></td>
                            <td><?php echo $customer_address; ?></td>
                            <td><a href="index.php?del_customer=<?php echo(base64_encode($customer_id)); ?>" onclick="return confirm('Are u sure to delete this file!')"  class="btn btn-danger btn-round"><i class="fa fa-trash"></i></a></td>
                        </tr>
                           
                         <?php } ?>
                            
                            
                            
                        </tbody>
                    </table>
                    </div>


<?php } ?>