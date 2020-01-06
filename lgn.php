<?php
//session_start();
include("conn.php");

mysqli_select_db($connection,'db_web');
if (isset($_POST['uname']) && isset($_POST['pass'])) {
	$username = $_POST['uname'];
	$password = $_POST['pass'];
}

if ($username =="" && $password =="") {
	header('location:scr.php');
}
else{
	echo ($username ." and ". $password);

	$sql = "select * from sign_in where uname = '$username' and pass = '$password'";
	$q = mysqli_query($connection, $sql);
	$res = mysqli_num_rows($q);
	echo "$res";
	if ($res == 0) {
		$sql_2 = "insert into sign_in (uname, pass) values ('$username','$password')";
		$q_2 = mysqli_query($connection, $sql_2);
	}  else{
         header('location: scr.php');
         echo "username already in use";
      }
}
?>