<?php 
 if(isset($_GET['u_id'])){ 
	   
   $the_user_id =$_GET['u_id'];

	$query = "SELECT * FROM user WHERE id = {$the_user_id} ";
	$select_user_by_id = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($select_user_by_id)){
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
	 if(!empty($user_password)){
		 
		 $query_password = "SELECT password FROM user WHERE id = $the_user_id";
		 $get_user_query = mysqli_query($connection,$query_password);
		 confirmQuery($get_user_query);
		 
		 $row = mysqli_fetch_array($get_user_query);
		 $db_user_password = $row['password'];
		 
		  if($db_user_password != $user_password){
		   $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' =>10)); 
	    }else{
			 $hashed_password =  $db_user_password;
		  }
		 
			$query = "UPDATE user SET ";
		    $query .="username = '{$username}', ";
			$query .="firstname = '{$user_firstname}', ";
			$query .="lastname = '{$user_lastname}', ";
		    $query .="email = '{$user_email}', ";
			$query .="password = '{$hashed_password}', ";
		    $query .="phone = '{$user_phone}', ";
			$query .="image = '{$user_image}', ";
			$query .="role = '{$user_role}' ";
			$query .="WHERE id = {$the_user_id} ";

			$update_user = mysqli_query($connection,$query);

			confirmQuery($update_user);
		 
		 echo "<div class='alert alert-success'>User Updated! <a href='users.php'>View Users</a></div>";
		 
	 }else { echo "<div class='alert alert-danger'>There are some empty fields.</div>" ;}
  }
} else {
	 header("Location: index.php");
 }
?>
<div class="container py-5">
	<div class="row">
 	<div class="col-md-10">
     <h1 class="page-header"><i class="fas fa-user-edit text-warning"></i> Update information</h1>
	 </div>
 </div>
 <div class="row">
 	<div class="col-md-10">
 	  <form action="" method="post" enctype="multipart/form-data"><!--enctype for get multitype data such as img-->
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
		<div class="form-group">
			<label for="phone">Phone</label>
			<input type="text" class="form-control" name="phone" value="<?php echo $user_phone; ?>">
		</div>

		<div class="form-group">
			<img width="100" src="../img/<?php echo $user_image; ?>" alt="user image">
			<input type="file" name="image">
		</div>

		<div class="form-group">
			<label for="role">Role</label>
			<select class="form-control" name="role" id="">
			   <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
				<?php 
				   if($user_role == 'admin'){
					  echo "<option value='admin'>Admin</option>"; 
				   }else{
					  echo "<option value='client'>Client</option>"; 
				   }
				?>
			</select>
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" value="<?php echo $user_email; ?>">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" autocomplete="off">
		</div>

		<div class="form-group">
			<input class="btn btn-info" type="submit" name="edit_user" value="Save Changes">
		</div>
	 </form>
	</div>
 </div>
</div>
 
