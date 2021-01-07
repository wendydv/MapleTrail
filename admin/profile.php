<?php include "includes/admin_header.php"; ?>
    
<?php 
	if(isset($_SESSION['username'])){
		
	   $username = $_SESSION['username'];
	   $query = "SELECT * FROM user WHERE username = '{$username}' ";
	   $select_user_profile_query = mysqli_query($connection,$query);
		
		while($row = mysqli_fetch_array($select_user_profile_query)){
		  $user_id = $row['id'];
		  $username = $row['username'];
		  $user_firstname = $row['firstname'];
		  $user_lastname = $row['lastname'];
		  $user_email = $row['email'];
		  $user_password = $row['password'];
		  $user_phone = $row['phone'];
		  $user_image = $row['image'];
		  $user_role = $row['role'];
		}
	}
?>
<?php 
	if(isset($_POST['edit_user'])){
		$username = $_POST['username'];
		$user_firstname = $_POST['firstname'];
		$user_lastname = $_POST['lastname'];
        $user_email = $_POST['email'];
		$user_password = $_POST['password'];
		$user_phone = $_POST['phone'];
		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];
		$user_role = $_POST['role'];

		move_uploaded_file($user_image_temp, "../img/$user_image");

		if(empty($user_image)){
			$query = "SELECT * FROM user WHERE id = $the_user_id ";
			$select_image = mysqli_query($connection,$query);

			while($row = mysqli_fetch_array($select_image)){
				$user_image = $row['image'];
			}
		}

		$query = "UPDATE user SET ";
		$query .="username = '{$username}', ";
		$query .="firstname = '{$user_firstname}', ";
		$query .="lastname = '{$user_lastname}', ";
		$query .="email = '{$user_email}', ";
		$query .="password = '{$user_password}', ";
		$query .="phone = '{$user_phone}', ";
		$query .="image = '{$user_image}', ";
		$query .="role = '{$user_role}' ";
		$query .="WHERE username = '{$username}' ";

		$update_user = mysqli_query($connection,$query);

		confirmQuery($update_user);
		header("location: users.php");
	 }
?>
   
    <div id="wrapper">
       <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                
                <div class="row">
                	<div class="col-lg-12 py-3">
					   <h1 class="page-header"><i class="fas fa-user-cog text-info"></i> Profile information</h1>
                	</div>
                </div>

                <div class="row">
					<form action="" method="post" enctype="multipart/form-data"><!--enctype for get multitype data such as img-->
					<div class="col-lg-9">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
					</div>

					<div class="form-group">
						<label for="firstname">First Name</label>
						<input type="text" class="form-control" name="firstname" value="<?php echo $user_firstname; ?>">
					</div>

					<div class="form-group">
						<label for="lastname">Last Name</label>
						<input type="text" class="form-control" name="lastname" value="<?php echo $user_lastname; ?>">
					</div>

<!--
					<div class="form-group">
						<img width="100" src="../img/<?php echo $user_image; ?>" alt="user image">
						<input type="file" name="image">
					</div>
-->

					<div class="form-group">
						<label for="role">Role</label>
						<select class="form-control" name="role" id="">
						   <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
							<?php 
							   if($user_role == 'admin'){
								  echo "<option value='admin'>client</option>"; 
							   }else{
								  echo "<option value='client'>admin</option>"; 
							   }
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" value="<?php echo $user_email; ?>">
					</div>

<!--
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" autocomplete="off">
					</div>
-->

					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="edit_user" value="Update">
					</div>
				  </div>
				  
				  <div class="col-lg-3">
						<div class="form-group text-center">
							<img width="250" src="../img/<?php echo $user_image; ?>" alt="user image">
						 </div>
						<button class="btn btn-primary btn-block">Edit Image</button>
						<button class="btn btn-danger btn-block">Delete Image</button>
						<br>
						<button class="btn btn-success btn-block">Change Password</button>
					</div>
				</form>     

             </div>
        </div>
    </div>
</div>

<?php include "includes/admin_footer.php"; ?>