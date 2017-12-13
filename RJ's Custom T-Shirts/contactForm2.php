<?php
	foreach($_POST as $key => $value)		//loops through all name-value in $_POST array []
	{
		$tableBody .= "<tr>";				//creates lifeform named Row
		$tableBody .= "<td>$key</td>";		//Row writes on a name tag the name-value pairs from the form. They're his friends
		$tableBody .= "<td>$value</td>";	//Row wears his friends proudly
		$tableBody .= "</tr>";				//Row dies. At least he had friends.
	}

//these are Row's friends. But he likes to hide them...
/*	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr class=colorRow>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	}
	echo "</table>";
	echo "<p>&nbsp;</p>";*/
?>



<?php
if (isset($_POST['submit'])) {


	//$toEmail = "robinjennings@nephilim42.com";		//Email address where you want to send the form data. Whomever is wanting an email.

	$toEmail = "robinjennings@nephilim42.com, $_POST[Email_Address]"; //This will send the email to me. I'm still trying to concatenate both $toEmail variables.
	//$toEmail = $_POST[Email_Address];    //Gettin email address into variable to have email sent to user....



	$subject = "Your Results";	// Place your short message for subject."


	$fromEmail = "robinjennings@nephilim42.com";		//<-- Domain Email Address. This will display in the sent email


//   DO NOT CHANGE THE FOLLOWING LINES  //

	$emailBody = "Form Data\n\n ";			//stores the content of the email
	foreach($_POST as $key => $value)		//Reads all of the name-value pairs. 	$key: field name   $value: value from the form
	{
		$emailBody.= $key."=".$value."\n";	//Adds the name value pairs to the body of the email, each one on their own line. \n = new line Unix/Mac OS
		                                                                                                                    //\r = MacOS before X
																																																												//\r\n = Windows
	}

	$headers = "From: $fromEmail" . "\r\n";				//Creates the From header with the appropriate address. Could even say it's from your cat...

 	if (mail($toEmail,$subject,$emailBody,$headers)) 	//puts pieces together and sends the email to your hosting account's email server
	{
   		header('location: approved.php');
  	}
	else
	{
   		echo("<p style = 'color: white;'>Message delivery failed...</p>");
  	}
}

//define variables and set to empty values
$nameErr = $mailingNameErr = $mailingLastNameErr = $addressErr = $mailingAddressErr = $emailErr = "";
$name = $mailingName = $mailingLastName = $address = $mailingAddress = $email =  "";                             // Testing validation...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["Name"])) {
			$nameErr = "";
		} else {
			$name = test_input($_POST["Name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "<br> * Only letters and white space allowed";
			}
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["mailingName"])) {
					$mailingNameErr = "";
				} else {
					$mailingName = test_input($_POST["mailingName"]);
					// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/",$mailingName)) {
						$mailingNameErr = "<br> * Only letters and white space allowed";
					}
				}
			}

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["mailingLastName"])) {
						$mailingLastNameErr = "";
					} else {
						$mailingLastName = test_input($_POST["mailingLastName"]);
						// check if name only contains letters and whitespace
						if (!preg_match("/^[a-zA-Z ]*$/",$mailingLastName)) {
							$mailingLastNameErr = "<br> * Only letters and white space allowed";
						}
					}
				}

	if (empty($_POST["address"])) {
		$address = "";
	}else{
		$address = test_input($_POST["address"]);
		//check if address contains only number,letters, and whitespace
		if (preg_match("^([0-9]+ )[0-9a-zA-Z ]+$^", $address)) {
			$addressErr = "";
		}else {
			$addressErr =  "<br>* Needs letters, numbers. Whitespace allowed. No special characters<br>For apartment/Unit listing, please use 'apt' rather than the '#' symbol";
		}
	}

	if (empty($_POST["mailingAddress"])) {
		$mailingAddress = "";
	}else{
		$mailingAddress = test_input($_POST["mailingAddress"]);
		//check if address contains only number,letters, and whitespace
		if (preg_match("^([0-9]+ )[0-9a-zA-Z ]+$^", $mailingAddress)) {
			$mailingAddressErr = "";
		}else {
			$mailingAddressErr = "<br>* Needs letters, numbers. Whitespace allowed. No special characters<br>For apartment/Unit listing, please use 'apt' rather than the '#' symbol";
		}
	}

	if (empty($_POST["Email_Address"])) {
		$email = "";
	} else {
		$email = test_input($_POST["Email_Address"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "<br>* Invalid email format. Dont forget the '@' and the .com's, .hotmails, ect";
		}
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


?>

<!DOCTYPE html><!--Woah. Deja Vu-->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<style>

	html {
		color: white;
	}

	body {
		background-image: url("blueDeath.jpg");
		background-size: 150%;
		background-repeat: no-repeat;
		text-align: center;
	}

	div {
		background-color: black;
		opacity: 0.9;
		color: white;
		text-align: center;
	}

	h1 {
		color: white;
	}

	h2 {
		color: white;
	}

	.error {
		color: #FF0000;
	}

	#borderStyle {
		border: double thick blue;
		border-radius: 45px;
		width: 50%;
		margin: 0 auto;
	}

	#hiddenStuff {
		display: none;
	}

	textarea {
		display: none;
		margin: 0 auto;
	}

	#mailingInformation {
		display: none;
		margin: 0 auto;
	}

	table {
		margin: 0 auto;
		border: solid thick blue;
		border-radius: 20px;
	}

	th {
		border: solid thick blue;
		border-radius: 45px;
	}

	tr {
		color: white;
		border: solid thin blue;
		border-radius: 45px;
	}

	td {
		color: white;
		border: solid thin blue;
		border-radius: 45px;
	}


