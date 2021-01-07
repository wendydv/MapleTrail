<div class="container py-5">
   <div class="row">
	   <div class="col-md-10">
		 <h1 class="page-header"><i class="fas fa-comment-alt text-success"></i> Comments</h1>
	   </div>
	</div>

	<div class="row">
		<div class="col-md-10">
			<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Author</th>
					<th>Email</th>
					<th>Comment</th>
					<th>Date</th>
					<th>Status</th>
					<th>Post</th>
					<th>Approve</th>
					<th>Unapprove</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
			   <?php
				$query = "SELECT comment.*, post.title ";
				$query .= "FROM comment LEFT JOIN post ON comment.post_id = post.id "; 
				$query .= "ORDER BY comment.id DESC";

				$select_comments = mysqli_query($connection, $query);

				while($row = mysqli_fetch_assoc($select_comments)){
				  $comment_id = $row['id'];
				  $post_id = $row['post_id'];
				  $post_title = $row['title'];
				  $comment_author = $row['author'];
				  $comment_email = $row['email'];
				  $comment_content = $row['content'];
				  $comment_date = $row['date'];
				  $comment_status = $row['status'];

					echo "<tr>";
					echo "<td>{$comment_id}</td>";
					echo "<td>{$comment_author}</td>";
					echo "<td>{$comment_email}</td>";
					echo "<td>{$comment_content}</td>";
					echo "<td>{$comment_date}</td>";
					echo "<td>{$comment_status}</td>";
					echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</td>";

					echo "<td><a href='comments.php?approve=$comment_id' class='btn btn-success'>Approve</a></td>";
					echo "<td><a href='comments.php?unapprove=$comment_id' class='btn btn-warning'>Unapprove</a></td>";
					echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this comment?'); \"  href='comments.php?delete=$comment_id' class='btn btn-circle btn-danger'><i class='fas fa-trash-alt'></i></a></td>";
					echo "</tr>";
				 }

				?>
		 </tbody> 
		 </table>
		</div>
	</div>
</div>

 
 <?php 

  if(isset($_GET['approve'])){ 
	   
    $the_comment_id = $_GET['approve'];
	   
	$query = "UPDATE comment SET status = 'approved' WHERE id = {$the_comment_id} ";
	$approve_query = mysqli_query($connection,$query); 
	header("location: comments.php");
   
   }

   if(isset($_GET['unapprove'])){ 
	   
    $the_comment_id = $_GET['unapprove'];
	   
	$query = "UPDATE comment SET status = 'unapproved' WHERE id = {$the_comment_id} ";
	$unapprove_query = mysqli_query($connection,$query); 
	header("location: comments.php");
   
   }


   if(isset($_GET['delete'])){ 
	   
    $the_comment_id = $_GET['delete'];
	   
	$query = "DELETE FROM comment WHERE comment_id = {$the_comment_id} ";
	$delete_query = mysqli_query($connection,$query); 
	header("location: comments.php");
   
   }
?>

