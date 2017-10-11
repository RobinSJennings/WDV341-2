<?php

//Setup the variables used by the page
$nameErrMsg = "";
$quanErrMsg = "";
$emailErrMsg = "";
$shipErrMsg = "";

$validForm = false;

$inName = "";
$inQuantity = "";
$inEmail = "";
$inShipping = "";



/*	FORM VALIDATION PLAN

	FIELD NAME	VALIDATION TESTS & VALID RESPONSES
	inName		Required Field		May not be empty
	
	inQuantity	Required Field		Must contain something
				Numeric Field		May ONLY contain numbers, no special characters
				Reasonable Check	Value must be between 1 and 1000
				
	inEmail		Required Field		May not be empty
				Format Validation	Must be a properly formatted email address

	inShipping	Required Field		Must have selected something other than the first option

*/

/*
	This form is self-posting in order to process the validations.   It will use the following algorithm or process
	in order to properly display and validate the form and its data.
	
	if the form has been submitted		(The user has filled out the form and hit the submit button)
		{
		then validate the form data		(The form data is ready to be validated)
		
		//Validation Algorithm				(The validation process will follow the following process or set of steps)
		set validForm = true					Set a flag or switch to true.  This assumes the form data is valid. 
			perform validateName()				This will validate the data from the Name field
			perform validateQuantity()			This will validate the data from the Quantity field
			perform validateEmail()				This will validate the data from the Email field
			perform validateShipping()			This will validate the data from the Shipping field
		if (validForm==true)				If the flag is still true no errors were found, the form is valid
			{
			move form data into database		The form data is good so it should be INSERTED into the database
			}
		else								The flag is false because errors were found in the data
			{
			load data back into the form		Put the data back into the form fiels so the user can see what was in the fields
			load the error messages				Place the appropriate error messages on the form so the user knows what to fix
			display the form					Display the form with its original data and error messages to the user.
			}
		}
	else
		{
		display the form				(The user needs to enter data on the form so it can be validated and processed)
		}
*/

/*
	field validation algorithm		This process is done for each field validation function.  The details change for each field but the
									same steps are processed in the same order for each validation.  

		clear the error messages for this validation.  Set to ""		(Cleans up from previous errors and assumes there will not be an error)
		check the variable for the field against the expected values
		if it meets those values 
			{
			the field is valid
			nothing else needs done
			}
		else
			{
			the field is invalid
			set the validForm=false			(A data validation error has been found.  The form is no longer valid)
			set the error message variable for this field to the appropriate message
			}
*/

//VALIDATION FUNCTIONS		Use functions to contain the code for the field validations.  
function validateName()
{
	global $inName, $validForm, $nameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
	$nameErrMsg = "";								//Clear the error message. 
	if($inName=="")
	{
		$validForm = false;					//Invalid name so the form is invalid
		$nameErrMsg = "Name is required";	//Error message for this validation	
	}
}

function validateQuantity()
{
	global $inQuantity, $validForm, $quanErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
	$quanErrMsg = "";								//Clear the error message. 

	if($inQuantity == "")							//REQUIRED FIELD VALIDATION TEST
	{
		$validForm = false;
		$quanErrMsg .= "Quantity is required.  ";	//append message to message variable to allow for possible multiple error messages			
	}


	if( intVal($inQuantity)==0 )					//NUMERIC REQUIRED VALIDATION TEST  	intval() returns 0 if not an integer
	{
		$validForm = false;
		$quanErrMsg .= "Quantity must be an integer.  ";
	}
	else
	{
		if($inQuantity <1 || $inQuantity > 1000)		//REASONABLE VALIDATION TEST
		{
			$validForm = false;
			$quanErrMsg .= "Quantity should be between 1 and 1000.";		
		}		
	}
	
	
}

function validateEmail()
{
	global $inEmail, $validForm, $emailErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
	$emailErrMsg = "";							//Clear the error message. 
		
												//Using a Regular Expression to FORMAT VALIDATION email address
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$inEmail))		//Copied straight from W3Schools.  Uses a Regular Expression
  	{
		$validForm = false;
  		$emailErrMsg = "Invalid email format"; 
  	}		
}

function validateShipping()
{
	global $inShipping, $validForm, $shipErrMsg;	//Use the GLOBAL Version of these variables instead of making them local
	$shipErrMsg = "";								//Clear the error message. 	
	
	if($inShipping == "")							//SHIPPING METHOD REQUIRED		Form passes a "" value if nothing is selected
	{
		$validForm = false;
  		$shipErrMsg = "Please select a shipping method"; 			
	}
}


