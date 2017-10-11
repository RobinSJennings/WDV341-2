<?php

	$date = date($_POST["dateField"]);
	//$dateTime = date_create($date);
	$date2 = date($_POST["dateField1"]);
	$date3 = date($_POST["dateField2"]);
	$newDate = $date . "/" . $date2 . "/" . $date3;
	$newDate2 = $date2 . "/" . $date . "/" . $date3;
		//Although the way my variables are called formats the date, im using date() to format the date also.
		
	if (preg_match('/^[0-9]+$/', $newDate)) {
		echo "ERROR: Must contain only numbers";
	}
	else {
		echo "The date you have selected is:" . $newDate . "<br>";
	}

?>

<?php 
	$school = $_POST["school"];
	$numberFormat = $_POST["number1"];
?>



<html>

<head>


</head>

<body>

<script>
function clearFields() {
	document.getElementById("dateSpan").style.display = "none";
	document.getElementById("schoolSpan").style.display = "none";
	document.getElementById("numberForm").style.display = "none";
}
</script>

<form action = "dateFunctions.php" method = "post" id = "form1">
	<p>Please Enter a Date:</p>
	<p>Month:<br>
		<input type = "text" name = "dateField" id = "date">
	</p>
	<p>Day:<br>
		<input type = "text" name = "dateField1" id = "date2">
	</p>
	<p>year:<br>
		<input type = "text" name = "dateField2" id = "date3">
	</p>
	<p>Please enter the school you attend:<br>
		<input type = "text" name = "school" id = "school">
	</p>
	<p>Please enter in a number to be formatted:<br>
		<input type = "text" name = "number1" id = "number">
	</p>

	<p>The date you entered is:<br>
		<span id = "dateSpan"><?php echo "m-d-y format:" . $newDate . "<br>" . "d-m-y format:" . $newDate2; ?></span>
	</p>
	<p>The school name:
		<span id = "schoolSpan"><?php echo $school . ":has:" . strlen($school) . "::letters is the name"; ?>
		</span>
	</p>
	<p>The school name with no leading or trailing whitespace is displayed here:
		<span id = "schoolSpan"><?php echo ":" . trim($school); ?>
		</span>
	</p>
	<?php
		if ($school == 'DMACC') {
		echo "contains the school name DMACC";
	}
	else {
		echo "Does NOT contain the school name DMACC";
	}
	?>
	<br><br>
	<span id = "numberForm"><?php echo "$" . number_format($numberFormat,2) . "::is your number formatted to dollars" . "<br>"; ?></span>
	<br>
	
	<span id = "numberForm"><?php echo number_format($numberFormat). "::is your number formatted with commas throughout" . "<br>"; ?></span>
	<br>
	
	<input type = "submit" name = "submit" id = "submit"/>
	<input type = "reset" name = "reset" id = "reset" onClick = "clearFields()"/>
</form>


</body>

</html>