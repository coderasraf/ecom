<?php 
session_start();
include ("includes/db.php" );
include ('functions/functions.php');
  if (isset($_GET['pro_id'])) {
      $pro_id = $_GET['pro_id'];
      $get_products = "SELECT * FROM products WHERE product_id = $pro_id";
      $run_products = mysqli_query($db, $get_products);
      $row_products = mysqli_fetch_assoc($run_products);
      $p_cat_id = $row_products['product_cat_id'];
      $product_id = $row_products['product_id'];
      $p_title = $row_products['product_title'];
      $p_price = $row_products['product_price'];
      $p_desc = $row_products['product_desc'];
      $p_imag1 = $row_products['product_img1'];
      $p_imag2 = $row_products['product_img2'];
      $p_imag3 = $row_products['product_img3'];
      $get_p_cats = "SELECT * FROM product_category WHERE p_cat_id = $p_cat_id";
      $run_p_cats = mysqli_query($db, $get_p_cats);
      $row_p_cat = mysqli_fetch_array($run_p_cats);
      $p_cat_id = $row_p_cat['p_cat_id'];
      $p_cat_title = $row_p_cat['p_cat_title'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commarce Store</title>
    <link rel="stylesheet" href="assets/font-awesome/css/all.min.css">
     <link rel="stylesheet" href="assets/vendors/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    

</head>
<body>

 <div id="top"><!-- start header top bar -->

    <div class="container"><!-- header container start -->

      <div class="row">
        <div class="col-md-7 col-sm-12 offer"><!-- col-md-6 offer  start-->
            <a href="" class="btn btn-primary btn-sm">
                
                <?php 
                if (!isset($_SESSION['customer_email'])) {
                  echo "Welcome Guest";
                }else{
                  echo "Welcome: ". $_SESSION['customer_email'] ."";
                }
               ?>


            </a>
            <a href="" class="text-light carts">Shopping Cart Total Price: BDT <?php totalPrice(); ?>, Total Item: <span style="font-size: 17px; font-weight: bold;"><?php item(); ?></span></a>
        </div><!-- col-md-6 offer  end-->

        <div class="col-md-5 col-sm-12 "><!-- Top Menu Start-->
            <ul class="menu">
                <li><a href="customer_registration.php">Register</a></li>
                <li>
                  <?php 
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>My Account</a>";
              }else{
                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
              }
             ?>
                </li>
                <li><a href="cart.php">Goto Cart</a></li>
                <li><?php 

                    if (!isset($_SESSION['customer_email'])) {
                      echo "<a href='checkout.php'>Login</a>";
                    }else{
                      echo "<a href='Logout.php'>Logout</a>";
                    }

                    ?></li>
            </ul>
        </div><!-- top menu end-->
        </div>

    </div><!-- end of header container  -->

 </div><!-- end of header top bar -->   
    
<!-- responsive toggle menu start -->
<div class="side-menu">
    <ul class="side-menu-item">
         <span class="menu-sidebar-close">&times;</span>
                <li class=""><a href="index.php">Home</a></li>
                <li><a href="shop.php" class="active">Shop</a></li>
                <li>
                  <?php 
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>My Account</a>";
              }else{
                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
              }
             ?>
                </li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact Us</a></li>
    </ul>
</div>
<!-- responsive toggle menu end -->


 <!-- navigation area start -->
<div class="header_top">
    <div class="container">
     <div class="menu-area menu-item">
    <div class="logo-area">
            <a href="index.php" class="logo"><img src="assets/images/logo.png" alt=""></a>
    </div>
        <span class="menus-bar">
            <i class="fa fa-bars"></i>
        </span>
        <ul class="main-menu menu">
                <li class=""><a href="index.php" class="">Home</a></li>
                <li><a href="shop.php" class="active">Shop</a></li>
                <li>
                  <?php 
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>My Account</a>";
              }else{
                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
              }
             ?>
                </li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div class="search-area right-area">
                <span class="search"><i class="fa fa-search"></i></span>
                <a href="" class="btn btn-primary">
                    <i class="fa fa-cart-plus" ></i>
                     <?php item(); ?> items
                </a>
            </div>
        </div>
            
        </div>  
</div>
 </div>
 <form action="">
    <div class="form-group searc-group-area">
        <input type="search" placeholder="Search product" class="form-control input_search">
        <input type="submit" class="btn btn-primary btn-sm search-submit" name="search" value="Search">

    </div>
 </form>
</div>  <!-- navigation area end -->


