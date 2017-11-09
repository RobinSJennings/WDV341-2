<?php
	session_start();

	$servername = "localhost";
	$username = "nephilim42_wdv";
	$password = "nephilim42";
	$dbname = "wdv341";

	if(isset($_POST["submit"]))
{
try {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$value1 = $_POST['rep'];
	$value2 = $_POST['reason'];
	$description = $_POST['Description'];
	$newsletter = $_POST['newsletter'];
	$brochure = $_POST['product'];
	$date = $_POST['todaysDate'];
	$time = $_POST['time'];
	$tframe = $_POST['tframe'];
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO wdv_341_customer_contacts (contact_name, contact_email, contact_rep, contact_reason, contact_comments, contact_newsletter, contact_more_products, contact_date, contact_time, contact_time_frame) 
    VALUES (:name, :email, :rep, :reason, :Description, :newsletter, :product, :todaysDate, :time, :tframe)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':rep', $value1);
	$stmt->bindParam(':reason', $value2);
	$stmt->bindParam(':Description', $description);
	$stmt->bindParam(':newsletter', $newsletter);
	$stmt->bindParam(':product', $brochure);
	$stmt->bindParam(':todaysDate', $date);
	$stmt->bindParam(':time', $time);
	$stmt->bindParam(':tframe', $tframe);

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

</head>

<body>

	<form id = "contacts" name = "contacts" method = "post" action = "">
		<p>Please enter your name:
			<input type = "text" name = "name" id = "name" required>
		</p>
		<p>Please enter your email address:
			<input type = "text" name = "email" id = "email" required>
		</p>
	<br>
		<p>Let us know who you are trying to reach:<br>(Your representative. An email with this information will be sent to the corresponding representative)
			<select name = "rep" required>
				<option value = "empty">-Please Choose-</option>
				<option value = "Chester Cheeto">Chester Cheeto</option>
				<option value = "Pork Chop McGee">Pork Chop McGee</option>
				<option value = "Bosephus the BBQ King">Bosephus the BBQ King</option>
			</select>
			</p>
	<br>
		<p>Reason for contact:
		<select name = "reason" required>
			<option value = "empty">-Please Choose-</option>
			<option value = "Product Problem">Product Problem</option>
			<option value = "Delivery Problem">Delivery Problem</option>
			<option value = "Customer Service Problem">Customer Service Problem</option>
		</select>
		</p>
		<p>Please let us know how we can help:</p>
		<textarea cols = "30" rows = "6" name = "Description" required></textarea>
	<br><br>
		<p>Sign up for our newsletter?
			<input type = "checkbox" name = "newsletter" id = "newsletter">
		</p>
	<br>
		<p>Let us know if you would like to recieve<br> our brochure featuring more of our products:
			<input type = "checkbox" name = "product" id = "product">
		</p>
		<p>Please enter today's date:
			<input type = "date" name = "todaysDate" id = "todaysDate" required>
		</p>
		<p>Please enter a date for a follow-up consultation:
			<input type = "date" name = "follow_up_date" id = "follow_up_date" required>
		</p>
		<p>Please enter a time that works best for you:
			<input type = "text" name = "time" id = "time" size = "2px" required>
		</p>
		<p>A.M. or P.M.:
			<select name = "tframe">
				<option value = "empty">-Please Choose-></option>
				<option value = "A.M.">A.M.</option>
				<option value = "P.M.">P.M.</option>
			</select>
	<br>
		<input type = "submit" name = "submit" id = "submit" value = "SUBMIT">
	<hr>
		
	</form>

</body>

</html>