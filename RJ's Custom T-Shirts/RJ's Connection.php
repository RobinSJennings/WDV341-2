<?php

////Connecting to database////

session_start();

	$servername = "localhost";
	$username = "nephilim42_341";
	$password = "nephilim42";
	$dbname = "nephilim42_341";
	
	
try{
	$conn = new PDO("mysql:user=$servername;password=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "";
	} 
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>