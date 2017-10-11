<?php
//Model-Controller Area.  The PHP processing code goes in this area. 

	//Method 1.  This uses a loop to read each set of name-value pairs stored in the $_POST array
	$tableBody = "";		//use a variable to store the body of the table being built by the script
	
	foreach($_POST as $key => $value)		//This will loop through each name-value in the $_POST array
	{
		$tableBody .= "<tr>";				//formats beginning of the row
		$tableBody .= "<td>$key</td>";		//dsiplay the name of the name-value pair from the form
		$tableBody .= "<td>$value</td>";	//dispaly the value of the name-value pair from the form
		$tableBody .= "</tr>";				//End this row
	} 
	
	
	//Method 2.  This method pulls the individual name-value pairs from the $_POST using the name
	//as the key in an associative array.  
	
	$inFirstName = $_POST["firstName"];		//Get the value entered in the first name field
	$inLastName = $_POST["lastName"];		//Get the value entered in the last name field
	$inSchool = $_POST["school"];		//Get the value entered in the school field
	$inGender = $_POST["gender"];		//Get the value entered from the radio button
	$inVehicle = $_POST["vehicleType"];		//Get value entered from checkbox
	$inVehicle2 = $_POST["vehicleType2"];		//Get value entered from checkbox
	$inOption = $_POST["vehicle1"];			//Get value from first dropdown
	$inPickup = $_POST["vehicle2"];	//Get value from second dropdown
	

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>WDV 341 Intro PHP - Code Example</title>

<style>
	body {
		background-color: black;
	}
	div {
		background-color: grey;
		width: 50%;
		border: solid thick white;
		border-radius: 45px;
		margin-left: 25%;
	}
	h1 {
		text-align: center;
		color: white;
	}
	h2 {
		text-align: center;
		color: white;
	}
	h3 {
		text-align: center;
		
	}
	table {
		align: center;
		text-align: center;
		margin-left: 38%;
	}
	.p {
		text-align: center;
	}
	
</style>
</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Form Handler Result Page - Code Example</h2>
<h2>This page displays the results of the Server side processing. </h2>
<h2>The PHP page has been formatted to use the Model-View-Controller (MVC) concepts. </h2>

<div>
<h3>Values from the form are displayed using Method 1. Uses a loop to process through the $_POST array</h3>
<p>
	<table border='a'>
    <tr>
    	<th>Field Name</th>
        <th>Value of Field</th>
    </tr>
	<?php echo $tableBody;  ?>
	</table>
</p>
<h3>Values are displayed from the form using Method 2. Displays the individual values.</h3>

<p class="p">First Name: <?php echo $inFirstName; ?></p>
<p class="p">Last Name: <?php echo $inLastName; ?></p>
<p class="p">School: <?php echo $inSchool; ?></p>
<p class="p">Gender: <?php echo $inGender; ?></p>
<p class="p">Do You Drive a Car?: <?php echo $inVehicle; ?></p>
<p class="p">Do You Drive a Truck?: <?php echo $inVehicle2; ?></p>
<p class="p">Car Style: <?php echo $inOption; ?></p>
<p class="p">Truck Style: <?php echo $inPickup; ?></p>

</div>
</body>
</html>
