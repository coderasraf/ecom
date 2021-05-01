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
      <a href="" class="text-light carts">Shopping Cart Total Price: BDT <?php totalPrice(); ?>, Total Item: <span style="font-size: 17px; font-weight: bold;"><?php item(); ?> </span></a>
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
                <li class=""><a href="index.php" class="active">Home</a></li>
                <li><a href="shop.php" class="">Shop</a></li>
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
                <li class=""><a href="index.php" class="active">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
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
                <a href="cart.php" class="btn btn-primary">
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
  <!-- slider area start -->
   <section class="carousel-area">
       <div class="owl-carousel carousel-inner">
           
           <?php

           $getSlider = "select * from slider LIMIT 0,4";
           $runSlide = mysqli_query($con, $getSlider);

            while ($row= mysqli_fetch_array($runSlide)) {

                $slider_name = $row['slider_name'];
                $slider_images = $row['slider_image'];

                echo "<div class='single-carusel-item bg' style='background-image:url(admin_area/slider_images/$slider_images)';>
                 <div class='container'>
                   <div class='row'>
                       <div class='col-md-6'>
                           <div class='simple-text'>
                               <h1>Your Best Online Shop</h1>
                               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores nam doloribus iure atque ipsum harum doloremque deserunt, voluptatibus ad molestiae.</p>
                                <a href=''  class='btn btn-primary'>Learn More <i class='fa fa-angle-right ml-2'></i></a>
                           </div>
                       </div>
                       
                   </div>
               </div>
           </div>";
                
            }

           ?>

      </div>
   </section> 
  <!-- end of slider area -->

  <!-- customer commitment area start -->
  <div id="advantage">
      <div class="container">
          <div class="same-height-row row">
              <div class="col-md-4 col-sm-6">
                  <div class="box same-height">
                      <div class="icon">
                          <i class="fa fa-heart"></i>
                      </div>
                      <h3><a href="#">BEST PRICES</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, dicta. Lorem ipsum dolor sit amet.</p>
                  </div>
              </div>
              <div class="col-md-4 col-sm-6">
                  <div class="box same-height">
                      <div class="icon">
                          <i class="fa fa-heart"></i>
                      </div>
                      <h3><a href="#">100% SATISFICATION GURANTED FORM US </a></h3>
                      <p>Free Rturn on everything for 3 months.</p>
                  </div>
              </div>
              <div class="col-md-4 col-sm-6">
                  <div class="box same-height">
                      <div class="icon">
                          <i class="fa fa-heart"></i>
                      </div>
                      <h3><a href="#">WE LOVE OUR CUSTOMERS</a></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates,.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- customer commitment area end -->
  <!-- hotbox product area -->
  <div id="hotbox" class="bg-light  p-4 mb-3">
      <div class="container">
          <div class="row text-center">
              <div class="col-md-12">
                  <div class="hotbox_title">
                      <h1 class="text-italic ">Latest This Week</h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- start of hotbox main content -->
  <section>
      <div class="container">
          <div class="row">             
              <?php getPro(); ?>
          </div>
      </div>
  </section><!-- end of hotbox main content -->
  

  <!-- footer start -->
  <?php include 'includes/footer.php'; ?>
  <!-- footer end -->
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
</body>
</html>



