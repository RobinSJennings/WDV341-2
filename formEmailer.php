<<<<<<< HEAD
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
.colorRed {
	color: #F00;
}
body {
		background-color: black;
		color: white;
		border: solid thick grey;
		border-radius: 45px;
		text-align: center;
	}
	div {
		background-color: grey;
		border: solid thick white;
		border-radius: 45px;
		text-align: center;
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
<div>
<h1>WDV 341 PHP Form Results</h1>
<h2>Using a Form to Send an Email</h2>

<hr>

<p>This form will display the name value pairs from your form on the response page created by this PHP page.</p>


<p>RESULT WILL DISPLAY BELOW THIS LINE</p>
<hr>
<p>&nbsp;</p>

<?php

echo "<h2 class='colorRed'>Your Results.</h2>";

//It will create a table and display one set of name value pairs per row
	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr class=colorRow>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";

//This code pulls the field name and value attributes from the Post file
//The Post file was created by the form page when it gathered all the name value pairs from the form.
//It is building a string of data that will become the body of the email

//          CHANGE THE FOLLOWING INFORMATION TO SEND EMAIL FOR YOU //  

	$toEmail = "robinjennings@nephilim42.com";		//CHANGE within the quotes. Place email address where you wish to send the form data. 
												
	
	$subject = "WDV341 Email Example";	//CHANGE within the quotes. Place your own message.  For the assignment use "WDV101 Email Example" 

	$fromEmail = "robinjennings@nephilim42.com";		//CHANGE within the quotes.  Use your DMACC email address for testing OR
										 

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

	$inFirst = $_POST["First Name"];		//Get the value entered in the first name field
	$inLast = $_POST["Last Name"];		//Get the value entered in the last name field
	$inSchool = $_POST["School"];		//Get the value entered in the school field
	$inEmail = $_POST["Email"];			//Get the value entered in the email field
	$inGender = $_POST["Gender"];		//Get the value entered from the radio button
	$inRace = $_POST["Ethnicity"];		//Get value entered from dropdown
	$inCitizen = $_POST["Citizen"];	//Get value from citizen field
	$inSsCheck = $_POST["ssCard"];	//Get value from checkbox
	$inNumber = $_POST["sSNumber"];	//get value from ss field
	$inHouse = $_POST["HouseApartment"];		//Get value entered from dropdown
?>
<p>First Name: <?php echo $inFirst; ?></p>
<p>Last Name: <?php echo $inLast; ?></p>
<p>School: <?php echo $inSchool; ?></p>
<p>Email: <?php echo $inEmail; ?></p>
<p>Gender: <?php echo $inGender; ?></p>
<p>Ethnicity: <?php echo $inRace; ?></p>
<p>U.S. Citizen: <?php echo $inCitizen; ?></p>
<p>Social Security Card?:  <?php echo $inSsCheck; ?></p>
<p>Social Security Number?: <?php echo $inNumber; ?></p>
<p>House or Apartment?: <?php echo $inHouse; ?></p>

</div>

</body>
</html>
=======
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
.colorRed {
	color: #F00;
}
body {
		background-color: black;
		color: white;
		border: solid thick grey;
		border-radius: 45px;
		text-align: center;
	}
	div {
		background-color: grey;
		border: solid thick white;
		border-radius: 45px;
		text-align: center;
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
<div>
<h1>WDV 341 PHP Form Results</h1>
<h2>Using a Form to Send an Email</h2>

<hr>

<p>This form will display the name value pairs from your form on the response page created by this PHP page.</p>


<p>RESULT WILL DISPLAY BELOW THIS LINE</p>
<hr>
<p>&nbsp;</p>

<?php

echo "<h2 class='colorRed'>Your Results.</h2>";

//It will create a table and display one set of name value pairs per row
	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr class=colorRow>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";

//This code pulls the field name and value attributes from the Post file
//The Post file was created by the form page when it gathered all the name value pairs from the form.
//It is building a string of data that will become the body of the email

//          CHANGE THE FOLLOWING INFORMATION TO SEND EMAIL FOR YOU //  

	$toEmail = "robinjennings@nephilim42.com";		//CHANGE within the quotes. Place email address where you wish to send the form data. 
												
	
	$subject = "WDV341 Email Example";	//CHANGE within the quotes. Place your own message.  For the assignment use "WDV101 Email Example" 

	$fromEmail = "robinjennings@nephilim42.com";		//CHANGE within the quotes.  Use your DMACC email address for testing OR
										 

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

	$inFirst = $_POST["First Name"];		//Get the value entered in the first name field
	$inLast = $_POST["Last Name"];		//Get the value entered in the last name field
	$inSchool = $_POST["School"];		//Get the value entered in the school field
	$inEmail = $_POST["Email"];			//Get the value entered in the email field
	$inGender = $_POST["Gender"];		//Get the value entered from the radio button
	$inRace = $_POST["Ethnicity"];		//Get value entered from dropdown
	$inCitizen = $_POST["Citizen"];	//Get value from citizen field
	$inSsCheck = $_POST["ssCard"];	//Get value from checkbox
	$inNumber = $_POST["sSNumber"];	//get value from ss field
	$inHouse = $_POST["HouseApartment"];		//Get value entered from dropdown
?>
<p>First Name: <?php echo $inFirst; ?></p>
<p>Last Name: <?php echo $inLast; ?></p>
<p>School: <?php echo $inSchool; ?></p>
<p>Email: <?php echo $inEmail; ?></p>
<p>Gender: <?php echo $inGender; ?></p>
<p>Ethnicity: <?php echo $inRace; ?></p>
<p>U.S. Citizen: <?php echo $inCitizen; ?></p>
<p>Social Security Card?:  <?php echo $inSsCheck; ?></p>
<p>Social Security Number?: <?php echo $inNumber; ?></p>
<p>House or Apartment?: <?php echo $inHouse; ?></p>

</div>

</body>
</html>
>>>>>>> master
