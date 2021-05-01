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
            <i class="fa fa-power-off"></i>
            Dashboard / View Slider
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
                View slider
            </h3>
        </div><!--panel heading end-->
<div class="panel-body">
<div class="row">
    <?php 

    $select = "SELECT *FROM slider";
    $run_query = mysqli_query($con,$select);
    while ($row = mysqli_fetch_assoc($run_query)) {
        ?>
    <div class="col-md-4">
        <div class="single-slider-box border">
            <div class="main-image">
                <img class="img-thumbnail" src="slider_images/<?php echo $row['slider_image']; ?>" width="100%" style='height: 200px !important'>
            </div>
            <div class="slider-title">
                <p style="margin-bottom: 0;text-align: center;font-weight: bold;padding: 5px;"><?php echo $row['slider_name']; ?></p>
            </div>
            <div class="bottom-text" style="display: flex;justify-content: space-between;padding: 5px">
                <div class="left">
                    <a href="index.php?edit_slider=<?php echo($row['id']); ?>" class="btn btn-primary btn-round"><i class="fa fa-pen mr-2"></i> Edit Slider</a>
                </div>
                <div class="right">
                    <a onclick="return confirm('Are u sure to delete this slider!')" href="index.php?delete_slider=<?php echo($row['id']); ?>" class="btn btn-danger btn-round"><i class="fa fa-trash mr-2"></i>Delete Slider</a>
                </div>
            </div>
        </div>
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

