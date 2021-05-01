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
                <li><a href="cart.php" class="active">Shopping Cart</a></li>
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
                <li>
                  <?php 
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>My Account</a>";
              }else{
                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
              }
             ?>
                </li>
                <li><a href="cart.php" class="active">Shopping Cart</a></li>
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
        <div class="row"><!-- start row area -->
            <div class="col-md-12">
                <ul class="breadcrumb custom_bread">
                    <li><a href="index.php">Home<i class="fa fa-angle-right ml-2 mr-2"></i></a>Cart</li> 
                </ul>
            </div>
        </div><!-- end row area -->
<div class="row"><!-- start row area -->
  <div class="col-md-9" id="cart"> <!-- table-col-md-9 start -->
    <div class="box"><!-- table-box start -->
      <form action="cart.php" enctype="multipart/form-data" method="post"><!-- table-form start -->
        <h1>Shopping Cart</h1>         
      <?php 
        $ip_add       = getUserIP();
        $select_cart  = "SELECT * FROM cartitem where ip_add='$ip_add'";
        $run_cart     = mysqli_query($con,$select_cart);
        $count        = mysqli_num_rows($run_cart);
      ?>
        <p class="muted">Currently You have <?php echo $count; ?> items in your cart</p>
        <div class="table-responsive"> <!-- table-responsive start -->
          <table class="table"> <!-- table- start -->
            <thead>
              <tr>
                <th colspan="2">Product</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Size</th>
                <th colspan="1">Delete</th>
                <th colspan="1">Sub Total</th>
              </tr>
            </thead>
            <tbody>
          <?php 
             $total    = 0;
            while ($row = mysqli_fetch_array($run_cart)) {
              $pro_id   = $row['p_id'];
              $pro_qty  = $row['qty'];
              $pro_size = $row['size'];
             
              $get_products = "select * from products where product_id ='$pro_id'";
              $run_product  = mysqli_query($con,$get_products);
              while ($row   = mysqli_fetch_array($run_product)) {
                $p_title    = $row['product_title'];
                $p_img1     = $row['product_img1'];
                $p_price    = $row['product_price'];
                $sub_total  = $row['product_price'] * $pro_qty;
                $total     += $sub_total;



              }
         
           ?>
              <tr>
                <td><img src="admin_area/product_images/<?php echo $p_img1 ?>" alt=""><?php echo $p_title; ?></td>
                <td></td>
                <td><?php echo $pro_qty; ?></td>
                <td><?php echo $p_price; ?>$</td>
                <td><?php echo $pro_size; ?></td>
                <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                <td><?php echo $sub_total; ?>$</td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th style="font-size: 30px;font-weight: bold;" colspan='6'>Total</th>
                <th style="font-size: 30px;font-weight: bold;"><strong><?php echo $total; ?>$</strong></th>
              </tr>
            </tfoot>
          </table> <!-- table- end -->
        </div><!-- table-responsive end -->
        <div class="box-footer"><!-- box-footer-start -->
          <div class="pull-left">
            <a href="index.php" class="btn btn-primary">
              <i class="fa fa-angle-left mr-3"></i>Continue Shopping
            </a>
          </div>
          <div class="pull-right">
              <button class="btn btn-outline-primary" type="submit" name="update">
                  <i class="fa fa-cart-plus"></i> Upadate Cart
              </button>
              <a href="checkout.php" class="btn btn-primary">
                <i class="fa fa-dollar-sign"></i> Proceed to checkout
              </a>
          </div> 
        </div><!-- box-footer-end -->
      </form><!-- table-formt end -->

<!-- update card function -->
    <?php 

        function updateCart(){
          global $con;
          if (isset($_POST['update'])) {
            foreach ($_POST['remove'] as $removeId) {
              $delete_product = "DELETE FROM cartitem WHERE p_id ='$removeId'";
              $run_delete     = mysqli_query($con,$delete_product);
              if ($run_delete) {
                echo "<script>window.open('cart.php', '_self')</script>";
              }
            }
          }
          
        }

        echo @$up_cart = updateCart();

     ?>

<!-- end of update cart function -->


    </div><!-- table-box start -->
          </div><!-- table-col-md-9 end -->
          <div class="col-md-3"> <!-- col-md-3 start -->
            <div class="box order-summary" id="">
              <div class="box-header">
                <h4>Order Summary</h4>
                <hr>
              </div>
              <p class='text-muted'>
                Shipping and additional costs are calculated on the value that you have entared. 
              </p>
              <div class="table-responsive"> <!---table-responsive start-->
                <table class="table"><!---table- start-->
                  <tbody>
                    <tr>
                      <th class="th-summary" style="font-size: 13px;color: #333;">Order Subtotal</th>
                      <td style="font-size: 20px;font-weight: bold;"><?php echo $total; ?>$</td>
                    </tr>
                    <tr>
                      <th class="th-summary" style="font-size: 13px;color: #333;">Shipping and Handling</th>
                      <td style="font-size: 20px;font-weight: bold;">$0</td>
                    </tr>
                    <tr>
                      <th class="th-summary" style="font-size: 13px;color: #333;">Tax</th>
                      <td style="font-size: 20px;font-weight: bold;">$0</td>
                    </tr>
                    <tr class="total">
                      <th class="th-summary" style="font-size: 13px;color: #333;">Total</th>
                      <td style="font-size: 20px;font-weight: bold;">$<?php echo $total; ?></td>
                    </tr>
                  </tbody>
                </table><!---table- end-->
              </div><!---table-responsive end-->
            </div>
          </div><!-- col-md-3 end -->
        </div><!-- end row area -->

       
       
    </div>
</div><!-- end shop middle area -->

<?php include('includes/footer.php');?>
</body>
</html>