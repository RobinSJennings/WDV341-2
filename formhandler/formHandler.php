<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>
<style type="text/css">
.colorRed {
	color: #F00;
}
</style>
</head>

<body>
<h1>WDV101 Intro HTML and CSS</h1>
<h2>Chapter 9 - Processing Form Data using PHP</h2>
<hr />
<h3>Format  and display the form information.</h3>
<p>This process will process the 'name = value' pairs for all the elements of a form. It will format  the form information into HTML.  It will then display the name value pairs from your form on the response page created by this PHP page.</p>
<p>This page was called by the action attribute of your form on the exampleForm.html page. It called the formHandler.php to process the name values from your form. </p>
<p><strong>name</strong> - The value of the name attribute from the HTML form element.</p>
<p><strong>value</strong> - The value entered in the field. This will vary depending upon the HTML form element.</p>

<p>RESULT WILL DISPLAY BELOW THIS LINE</p>
<hr />
<?php

	echo "<p class='colorRed'>This page was created by the PHP formHandler.php page on the server and sent back to your browser.</p>";

	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";

?>

</body>
</html>
