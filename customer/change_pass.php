<div class="box">
	<center>
		<h2>Change Your Password</h2>
		<p class="text-muted">
		If you have any problem.Please, let us know as soon as possible.We are ready to help you and help to your business and also u can  <a href="../contact.php">
			contact us
		</a>
		24/7.. Thanks!
	</p>	
		<hr>
	</center>
	<form action="change_pass.php" method="post" enctype="multipart/form-data">
		<div class="form-gorup mb-3">
			<label for="old_pass">Enter Your current password</label>
			<input type="password" name="old_pass" id="old_pass" placeholder="Current Password" class="form-control">
		</div>
		<div class="form-gorup mb-3">
			<label for="new_pass">Enter New password</label>
			<input type="password" name="new_pass" id="new_pass" placeholder="New Password" class="form-control">
		</div>
		<div class="form-gorup mb-3">
			<label for="confirm_pass">Confirm New password</label>
			<input type="password" name="confirm_pass" id="confirm_pass" placeholder="Confirm Password" class="form-control">
		</div>
		<div class="text-center mt-3 mb-3">
			<button type="submit" name="change_pass" value="Change Password" class="btn btn-primary"><i class="fa fa-key mr-2"></i> Change Password</button>
		</div>
	</form>
</div>