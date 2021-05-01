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
                <li><a href="customer_registration.php" class="active">Register</a></li>
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
                <li>
                  
                   <?php 

                    if (!isset($_SESSION['customer_email'])) {
                      echo "<a href='checkout.php'>Login</a>";
                    }else{
                      echo "<a href='Logout.php'>Logout</a>";
                    }

                    ?>
                      
                    </li>
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
                <li><a href="shop.php">Shop</a></li>
                <li><a href="customer/my_account.php">My Account</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li>
                  <?php 
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>My Account</a>";
              }else{
                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
              }
             ?>
                </li>
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
                    <li><a href="index.php">Home<i class="fa fa-angle-right ml-2 mr-2"></i></a>Registar</li> 
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
               <div class="box"><!-- start box -->
                   <div class="box-header bg-gray"><!--start box-header -->
                       <center><h3>Customer Registration</h3></center>
                     
                       <hr>
                   </div><!-- end box-header -->
                   <form action="customer_registration.php" method="post" enctype="multipart/form-data"><!-- start form -->
                       <div class="form-group">
                           <label for="name">Customer Full Name</label>
                           <input type="text" id="name" placeholder="name" name="c_name" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="email">Customer Email Address</label>
                           <input type="email" placeholder="Enter email" name="c_email" id="email" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="password">Customer Password</label>
                           <input type="password" placeholder="Enter your password" name="c_password" id="password" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="cuntry">Customer Country</label>
                         	<input id="country" type="text" name="c_cuntry" placeholder="Your country" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="city">Customer City</label>
                         	<input id="city" type="text" name="c_city" placeholder="Your City" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="number">Contact Number</label>
                         	<input id="number" type="phone" name="c_number" placeholder="Contact Number" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="Address">Address</label>
                         	<input id="Address" type="text" name="c_address" placeholder="Address" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="image">Your Photo</label>
                         	<input id="image" type="file" name="c_image" class="form-control" required="">
                       </div>
                       <div class="text-center">
                       	<button type="submit" name="c_submit" value="Register" class="btn btn-primary">
                       		<i class="fa fa-user"></i> Register
                       	</button>
                       </div>
                   </form><!-- end form -->
               </div><!-- end box -->
            </div><!-- end shom main area col-md-9 -->
        </div><!-- end sidebar area -->
    </div>
</div><!-- end shop middle area -->


<?php include('includes/footer.php');?>
</body>
</html>

<?php 
  
  if (isset($_POST['c_submit'])) {

      $c_name      = $_POST['c_name'];
      $c_email     = $_POST['c_email'];
      $c_password  = $_POST['c_password'];
      $c_cuntry    = $_POST['c_cuntry'];
      $c_city      = $_POST['c_city'];
      $c_number    = $_POST['c_number'];
      $c_address   = $_POST['c_address'];
      $c_image     = $_FILES['c_image']['name'];
      $c_tmp_name  = $_FILES['c_image']['tmp_name'];
      $c_ip        = getUserIp();


      $insert_customer = "INSERT INTO customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,   customer_image,customer_ip) VALUES ('$c_name','$c_email','$c_password','$c_cuntry','$c_city','$c_number','$c_address','$c_image','$c_ip')";
      $run_customer = mysqli_query($con,$insert_customer);

       if ($run_customer) {
         move_uploaded_file($c_tmp_name, "customer/assets/customer-images/$c_image");

         $sel_cart     = "SELECT FROM cartitem WHERE ip_add = '$c_ip'";
          $run_cart     = mysqli_query($con,$sel_cart);

          if (mysqli_num_rows($run_cart) > 0) {

             $_SESSION['customer_email'] = $c_email;
             echo "<script>alert('You have been registared successfully!')</script>";
             echo "<script>window.open('checkout.php', '_self')</script>";
          }
          else{
            $_SESSION['customer_email'] = $c_email;
              echo "<script>alert('You have been registared successfully!')</script>";
             echo "<script>window.open('index.php', '_self')</script>";

          }
       }else{
        echo "<script>alert('not inserted!')</script>";
       }

      

       

  }

 ?> 