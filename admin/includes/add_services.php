<?php 
if(isset($_POST['create_service'])){
	$service_title = escape($_POST['title']);
	$service_description = escape($_POST['description']);

	$query = "INSERT INTO service(title, description) ";
	$query .= "VALUES('{$service_title}','{$service_description}') ";

	$create_service_query = mysqli_query($connection, $query);

	confirmQuery($create_service_query);
	
	echo "<p class='bg-success'>Service Created. <a href='./services.php'>View Services</a></p>";
  }
?>

<div class="container py-5">
  <div class="row">
 	<div class="col-md-10">
     <h1 class="page-header"><i class="fas fa-file-alt text-danger"></i> Add a new service</h1>
	 </div>
 </div>

	<div class="row">
		<div class="col-md-10">
		  <form action="" method="post" enctype="multipart/form-data"><!--enctype for get multitype data such as img-->
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title">
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" name="description" id="body" cols="30" rows="30"></textarea>
			</div>

			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="create_service" value="Create">
			</div>
		</form>
		</div>
	</div>
</div>

