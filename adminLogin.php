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
		<h1>Admin Login Page</h1>
		<a href="index.php">Click here to go back</a><br/><br/>
		<form action="checkAdminLogin.php" method="post">
			Enter Webmail_Id : <input type="text" name="webmail" required="required"/> <br/><br>
			Enter Password : <input type="password" name="password" required="required" /> <br/><br>
			<input type="submit" value="Login"/>
		</form>
	</body>
</html>