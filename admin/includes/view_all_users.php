<div class="container py-5">
  <div class="row">
 	<div class="col-md-10">
     <h1 class="page-header"><i class="fas fa-users text-warning"></i> Users</h1>
	 </div>
 </div>
 <div class="row">
 	<div class="col-md-10">
 		<table class="table table-bordered table-hover">
		<thead>
			<tr>
			<th>Id</th>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Image</th>
			<th>Role</th>
			<th>Options</th>
			</tr>
		</thead>
		<tbody>
		   <?php
			$query = "SELECT * FROM user ";
			$select_users = mysqli_query($connection, $query);

			while($row = mysqli_fetch_assoc($select_users)){
			  $user_id = $row['id'];
			  $username = $row['username'];
			  $user_firstname = $row['firstname'];
			  $user_lastname = $row['lastname'];
			  $user_email = $row['email'];
			  $user_password = $row['password'];
			  $user_phone = $row['phone'];
			  $user_image = $row['image'];
			  $user_role = $row['role'];

				echo "<tr>";
				echo "<td>{$user_id}</td>";
				echo "<td>{$username}</td>";
				echo "<td>{$user_firstname}</td>";
				echo "<td>{$user_lastname}</td>";
				echo "<td>{$user_email}</td>";
				echo "<td>{$user_phone}</td>";
				echo "<td><img width='100' src='../img/$user_image' alt='image'></td>";
				echo "<td>{$user_role}</td>";

				echo "<td>

				<a href='users.php?source=edit_user&u_id={$user_id}' class='btn btn-circle btn-info'><i class='fas fa-edit'></i></a>

				<a onClick=\"javascript: return confirm('Are you sure you want to delete this user?'); \"  href='users.php?delete=$user_id' class='btn btn-circle btn-danger'><i class='fas fa-trash-alt'></i></a>
				</td>";

				echo "</tr>";

			 }

			?>
	   </tbody> 
	 </table>
 	</div>
   </div>
 </div>
 
 <?php 

   if(isset($_GET['delete'])){ 
	   
	   $the_user_id = escape($_GET['delete']);
	   
	  if(isset($_SESSION['role'])){
		  
		$role = $_SESSION['role'];
		  
		  if($role == "admin"){

				$query = "DELETE FROM user WHERE id = {$the_user_id}";
				$delete_query = mysqli_query($connection,$query); 

				header("location: users.php");
			  
		  }
		  
	  }
   
   }
?>

