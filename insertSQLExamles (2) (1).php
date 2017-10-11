<?php

//This is an example piece of code that shows one way of processing the form data
// after the user has entered their information on the form and hit the submit button.

//The next step is to pull the form data from the $_POST variable in order to
// build the SQL INSERT query.

//Three techniques on how to build the SQL INSERT command are present here.
// The SQL command is a string.  All the techniques are valid, use the one
// that makes the most sense to you.

include 'connection.php';	//connects to the database

//Get the name value pairs from the $_POST variable into PHP variables
//This example is using PHP variables with the same name as the
// name atribute from the HTML form where the information was entered.
$event_id = $_POST[event_id];
$event_name = $_POST[event_name];
$event_description = $_POST[event_description];
$event_presenter = $_POST[event_presenter];
$event_date = $_POST[event_date];
$event_time = $_POST[event_time];

//SQL EXAMPLE #1
//Build the SQL Command to add the record
//This technique is good for adding a lot of fields
// or when you need to add and remove fields as your develop/test your application.
	/*$sql = "INSERT INTO presenters (";
	$sql .= "presenter_first_name, ";
	$sql .= "presenter_last_name, ";
	$sql .= "presenter_city, ";
	$sql .= "presenter_st, ";
	$sql .= "presenter_zip, ";
	$sql .= "presenter_email ";*/		//Last column does NOT have a comma after it.

	/*$sql .= ") VALUES (";
	$sql .= "'$presenter_first_name',";
	$sql .= "'$presenter_last_name',";
	$sql .= "'$presenter_city',";
	$sql .= "'$presenter_st', ";
	$sql .= "'$presenter_zip', ";
	$sql .= "'$presenter_email' ";*/	//Last value does NOT have a comma after it.

	//$sql .= ")";

	//Display the SQL command to see if it correctly formatted.
	//echo "<p>$sql</p>";

//SQL EXAMPLE #2
//Build the SQL Command to add the record.
// This technique is good when you have a small number of fields
// or you will not be changing the fields very often, like once it is production.
//NOTE:  This is one continous command line.
// Do not use any returns or this will break.
	$sqlHardCode = "INSERT INTO wdv341 (event_id, event_name, event_description, event_presenter, event_date, event_time) VALUES ($event_id, $event_name, $event_description, $event_presenter, $event_date, $event_time);";

	//Display the SQL command to see if it correctly formatted.
	//echo "<p>$sqlHardCode</p>";


//SQL EXAMPLE #3
//Build the SQL Command to add the record.
// This technique uses the $_POST variable to place the values
// in the SQL string.  You have to use concatenation to make this work.
//NOTE:  This is one continous command line.
// Do not use any returns or this will break.
	/*$sqlPost = "INSERT INTO presenters (presenter_first_name, presenter_last_name, presenter_city, presenter_st, presenter_zip, presenter_email) VALUES (" . $_POST['presenter_first_name'] . ", " . $_POST['presenter_last_name'] . ", " . $_POST['presenter_city'] . ", " . $_POST['presenter_st'] . ", " . $_POST['presenter_zip'] . ", " . $_POST['presenter_email'] . ");"; */
	//Display the SQL command to see if it correctly formatted.
	//echo "<p>$sqlPost</p>";

//Run the SQL command using the database you connected with
//Test to see if the query was successful or had a problem.
// NOTE The following code is good for testing but not Production applications.
if (mysqli_query($link,$sql) )
{
	echo "<h1>Your record has been successfully added to the database.</h1>";
	echo "<p>Please <a href='viewPresenters.php'>view</a> your records.</p>";
}
else
{
	echo "<h1>You have encountered a problem.</h1>";
	echo "<h2 style='color:red'>" . mysqli_error($link) . "</h2>";
}

mysqli_close($link);	//closes the connection to the database once this page is complete.

?>
