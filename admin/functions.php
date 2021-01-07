<?php

//Escape the data t preven SQL injections
function escape($string){
	global $connection;
	return mysqli_real_escape_string($connection, trim($string));
}

//Confirm query
function confirmQuery($result){
	global $connection;
	if(!$result){
		die("QUERY FAILED" . mysqli_error($connection));
	}
}

//Execute query
function query($query){
  global $connection;
	$result = mysqli_query($connection, $query);
	confirmQuery($result);
	return $result;
}

//Redirect
function redirect($location){	
  header("Location:" .$location);
  exit;
}

function fetchRecords($result){
    return mysqli_fetch_array($result);
}

function count_records($result){
    //return mysqli_num_rows($result);
}

//Check if the method is post, get depends of the parameter $method 
function isMethod($method=null){
	
	if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
		
		return true;
	}
	
	return false;
}

//Check is a user is logged in
function isLoggedIn(){
	
	if(isset($_SESSION['role'])){
		
	 return true;
	}
	
	return false;
}

function loggedInUserId(){
    if(isLoggedIn()){
        $result = query("SELECT * FROM user WHERE username='" . $_SESSION['username'] ."'");
        confirmQuery($result);
        $user = mysqli_fetch_array($result);
        return mysqli_num_rows($result) >= 1 ? $user['id'] : false;
    }
    return false;

}

//Check if the user is logged in and redirect 
function checkUserLoggedIn($redirectLocation=null){
	
	if(isLoggedIn()){
		
	  redirect($redirectLocation);
	}
}

// Check is the user is admin
function is_admin(){
	if(isLoggedIn()){
		$result = query("SELECT role FROM user WHERE id = ".$_SESSION['id']."");
		
		$row = mysqli_fetch_array($result);

		if($row['role'] == 'admin'){
			return true;
		}else{
			return false;
		}
	}else {
		return false;
	}	
}

//Check if the a username already exists in the db
function username_exists($username){
	global $connection;
	
	$query = "SELECT username FROM user WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
	confirmQuery($result);
	
	if(mysqli_num_rows($result) > 0){
		return true;
	}else{
		return false;
	}
}

function get_user_name(){
	return isset($_SESSION['username']) ? $_SESSION['username'] : null;
}


//Check if the a email already exists in the db
function email_exists($email){
	global $connection;
	
	$query = "SELECT email FROM user WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
	confirmQuery($result);
	
	if(mysqli_num_rows($result) > 0){
		return true;
	}else{
		return false;
	}
}

//register new user
function register_user($username, $email, $password){
	global $connection;

	$username = mysqli_real_escape_string($connection, $username);
	$email    = mysqli_real_escape_string($connection, $email);
	$password = mysqli_real_escape_string($connection, $password);

	$password = password_hash($password, PASSWORD_BCRYPT, array('cost' =>12));

	$query = "INSERT INTO user (username, email, password, role) ";
	$query .= "VALUES ('{$username}', '{$email}', '{$password}', 'admin')";
	$register_user_query = mysqli_query($connection,$query);

	confirmQuery($register_user_query);
	
}

//Login user
function login_user($username, $password){
   global $connection;

	$username = mysqli_real_escape_string($connection, $username); 
	$password = mysqli_real_escape_string($connection, $password); //clean data for security to preven SQL injections

	$query = "SELECT * FROM user WHERE username = '{$username}' ";
	$select_user_query = mysqli_query($connection, $query);
	

	confirmQuery($select_user_query);
	
	while($row = mysqli_fetch_array($select_user_query)){
		$db_user_id = $row['id'];
		$db_username = $row['username'];
		$db_user_firstname = $row['firstname'];
		$db_user_lastname = $row['lastname'];
		$db_user_email = $row['email'];
		$db_user_password = $row['password'];
		$db_user_phone = $row['phone'];
		$db_user_role = $row['role'];
		
		//	$password = crypt($password, $db_user_password); //reverting the encrypt password

//		if(password_verify($password, $db_user_password)){	
		if($password == $db_user_password){
			$_SESSION['id'] = $db_user_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['firstname'] = $db_user_firstname;
			$_SESSION['lastname'] = $db_user_lastname;
			$_SESSION['email'] = $db_user_email;
			$_SESSION['password'] = $db_user_password;
			$_SESSION['phone'] = $db_user_phone;
			$_SESSION['role'] = $db_user_role;
			
	 	redirect("/immigration/admin");

		}else{
			return false;
	   }
	}
	
	return true;
}

// Record Count table
function recordCount($table){
	global $connection;
	
	$query = "SELECT * FROM $table ";
	$select_all_query = mysqli_query($connection,$query);
	
	$result =  mysqli_num_rows($select_all_query);
	
	return $result;
}

//
function checkStatus($table, $column, $status){
	global $connection;
	
	$query = "SELECT * FROM $table WHERE $column = '$status' ";
	$select_all_query = mysqli_query($connection, $query);
	
	$result = mysqli_num_rows($select_all_query);
	
	return $result;
}

function checkUserRole($table, $column, $status){
	global $connection;
	
	$query = "SELECT * FROM $table WHERE $column = '$status' ";
	$select_all_query = mysqli_query($connection, $query);
	
	$result = mysqli_num_rows($select_all_query);
	
	return $result;
}

//===== USER SPECIFIC HELPERS=====//

function is_the_logged_in_user_owner($post_id){
    $result = query("SELECT user_id FROM posts WHERE id={$post_id} AND user_id=".loggedInUserId()."");
    return count_records($result) >= 1 ? true : false;
}

function get_all_user_posts(){
   return query("SELECT * FROM posts WHERE user_id=".loggedInUserId()."");
}


function get_all_posts_user_comments(){
    return query("SELECT * FROM posts
    INNER JOIN comments ON posts.id = comments.post_id
    WHERE user_id=".loggedInUserId()."");
}

function get_all_services(){
	global $connection;
    $query = "SELECT * FROM service ";
	$select_services = mysqli_query($connection, $query);
	return $select_services;
}

function get_all_user_published_posts(){
    return query("SELECT * FROM posts WHERE user_id=".loggedInUserId()." AND status='published'");
}

function get_all_user_draft_posts(){
    return query("SELECT * FROM posts WHERE user_id=".loggedInUserId()." AND status='draft'");
}


function get_all_user_approved_posts_comments(){
    return query("SELECT * FROM posts
    INNER JOIN comments ON posts.id = comments.post_id
    WHERE user_id=".loggedInUserId()." AND comments.status='approved'");
}


function get_all_user_unapproved_posts_comments(){
    return query("SELECT * FROM posts
    INNER JOIN comments ON posts.id = comments.post_id
    WHERE user_id=".loggedInUserId()." AND comments.status='unapproved'");
}




























	