</style>

<script>

	function showProductProblemComments()
	{
		document.getElementById("textarea").style.display = "block";
	}

	function showMailingListForm()
	{
		document.getElementById("mailingInformation").style.display = "block";
	}
</script>
</head>


<body>

<h1>WDV341 Intro PHP</h1>
<h2>Product complaint and Mailing Form</h2>

<div>

<form name="form1" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">    <!-- $_SERVER["PHP_SELF"] sends the submitted form data to the page itself, instead of jumping to a different page. This way, the user will get error messages on the same page as the form. CAN BE EXPLOITED!!!-->
  <p>&nbsp;</p>
  <p>
<div id = "borderStyle">
	<p class = "error">* Required</p>
<br>
<ul>
    <label>Your Name:
      <input type="text" name="Name" id="textfield" value = "<?php echo $name;?>" required>
			<span class = "error">* <?php echo $nameErr;?></span>
  </p>
<br><br>
  <p>Your Email:
    <input type="text" name="Email Address" id="textfield2" value = "<?php echo $email;?>" required>
			<span class = "error">* <?php echo $emailErr;?></span>
  </p>
<br><br>
  <p>Your Address:
	<input type = "text" name = "address" id = "living" value = "<?php echo $address;?>"required>
		<span class = "error">* <?php echo $addressErr;?></span>
  </p>
<br><br>
  <p>Reason for contact:
      <select name="Reason" id="select2" onChange = "showProductProblemComments()" required>
        <option value="default">Please Select a Reason</option>
        <option value="product">Product Problem</option>
        <option value="return">Service Problem</option>
        <option value="billing">Billing Question</option>
        <option value="technical">Report a Website Problem</option>
        <option value="other">Other</option>
      </select>
  </p>
<br><br>
      <textarea name="comments" id="textarea" cols="45" rows="5" required="">Comments:</textarea>
<br><br>
  <p>
      <input type="checkbox" name="Mailing List" id="checkbox" onClick = "showMailingListForm()">
      Please put me on your mailing list.
  </p>
<div id = "mailingInformation">
<h3>Please fill out the form below to be put on the mailing list to recieve coupons and special offers</h3>
  <p>Check the box to use address above
  <input type = "checkbox" name = "checkForAddress" id = "checkAddress" >
  </p>
  <p>First Name:
		<input type = "text" name = "mailingName" id = "mailing" >
		<span class = "error">* <?php echo $mailingNameErr;?></span>
  </p>
  <p>Last Name:
		<input type = "text" name = "mailingLastName" id = "mailingLast">
		<span class = "error">* <?php echo $mailingLastNameErr;?></span>
  </p>
  <p>Mailing Address:
		<input type = "text" name = "mailingAddress" id = "mailingAdd">
		<span class = "error">* <?php echo $mailingAddressErr;?></span>
  </p>
  <p>Phone Number(Optional)
		<input type = "text" name = "phoneNumber" id = "phone">
  </p>
</div>
  <p>
      <input type="checkbox" name="More Info" id="checkbox2">
      Send me more information about your products.</label>
    </p>
<br><br>
  <p>
    <input type="hidden" name="hiddenField" id="hidden" value="application-id:US447">
  </p>

<br><br>

  <p>
    <input type="submit" name="submit" id="button" value="Submit">
    <input type="reset" name="button2" id="button2" value="Reset">
  </p>
<div>
</form>
<div id = "hiddenStuff">
<p>
	HoNEypOT:
		<input type = "text" name = "" value = "">
</p>
<p>
		<input type = "text" name = "Dear User" value = "Thank You For Your Input! The Administrator Will Reply Soon!">
</p>

</div>
</body>




</html>
