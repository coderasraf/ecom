<?php 
session_start();
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php', '_self')</script>";
}else{
include ("includes/db.php" );

include ('../functions/functions.php');

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
            <a href="" class="btn btn-primary btn-sm">Welcome Guest</a>
            <a href="" class="text-light carts">Shopping Cart Total Price: BDT <?php totalPrice(); ?>, Total Item: <span style="font-size: 17px; font-weight: bold;"><?php item(); ?></span></a>
        </div><!-- col-md-6 offer  end-->

        <div class="col-md-5 col-sm-12 "><!-- Top Menu Start-->
            <ul class="menu">
                <li><a href="../customer_registration.php">Register</a></li>
                <li>
                  <?php 
                      if (!isset($_SESSION['customer_email'])) {
                        echo "<a href='checkout.php'>My Account</a>";
                      }else{
                        echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                      }
                ?>
                </li>
                <li><a href="../cart.php">Goto Cart</a></li>
                <li>
                    <?php 

                    if (!isset($_SESSION['customer_email'])) {
                      echo "<a href='checkout.php'>Login</a>";
                    }else{
                      echo "<a href='../Logout.php'>Logout</a>";
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
                <li class=""><a href="../index.php">Home</a></li>
                <li><a href="../shop.php">Shop</a></li>
                <li>
                  <?php 
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>My Account</a>";
              }else{
                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
              }
             ?>
                </li>
                <li><a href="../cart.php">Shopping Cart</a></li>
                <li><a href="../contact.php">Contact Us</a></li>
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
                <li class=""><a href="../index.php">Home</a></li>
                <li><a href="../shop.php">Shop</a></li>
                <li>
                  <?php 
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>My Account</a>";
              }else{
                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
              }
             ?>
                </li>
                <li><a href="../cart.php">Shopping Cart</a></li>
                <li><a href="../contact.php">Contact Us</a></li>
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
                    <li><a href="index.php">Home<i class="fa fa-angle-right ml-2 mr-2"></i></a>My Account</li> 
                </ul>
            </div>
        </div>
        <div class="row"><!-- start sidebar area row -->
            <div class="col-md-4"><!-- start sidebar area col-md-3 -->
                <?php
                    include 'includes/sidebar.php';
                ?>
            </div><!-- start sidebar area col-md-3 -->
            <div class="col-md-8"><!-- start shom main area col-md-9 -->
            <!-- include my order section -->
            <?php  if(isset($_GET['my_order'])) {include ('my_order.php'); }?>
            <!-- include end my order section -->

            <!-- include pay_offline section -->
            <?php  if(isset($_GET['pay_offline'])) {include ('pay_offline.php'); }?>
            <!-- include end pay_offline section -->

            <!-- include my_address section -->
            <?php  if(isset($_GET['my_address'])) {include ('my_address.php'); }?>
            <!-- include end my_address section -->

            <!-- include edit_ect section -->
            <?php  if(isset($_GET['edit_act'])) {include ('edit_act.php'); }?>
            <!-- include end edit_ect section -->

            <!-- include change_pass section -->
            <?php  if(isset($_GET['change_pass'])) {include ('change_pass.php'); }?>
            <!-- include end change_pass section -->

            <!-- include delete_ac section -->
            <?php  if(isset($_GET['delete_ac'])) {include ('delete_ac.php'); }?>
            <!-- include end delete_ac section -->

            <!-- include logout section -->
            <?php  if(isset($_GET['logout'])) {include ('../Logout.php'); }?>
            <!-- include end logout section -->

            </div><!-- end shom main area col-md-9 -->
        </div><!-- end sidebar area -->
    </div>
</div><!-- end shop middle area -->


<?php include('includes/footer.php');?>
</body>
</html>

<?php } ?>