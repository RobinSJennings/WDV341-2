<html>

<head>
<style>
html {
	color: white;
}

body{
	background: linear-gradient(red, black, red);
}

h1 {
	text-align: center;
}
</style>
</head>

<body>

<?php


$hostname = "10.123.0.85:3306";	//the name of the server where the database is located.  Usually localhost
$username = "nephilim42_341";				//the username on the database.  Usually listed on the cPanel listing of databases
$database = "nephilim42_341";				//the name of the database.  Usually the same as the username.  Located on the cPanel listing of databases
$password = "rsjennings83";				//the password of the account or database.  Set a seperate password for the database.  On the cPanel listing of databases

//Builds the connection object called $db and selects the desired database.
$link = new mysqli($hostname, $username, $database, $password);	//$link is the connection object


//Check to make sure you properly connected to the database.
if($link->connect_error)
{
	die("Connection Failed: " . $link->connect_error);
	echo $e->getMessage();
}
else
{
	echo "<h1>Connected Successfully</h1>";
}


//Alternative method of checking for a successful connection.  NOT recommended for production applications.

//Check to make sure you properly connected to the database.  This example is ok for testing but not for a production environment.
  $link = mysqli_connect($hostname,$username,$password,$database) or die("Error " . mysqli_error($link));
?>
</body>

</html>
