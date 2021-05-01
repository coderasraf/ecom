<div id="footer"><!--footer section start--> 
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 "> <!--col-md-3 col-sm-6 start-->
				<h4>Pages</h4>
				<ul>
					<li><a href="../cart.php">Shopping Cart</a></li>
					<li><a href="../contact.php">Contact Us</a></li>
					<li><a href="../shop.php">Shop</a></li>
					<li><a href="my_account.php">My Account</a></li>
				</ul>
				<hr>
				<h4>User Section</h4>
				<ul>
					<li><a href="login.php">Login</a></li>
					<li><a href="../customer_registration.php">Register</a></li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div><!--col-md-3 col-sm-6 end-->
			<div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
				<h4>Top Product Category</h4>
				<ul>
					<?php 

						$get_p_cats = 'SELECT * FROM product_category';
						$run_p_cats = mysqli_query($con, $get_p_cats);
						while ($row_p_cat = mysqli_fetch_assoc($run_p_cats)) {
							$p_cat_id = $row_p_cat['p_cat_id'];
							$p_cat_title = $row_p_cat['p_cat_title'];
							$p_cat_desc  = $row_p_cat['p_cat_desc'];
							echo "<li><a href='../shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
						}

					 ?>
				</ul>
				<hr class="hidden-md hidden-lg">
			</div><!--col-md-3 col-sm-6 start-->
			<div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
				<h2>Where to find us</h2>
				<p>
					<strong>www.hassasraf.com</strong>
					<br>Sherulbag,
					<br>Zakigonj,
					<br>Sylhet,
					<br><a href="mailto:hassasraf@gmail.com"><strong>hassasraf@gmail.com</strong></a>,
					<br><a href="tel:01797963087"><strong>01797963087</strong></a>
				</p>
				<a href="contact.php">Goto Contact Us page</a>
			</div><!--col-md-3 col-sm-6 start-->
			<div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
				<h4>Get The News</h4>
				<p class="text-muted">Subscribe go getting latest news</p>
				<p class="tex">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
				<form action="" class="input-inline" method="post">
					<div class="input-group">
						<input type="email" name="email" class="form-control" required="" placeholder="Enter Email">
						<span class="input-group-btn">
							<input type="submit" class="btn btn-primary" name="subscribe" value="Subscribe" >
						</span>
					</div>
				</form>
				<hr>
				<h4>Stay In touch</h4>
				<div class="social-icon">
					<li><a href="www.facebook.com"><i class="fab fa-facebook"></i></a></li>
					<li><a href="www.instagram.com"><i class="fab fa-instagram"></i></a></li>
					<li><a href="www.twitter.com"><i class="fab fa-twitter"></i></a></li>
					<li><a href="www.pinterest.com"><i class="fab fa-pinterest"></i></a></li>
					<li><a href="www.linkedin.com"><i class="fab fa-linkedin"></i></a></li>
				</div>
			</div><!--col-md-3 col-sm-6 start-->
		</div>
	</div>
</div><!--footer section end--> 
<div class="copyright-area p-3 bg-dark text-light"><!--copyright section start--> 
	<div class="container">
		<div class="row">
			<div class="col-sm-6 pull-left">
				&copy;Copyrighted 2020 By <strong>Hass Asraf</strong>
			</div>
			<div class="col-md-6 text-right">
				Template By: <a href="www.hassasraf.com"><strong>www.hassasraf.com</strong></a>
			</div>
		</div>
	</div>
</div><!--copyright section end-->
 <!-- footer file area -->
 <div class="overlay"></div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/js/owl-carousel.min.js"></script>
<script src="assets/vendors/js/bootstrap.min.js"></script>
<script src="assets/vendors/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
 <!-- footer file area end -->