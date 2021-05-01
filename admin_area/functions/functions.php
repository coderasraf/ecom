<?php 

	$db = mysqli_connect('localhost', 'root', '', 'ecom');

	function getPro(){
		global $db;

		$get_products = "SELECT * FROM products order by 1 DESC LIMIT 0,6";
		$run_products = mysqli_query($db, $get_products);
		while ($row_product = mysqli_fetch_assoc($run_products)) {
			$pro_id 		= $row_product['product_id'];
			$pro_title		= $row_product['product_title'];
			$pro_price 		= $row_product['product_price'];
			$pro_img1		= $row_product['product_img1'];

			echo "<div class='col-md-4 col-sm-6 single text-center'>
                  <div class='product auto-width'>
                    <span class='category'>
                        $pro_title
                    </span>
                      <a href='details.php?pro_id=$pro_id'>
                          <img src='admin_area/product_images/$pro_img1' class='img-responsive' alt=''>
                      </a>
                      <div class='text'>
                          <h3><a href='details.php?pro_id=$pro_id'>$pro_title</h3>
                          <span class='star'>
                              <i class='fa fa-star'></i>
                              <i class='fa fa-star'></i>
                              <i class='fa fa-star'></i>
                              <i class='fa fa-star'></i>
                              <i class='fa fa-star'></i>
                              
                              (44+)
                          </span>
                          <p class='price'>$ $pro_price</p>
                          <p class='buttons text-center'>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
                                View Details <i class='fa fa-angle-right ml-2'></i>
                           </a>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                <i class='fa fa-cart-plus'></i>Add To Cart
                            </a>
                         </p>
                      </div>
                  </div>
              </div>";

		}
	}


 ?>