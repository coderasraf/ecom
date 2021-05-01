<?php 
// Database connection =======================================================================*
$db = mysqli_connect('localhost', 'root', '', 'ecom');
// Getting For User ip address!===============================================================*
function getUserIp(){
switch (true) {
case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return($_SERVER['HTTP_X_REAL_IP']);
break;
case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return($_SERVER['HTTP_CLIENT_IP']);
break;
case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return($_SERVER['HTTP_X_FORWARDED_FOR']);
break;
default: return($_SERVER['REMOTE_ADDR']);
break;
}
}
// ADD TO CART FUNCTIONS=======================================================================*
function addCart(){
  global $db;
    if(isset($_GET['add_cart'])){
    $ip_add             = getUserIp();
    $p_id               = $_GET['add_cart'];
    $product_qty        = $_POST['product_qty'];
    $product_size       = $_POST['product_size'];
    $check_product      = "SELECT * FROM cartitem WHERE p_id= '$p_id' AND ip_add= '$ip_add' ";
    $run_products       = mysqli_query($db, $check_product);
    if (mysqli_num_rows($run_products) > 0) {
          echo "<script>alert('This Product Already has been Added!')</script";
    }else{
        $insert_product = "INSERT INTO cartitem(p_id,ip_add,qty,size) VALUES ('$p_id','$ip_add','$product_qty','$product_size')";
        $run_insert     = mysqli_query($db, $insert_product);
          echo "<script>window.open('cart.php?pro_id=$p_id', '_self')</script>";
          echo "<script>You have been succesfully added this product in the cart!</script>";
   }
  }  
}
// ITEM COUNT START ============================================================
  function item(){
    global $db;
    $ip_add           = getUserIp();
    $get_items        = "select * from cartitem where ip_add='$ip_add'";
    $run_item         = mysqli_query($db,$get_items);
    $count            = mysqli_num_rows($run_item);
    if ($count        == true) {
      echo  $count;
    }else{
      echo "0";
    }
  }
// ITEM COUNT END =========================================================

// TOTAL PRICE COUNT START ================================================
  function totalPrice(){
    global $db;
    $ip_add           = getUserIp();
    $total            = 0;
    $select_cart      = "select * from cartitem where ip_add='$ip_add'";
    $run_cart         = mysqli_query($db, $select_cart);
    while ($record    = mysqli_fetch_assoc($run_cart)) {
      $pro_id         = $record['p_id'];
      $pro_qty        = $record['qty'];
      $get_price      = "select * from products where product_id = $pro_id";
      $run_price      = mysqli_query($db,$get_price);
      while($row_price= mysqli_fetch_assoc($run_price)){
        $sub_total    = $row_price['product_price'] * $pro_qty;
        $total       += $sub_total;

      }
    }
    echo $total;
  }
// TOTAL PRICE COUNT END   ================================================

