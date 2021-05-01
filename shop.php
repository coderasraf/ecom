<?php 
session_start();
include ("includes/db.php" );
include ('functions/functions.php');

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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb custom_bread">
                    <li><a href="index.php">Home<i class="fa fa-angle-right ml-2 mr-2"></i></a>Shop</li> 
                </ul>
            </div>
        </div>
        <div class="row"><!-- start sidebar area row -->
            <div class="col-md-3"><!-- start sidebar area col-md-3 -->
                <?php
                    include 'includes/sidebar.php';
                ?>
            </div><!-- start sidebar area col-md-3 -->
            <div class="col-md-9"><!-- start shom main area col-md-9 -->
                <div class="row"><!-- start shom main title -->
                    <div class="col-md-12">
                        <div class="shop_page_top_title">
                    <?php 
                      if (!isset($_GET['p_cat'])) {
                        if (!isset($_GET['cat_id'])) {
                          echo "<div class='box'>
                          <h1>Shop</h1>
                          <p>This theme is created by Hass asraf for personal uses and teaches my own youtube audience.Also for shared any interested learner who want to learn how to make E-commarce website..</p>
                            </div>";
                        }
                      }
                     ?>                            
                        </div>
                    </div>
                </div><!-- end shom main title -->
                <div class="row">
                  <?php  getPcatPro(); ?>
                  <?php   getCatPro(); ?> 
                </div>
              
                <div class="row"><!-- start shom main area single product row -->  
          <?php 
            if (!isset($_GET['p_cat'])) {
              if (!isset($_GET['cat_id'])) {
                 $per_page = 6;
                 if (isset($_GET['page'])) {
                   $page = $_GET['page'];

                  }else{
                    $page = 1;
                  }
                  $start_from = ($page-1) * $per_page;
                  $first = $page - 1;
                  $get_product = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from,$per_page";

                  $run_pro = mysqli_query($con, $get_product);
                  while ($rows = mysqli_fetch_assoc($run_pro)) {
                    $pro_id            = $rows['product_id'];
                    $pro_title         = $rows['product_title'];
                    $pro_price         = $rows['product_price'];
                    $pro_img1          = $rows['product_img1'];
                    // $get_product       = "SELECT * FROM product_category where pro_cat_id=$pro_id";
                    // $run_query       = mysqli_query($con,$get_product);
                    // $rows_p_scat = mysqli_fetch_assoc($run_query);
                    // $p_cat_id = $rows_p_scat['p_cat_id'];
                    // $product_cat_title = $rows_p_scat['p_cat_title'];
                    // $product_desc = $rows_p_scat['p_cat_desc'];


                    echo "<div class='col-lg-4 col-md-6 col-sm-6 single text-center'>
                    <div class='product auto-width'>
                     <span class='category'>
                      category
                 </span>
                  <a href='details.php?pro_id=$pro_id'>
                      <img src='admin_area/product_images/$pro_img1' class='img-responsive' alt=''>
                  </a>
                  <div class='text'>
                      <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                      <p class='price'>$ $pro_price</p>
                      <p class='buttons text-center'>
                        <a href='details.php?pro_id=$pro_id' class='mb-2 ml-2 btn btn-default'>
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
      ?>
    </div><!-- end shom main area single product row -->
            <!-- start of pagination area -->
                <div class="row">
                  <div class="col-md-6 offset-md-3 text-center">
                    <ul class="pagination item-center text-center">
                    <?php 
                    $query = 'SELECT * FROM products';
                    $run_query = mysqli_query($con, $query);
                    $total_record = mysqli_num_rows($run_query);
                    $total_page  = ceil($total_record/$per_page);
                    echo "<li class='page-item'><a class='page-link' href='shop.php?page=1'>".'First Page'."</a></li>";
                    for ($i=1; $i <$total_page ; $i++) { 
                      echo "<li class='page-item'><a class='page-link' href='shop.php?page=".$i."'>".$i."</a></li>";
                    };
                     echo "<li class='page-item'><a class='page-link' href='shop.php?page=$total_page'>".'Last Page'."</a></li>";
                    }

                   }
                ?>
             </ul>
          </div>
    </div>
    <!-- end of pagination area -->             
  </div><!-- end shom main area col-md-9 -->
</div><!-- end sidebar area -->
</div>
</div><!-- end shop middle area -->


<?php include('includes/footer.php');?>
</body>
</html>