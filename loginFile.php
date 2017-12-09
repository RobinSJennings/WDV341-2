<?php 
session_cache_limiter('none');			//This prevents a Chrome error when using the back button to return to this page.
session_start();
 
	if ($_SESSION['validUser'] == "yes")				//is this already a valid user?
	{
		//User is already signed on.  Skip the rest.
		$message = "Welcome Back! $username";	//Create greeting for VIEW area		
	}
	else
	{
		if (isset($_POST['submit']) )			//Was this page called from a submitted form?
		{
			$inUsername = $_POST['username'];	//pull the username from the form
			$inPassword = $_POST['password'];	//pull the password from the form
			
							//Connect to the database
	try{
			include 'dbConnect.php';
			
			$sql = $conn->prepare("SELECT event_user_name,event_user_password FROM event_log_in WHERE event_user_name = '$_POST[username]' AND event_user_password = '$_POST[password]'") or die('<p>SQL String: $sql</p>');			
			
			$sql->bindParam(':username',$_POST['username']);
			$sql->bindParam(':password',$_POST['password']);//bind parameters to prepared statement
			
			$sql->execute() or die("<p>Execution </p>" );
			
			$result = $sql->setFetchMode(PDO::FETCH_ASSOC);	
	
			if ($sql->mysqli_num_rows === 1 )		//If this is a valid user there should be ONE row only
			{
				
				$_SESSION['validUser'] = "yes";				//this is a valid user so set your SESSION variable
				$message = "Welcome Back! $inUsername";
				//Valid User can do the following things:
			}
			else
			{
				//error in processing login.  Logon Not Found...
				$_SESSION['validUser'] = "no";					
				$message = "Sorry, there was a problem with your username or password. Please try again.";
			}			
			
			$sql = null;
			$conn = null;
			}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		}//end if submitted
		else
		{
			//user needs to see form
		}//end else submitted
		
	}//end else valid user
	
//turn off PHP and turn on HTML
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 PHP - Login and Control Page</title>

<!--  User Login Page
            
if user is valid (Session variable - already logged on)
	display admin options
else
    if form has been submitted
        Get input from $_POST
        Create SELECT QUERY
        Run SELECT to determine if they are valid username/password
        if user if valid
            set Session variable to true
            display admin options
        else
            display error message
            display login form
    else
    display login form
         
-->

<style>

	body {
		background-color: grey;
		text-align: center;
	}
	#forms {
		background-color: white;
		border: solid thick blue;
		border-radius: 45px;
		width: 35%;
		margin: 0 auto;
		padding: 1% 0;
	}
	#submit {
		background-color: blue;
		color: white;
	}

</style>

</head>
<body>

<?php

	

	if ($_SESSION['validUser'] == true)	//This is a valid user.  Show them the Administrator Page
	{
		
//turn off PHP and turn on HTML
?>
<div id = "forms">
		<h3>Presenters Administrator Options</h3>
        <p><a href="contactForm1.php">Input New Contact</a></p>
        <p><a href="selectEvents.php">List of Contacts</a></p>
        <p><a href="logingOut.php">Logout of Contacts Admin System</a></p>	
</div>				
<?php
	}
	else									//The user needs to log in.  Display the Login Form
	{
?>
<div id = 'forms'>
	<form name = "form1" id = "form1" method = "post" action = "loginFile.php">
		<p><b>Please log in for administrator options</p>
		<p>Please enter your username:
			<input type = "text" name = "username" id = "username">
		</p>
		<p>Please enter your password:
			<input type = "text" name = "password" id = "password">
		</p>
		
		<input type = "submit" name = "submit" id = "submit" value = "LOGIN">
	</form>
</div>
	<?php //turn off HTML and turn on PHP
	}//end of checking for a valid user
			
	//turn off PHP and begin HTML			
	?>

<p>Return to <a href='#'>www.presentationstogo.com</a></p>
</body>

</html>