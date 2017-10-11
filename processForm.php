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

	$toEmail = "rsjennings@dmacc.edu";		//CHANGE within the quotes. Place email address where you wish to send the form data. 
												
	
	$subject = "WDV341 Programming Project";	//Email Subject" 

	$fromEmail = "robinjennings@nephilim42";		//CHANGE within the quotes.  Use your DMACC email address for testing OR
										//use your domain email address if you have Heartland-Webhosting as your provider.
										
	$emailBody = "Form Data\n\n ";			//stores the content of the email
	foreach($_POST as $key => $value)		//Reads through all the name-value pairs. 	$key: field name   $value: value from the form									
	{
		$emailBody.= $key."=".$value."\n";	//Adds the name value pairs to the body of the email, each one on their own line
	} 
	
	$headers = "From: $fromEmail" . "\r\n";				//Creates the From header with the appropriate address

 	if (mail($toEmail,$subject,$emailBody,$headers)) 	//puts pieces together and sends the email to your hosting account's smtp (email) server
	{
   		echo("Message successfully sent!");
  	} 
	else 
	{
   		echo("Message delivery failed...");
  	}

?>

<!DOCTYPE html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>


<body>


<p>
	<table border='a'>
    <tr>
    	<th>Field Name</th>
        <th>Value of Field</th>
    </tr>
	<?php echo $tableBody;  ?>
	</table>
</p>




</body>




</html>