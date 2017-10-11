	<?php
	foreach($_POST as $key => $value)		//This will loop through each name-value in the $_POST array
	{
		$tableBody .= "<tr>";				//formats beginning of the row
		$tableBody .= "<td>$key</td>";		//dsiplay the name of the name-value pair from the form
		$tableBody .= "<td>$value</td>";	//dispaly the value of the name-value pair from the form
		$tableBody .= "</tr>";				//End this row
	} 
	?>
	
	<?php
if (isset($_POST['submit'])) {
	$toEmail = "robinjennings@nephilim42.com", "Email Address";		//CHANGE within the quotes. Place email address where you wish to send the form data. 
										//Use your DMACC email address for testing. 
										//Example: $toEmail = "jhgullion@dmacc.edu";		
	
	$subject = "WDV341 Email Example";	//CHANGE within the quotes. Place your own message.  For the assignment use "WDV101 Email Example" 

	$fromEmail = "robinjennings@nephilim42.com";		//CHANGE within the quotes.  Use your DMACC email address for testing OR
										//use your domain email address if you have Heartland-Webhosting as your provider.
										//Example:  $fromEmail = "contact@jhgullion.org";  

//   DO NOT CHANGE THE FOLLOWING LINES  //

	$emailBody = "Form Data\n\n ";			//stores the content of the email
	foreach($_POST as $key => $value)		//Reads through all the name-value pairs. 	$key: field name   $value: value from the form									
	{
		$emailBody.= $key."=".$value."\n";	//Adds the name value pairs to the body of the email, each one on their own line
	} 
	
	$headers = "From: $fromEmail" . "\r\n";				//Creates the From header with the appropriate address

 	if (mail($toEmail,$subject,$emailBody,$headers)) 	//puts pieces together and sends the email to your hosting account's smtp (email) server
	{
   		echo("<p>Message successfully sent!</p>");
  	} 
	else 
	{
   		echo("<p>Message delivery failed...</p>");
  	}
}
	?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>WDV341 Intro PHP - Programming project</title>

<style>

	body {
		background-image: url("rbGrid.png");
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
	
	#borderStyle {
		border: double thick red;
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
		border: solid thick red;
		border-radius: 20px;
	}
	
	th {
		border: solid thick red; 
		border-radius: 45px;
	}
	
	tr {
		color: white;
		border: solid thin red;
		border-radius: 45px;
	}
	
	td {
		color: white;
		border: solid thin red;
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
<h2>Programming Project - Contact Form</h2>

<div>
<form name="form1" method="POST" action="contactForm.php">
  <p>&nbsp;</p>
  <p>
<div id = "borderStyle">
    <label>Your Name:
      <input type="text" name="Name" id="textfield" required>
  </p>
<br><br>
  <p>Your Email: 
    <input type="text" name="Email Address" id="textfield2" required>
  </p>
<br><br>
  <p>Your Address:
	<input type = "text" name = "address" id = "living">
  </p>
<br><br>
  <p>Reason for contact: 
      <select name="Reason" id="select2" onChange = "showProductProblemComments()" required>
        <option value="default">Please Select a Reason</option>
        <option value="product">Product Problem</option>
        <option value="return">Return a Product</option>
        <option value="billing">Billing Question</option>
        <option value="technical">Report a Website Problem</option>
        <option value="other">Other</option>
      </select>
  </p>
<br><br>
  <p>Comments:
      <textarea name="comments" id="textarea" cols="45" rows="5"required></textarea>
  </p>
<br><br>
  <p>
      <input type="checkbox" name="Mailing List" id="checkbox" onClick = "showMailingListForm()">
      Please put me on your mailing list.
  </p>
<div id = "mailingInformation">
<h3>Please fill out the form below to be put on the mailing list to recieve coupons and special offers</h3>
  <p>Check the box to use address above
  <input type = "checkbox" name = "checkForAddress" id = "checkAddress">
  </p>
  <p>First Name:
		<input type = "text" name = "mailingName" id = "mailing">
  </p>
  <p>Last Name:
		<input type = "text" name = "mailingLastName" id = "mailingLast">
  </p>
  <p>Mailing Address:
		<input type = "text" name = "mailingAddress" id = "mailingAdd">
  </p>
  <p>Phone Number(Optional)
		<input type = "text" name = "phoneNumber" id = "phone">
  </p>
</div>
  <p>
      <input type="checkbox" name="More Info" id="checkbox2">
      Send me more information</label>
  about your products.  </p>
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
	<table border='a'>
    <tr>
    	<th>Field Name</th>
        <th>Value of Field</th>
    </tr>
	<?php echo $tableBody;  ?>
	</table>
</p>
</div>
</div>
<p>&nbsp;</p>
</body>
</html>
