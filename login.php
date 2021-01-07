<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php
	checkUserLoggedIn('admin');
   
	if(isMethod('post')){

		if(isset($_POST['username']) && isset($_POST['password'])){

		  login_user($_POST['username'], $_POST['password']);

		}
		else {
			redirect('login.php');
		}
	}
?>

<!--#################### CONTACT SECTION #################-->
<section id="login" class="py-5 my-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto">
				<div class="card p-4">
					<div class="card-body">
						<h3 class="text-center"><i class="fas fa-user-lock"></i> Login</h3>
						<hr>
						 <form id="login-form" role="form" autocomplete="off" class="form" method="post">
						  <div class="form-group">
							<div class="input-group input-group-lg">
							  <div class="input-group-prepend">
								<span class="input-group-text text-secondary">
								  <i class="fas fa-user"></i>
								</span>
							  </div>
							  <input name="username" type="text" class="form-control" placeholder="username">
							</div>
						  </div>
						  <div class="form-group">
							<div class="input-group input-group-lg">
							  <div class="input-group-prepend">
								<span class="input-group-text text-secondary">
								  <i class="fas fa-lock"></i>
								</span>
							  </div>
							  <input name="password" type="password" class="form-control" placeholder="password">
							</div>
						  </div>
						  <input name="login" class="btn btn-info btn-block btn-lg" value="Login" type="submit">
						</form>
						<div class="pt-3">
							<a href="reset_password.php" class="text-dark" >Forgot password?</a>
						</div>
						
					</div>
				</div>

			</div>
		</div>
	</div>
</section>


<?php include "includes/footer.php"; ?>