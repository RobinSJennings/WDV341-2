<?php
session_start();
if(isset ($_SESSION['session_start']) == "true")	//If this is a valid user allow access to this page
{
	if(isset($_POST["submit"]))
	{
		//The form has been submitted and needs to be processed

		include 'connection.php';	//connects to the database

		//Validate the form data here!

		//Get the name value pairs from the $_POST variable into PHP variables
		//uses the same name/value pairs from the form
		$event_id = $_POST['event_id'];
		$event_name = $_POST['event_name'];
		$event_description = $_POST['event_description'];
		$event_presenter = $_POST['event_presenter'];
		$event_date = $_POST['event_date'];
		$event_time = $_POST['event_time'];

		$sql = "INSERT INTO  wdv341 (event_id, event_name, event_description, event_presenter, event_date, event_time) VALUES (?, ?, ?, ?, ?, ?);";
		//Create the SQL command string
		/*$sql = "INSERT INTO wdv341 (";
		$sql .= "event_id, ";
		$sql .= "event_name, ";
		$sql .= "event_description, ";
		$sql .= "event_presenter, ";
		$sql .= "event_date, ";
		$sql .= "event_time";	//Last column does NOT have a comma after it.
		$sql .= ") VALUES (?,?,?,?,?,?)";*/	//? Are placeholders for variables

		//Display the SQL command to see if it correctly formatted.
		//echo "<p>$sql</p>";

		$query = $connection->prepare($sql);	//Prepares the query statement


		//Binds the parameters to the query.
		//s = string: i = integer: b = blob: d = double: (DATATYPES)
		$query->bind_param("isssss", $event_id, $event_name, $event_description, $event_presenter, $event_date, $event_time);

		//Run the SQL prepared statements
		if ( $query->execute() )
		{
			$sql = "INSERT INTO wdv341 ( event_id, event_name, event_description, event_presenter, event_date, event_time) VALUES ($event_id, $event_name, $event_description, $event_presenter, $event_date, $event_time);";
			/*$sql = "INSERT INTO nephilim42_341 (";
			$sql .= "event_id, ";
			$sql .= "event_name, ";
			$sql .= "event_description, ";
			$sql .= "event_presenter, ";
			$sql .= "event_date, ";
			$sql .= "event_time";	//Last column does NOT have a comma after it.
			$sql .= ") VALUES ($event_id,$event_name,$event_description,$event_presenter,$event_date,$event_time)";*/

			$message = "<h1>Your record has been successfully added to the database.</h1>";
			$message .= "<p>Please <a href='redirect.php'>view</a> your records.</p>";
		}
		else
		{
			$message = "<h1>You have encountered a problem.</h1>";
			$message .= "<h2 style='color:red'>" . mysqli_error($link) . "</h2>";	//remove this for production purposes
		}

		$query->close();
		$connection->close();	//closes the connection to the database once this page is complete.
	}// ends if submit
	else
	{
		header('location: loginPage.php');
		//Form has not been seen by the user.  display the form
	}
}//end Valid User True
else
{
	//Invalid User attempting to access this page. Send person to Login Page
	//header('Location: loginPage.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Into PHP  - Portfolio Project</title>
<style>
	html {
		color: white;
		text-align: center;
	}

	body {
		background-color: black;
	}
</style>

</head>

<body>
<?php
if(isset($_POST["submit"]))
{
	//If the form was submitted display the INSERT result message
?>
	<h1><?php echo $message = 'Your record has been successfully entered into the database'; ?></h1>
	<h1><?php echo "Return to <a href='portfolioProjectMetalShows.php'>Event Form</a>to enter more events";?></h1>
<?php
}//end if
else
{
	//Display the Form.  The user will add a new record\
	//include 'portfolioProjectMetalShows.php';
?>

<h1 style = "color: red;">Metal Shows</h1>
<form id="eventForm" name="eventForm" method="POST" action="portfolioProjectMetalShows.php">
  <p>Describe the event so promoters can get the information</p>
	<p>Event Id:
		<input type="text" name="event_id" id="event_id" />
	</p>
  <p>Event Name:
    <input type="text" name="event_name" id="event_name" />
  </p>
	<p>Event Description:
    <textarea name="event_description" id="event_description" col = "45" rows = "5"></textarea>
  </p>
  <p>Event Presenter:
    <input type="text" name="event_presenter" id="event_presenter" />
  </p>
  <p>Event Date:
    <input type="text" name="event_date" id="event_date" />
  </p>
  <p>Event Time:
    <input type="text" name="event_time" id="event_time" />
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Add Event" />
    <input type="reset" name="button2" id="button2" value="Clear Form" />
  </p>
</form>
<?php
}//end else
?>
</body>
</html>
