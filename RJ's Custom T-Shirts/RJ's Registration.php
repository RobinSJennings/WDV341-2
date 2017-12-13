<?php
 

 
/*
 * Start the session.
 */
session_start();
 
 
/*
 * Connection.
 */

 
 
//If the POST var "submit" exists (our submit button), then we can
//assume that the user has submitted the registration form.

$user = $_POST["username"];

$pass = $_POST["password"];

$sql = new PDO('mysql:host=localhost;dbname=nephilim42_341', 'root', '');

$stmt = $sql->prepare("insert into tshirt_log_in(username, password) values (?,?)");

$stmt->bindParam(1, $user);

$stmt->bindParam(2, $pass);

$stmt->execute();

echo "<p>Thank you for registering!</p>";
 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RJ's Registration</title>

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
			background-color: #444444;
			color: white;
		}
		
		nav {
			text-align: center;
			background: rgba(30, 30, 30, 0.9);
			border: solid thick blue;
			border-radius: 45px;
			width: 75%;
			margin:0 auto;
		}
		
		footer {
			text-align: center;
			background: rgba(30, 30, 30, 0.9);
			border-top: solid thick blue;
			width: 100%;
		}
		
		.side {
			float: left;
		}
		
		.side1 {
			float: right;
		}
		
		#center {
			text-align: center;
		}
	
		#order {
			background: rgba(30, 30, 30, 0.8);
			width: 40%;
			border: solid thick blue;
			border-radius: 45px;
			margin: 0 auto;
			padding: 2%;
			float: none;
		}
		
		#submit {
			margin: 0 auto;
			width: 100px;
			background-color: blue;
			color: white;
		}
		
		#reset {
			margin: 0 auto;
			width: 100px;
			background-color: blue;
			color: white;
		}
		
		#image {
			margin: 0 auto;
		}
		
		.error {
			color:red;
		}
		
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		
		li {
			display: inline;
		}
		
		.rainbow {
			/* Chrome, Safari, Opera */
			-webkit-animation: rainbow 1s infinite; 
  
			/* Internet Explorer */
			-ms-animation: rainbow 1s infinite;
  
			  /* Standard Syntax */
			  animation: rainbow 1s infinite; 
			}

			/* Chrome, Safari, Opera */
			@-webkit-keyframes rainbow{
				20%{color: red;}
				40%{color: yellow;}
				60%{color: green;}
				80%{color: blue;}
				100%{color: orange;}	
			}
			/* Internet Explorer */
			@-ms-keyframes rainbow{
				20%{color: red;}
				40%{color: yellow;}
				60%{color: green;}
				80%{color: blue;}
				100%{color: orange;}	
			}

			/* Standar Syntax */
			@keyframes rainbow{
				20%{color: red;}
				40%{color: yellow;}
				60%{color: green;}
				80%{color: blue;}
				100%{color: orange;}	
			}

</style>

</head>
<body>

<?php

	

	if ($_SESSION['validUser'] == true)	//This is a valid user.  Show them the Administrator Page
	{
		
//turn off PHP and turn on HTML
?>

		<?php include "RJ's Home.html";?>	
				
<?php
	}
	else					
			//The user needs to log in.  Display the Login Form
	{
?>

<br>

<nav>
	<h3>RJ's Custom T-Shirts &nbsp &nbsp &nbsp The Super Awesome Custom T-Shirt Company</h3>
	
<ul>
<h2>
  <li><a href="#">Home</a></li>
  <li><a href="#">Order</a></li>
  <li><a href="#">Contact</a></li>
  <li><a href="#">About</a></li>
  <li><a href="#">Logout</a></li>
</h2>
</ul>

	
</nav>	
<br>

		<marquee class = "rainbow"><h1>25% ALL CUSTOM ORDERS FOR THE MONTH OF DECEMBER. USE PROMO CODE: customsale</h1></marquee>
	

	<img src = "tshirtSale.png" id = "image" height = "250px" width = "100%">
	
	<br>
		
	<br><br>

	<img src = "tshirts.jpg" width = "25%" height = "320px" class = "side">
	
	<img src = "tshirts1.jpg" width = "25%" height = "320px" class = "side1">

<div id = 'order'>
  <div style = "text-align: center;">
	<form name = "form1" id = "form1" method = "post" action = "RJ's Login.php">
		
		<p><b>Please Register to T-ShirtsRus.com</p><br>
		<p>Please enter your username:
			<input type = "text" name = "username" id = "username">
		</p>
		<p>Please enter your password:
			<input type = "text" name = "password" id = "password">
		</p>
		
		<input type = "submit" name = "submit" id = "submit" value = "LOGIN">
	</form>
   </div>
</div>

<br><br>

<footer>

	<h2>RJ's Custom T-Shirts</h2>
<hr>
	<p>Website created by Robin Jennings<br><a href = "http://www.nephilim42.com/myPersonalWebsite/mySiteIndex.html">Nephilim42Coding</a><br>515-422-6630<br>rsjennings@dmacc.edu</p>

</footer>
	<?php //turn off HTML and turn on PHP
	}//end of checking for a valid user
			
	//turn off PHP and begin HTML			
	?>


</body>

</html>