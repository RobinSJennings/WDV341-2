<?php
session_start();

$servername = "localhost";
$username = "nephilim42_wdv";
$password = "nephilim42";
$dbname = "nephilim42_wdv";

	if(isset($_POST["submit"]))
{
	


try {
	$name = $_POST['names'];
	$email = $_POST['email'];
	$value1 = $_POST['value1'];
	$value2 = $_POST['value2'];
	$value3 = $_POST['value3'];
	$value4 = $_POST['value4'];
	//$date = getdate(date("U"));
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO wdv341_class_insert (cust_name, cust_email, cust_pref1, cust_pref2, cust_pref3, cust_pref4) 
    VALUES (:names, :email, :value1, :value2, :value3, :value4)");
	$stmt->bindParam(':names', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':value1', $value1);
    $stmt->bindParam(':value2', $value2);
	$stmt->bindParam(':value3', $value3);
	$stmt->bindParam(':value4', $value4);
	//$stmt->bindParam(':U', $date);

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
		
		#error {
			color: red;
		}
	</style>

</head>

<body>
<div id = "all">
	<h1>Welcome to the Time Survey</h1>
	<p>Please complete the survey below</p>

	<form name = "preferences" id = "preferences" method = "post" action = "">
	
		<p id = "error">Fields with * are required</p>
	
		<p>Please enter your name:
			<input type = "text" name = "names" id = "names" required><span id = "error"> *</span>
		</p>
		
		<p>Please enter your email address:
			<input type = "text" name = "email" id = "email" required><span id = "error"> *</span>
		</p>
	<br>
	<hr>
		<p> The purpose of this survey is to see what times usually work for our customers. This way we can expect more appointments and plan for these times more often for our customers. Your input is important to us.</p>
	<hr style = "color: red;">
		<h3>Please select which times work best for you</h3>
			<p>Monday through Wednesday - 10:10a.m. - 12:00p.m.<p>
				<select required name = "value1">
					<option value = "empty">-please choose-</option>
					<option value = "1">1</option>
					<option value = "2">2</option>
					<option value = "3">3</option>
					<option value = "4">4</option>
				</select>
			<p>Tuesday - 6:00 - 9:00p.m.</p>
				<select required name = "value2">
					<option value = "empty">-please choose-</option>
					<option value = "1">1</option>
					<option value = "2">2</option>
					<option value = "3">3</option>
					<option value = "4">4</option>
				</select>
			<p>Wednesday 6:00 - 9:00p.m.</p>
				<select required name = "value3">
					<option value = "empty">-please choose-</option>
					<option value = "1">1</option>
					<option value = "2">2</option>
					<option value = "3">3</option>
					<option value = "4">4</option>
				</select>
			<p>Tuesday through Thursday - 10:10a.m. - 12:00p.m.</p>
				<select required name = "value4">
					<option value = "empty">-please choose-</option>
					<option value = "1">1</option>
					<option value = "2">2</option>
					<option value = "3">3</option>
					<option value = "4">4</option>
				</select>
		<br><br>
			<input type = "submit" name = "submit" id = "submit" value = "SUBMIT">
	</form>
	
	<p>Below is a rendered copy of the information you had entered on this form...</p>

		<table border="1" style = "margin: 0 auto;">
	<tr>
		<th>Name:</th>
		<th>Email:</th>
		<th>Date Preference 1</th>
		<th>Date Preference 2</th>
		<th>Date Preference 3</th>
		<th>Date Preference 4</th>
		
	</tr> 
<?php
		echo "<tr>";
  		echo "<td>$name</td>";
  		echo "<td>$email</td>";
  		echo "<td>$value1</td>";
  		echo "<td>$value2</td>";
		echo "<td>$value3</td>";
		echo "<td>$value4</td>";
?>
	
</div>
		
</body>

</html>