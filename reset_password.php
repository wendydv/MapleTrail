<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<!--#################### RESET PASSWORD SECTION #################-->
<section id="RESET" class="py-5 my-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto">
				<div class="card p-4">
					<div class="card-body">
						<h3 class="text-center"><i class="fas fa-user-lock"></i> Reset Password</h3>
						   <p class="text-center">You can reset your password here.</p>
						<hr>
						 <form action="" method="post">
						  <div class="form-group">
							<div class="input-group input-group-lg">
							  <div class="input-group-prepend">
								<span class="input-group-text text-secondary">
								  <i class="fas fa-lock"></i>
								</span>
							  </div>
							  <input type="password" class="form-control" placeholder="new password">
							</div>
						  </div>
						  <div class="form-group">
							<div class="input-group input-group-lg">
							  <div class="input-group-prepend">
								<span class="input-group-text text-secondary">
								  <i class="fas fa-lock"></i>
								</span>
							  </div>
							  <input type="password" class="form-control" placeholder="confirm password">
							</div>
						  </div>

						  <input type="submit" value="Reset password" class="btn btn-info btn-block btn-lg">
						</form>
					
					</div>
				</div>

			</div>
		</div>
	</div>
</section>


<?php include "includes/footer.php"; ?>