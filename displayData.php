<?php
foreach($_POST as $key => $value)
{
	echo $key . ":::" . $value;
	echo "<br>";
}
	$inSex = $_POST["sex"];
	$inWords = $_POST["text1"];
	$inFood = $_POST["food"];
	

?>
<html>

<head>
</head>

<body>
<p>Your gender is: <?php echo $inSex; ?></p>
<p>Your words are: <?php echo $inWords; ?></p>
<p>Your food choice is: <?php echo $inFood; ?></p>
<select>
	<option>You are a: <?php echo $inSex; ?></option>
	<option>You said: <?php echo $inWords; ?></option>
	<option>Your food choice is: <?php echo $inFood; ?></option>
</select>
<?php
foreach($_POST as $key => $value)
{
	echo "<option>";
	echo $value;
	echo "</option>";
}
?>
</body>

</html>
