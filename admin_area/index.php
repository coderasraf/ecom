<?php 
session_start();
include ('includes/db.php');
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
}
else{

?>
<?php 
    $session_email = $_SESSION['admin_email'];
    $get_admin = "SELECT * FROM admins WHERE admin_email='$session_email'";
    $run_admin = mysqli_query($con,$get_admin);
    $row_admin = mysqli_fetch_array($run_admin);
    $admin_id  = $row_admin['admin_id'];
    $admin_name = $row_admin['admin_name'];
    $admin_name = $row_admin['admin_email'];
    $admin_name = $row_admin['admin_name'];
    $admin_name = $row_admin['admin_name'];
    $admin_name = $row_admin['admin_name'];
    $admin_name = $row_admin['admin_name'];
    $admin_name = $row_admin['admin_name'];

    $get_pro = "SELECT * FROM products";
    $run_products = mysqli_query($con,$get_pro);
    $count_pro = mysqli_num_rows($run_products);

    $get_cust = "SELECT * FROM customers";
    $run_customer = mysqli_query($con, $get_cust);
    $count_coust = mysqli_num_rows($run_customer);

    $get_p_cats = "SELECT * FROM product_category";
    $run_p_cats = mysqli_query($con,$get_p_cats);
    $count_p_cats = mysqli_num_rows($run_p_cats);

     $get_order = "SELECT * FROM customer_order";
    $run_order = mysqli_query($con,$get_p_cats);
    $count_order = mysqli_num_rows($run_p_cats);    
        




 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/font-awesome/css/all.min.css">
     <link rel="stylesheet" href="assets/vendors/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-fixed-top navbar-inverse ">
    <div class="navbar-header">
        <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target='.navbar-ex1-collapse'>
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button> -->
        <a href="index.php?dashboard" class="navbar-brand text-light">Admin Panel</a>
    </div>
    <ul class="nav navbar-right top-nav"><!--Navbar right top start-->

        <li class="dropdown">
            <a href="#" class="dropdown-toggle text-light" data-target='#dropdown' data-toggle='dropdown'>
                <i class="fa fa-user"></i> <?php echo "$admin_name"; ?>
            </a>
            <ul class="dropdown-menu px-3" id="dropdown" class="p-3">
        <li>
            <a href="index.php?user_profile?id=<?php echo($admin_id); ?>"><i class="fa fa-user"></i>Profile</a>
        </li>
        <li>
            <a href="index.php?view_product">
                <i class="fa fa-envelope"></i>
                Products
                <span class="badge bg-primary text-light"><?php echo $count_pro; ?></span>
        </a>
        </li>
        <li>
            <a href="index.php?view_customer"><i class="fa fa-user"></i>Customer</a>
             <span class="badge bg-primary text-light"><?php echo $count_coust; ?></span>
        </li>
        <li>
            <a href="index.php?pro_cat"><i class="fa fa-user"></i>Product Category</a>
            <span class="badge bg-primary text-light"><?php echo $count_p_cats; ?></span>

        </li>
        <li class="divider my-2">
            <hr>
        </li>
        <li>
            <a href="logout.php?">
                <i class="fa fa-power-off"></i>Logout
            </a>
        </li>
    </ul>
        </li>

    </ul> <!--Navbar right top end-->
</nav>
</div>

<main>
    <div class="main-container">
        <aside class="sidebar">
            <?php include 'includes/sidebar.php'; ?>
        </aside>
        <section class="main-container-content">
            <?php if (isset($_GET['dashboard'])) {
                include 'dashboard.php';
            } ?>

            <?php 
                if (isset($_GET['insert_product'])) {
                    include 'insert_product.php';

                }
             ?>

             <?php 
                if (isset($_GET['view_product'])) {
                    include "view_product.php";
                }
              ?>

              <?php 
                if (isset($_GET['delete_product'])) {
                    include 'delete_product.php';
                }
               ?>
               <?php 
                if (isset($_GET['edit_product'])) {
                    include 'edit_product.php';
                }
                ?>
                <?php 
                    if (isset($_GET['insert_product_cat'])) {
                        include 'insert_product_cat.php';
                    }
                 ?>
                 <?php 
                    if (isset($_GET['view_p_cats'])) {
                        include 'view_p_cats.php';
                    }
                 ?>
                 <?php 
                    if (isset($_GET['edit_p_cat'])) {
                        include 'edit_p_cat.php';                    }
                  ?>
                  <?php 
                    if (isset($_GET['insert_categories'])) {
                        include 'insert_categories.php';                    }
                  ?>
                  <?php if (isset($_GET['view_categories'])) {
                      include 'view_categories.php';
                  } ?>
                  <?php if (isset($_GET['delete_cat'])) {
                      include 'delete_cat.php';
                  } ?>
                  <?php if (isset($_GET['edit_cat'])) {
                      include 'edit_cat.php';
                  } ?>
                  <?php if (isset($_GET['insert_slider'])) {
                      include 'insert_slider.php';
                  } ?>
                  <?php if (isset($_GET['view_slider'])) {
                      include 'view_slider.php';
                  } ?>
                  <?php if (isset($_GET['delete_slider'])) {
                      include 'delete_slider.php';
                  } ?>
                  <?php if (isset($_GET['edit_slider'])) {
                      include 'edit_slider.php';
                  } ?>
                  <?php if (isset($_GET['view_customer'])) {
                    include 'view_customer.php';
                  } ?>
                  <?php if (isset($_GET['del_customer'])) {
                    include 'del_customer.php';
                  } ?>
                  <?php if (isset($_GET['view_order'])) {
                    include 'view_order.php';
                  } ?>
                  <?php if (isset($_GET['del_order'])) {
                    include 'del_order.php';
                  } ?>
                  <?php if (isset($_GET['view_payments'])) {
                    include 'view_payments.php';
                  } ?>
                  <?php if (isset($_GET['del_payments'])) {
                    include 'del_payments.php';
                  } ?>
        </section>
    </div>
</main>










<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/js/owl-carousel.min.js"></script>
<script src="assets/vendors/js/bootstrap.min.js"></script>
<script src="assets/vendors/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
<?php } ?>