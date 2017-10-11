<html>

<head>
<style>
body{
	background-color: black;
	color: blue;
}

div {
	border: solid thin blue;
	border-radius: 45px;
	margin: 5% 30%;
	padding-left: 12%;
}

</style>

</head>

<body>


<div>
	<?php
		
	
		$date = date_create($_POST["date"]);//data from the "date" array stored in $date variable
		
		echo"Your Birthday:\n" . date_format($date, "d/m/Y") . "<br>";//Date_Format function to format date
		
		echo "Your Birthday:\n" . date_format($date, "m/d/Y") . "<br>";
		//outputs data entered in the "Your Birthday" textfield formatted
		
		$textF = $_POST["field"];
		echo "String Length:\n" . strlen($textF) . "<br>";//strlen function to count amount of characters in textfield
		
		echo "Whitespace Trim:\n" . trim($textF) . "<br>";//trim function to trim whitespace from the outside of the string
		
		echo "Trimming Spaces:\n" . str_replace(" ",'', $textF) . "<br>";//trimming spaces
		
		echo "Lowercase String:\n" . strtolower($textF) . "<br>";// string is all lowercase
		
		if($textF = "DMACC")
		{
			echo "welcome Back!" . "<br>";
		}
		else
		{
			echo "Would You Like to Know More About DMACC?" . "<br>";
		}
		
		$number = $_POST["numberz"];
		
		echo "Your Number:\n" . number_format($number,2) . "<br>";
		
		$price = $_POST["pricez"];
		setlocale(LC_MONETARY,"en_US");
		echo money_format("Your Price Is: %i",$price);
	?>
</div>
</body>

</html>