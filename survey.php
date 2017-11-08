<?php
session_start();

$servername = "localhost";
$username = "nephilim42_wdv";
$password = "nephilim42";
$dbname = "nephilim42_wdv";

	if(isset($_POST["submit"]))
{
	


try {
	$email = $_POST['email'];
	$value1 = $_POST['value1'];
	$value2 = $_POST['value2'];
	$value3 = $_POST['value3'];
	$value4 = $_POST['value4'];
	$date = getdate(date("U"));
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO wdv341_class_insert (cust_email, cust_pref1, cust_pref2, cust_pref3, cust_pref4, cust_input_date) 
    VALUES (:email, :value1, :value2, :value3, :value4, :U)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':value1', $value1);
    $stmt->bindParam(':value2', $value2);
	$stmt->bindParam(':value3', $value3);
	$stmt->bindParam(':value4', $value4);
	$stmt->bindParam(':U', $date);

    // insert a row
   
    $stmt->execute();

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}	
?>
<html>

<head>

	<style>
		body {
			background-color: black;
			color: white;
		}
		#all {
			text-align: center;
		}
		
		hr {
			color: red;
		}
	</style>

</head>

<body>
<div id = "all">
	<h1>Welcome to the Time Survey</h1>
	<p>Please complete the survey below</p>

	<form name = "preferences" id = "preferences" method = "post" action = "">
		<p>Please enter your name:
			<input type = "text" name = "names" id = "names">
		</p>
		
		<p>Please enter your email address:
			<input type = "text" name = "email" id = "email">
		</p>
	<br>
	<hr>
		<p> The purpose of this survey is to see what times usually work for our customers. This way we can expect more appointments and plan for these times more often for our customers. Your input is important to us.</p>
	<hr>
		<h3>Please select which times work best for you</h3>
			<p>Monday through Wednesday - 10:10a.m. - 12:00p.m.<p>
				<select name = "value1">
					<option value = "1">1</option>
					<option value = "2">2</option>
					<option value = "3">3</option>
					<option value = "4">4</option>
				</select>
			<p>Tuesday - 6:00 - 9:00p.m.</p>
				<select name = "value2">
					<option value = "1">1</option>
					<option value = "2">2</option>
					<option value = "3">3</option>
					<option value = "4">4</option>
				</select>
			<p>Wednesday 6:00 - 9:00p.m.</p>
				<select name = "value3">
					<option value = "1">1</option>
					<option value = "2">2</option>
					<option value = "3">3</option>
					<option value = "4">4</option>
				</select>
			<p>Tuesday through Thursday - 10:10a.m. - 12:00p.m.</p>
				<select name = "value4">
					<option value = "1">1</option>
					<option value = "2">2</option>
					<option value = "3">3</option>
					<option value = "4">4</option>
				</select>
		<br><br>
			<input type = "submit" name = "submit" id = "submit" value = "SUBMIT">
	</form>
</div>
</body>

</html>