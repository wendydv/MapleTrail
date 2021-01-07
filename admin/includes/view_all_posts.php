<?php include("delete_modal.php"); ?>


<?php 
	if(isset($_POST['checkBoxesArray'])){
      
		foreach($_POST['checkBoxesArray'] as $postValueId){
		   $bulk_options = $_POST['bulk_options'];
			switch($bulk_options){
				case 'published':
					
				  $query = "UPDATE post SET status ='{$bulk_options}' WHERE id = '{$postValueId}' ";
				  $update_to_published_status = mysqli_query($connection, $query);
				  confirmQuery($update_to_published_status);
					
				break;
					
				case 'draft':
					
				  $query = "UPDATE post SET status ='{$bulk_options}' WHERE id = '{$postValueId}' ";
				  $update_to_draft_status = mysqli_query($connection, $query);
				  confirmQuery($update_to_draft_status);
					
				break;
					
				case 'delete':
					
				  $query = "DELETE FROM post WHERE id = '{$postValueId}' ";
				  $delete_post = mysqli_query($connection, $query);
				  confirmQuery($delete_post);
					
				break;		
			}
		}
	}
?>

<div class="container py-5">
	<div class="row">
		<div class="col-md-10 mx-auto">
		 <h1 class="page-header"><i class="fas fa-copy text-primary"></i> Posts</h1>
		 </div>
	</div>
	<div class="row">
		<div class="col-md-10 py-3 mx-auto">
		   <form action="" method="post">
			<table class="table table-striped table-bordered table-hover">

<!--			   <div id="bulkOptionsContainer" class="col-xs-4" style="padding:0px">
				<select class="form-control" name="bulk_options" id="">
					<option value="">Select Options</option>
					<option value="published">Publish</option>
					<option value="draft">Draft</option>
					<option value="delete">Delete</option>
				</select>
			   </div>

			   <div class="col-xs-4">
				<input type="submit" name="submit" class="btn btn-success" value="Apply">
				<a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
			   </div>-->

				<thead>
					<tr>
						<th><input id="selectAllBoxes" type="checkbox"></th>
						<th>Id</th>
						<th>Author</th>
						<th>Title</th>
						<th>Date</th>
						<th>Image</th>
						<th>Status</th>
						<th>Tags</th>
						<th>Comments</th>
						<th>View</th>
						<th>Update</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				   <?php
					$query = "SELECT post.*, user.firstname, user.lastname ";
					$query .= "FROM post LEFT JOIN user ON post.user_id = user.id "; 
					$query .= "ORDER BY post.id DESC";

					$select_posts = mysqli_query($connection, $query);

					while($row = mysqli_fetch_assoc($select_posts)){
					  $post_id = $row['id'];
					  $post_user_id = $row['user_id'];
					  $post_title = $row['title'];
					  $post_date = $row['date'];
					  $post_image = $row['image'];
					  $post_content = $row['content'];
					  $post_tags = $row['tags'];
					  $post_status = $row['status'];
					  $user_firstname = $row['firstname'];
					  $user_lastname = $row['lastname'];

						echo "<tr>";
					?>

						<td><input class="checkBoxes" type="checkbox" name="checkBoxesArray[]" value="<?php echo $post_id; ?>"></td>

						<?php
						echo "<td>{$post_id}</td>";
						echo "<td>{$user_firstname}</td>";
						echo "<td>{$post_title}</td>";
						echo "<td>{$post_date}</td>";
						echo "<td><img width='100' src='../img/$post_image' alt='image'></td>";
						echo "<td>{$post_status}</td>";
						echo "<td>{$post_tags}</td>";

						$query = "SELECT * FROM comment WHERE post_id = $post_id";
						$send_comment_query = mysqli_query($connection, $query);
						$post_comment_count = mysqli_num_rows($send_comment_query);

						echo "<td>{$post_comment_count}</td>";
						echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
						echo "<td><a class='btn btn-info' href='posts.php?source=edit_post&p_id={$post_id}'>Update</a></td>";

						?>
						<form method="post">
							<input type="hidden" name="id" value="<?php echo $post_id; ?>">
							<?php 
							  echo '<td><input class="btn btn-danger" type="submit" name="delete" value="delete"></td>';
							?>

						</form>

						<?php 
						echo "</tr>";

					 }

					?>
			    </tbody> 
			  </table>
			</form>
		</div>
	</div>
</div>

 <?php 

   if(isset($_POST['delete'])){ 
	   
    $the_post_id = $_POST['id'];
	   
	$query = "DELETE FROM post WHERE id = {$the_post_id} ";
	$delete_query = mysqli_query($connection, $query); 
	header("Location: posts.php");
   
   }
?>
<script>

 $(document).ready(function(){
	 $(".delete_link").on('click', function(){
		 var id = $(this).attr("rel");
		 var delete_url = "posts.php?delete="+ id +"";
		 
		 $(".modal_delete_link").attr("href", delete_url);
		 
		 $("#myModal").modal('show');

	 });
 });
					  
</script>

