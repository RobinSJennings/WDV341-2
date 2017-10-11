<?php

//This example code demonstrate the basic parts of the Self-Posting algorithm
//It will display the form when the page comes from a link.
//It will 'process' the form data when the form is submitted to itself on the server

//Once this works as expected you can start adding the PHP to pull the form data
//from the $_POST variable, build the SQL INSERT query, run the query, check to see
//if the query was successful and make confirmation or error messages as needed.

if(isset($_POST["submitForm"]))
{
	//The form has been submitted and needs to be processed

	$message = "You have submitted the form. Preparing to put into database.";
}
else
{
	//The form has not seen by the user.  Display the form so
	//the user can enter their data.
	$message = "Please enter your information on the form.";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h2>WDV341 Intro PHP</h2>
<h3>Self Posting Form Example</h3>
<?php
if(isset($_POST["submitForm"]))
{
	//Display the following line when the form has been submitted and
	//the SQL query has successfully updated the database.
?>
	<h1><?php echo $message; ?></h1>

<?php
}
else
{
	//Display the following lines if the page is called from a link.
	//The user has not seen the form yet and needs to see the form.
	//This will display the form, allow the user to enter data, then submit the form
?>
	<h3><?php echo $message; ?></h3>
    <form id="form1" name="form1" method="post" action="file:///C|/xampp/htdocs/wdv341/enterEmployee.php">
      <p>First Name:
        <label>
          <input type="text" name="emp_fName" id="emp_fName" />
        </label>
      </p>
      <p>Last Name:
        <label>
          <input type="text" name="emp_lName" id="emp_lName" />
        </label>
      </p>
      <p>City:
        <label>
          <input type="text" name="emp_city" id="emp_city" />
        </label>
      </p>
      <p>
        <input type="submit" name="submitForm" id="submitForm" value="Submit" />
        <input type="reset" name="button2" id="button2" value="Reset" />
      </p>
    </form>
    <p>&nbsp;</p>
<?php
}
?>
</body>
</html>
