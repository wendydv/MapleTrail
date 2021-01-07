<?php 
if(isset($_POST['add_user'])){
	$username = $_POST['username'];
	$user_firstname = $_POST['firstname'];
	$user_lastname = $_POST['lastname'];
	$user_email = $_POST['email'];
	$user_password = $_POST['password'];
	$user_phone = $_POST['phone'];
	$user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
	$user_role = $_POST['role'];

	$password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' =>10));
	
	move_uploaded_file($user_image_temp, "../img/$user_image");
	
	$query = "INSERT INTO user(username, firstname, lastname, email, password, phone, image, role) ";
	$query .= "VALUES('{$username}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$password}', '{$user_phone}', '{$user_image}', '{$user_role}') ";
	
	$create_user_query = mysqli_query($connection, $query);
	
	confirmQuery($create_user_query);
	
	echo "<div class='alert alert-success'>User Created: " . " " . "<a href='users.php'>View Users</a></div>";
  }
?>
 
 <div class="container ml-5">
	 <div class="row">
		<div class="col-md-10">
		 <h1 class="page-header"><i class="fas fa-user-plus text-warning"></i> Add a new user</h1>
		 </div>
	 </div>

	 <div class="row">
		<div class="col-md-10">
			<form action="" method="post" enctype="multipart/form-data"><!--enctype for get multitype data such as img-->
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username">
				</div>
				<div class="form-group">
					<label for="firstname">First Name</label>
					<input type="text" class="form-control" name="firstname">
				</div>
				<div class="form-group">
					<label for="lastname">Last Name</label>
					<input type="text" class="form-control" name="lastname">
				</div>
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" name="phone">
				</div>
				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" name="image">
				</div>
				<div class="form-group">
					<label for="role">Role</label><br>
					<select class="form-control" name="role" id="">
						<option value="client" selected>Client</option>
						<option value="admin">Admin</option>
					</select>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="add_user" value="Create user">
				</div>
			</form>
		</div>
	  </div>
 </div>

