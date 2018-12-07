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
  <?php
    session_start(); //starts the session
    if($_SESSION['user']){ /*checks if user is logged in*/}
    else{
      header("location:login.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; //assigns user value
  ?>
  <body>
    <h1>Home Page</h1>
    <p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
    <a href="logout.php">Logout!</a><br/><br>
    <!-- <a href="reg_complain.php">Click Here to Register a Complain</a> -->
    <br><br><a href="apply.php">Click Here To Apply for Leave!</a><br/><br/>
    <h2 align="center">My Leave Applications</h2>
    <table border="1px" width="100%">
    <tr>
        <th>Id</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Reason</th>
        <th>Approval Status</th>
    </tr>
    <?php
        $conn = mysqli_connect("localhost","root","","LEAVE_APPLICATION");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result=mysqli_query($conn,"SELECT roll_number from Students WHERE webmail_id='".$user."'");
        $row=mysqli_fetch_assoc($result);
        $sql="SELECT id, start_date, end_date, reason, approval_status FROM Leave_Record WHERE roll_number='".$row['roll_number']."'";
        $query = mysqli_query($conn,$sql); // SQL Query
        if($query){
            while($row = mysqli_fetch_array($query))
            {
                Print "<tr>";
                    Print '<td align="center">'. $row['id'] . "</td>";
                    Print '<td align="center">'. $row['start_date'] . "</td>";
                    Print '<td align="center">'. $row['end_date']."</td>";
                    Print '<td align="center">'. $row['reason']."</td>";
                    Print '<td align="center">'. $row['approval_status']."</td>";
                Print "</tr>";
            }
        }
    ?>
    </body>
</html>