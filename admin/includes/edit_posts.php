<?php 
 if(isset($_GET['p_id'])){ 
	   
   $the_post_id =$_GET['p_id'];
}

	$query = "SELECT * FROM post WHERE id = {$the_post_id} ";
	$select_post_by_id = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($select_post_by_id)){
		$post_id = $row['id'];
		$post_user_id = $row['user_id'];
		$post_title = $row['title'];
		$post_date = $row['date'];
		$post_image = $row['image'];
		$post_content = $row['content'];
		$post_tags = $row['tags'];
		$post_status = $row['status'];
	}

 if(isset($_POST['edit_post'])){
	$post_title = $_POST['title'];
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_content = $_POST['content'];
	$post_tags = $_POST['tags'];
	$post_status = $_POST['status'];
	
	move_uploaded_file($post_image_temp, "../img/$post_image");
	 
	if(empty($post_image)){
		$query = "SELECT * FROM post WHERE id = $the_post_id ";
		$select_image = mysqli_query($connection,$query);
		
		while($row = mysqli_fetch_array($select_image)){
			$post_image = $row['image'];
		}
	}
	 
	$query  = "UPDATE post SET ";
	$query .="user_id = '{$post_user_id}', ";
	$query .="title = '{$post_title}', ";
	$query .="date = now(), ";
	$query .="image = '{$post_image}', ";
	$query .="content = '{$post_content}', ";
	$query .="tags = '{$post_tags}', ";
	$query .="status = '{$post_status}' ";
	$query .="WHERE id = {$the_post_id} ";
	 
	$update_post = mysqli_query($connection,$query);
	 
	confirmQuery($update_post);
	 
	echo "<div class='alert alert-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Edit More Posts</a></div>";
 }
?>

<div class="container py-5">
	<div class="row">
		<div class="col-md-10">
		 <h1 class="page-header"><i class="fas fa-edit text-primary"></i> Edit Post</h1>
		 </div>
	 </div>
	<div class="row">
		<div class="col-md-10">
			<form action="" method="post" enctype="multipart/form-data"><!--enctype for get multitype data such as img-->
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
			</div>	
			<div class="form-group">
				<img width="100" src="../img/<?php echo $post_image; ?>" alt="post image">
				<input type="file" name="image">
			</div>

			<div class="form-group">
				<label for="status">Status</label>
				<select class="form-control" name="status" id="">
				   <option value="<?php echo $post_status;?>"><?php echo $post_status;?></option>
					<?php 
					   if($post_status == 'published'){
						  echo "<option value='draft'>Draft</option>"; 
					   }else{
						  echo "<option value='published'>Published</option>"; 
					   }
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="tags">Tags</label>
				<input type="text" class="form-control" name="tags" value="<?php echo $post_tags; ?>">
			</div>

			<div class="form-group">
				<label for="content">Content</label>
				<textarea class="form-control" name="content" id="body" cols="30" rows="10"><?php echo $post_content; ?>
				</textarea>
			</div>

			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="edit_post" value="Save Changes">
			</div>
		</form>
		</div>
	</div>
</div>
