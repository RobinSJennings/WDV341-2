<?php

$hostname = "localhost";
$username = "nephilim42_341";  //database/username from control panel
$password = "rsjennings83";		//database password	from control panel for the
$database = "nephilim42_341";		//name of database/username from control panel

//Create connection object to the MySQL database server

$conn = new mysqli($hostname, $username, $password, $database);


//Check connection with DEVELOPMENT exception handling

if($conn->connect_error)
{
	die("Connection Failed: " . $conn->connect_error);
}
/*$stmt = $conn->prepare("INSERT INTO nephilim42_341 . wdv341 (event_id, event_name, event_description, event_presenter, event_date, event_time) VALUES (?, ?, ?, ?, ?, ?);");
$stmt->bind_param("isssss", $event_id, $event_name, $event_description, $event_presenter, $event_date, $event_time);

$event_id = '4';
$event_name = 'boobface';
$event_description = 'shshshs';
$event_presenter = 'egaeggr';
$event_date = '12/26/1301';
$event_time = '12:00';
$stmt -> execute();*/
else
{
	header('Location: presentersInsertForm.php');
}
/*$stmt -> close();
$conn -> close();*/

?>
