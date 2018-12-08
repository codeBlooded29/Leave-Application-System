<html>
  <head>
    <title>Leave Application Portal</title>
  </head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <style>
    body {
        background-color: lightblue;
    }

    h1{
        color: black;
        text-align: center;
    }
    h2{
      font-family: verdana
    }
    p {
        font-family: verdana;
        font-size: 20px;
        text-align: center;
    }
    form{
      font-family: "Comic Sans MS", cursive, sans-serif;
        font-size: 20px;
        text-align: center;
    }
    a:link, a:visited {
        background-color: #f44336;
        color: white;
        padding: 14px 25px;
        text-align: center; 
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
    }

    a:hover, a:active {
        background-color: red;
    }
    tr:hover {background-color: #f5f5f5;}
    tr:nth-child(even) {background-color: #f2f2f2;}
    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</html>
<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	echo "<h1>Enter below details to apply for leave</h1><br><br>";
?>
<form action="apply.php" method="post">
    Leave Start Date : <input type="date" name="out_date" required="required"><br><br>
    Leave End Date : <input type="date" name="in_date" required="required"><br><br>
    Reason for Leave : <input type="text" name="reason" required="required"><br><br>
    <input type="submit" name="Apply">
</form>

<?php
	$user = $_SESSION['user'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$in_date=$_POST['in_date'];
		$out_date=$_POST['out_date'];
		$reason=$_POST['reason'];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "LEAVE_APPLICATION";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn){
			die("Connection failed: " . mysqli_connect_error());
		}
		#echo "Connected successfully";
		$result = mysqli_query($conn,"SELECT * FROM Students WHERE webmail_id='".$_SESSION['user']."'");
		$row=mysqli_fetch_assoc($result);
		echo "My roll = ";
		echo $row['roll_number'];
		$sql="INSERT INTO Leave_Record(roll_number,start_date,end_date,reason) VALUES('".$row['roll_number']."','".$out_date."','".$in_date."','".$reason."')";
		$result=mysqli_query($conn,$sql);
		if($result){
			Print '<script>alert("Application Successful!");</script>'; //Prompts the user
			Print '<script>window.location.assign("home.php");</script>'; // redirects to login.php
		}
		else{
			//Print '<script>alert("Not Successful! Try Again!");</script>'; //Prompts the user
			//Print '<script>window.location.assign("apply.php");</script>'; // redirects to login.php
		}
	}
?>