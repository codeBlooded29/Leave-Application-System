<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","LEAVE_APPLICATION");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$webmail = mysqli_real_escape_string($conn,$_POST['webmail']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	$query = mysqli_query($conn,"SELECT * FROM Students WHERE webmail_id='$webmail'"); //Query the users table if there are matching rows equal to $webmail
	$exists = mysqli_num_rows($query); //Checks if webmail exists
	$table_users = "";
	$table_password = "";
	if($exists > 0) //IF there are no returning rows or no existing webmail
	{
		while($row = mysqli_fetch_assoc($query)) //display all rows from query
		{
			$table_users = $row['webmail_id']; // the first webmail row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
		}
		if(($webmail == $table_users) && ($password == $table_password)) // checks if there are any matching fields
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $webmail; //set the webmail in a session. This serves as a global variable
					header("location: home.php"); // redirects the user to the authenticated home page
				}
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
			Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
		}
	}
	else
	{
		Print '<script>alert("Incorrect webmail!");</script>'; //Prompts the user
		Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
	}
?>