// SINGLE PRODUCT SHOWCAS FUNCTION!========================================
function getPro(){
global $db;
$get_products           = "SELECT * FROM products order by 1 DESC LIMIT 0,9";
$run_products           = mysqli_query($db, $get_products);
while ($row_product= mysqli_fetch_assoc($run_products)) {
$pro_cat_id             = $row_product['product_cat_id'];
$pro_id                 = $row_product['product_id'];
$pro_title              = $row_product['product_title'];
$pro_price              = $row_product['product_price'];
$pro_img1               = $row_product['product_img1'];
$get_product_category   = "SELECT * FROM product_category where p_cat_id = '$pro_cat_id'";
$run_category           = mysqli_query($db, $get_product_category);
$rows_of_category       =mysqli_fetch_assoc($run_category);
$p_cat_id               = $rows_of_category['p_cat_id'];
$p_cat_title            = $rows_of_category['p_cat_title'];
$p_cat_desc              = $rows_of_category['p_cat_desc'];
                        echo "
                        <div class='col-md-4 col-sm-6 single text-center'>
                        <div class='product auto-width'>
                        <span class='category'>
                        $p_cat_title 
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
                        </div>
                        ";
  }
}
//get Product Categories=============================================================
function getPCats(){
global $db;
$get_p_cats                  = 'SELECT * FROM product_category';
$rund_p_cats                 = mysqli_query($db, $get_p_cats);
while ($row_p_cats           = mysqli_fetch_assoc($rund_p_cats)) {
$p_cat_id = $row_p_cats['p_cat_id'];
$p_cat_title                 = $row_p_cats['p_cat_title'];
$p_cat_desc                  = $row_p_cats['p_cat_desc'];
                            echo "
                             <li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>
                            ";
  }
}
/* get category */
function getCats(){
global $db;
$get_cats                    = 'SELECT * FROM categories';
$run_cats                    = mysqli_query($db, $get_cats);
while ($row_cats = mysqli_fetch_assoc($run_cats)) {
$cat_id                      = $row_cats['cat_id'];
$cat_title                   = $row_cats['cat_title'];
$cat_desc                    = $row_cats['cat_desc'];
echo "<li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>";
}
}  
// Get Products category products============================================
function getPcatPro(){
global $db;
if (isset($_GET['p_cat'])) {
$p_cat_id                   = $_GET['p_cat'];
$get_p_cat                  = "SELECT * FROM product_category WHERE p_cat_id='$p_cat_id'";
$run_p_cats                 = mysqli_query($db, $get_p_cat);
$row_p_cats                 = mysqli_fetch_array($run_p_cats);
$p_cat_id                   = $row_p_cats['p_cat_id'];
$p_cat_title                = $row_p_cats['p_cat_title'];
$p_cat_desc                 = $row_p_cats['p_cat_desc'];
$get_products               = "SELECT * FROM products  WHERE product_cat_id=$p_cat_id";
$run_products               = mysqli_query($db, $get_products);
$count                      = mysqli_num_rows($run_products);
if ($count==0) {        
echo "<div class='box alert alert-warning'>
<h1>No product found in this product category!</h1>
</div>";
}else{
echo "<div class='box'>
<h1>$p_cat_title</h1>
<p>$p_cat_desc</p>
</div>";
}
while ($row_products = mysqli_fetch_assoc($run_products)) {
$pro_id                   = $row_products['product_id'];
$pro_title                = $row_products['product_title'];
$pro_img1                 = $row_products['product_img1'];
$pro_price                = $row_products['product_price'];
                          echo "
                          <div class='col-md-4 col-sm-6 single text-center'>
                          <div class='product auto-width'>
                          <span class='category'>
                          $p_cat_title
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
                          </div>
                          ";
        }   
    }
}
// Get categories ===============================================================
function getCatPro(){
if (isset($_GET['cat_id'])) {
global $db;
$cat_id                    = $_GET['cat_id'];
$get_cat                   = "SELECT * FROM categories WHERE cat_id = $cat_id";
$run_cat                   = mysqli_query($db, $get_cat);
$row_cat                   = mysqli_fetch_assoc($run_cat);
$cat_title                 = $row_cat['cat_title'];
$cat_id                    = $row_cat['cat_id'];
$cat_desc                  = $row_cat ['cat_desc'];
$get_products              = "SELECT * FROM products WHERE product_cat_id = $cat_id ";
$run_products              = mysqli_query($db, $get_products);
$count                     = mysqli_num_rows($run_products);
if ($count==0) {
        echo "<div class='box'>
        <h1>No product found in this category!</h1>
        </div>";
        }else{
        echo "<div class='box'>
        <h1>$cat_title</h1>
        <p>$cat_desc</p>
        </div>";
}
while ($row_products = mysqli_fetch_assoc($run_products)) {
$pro_id              = $row_products['product_id'];
$pro_title           = $row_products['product_title'];
$pro_img1            = $row_products['product_img1'];
$pro_price           = $row_products['product_price'];
                    echo "
                    <div class='col-md-4 col-sm-6 single text-center'>
                    <div class='product auto-width'>
                    <span class='category'>
                    Camera
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
                    </div>
                    ";
                  }
              }
        }
  ?>