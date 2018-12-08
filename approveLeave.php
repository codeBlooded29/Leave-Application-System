<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$conn=mysqli_connect("localhost","root","","LEAVE_APPLICATION") or die(mysqli_error()); //Connect to server & database
		$id = $_GET['id'];
		if(mysqli_query($conn,"UPDATE Leave_Record SET approval_status=1 WHERE id='".$id."'")){
			Print '<script>alert("Successfully approved!");</script>'; 
		}
		header("location: adminHome.php");
	}
?>