<?php
session_start();
if ($_SESSION['validUser'] == "yes")	//If this is a valid user allow access to this page
{
	include 'connection.php';			//connects to the database

	$sql = "SELECT $event_id, $event_name, $event_description, $event_presenter, $event_date, $event_time FROM nephilim42_341";	// SQL command

	$query = $connection->prepare($sql) or die("<h1>Prepare Error</h1>");	//prepare the Statement Object

	//run the statement

	if( $query->execute() )	//Run Query and Make sure the Query ran correctly
	{
		$query->bind_result($event_id, $event_name, $event_description, $event_presenter, $event_date, $event_date, $event_time);

		$query->store_result();
	}
	else
	{
		//Problems were encountered.
		$message = "<h1 style='color:red'>Houston, We're screwed...</h1>";
		$message .= "mysqli_error($connection)";		//Display error message information
		echo $message;
	}
}//end Valid User True
else
{
	//Invalid User attempting to access this page. Send person to Login Page
	header('Location: presentersLogin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP  - Presenters Example</title>

</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Presenters Admin System Example</h2>
<h3>View Presenters</h3>
<p>This page will pull all of the presenters from the presenters table in the database. It will display all of the columns for each presenter as an HTML table. </p>
<p>Each presenter has an Update link. The update link will call a form page that uses PHP to fill out the form for the chosen presenter. Notice how the link passes the presenter_id as a GET parameter on the URL in the href attribute of the hyperlink element.</p>
<p>Each presenter has a Delete link. The delete link will call a php page that will delete the selected record from the table. Notice how the link passes the presenter_id as a GET parameter on the URL in the href attribute of the hyperlink element. </p>
<?php
	echo "<h3>" . $query->num_rows . " Presenters were found.</h3>";	//display number of rows found by query
?>
<div>
	<table border="1">
	<tr>
		<th>Event Id</th>
		<th>Name</th>
		<th>Description</th>
		<th>Presenter(s)</th>
		<th>Date</th>
		<th>Time</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
<?php
	//Display rows of data in table
	while( $query->fetch() )
	//Turn each row of the result into an associative array
  	{
		//For each row you have in the array create a table row
  		echo "<tr>";
  		echo "<td>$event_id</td>";
  		echo "<td>$event_name</td>";
  		echo "<td>$event_description</td>";
  		echo "<td>$event_presenter</td>";
  		echo "<td>$event_date</td>";
  		echo "<td>$event_time</td>";
		echo "<td><a href='presentersUpdateForm.php?recId=$event_id'>Update</a></td>";
		echo "<td><a href='presentersDelete.php?recId=$event_id'>Delete</a></td>";
  		echo "</tr>\n";
  	}
	$query->close();
	$connection->close();	//Close the database connection
?>
	</table>
</div>
<p>Return to <a href="presentersLogin.php">Administrator Options</a></p>
</body>
</html>
