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
      Dashboard / View Product</h3>
		</li>
	</div>
</div>
</div>
       <div class="table-responsive">
                        <table id="data" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Product Keyword</th>
                                <th>Product Date</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php 

                          $i = 0;
                          $get_product = "SELECT * FROM products ORDER BY 1 DESC";
                          $run_products = mysqli_query($con,$get_product);
                          while ($row=mysqli_fetch_array($run_products)) {
                            $pro_id = $row['product_id'];
                            $product_title = $row['product_title'];
                            $product_img1 = $row['product_img1'];
                            $product_price = $row['product_price'];
                            $product_keyword = $row['product_keyword'];
                            $product_id = $row['product_id'];
                            $dates = $row['dates'];
                            $i++;
                            ?>
                              
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $product_title; ?></td>
                            <td><img src="product_images/<?php echo($product_img1); ?>" width='50px' alt=""></td>
                            <td><?php echo $product_price; ?></td>
                            <td><?php echo $product_keyword; ?></td>
                            <td><?php echo $dates; ?></td>
                            <td><a href="index.php?delete_product=<?php echo($pro_id); ?>" onclick="return confirm('Are u sure to delete this file!')"  class="btn btn-danger btn-round"><i class="fa fa-trash"></i></a></td>
                            <td><a href="index.php?edit_product=<?php echo($pro_id); ?>" class="btn btn-primary"><i class="fa fa-pen"></i></a></td>
                        </tr>
                           
                         <?php } ?>
                            
                            
                            
                        </tbody>
                    </table>
                    </div>


<?php } ?>