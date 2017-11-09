<?php
	session_start();

	$servername = "localhost";
	$username = "nephilim42_wdv";
	$password = "nephilim42";
	$dbname = "nephilim42_wdv";
	
	
try{
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected Successfully...";
	} 
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>