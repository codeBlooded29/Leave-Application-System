<html>
    <head>
        <title>DBMS_PHP_LeaveApplication</title>
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
        align-self: center;
        align-content: center;
        align-items: center;
    }

    a:hover, a:active {
        align-items: center;
        align-self: center;
        text-align: center;
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
        <?php
            echo "<h1>Welcome to IIT Patna Leave Application Portal</h1><br>";?>
        <br><a href="login.php">Sign In (Students)!</a><br><br>
        <a href="register.php">Sign Up (Students)!</a><br><br>
        <a href="adminLogin.php">Sign In (Admin)!</a><br><br>
    </body>
</html>