<div id="content"><!-- start shop middle area -->
    <div class="container"><!-- start container area -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb custom_bread">
                    <li>
                        <a href="index.php">
                            Home<i class="fa fa-angle-right ml-2 mr-2"></i>
                        </a>
                    </li>
                    <li>
                        <a href="shop.php">
                            Shop <i class="fa fa-angle-right ml-2 mr-2"></i>
                        </a>
                    </li>
                    <li>
                        <a href="shop.php?p_cat= <?php echo $p_cat_id; ?>">
                            <?php echo $p_cat_title; ?><i class="fa fa-angle-right ml-2 mr-2"></i>
                        </a>
                        </li>
                        <li>
      
                            <?php echo $p_title; ?>
                    
                    </li> 
                </ul>
            </div>
        </div>
        <div class="row"><!-- start sidebar area row -->
            <div class="col-md-3 col-sm-12 "><!-- start sidebar area col-md-3 -->
                <?php
                    include 'includes/sidebar.php';
                ?>
            </div><!-- start sidebar area col-md-3 -->

                <!-- start col-md-9 area -->
                <!-- <div class="row" id="productmain"> -->
                    <div class="col-md-4 col-sm-12"> <!-- start col-md-5 area -->
                     <div class="owl-carousel product-carousel">
                        <div class="single-product-carousel"><!-- start singl carousel area -->
                         <div class="product">
                             <span class="category">
                             <?php echo $p_cat_title;; ?>
                            </span>
                         
                            <img src="admin_area/product_images/<?php echo ($p_imag1); ?>" class="img-responsive" alt="">
                         
                           </div>
                        </div><!-- end single carousel area -->
                        <div class="single-product-carousel"><!-- start singl carousel area -->
                         <div class="product">
                             <span class="category">
                            <?php echo $p_cat_title; ?>
                            </span>
                         
                            <img src="admin_area/product_images/<?php echo ($p_imag2); ?>" class="img-responsive" alt="">
                         
                        </div>
                        </div><!-- end single carousel area -->
                        <div class="single-product-carousel"><!-- start singl carousel area -->
                         <div class="product">
                             <span class="category">
                            
                             <?php echo $p_cat_title; ?>
                            </span>
                         
                            <img src="admin_area/product_images/<?php echo ($p_imag3); ?>" class="img-responsive" alt="">
                         
                        </div>
                        </div><!-- end single carousel area -->
                        </div>
                    </div><!-- end col-md-5 area -->
                    <div class="col-md-5"><!-- start col-md-5 area -->
                <div class="box"> <!--box start-->
                <h2 class="">
                    <?php echo $p_title; ?>
                </h2>
               
                <form action="details.php?add_cart=<?php echo($pro_id);?>" method="POST" class="form-horizontal"><!--form start-->
                     <?php addCart(); ?>
                    <div class="form-group"> <!--start form group-->
                        <label for="" class="control-label">Product Quantity</label>
                            <select name="product_qty" class="form-control" required="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                    </div><!--end form group-->
                    <div class="form-group"><!--start form group-->
                        <label class="control-label">Product-size</label>
                        <div class="">
                            <select name="product_size" class="form-control" required="">
                                <option >Select Size</option>
                                <option value="Medium">Medium</option>
                                <option value="Small">Small</option>
                                <option value="Large">Large</option>
                                <option value="Huge Large">Huge Large</option>
                            </select>
                        </div>
                    </div><!--end form group-->
                    <h3 class="prices text-center"><?php echo $p_price; ?>$</h3>
                    <p class="text-center buttons">
                        <button name="submit" class="btn btn-primary" type="submit">
                            <i class="fa fa-cart-plus"></i>Add to cart
                        </button>
                    </p>
                    
                </form><!--form end-->
                        </div><!--box end-->
                       <div class="box"><!--box start-->
                            <div class="row">
                            <div class="col-xs-4 thumb col-md-4">
                            <a href="#">
                                <img src="admin_area/product_images/<?php echo($p_imag3); ?>" class="img-responsive" alt="">
                            </a>
                        </div>
                        <div class="col-xs-4 thumb col-md-4">
                            <a href="#">
                                <img src="admin_area/product_images/<?php echo($p_imag1); ?>" class="img-responsive" alt="">
                            </a>
                        </div>
                        <div class="col-xs-4 thumb col-md-4">
                            <a href="#">
                                <img src="admin_area/product_images/<?php echo($p_imag2); ?>" class="img-responsive" alt="">
                            </a>
                        </div>
                        </div>
                       </div><!--box end-->
                    </div><!-- end col-md-5 area -->
        </div><!-- end sidebar and slider and product quantity row area -->
        <div class="box"> <!--start box -->
            <div class="product-details-content">
                <h2 class="display-5">Product Details</h2>
                <p class="lead"><?php echo $p_desc; ?></p>
                <h4 class="display-5">Size</h4>
                <ul>
                    <li>Large</li>
                    <li>Small</li>
                    <li>Extra Small</li>
                    <li>Medium</li>
                    <li>Extra Large</li>
                </ul>
            </div>
        </div><!--end box -->
        <div class="row same-height-row"><!--row same-height-row start-->
            <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
                <div class="box same-height headline"><!--box same-height headline-->
                    <h3 class="text-center">You Also may like these products</h3>
                </div><!--box same-height headline-->
            </div><!--col-md-3 col-sm-6 end-->
        <?php   
            $get_products = "SELECT * FROM products order by 1 desc limit 0,3";
            $run_products = mysqli_query($con, $get_products);
            while ($row = mysqli_fetch_assoc($run_products)) {
                $pro_id = $row['product_id'];
                $p_cat_id = $row['product_cat_id'];
                $product_title = $row['product_title'];
                $product_price = $row['product_price'];
                $product_img1 = $row['product_img1'];


                // $get_p_cats ="SELECT * FROM product_category where p_cat_id='$p_cat_id'";
                // $run_p_cats = mysqli_query($con, $get_p_cats);
                // $row = mysqli_fetch_assoc($run_p_cats);
                // $

                echo "<div class='center-responsive col-md-3'><!--center-responsive col-md-3 start-->
                <div class='product same-heights'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img class='img-responsive' src='admin_area/product_images/$product_img1' alt=''>
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
                        <p class='price lead'>$product_price $</p>
                    </div>
                </div>
            </div><!--center-responsive col-md-3 end-->
            ";
            }


         ?>







            
        </div><!--row same-height-row end-->
    </div><!-- end container area -->
</div><!-- end shop middle area -->






<?php include('includes/footer.php');?>
</body>
</html>