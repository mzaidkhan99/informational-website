<?php
session_start();
include("conn.php");

mysqli_select_db($connection,'db_web');
if (isset($_POST['sinin'])) {
	$username = $_POST['uname'];
	$password = $_POST['pass'];

	$sql = "select * from sign_in where uname = '$username' and pass = '$password'";
	$q = mysqli_query($connection, $sql);
	$res = mysqli_num_rows($q);
	
	if ($res == 1) {
         $_SESSION['username'] = $username;
         echo($_SESSION['username']);
         header('location:scr.php');
      
	}
	else{
		echo "username or password is incorrect";
	}
}
?>