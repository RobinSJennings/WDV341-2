<?php

$nameError = "";
$socialError = "";
$responseError = "";

$validForm = false;

$inName = "";
$inSocial = "";
$inResponse = "";

function nameValidation(){
	
	global $inName, $nameError;
	$nameError = "";
	
	if (preg_match('/^[0-9 ]*$/', $inName)){
		$validForm = false;
		$nameError = "Please enter a name.";
	}
	
}

function socialSecurityValidation(){

	global $inSocial, $socialError;
	$socialError = "";
	
	if(!preg_match('#\b[0-9]{3}[0-9]{2}[0-9]{4}\b#', $inSocial)){
		$validForm = false;
		$socialError = "Invalid Social Security Number.";
	}
}

function responseValidation(){
	if ($inReponse == ""){
		$validForm = false;
		$responseError = "Please select a response.";
	}
}

if( isset($_POST['submit']) )	{
		
	//pull data from the POST variables in order to validate their values
	$inName = $_POST['inName'];
	$inSocial = $_POST['inSocial'];
	$inResponse = $_POST['radioGroup1'];
	
	$validForm = true;
	
	nameValidation();
	socialSecurityValidation();
	responseValidation();

}
?>

<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Form Validation Example</title>
<style>

body {
	background-color: black;
}

#orderArea	{
	width:600px;
	background-color:grey;
	border: solid thin red;
	margin: 3% auto;
}

.error	{
	color:red;
	font-style:italic;	
}
</style>
</head>

<body>
<h1 style = "text-align: center; color: white;">WDV341 Intro PHP</h1>
<h2 style = "text-align: center; color: white;">Form Validation Assignment

<?php 

	echo "<br>" . "Your Name Is:" . $inName;
	echo "<br>" . "Your Social Security Number Is:" . $inSocial;
	echo "<br>" . "You Have Chosen:" . $inResponse . "For a Response";
?> 

</h2>
<div id="orderArea">
  <form id="form1" name="form1" method="post" action="formValidationAssignment.php">
  <h3>Customer Registration Form</h3>
  <table width="587" border="0">
    <tr>
      <td width="117">Name:</td>
      <td width="246"><input type="text" name="inName" id="inName" size="40" required value="<?php echo $inName; ?>"/></td>
      <td width="210" class="error"><?php echo $nameError; ?>
	  </td>
    </tr>
    <tr>
      <td>Social Security(numbers only, no hyphens/spaces)</td>
      <td><input type="text" name="inSocial" id="inSocial" size="40" required value="<?php echo $inSocial; ?>" /></td>
      <td class="error"><?php echo $socialError; ?>
	
			</td>
    </tr>
    <tr>
      <td>Choose a Response</td>
      <td><p>
        <label>
          <input type="radio" name="RadioGroup1" id="RadioGroup1_0" required value =<?php echo $inResponse;?>  <?php if($inResponse == "RadioGroup1_0") {echo "checked='checked'";} ?> >
          Phone</label>
        <br>
        <label>
          <input type="radio" name="RadioGroup1" id="RadioGroup1_1" required value =<?php echo $inResponse;?>  <?php if($inResponse == "RadioGroup1_1") {echo "checked='checked'";} ?>>
          Email</label>
        <br>
        <label>
          <input type="radio" name="RadioGroup1" id="RadioGroup1_2" required value = <?php echo $inResponse;?>  <?php if($inResponse == "RadioGroup1_2") {echo "checked='checked'";} ?>>
          US Mail</label>
        <br>
      </p></td>
      <td class="error"></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="submit" id="button" value="Register" />
    <input type="reset" name="button2" id="button2" value="Clear Form" />
  </p>
</form>
</div>

</body>
</html>