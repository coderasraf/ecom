<?php include 'includes/db.php'; ?>
<?php 
    
    if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
}else{
?>
    

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Slider</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Slider</title>
<style>
.section{
    width: 70vw;
    margin: 0 auto;
    padding: 20px;
    box-shadow: 0 0 10px #ddd;
    border-radius: 5px;
    -webkit-animation: slide .7s ease-in-out;
    -o-animation: slide .7s ease-in-out;
    animation: slide .7s ease-in-out;
    position: relative;
    transition: transform .7s ease-in-out;
}
@keyframes slide{
    from{
        transform: translateX(-100px);
        box-shadow: 0 0 10px #ddd;
    }
    to{
        transform: translateX(0);
        box-shadow: 0 0 20px #ddd;
    }
}
</style>
</head>

<div class="section">
<div class="row"> <!--breadcrumb row start-->
<div class="col-lg-12">
    <div class="breadcrumb">
        <li class="active">
            <i class="fa fa-pen"></i>
            Dashboard / Edit Slider
        </li>
    </div>
</div>
</div><!--breadcrumb row end--> 
<div class='row'>
<div class='col-lg-12'>
    <div class='panel panel-default'>
        <div class='panel-heading'> <!--panel heading start-->
            <h3 class='panel-title mb-3'>
                <i class='fa fa-money-check fa-fw'></i>
                Edit slider
            </h3>
        </div><!--panel heading end-->
<div class="panel-body">
<div class="row">
    <?php 
    $id = $_GET['edit_slider'];
    $select = "SELECT *FROM slider WHERE id='$id'";
    $run_query = mysqli_query($con,$select);
    while ($row = mysqli_fetch_assoc($run_query)) {
            $image_name = $row['slider_image'];
            
        ?>
    <div class="col-md-4">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="single-slider-box">
            <div class="main-image">
                <img class="img-thumbnail" src="slider_images/<?php echo $row['slider_image']; ?>" width="100%" style='height: 200px !important'>
                <div class="form-group">
                    <label for="">Select Image</label>
                    <input type="file" name="slider_image">
                </div>
            </div>
            <div class="slider-title">
               <div class="form-group">
                   <label for="">Slider Title</label>
                   <input name="slider_title" class="form-control" type="text" value="<?php echo($row['slider_name']); ?>">
               </div>
            </div>
            <input type="submit" name="submit" value="Update Slider" class="btn btn-primary btn-block">
            </div>
        </div>
        </form>
    </div>
<?php } ?>
</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/js/owl-carousel.min.js"></script>
<script src="assets/vendors/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
<?php } ?>

<?php 
    if (isset($_POST['submit'])) {
        $slider_title = $_POST['slider_title'];
        $slider_image = $_FILES['slider_image']['name'];
        $slider_image = explode('.', $slider_image);
        $slider_image = end($slider_image);
        $slider_image = $image_name;
        $slider_tmp   = $_FILES['slider_image']['tmp_name'];
        move_uploaded_file($slider_tmp, "slider_images/$slider_image");
        if (!empty($slider_title) && !empty($slider_image)) {        
            $update = "UPDATE `slider` SET `slider_name`='$slider_title',`slider_image`='$slider_image' WHERE id='$id'";
            $run_query = mysqli_query($con,$update);
            if ($run_query) {
                
                echo "<script>alert('Your slider updated successfully!')</script>";
                echo "<script>window.open('index.php?view_slider','_self')</script>";
            }else{
                echo "<script>alert('Not updated!')</script>";
            }
        }else{
            echo "<script>alert('Please Fill up the all fields!')</script>";
        }
        
    }


 ?>

