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
<html></html>
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
                <li><a href="contact.php" class="active">Contact Us</a></li>
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
                <li><a href="contact.php"  class="active">Contact Us</a></li>
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
                    <li><a href="index.php">Home<i class="fa fa-angle-right ml-2 mr-2"></i></a>Contact</li> 
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
                       <center><h3>Contact us</h3></center>
                       <p class="text-muted text-center">If u have any questions and any issue.Please feel free mind to ask anytime your any complain.We are ready to help you 24/7. Thanks</p>
                       <hr>
                   </div><!-- end box-header -->
                   <form action="contact.php" method="post"><!-- start form -->
                       <div class="form-group">
                           <label for="name">Full Name</label>
                           <input type="text" id="name" placeholder="name" name="name" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="email">Email Address</label>
                           <input type="email" placeholder="Enter email" name="email" id="email" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="subject">Subject</label>
                           <input type="text" placeholder="Subject" name="subject" id="subject" class="form-control" required="">
                       </div>
                       <div class="form-group">
                           <label for="message">Message</label>
                           <textarea required="" style="resize: none;height: 200px;" name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                       </div>
                       <div class="text-center mt-3 mb-3">
                           <button type="submit" name="submit" class="btn btn-primary" value="Send A Message "><i class="fa fa-user pr-3">Send A Message</i></button>
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

  
  if (isset($_POST['submit'])) {
    // ADMIN EMAIL
    $senderName = $_POST['name'];
    $senderEmail= $_POST['email'];
    $senderSubject    = $_POST['subject'];
    $senderMessage  = $_POST['message'];
    $receverEmail = "hassasraf@gmail.com";
    mail($receverEmail,$senderName,$senderSubject,$senderMessage,$senderEmail);

    // CUSTOMER MAIL

    $email = $_POST['email'];
    $subject = "Welcome to our website";
    $msg     = "I will get you soon, Thanks for contacting us!";
    $from    = "hassasraf@gmail.com";
    mail($email, $subject, $msg, $from);

    echo "Your mail sent ";


  }

  

 ?>