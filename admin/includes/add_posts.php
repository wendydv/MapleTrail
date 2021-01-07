<?php 
if(isset($_POST['create_post'])){
	
  $post_user_id = $_SESSION['id'];
  $post_title = escape($_POST['title']);
  $post_date = date('d-m-y');
  $post_image = escape($_FILES['image']['name']);
  $post_image_temp = escape($_FILES['image']['tmp_name']);
  $post_content = escape($_POST['content']);
  $post_tags = escape($_POST['tags']);
  $post_status = escape($_POST['status']);

	move_uploaded_file($post_image_temp, "../img/$post_image");
	
	$query = "INSERT INTO post(user_id, title, date, image, content, tags, status) ";
	$query .= "VALUES({$post_user_id},'{$post_title}', now(), '{$post_image}','{$post_content}','{$post_tags}','{$post_status}') ";
	
	$create_post_query = mysqli_query($connection, $query);
	
	confirmQuery($create_post_query);
	
	$the_post_id = mysqli_insert_id($connection); //pull out the last id created
	
	echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Edit More Posts</a></p>";
  }
?>

<div class="container py-5 mx-auto">
 <div class="row">
 	<div class="col-md-10">
     <h1 class="page-header"><i class="fas fa-file-alt text-primary"></i> Add a new post</h1>
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
			<label for="image">Image</label>
			<input type="file" name="image">
		</div>
		
<!--
		<div class="form-group">
			<label for="image">Upload Image</label>
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="image" name="image">
				<label for="image" class="custom-file-label">Choose File</label>
			</div>
			<small class="form-text text-muted">Max Size 3mb</small>
		</div>
-->

		<div class="form-group">
			<label for="tags">Tags</label>
			<input type="text" class="form-control" name="tags">
		</div>
		<div class="form-group">
			<label for="status">Status</label><br>
			<select class="form-control" name="status" id="">
				<option value="draft">Select Options</option>
				<option value="published">Publish</option>
				<option value="draft">Draft</option>
			</select>
		</div>

		<div class="form-group">
			<label for="content">Content</label>
			<textarea class="form-control" name="content" id="body" cols="30" rows="20"></textarea>
		</div>

		<div class="form-group">
			<input class="btn btn-primary" type="submit" name="create_post" value="Create">
		</div>
	</form>
	</div>
</div>

	
</div>