//   ---  FORM VALIDATION BEGINS HERE!!!   --------

//echo "The value of submit is " . $_POST['submit'];					//TESTING the value in the submit name value pair
//echo "The value of isset(submit) is " . isset($_POST['submit']);		//TESTING the value of the isset( )

if( isset($_POST['submit']) )				//if the form has been submitted Validate the form data
{
	//pull data from the POST variables in order to validate their values
	$inName = $_POST['inName'];
	$inQuantity = $_POST['inQuantity'];
	$inEmail = $_POST['inEmail'];
	$inShipping = $_POST['inShipping'];
	
	$validForm = true;					//Set form flag/switch to true.  Assumes a valid form so far
	
		validateName();					//call the validateName() function
		validateQuantity();				//call the validateQuantity() function
		validateEmail();				//call the validateEmail() function
		validateShipping();				//call the validateShipping() function

/*		
	if($validForm)	//Check the form flag.  If it is still true all the data is valid and the form is ready to process
	{
		// The form  data is valid and can be processed into your database.
		echo "<h1>Thank you for your order.</h1>";
		echo "<p>Your order will be processed</p>";
		echo "<p>You will recieve an email confirmation delivered to $inEmail.</p>";
		echo "</body></html>";
		exit();		//Finishes the page so it does not display the form again.
	}
	else			//The form has at least one invalid field.  It may have more.  All will be displayed.
	{
		//Load the original formdata back into the fields
		//Load the error messages onto the form.  Only invalid fields will have an error message.  Others will be blank.
		//Display the form back to the user for corrections.   The page will continue process from this point, displaying the updated form.
	}
*/
}//Completes the Form Validation process for this page.  

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Form Validation Code Example</title>
<style>

#orderArea	{
	width:600px;
	background-color:#CF9;
}

.error	{
	color:red;
	font-style:italic;	
}
</style>
</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Form Validation - Code Example</h2>

<?php

if ($validForm)			//If the form has been entered and validated a confirmation page is displayed in the VIEW area.
{
?>
	<h3>Thank You!</h3>
    <p>Your order has been processed. An email has been sent to <?php echo $inEmail; ?> for your records.</p>

<?php
}	//end the true branch of the form view area
else
{	
?>

    <div id="orderArea">
    <form id="form1" name="form1" method="post" action="formValidationWorkingExample.php">
      <h3>Product Order Form</h3>
      <table width="587" border="0">
        <tr>
          <td width="117">Name:</td>
          <td width="246"><input type="text" name="inName" id="inName" size="40" value="<?php echo $inName; //place data back in field ?>"/></td>
          <td width="210" class="error"><?php echo "$nameErrMsg"; //place error message on form  ?></td>
        </tr>
        <tr>
          <td>Quantity:</td>
          <td><input type="text" name="inQuantity" id="inQuantity" size="4" value="<?php echo $inQuantity; //place data back in field ?>"/></td>
          <td class="error"><?php echo "$quanErrMsg"; //place error message on form  ?></td>
        </tr>
        <tr>
          <td>Email Address:</td>
          <td><input type="text" name="inEmail" id="inEmail" size="40" value="<?php echo $inEmail; //place data back in field ?>" /></td>
          <td class="error"><?php echo "$emailErrMsg"; //place error message on form  ?></td>
        </tr>
        <tr>
          <td>Shipping Method:</td>
          <td><select name="inShipping" id="inShipping">
            <option value="" <?php if($inShipping==""){echo "selected='selected'";}?>>Select Shipping</option>
            <option value="USPS" <?php if($inShipping=="USPS"){echo "selected='selected'";}?>>US Postal Service</option>
            <option value="FedEx" <?php if($inShipping=="FedEx"){echo "selected='selected'";}?>>Federal Express</option>
            <option value="UPS" <?php if($inShipping=="UPS"){echo "selected='selected'";}?>>UPS</option>
          </select></td>
          <td class="error"><?php echo "$shipErrMsg"; //place error message on form  ?></td>
        </tr>
      </table>
      <p>
        <input type="submit" name="submit" id="button" value="Process Order" />
        <input type="reset" name="button2" id="button2" value="Clear Form" />
      </p>
    </form>
    </div>

<?php
}	//end else branch for the View area
?>
</body>
</html>