<?php include "includes/admin_navigation.php"; ?> 

 <div class="container py-5">
	 <div class="row">
		<div class="col-md-10">
		 <h1 class="page-header"><i class="fas fa-cogs text-danger"></i> Services</h1>
		 </div>
	 </div>
	 <div class="row">
		<div class="col-md-10">
			<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Description</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
			   <?php
				$query = "SELECT * FROM service ";
				$select_services = mysqli_query($connection, $query);

				while($row = mysqli_fetch_assoc($select_services)){
				  $service_id = $row['id'];
				  $service_title = $row['title'];
				  $service_description = $row['description'];

					echo "<tr>";
					echo "<td>{$service_id}</td>";
					echo "<td>{$service_title}</td>";
					echo "<td>{$service_description}</td>";
					echo "<td>

					<a href='services.php?source=edit_service&s_id={$service_id}' class='btn btn-circle btn-info'><i class='fas fa-edit'></i></a>

					<a onClick=\"javascript: return confirm('Are you sure you want to delete this service?'); \"  href='services.php?delete=$service_id' class='btn btn-circle btn-danger'><i class='fas fa-trash-alt'></i></a>
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
	   
    $the_service_id = escape($_GET['delete']);
	   
	$query = "DELETE FROM service WHERE id = {$the_service_id} ";
	$delete_query = mysqli_query($connection, $query); 
	header("Location: services.php");
   
   }
?>

