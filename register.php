<html>
  <head>
    <title>Registration Page</title>
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
      font-family: verdana;
      text-align: center;
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
  <body>
    <h1>Registration Page</h1>
    <a href="index.php">Click here to go back</a><br/><br/>
    <?php echo "<h2>Enter below details to register</h1>"?><br><br>
    <form action="register.php" method="post">
      Roll No. : <input type="varchar" name="roll_number" required="required"/><br/><br>
      Name : <input type="text" name="name" required="required"/> <br/><br>
      Date of Birth : <input type="date" name="dob" required="required"/><br/><br>
      Mobile No. : <input type="number" name="mobile" required="required"/><br/><br>
      Department : <input type="text" name="dept" required="required"/><br/><br>
      Webmail ID : <input type="email" name="email" required="required"/><br/><br>
      Education Programme : <input type="text" name="edu_prog" required="required"><br><br>
      Year of Study : <input type="number" name="year_of_study" required="required"><br><br>
      Hostel Block : <input type="text" name="hostel_block" required="required"><br><br>
      Hostel Room No. : <input type="text" name="room" required="required"><br><br>
      Password : <input type="password" name="password" required="required"/><br/><br>
      <input type="submit" value="Register"/>
    </form>
  </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $conn = mysqli_connect("localhost","root","","LEAVE_APPLICATION");
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  #echo "Connected successfully";
  $sql="SELECT * FROM Students";
  $result = $conn->query($sql);
  $bool=true;
  while($row = mysqli_fetch_array($result)) //display all rows from query
  {
    $table_users = $row['webmail_id']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($webmail == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Already registered! Now Login!");</script>'; //Prompts the user
      Print '<script>window.location.assign("login.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    $sql="INSERT INTO Students(roll_number,name,dob,department,webmail_id,hostel_block,room_number,edu_programme,year_of_study,password,mobile_number) VALUES('".$_POST['roll_number']."','".$_POST['name']."','".$_POST['dob']."','".$_POST['dept']."','".$_POST['email']."','".$_POST['hostel_block']."','".$_POST['room']."','".$_POST['edu_prog']."','".$_POST['year_of_study']."','".$_POST['password']."','".$_POST['mobile']."')"; //Inserts the value to table users
    
    $result=$conn->query($sql);
    if($result){
      Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
      Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
    else{
        Print '<script>alert("Unsuccessful!");</script>'; // Prompts the user
        Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
  }
}
?>