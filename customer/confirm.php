<?php 
session_start();
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php', '_self')</script>";
}else{
include ("includes/db.php" );
include ('../functions/functions.php');

if (isset($_GET['order_id'])) {
  $order_id = $_GET['order_id'];

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
            <a href="" class="btn btn-primary btn-sm">Welcome Guest</a>
            <a href="" class="text-light carts">Shopping Cart Total Price: BDT <?php totalPrice(); ?>, Total Item: <span style="font-size: 17px; font-weight: bold;"><?php item(); ?></span></a>
        </div><!-- col-md-6 offer  end-->

        <div class="col-md-5 col-sm-12 "><!-- Top Menu Start-->
            <ul class="menu">
                <li><a href="../customer_registration.php">Register</a></li>
                <li><a href="my_account.php" class="active">My Account</a></li>
                <li><a href="../cart.php">Goto Cart</a></li>
                <li><a href="../login.php">login</a></li>
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
                <li><a href="../my_account.php" class="active">My Account</a></li>
                <li><a href="../cart.php">Shopping Cart</a></li>
                <li><a href="../about.php">about us</a></li>
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
                <li><a href="../my_account.php" class="active">My Account</a></li>
                <li><a href="../cart.php">Shopping Cart</a></li>
                <li><a href="../about.php">about us</a></li>
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
            <div class="col-md-3"><!-- start sidebar area col-md-3 -->
                <?php
                    include 'includes/sidebar.php';
                ?>
            </div><!-- start sidebar area col-md-3 -->
            <div class="col-md-9"><!-- start shom main area col-md-9 -->
           		<div class="box">
           				<h1 align="center">Please Confirm Your Payment</h1>
           				<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
           					<div class="form-group">
           						<label for="invoice">Invoice Number</label>
           						<input id="invoice" placeholder="Enter Your invoice Number" type="number" name="invoice_number" class="form-control" required="1">
           					</div>
           					<div class="form-group">
           						<label for="amount">Your Amount</label>
           						<input id="amount" placeholder="Amount" type="number" name="amount" class="form-control" required="1">
           					</div>
           					<div class="form-group">
           						<label for="transection">Transection Number</label>
           						<input id="transection" placeholder="Transection ID" type="text" name="transection_number" class="form-control" required="1">
           					</div>
           					<div class="form-group">
           						<label for="payment_method">Select Payment Method</label>
           						<select name="payment_method" id="payment_method" class="form-control">
           							<option value="">Select Payment</option>
           							<option value="Bank Transfer">Bank Transfer</option>
           							<option value="Bkash">Bkash</option>
           							<option value="DBBL">DBBL</option>
           							<option value="Paypal">Paypal</option>
           							<option value="Payoneer">Payoneer</option>
           							<option value="Sure Cash">Sure Cash</option>

           						</select>
           					</div>
           					<div class="form-group">
           						<label for="date">Payment Date</label>
           						<input id="date" placeholder="Date" type="date" name="date" class="form-control" required="1">
           					</div>
           					<div class="text-center">
           						<input type="submit" name="confirm_payment" value="Confirm Payment" class="btn btn-primary">
           					</div>
           				</form>

  <?php 
    if (isset($_POST['confirm_payment'])) {
        $update_id = $_GET['update_id'];
        $invoice_no = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_method = $_POST['payment_method'];
        $transection_number = $_POST['transection_number'];
        $date = $_POST['date'];
        $complete = "Complete";
        $insert = "INSERT INTO payments (invoice_id,amount,payment_mode,ref_no,payment_date) VALUES ('$invoice_no','$amount','$payment_method','$transection_number','$date')";
        $run_insert = mysqli_query($con,$insert);

        $update_q = "UPDATE customer_order SET order_status='$complete' WHERE order_id='$update_id'";
        $run_update = mysqli_query($con,$update_q);

        $update_p = "UPDATE pending_order SET order_status='$complete' WHERE order_id='$update_id'";
        $run_updates = mysqli_query($con,$update_p);

        echo "<script>alert('Your order has been received successfully!')</script>";
        echo "<script>window.open('my_account.php?my_order', '_self')</script>";

        


    }
   ?>

           		</div>
            </div><!-- end shom main area col-md-9 -->
        </div><!-- end sidebar area -->
    </div>
</div><!-- end shop middle area -->


<?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>