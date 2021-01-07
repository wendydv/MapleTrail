<?php 
 if(isset($_GET['s_id'])){ 
	   
   $the_service_id =$_GET['s_id'];
 }
	$query = "SELECT * FROM service WHERE id = {$the_service_id} ";
	$select_service_by_id = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($select_service_by_id)){
		$service_id = $row['id'];
		$service_title = $row['title'];
		$service_description = $row['description'];	
	}

 if(isset($_POST['edit_service'])){
	$service_title = $_POST['title'];
	$service_description = $_POST['description'];
		 
	$query = "UPDATE service SET ";
	$query .="title = '{$service_title}', ";
	$query .="description = '{$service_description}' ";
	$query .="WHERE id = {$the_service_id} ";

	$update_service = mysqli_query($connection,$query);

	confirmQuery($update_service);

	echo "<div class='alert alert-success'>Service Updated. <a href='./services.php'>View Services</a></div>";
  }
?>
<div class="container py-5">
	<div class="row">
		<div class="col-md-10">
		  <h1 class="page-header"><i class="fas fa-edit text-danger"></i> Edit Service</h1>
		 </div>
	 </div>
	<div class="row">
		<div class="col-md-10">
			<form action="" method="post" enctype="multipart/form-data"><!--enctype for get multitype data such as img-->
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" value="<?php echo $service_title; ?>">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" name="description" id="body" cols="30" rows="10"><?php echo $service_description; ?>
				</textarea>
			</div>

			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="edit_service" value="Save Changes">
			</div>
		</form>
		</div>
	</div>
</div>

