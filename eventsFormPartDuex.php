<?php
		session_start(); //use log-in creds

	$servername = "localhost";
	$username = "nephilim42_wdv";
	$password = "nephilim42";
	$dbname = "nephilim42_wdv";

	//begin insert
	
	if(isset($_POST["submit"]))
{
try {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$eventName = $_POST['eventName'];
	$eventDescription = $_POST['eventDescription'];
	$date = $_POST['date'];
	$time = $_POST['eventTime'];

	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO wdv341_students (contact_name, contact_email, event_name, event_description, event_date, event_time) 
    VALUES (:name, :email, :eventName, :eventDescription, :date, :eventTime)");
	
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':eventName', $eventName);
	$stmt->bindParam(':eventDescription', $eventDescription);
	$stmt->bindParam(':date', $date);
	$stmt->bindParam(':eventTime', $time);
	

    // insert a row
   
    $stmt->execute();
	
	// execute the params

    echo "New records created successfully"; //if all is good
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

} //end insert	
?>

<html>

<head>

<style>
	body {
		background-color: black;
		color: white;
		text-align: center;
	}
	#style {
		border: solid thick red;
		width: 60%;
		margin: 0 auto;
	}
	table {
		margin: 0 auto;
		text-align: center;
	}
</style>

</head>

<body>

<div id = "style">
	<form name = "form1" id = "form1" method = "post" action = "eventsFormPartDuex.php">
		
	<p>Please enter your name:
		<input type = "text" name = "name" id = "name" required>
	</p>
	<p>Please enter your email address:
		<input type = "text" name = "email" id = "email" required>
	</p>
	<p>Please enter the name of the event:
		<input type = "text" name = "eventName" id = "eventname" required>
	</p>
	<p>Please enter a description of the event:
		<input type = "text" name = "eventDescription" id = "eventDescription" required>
	</p>
	<p>Please enter the date of the event:
		<input type = "date" name = "date" id = "date" required>
	</p>
	<p>Please enter a time for the event:
		<input type = "text" name = "eventTime" id = "eventTime" required>
	</p>
		<input type = "submit" name = "submit" id = "submit" value = "SUBMIT">
	</form>
</div>
	
	<?php
	if(isset($_POST['submit']))
{	
?>
	<p>Below is a rendered copy of the information you had entered on this form...</p>

		<table border="1">
	<tr>
		<th>Name:</th>
		<th>Email:</th>
		<th>Name of event:</th>
		<th>Description of event:</th>
		<th>Event date:</th>
		<th>Event time:</th>
		<!--<th>Update</th>
		<th>Delete</th>-->
	</tr> 
<?php
		echo "<tr>";
  		echo "<td>$name</td>";
  		echo "<td>$email</td>";
  		echo "<td>$eventName</td>";
  		echo "<td>$eventDescription</td>";
		echo "<td>$date</td>";
		echo "<td>$time</td>";
		/*echo "<td><a href='updateContactForm.php?recId='>Update</a></td>";
		echo "<td><a href='presentersDelete.php?recId=$'>Delete</a></td>";*/
  		echo "</tr>\n";
	
}
$conn = null;
$stmt = null;
?>

</body>

</html>