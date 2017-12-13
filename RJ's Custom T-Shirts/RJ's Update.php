<?php
/////////////////////////////
/////Email Script Start/////
///////////////////////////

	foreach($_POST as $key => $value)		//loops through all name-value in $_POST array []
	{
		$tableBody .= "<tr>";				//creates lifeform named Row
		$tableBody .= "<td>$key</td>";		//Row writes on a name tag the name-value pairs from the form. They're his friends
		$tableBody .= "<td>$value</td>";	//Row wears his friends proudly
		$tableBody .= "</tr>";				//Row dies. At least he had friends.
	}

//these are Row's friends. But he likes to hide them...
/*	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr class=colorRow>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	}
	echo "</table>";
	echo "<p>&nbsp;</p>";*/
?>



<?php
if (isset($_POST['submit'])) {


	//$toEmail = "robinjennings@nephilim42.com";		//Email address where you want to send the form data. Whomever is wanting an email.

	$toEmail = "robinjennings@nephilim42.com, $_POST[email]"; //This will send the email to me. I'm still trying to concatenate both $toEmail variables.
	//$toEmail = $_POST[Email_Address];    //Gettin email address into variable to have email sent to user....



	$subject = "Your Results";	// Place your short message for subject."


	$fromEmail = "robinjennings@nephilim42.com";		//<-- Domain Email Address. This will display in the sent email


//   DO NOT CHANGE THE FOLLOWING LINES  //

	$emailBody = "Form Data\n\n ";			//stores the content of the email
	foreach($_POST as $key => $value)		//Reads all of the name-value pairs. 	$key: field name   $value: value from the form
	{
		$emailBody.= $key."=".$value."\n";	//Adds the name value pairs to the body of the email, each one on their own line. \n = new line Unix/Mac OS
		                                                                                                                    //\r = MacOS before X
																																																												//\r\n = Windows
	}

	$headers = "From: $fromEmail" . "\r\n";				//Creates the From header with the appropriate address. Could even say it's from your cat...

 	if (mail($toEmail,$subject,$emailBody,$headers)) 	//puts pieces together and sends the email to your hosting account's email server
	{
   		echo '<p class = "rainbow" style = "text-align: center;">Your order has been updated. An email with your order information has been sent to you as confirmation of your successful update of your order</p>';
  	}
	else
	{
   		echo("<p style = 'color: white;'>Message delivery failed...</p>");
  	}
}
?>

<?php

////Update////

if(isset($_POST['submit'])) {
	
	include "RJ's Connection.php";
	
try {
	
	$servername = "localhost";
	$username = "nephilim42_341";
	$password = "nephilim42";
	$dbname = "nephilim42_341";
	
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "";
	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$color = $_POST['color'];
	$sizes = $_POST['sizes'];
	$size = $_POST['size'];
	$description = $_POST['description'];
	$file = $_POST['file'];
	$quantity = $_POST['quantity'];
	$more = $_POST['more'];
	$promo = $_POST['promo'];
	
    $sql = "UPDATE tshirt_orders SET cust_name = '$name', cust_email = '$email', cust_address = '$address', cust_color = '$color', cust_shirt_age = '$sizes', cust_shirt_size = '$size', cust_shirt_text = '$description', cust_file = '$file', cust_quantity = '$quantity', cust_more_orders = '$more', cust_promo = '$promo'  WHERE cust_id ='$id'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo "";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}
$conn = null;

?>

<html>

<head>

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
			margin-top: 10%;
			float: left;
		}
		
		.side1 {
			margin-top: 10%;
			float: right;
		}
		
		#center {
			text-align: center;
		}
	
		#order {
			background: rgba(30, 30, 30, 0.8);
			width: 50%;
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

<nav>
	<h3>RJ's Custom T-Shirts &nbsp &nbsp &nbsp The Super Awesome Custom T-Shirt Company</h3>
	
<ul>
<h2>
  <li><a href="RJ's Home.html">Home</a></li>
  <li><a href="RJ's T-Shirt Order Form.php">Order</a></li>
  <li><a href="RJ's Contact Form.php">Contact</a></li>
  <li><a href="RJ's About Page.html">About</a></li>
  <li><a href="RJ's Log Out.php">Log Out</a></li>
</h2>
</ul>

	
</nav>	
<br>

		<marquee class = "rainbow"><h1>25% ALL CUSTOM ORDERS FOR THE MONTH OF DECEMBER. USE PROMO CODE: customesale</h1></marquee>
	

	<img src = "tshirtSale.png" id = "image" height = "35%" width = "100%">
	<br>
	
	<br><br>

	<img src = "tshirts.jpg" width = "22%" height = "50%" class = "side">
	
	<img src = "tshirts1.jpg" width = "22%" height = "50%" class = "side1">		
<div id = "order">
		<h1 style = "text-align: center;">Order Your Custom T-Shirt</h1>

		<p>Please fill out the information below to order your custom t-shirt</p>
		
<form name = "form1" id = "form1" action = "RJ's Update.php" method = "post">

	</p>Please enter the id number you recieved from reviewing your order:
		<input type = "text" name = "id" id = "id" required>
		<span class = "error">*</span>
	</p>

	<p>Please enter your name:
		<input type = "text" name = "name" id = "name" required>
		<span class = "error">*</span>
	</p>
		
	<p>Please enter your email address:	
		<input type = "text" name = "email" id = "email" required>
		<span class = "error">*</span>
	</p>
	
	<p>Please enter your shipping address:	
		<input type = "text" name = "address" id = "address" required>
		<span class = "error">*</span>
	</p>
		
	<p>Please select a color:
		<select name = "color"  id = "color"required><span class = "error">*</span>
			<option value = "white">White</option>
			<option value = "black">Black</option>
			<option value = "red">Red</option>
			<option value = "blue">Blue</option>
			<option value = "green">Green</option>
			<option value = "orange">Orange</option>
			<option value = "yellow">Yellow</option>
			<option value = "brown">Brown</option>
			<option value = "pink">Pink</option>
			<option value = "magenta">Magenta</option>
			<option value = "baby blue">Baby Blue</option>
			<option value = "purple">Purple</option>
			<option value = "maroon">Maroon</option>
			<option value = "teal">Teal</option>
			<option value = "tie dye">Tie Dye</option>
		</select>
	</p>
	
	<p>Youth size or adult size??
		<select name = "sizes" id = "sizes" required>
			<option value = "youth">Youth</option>
			<option value = "adult">Adult</option>
		</select>
	</p>
	
	<p>Please choose a size:
		<select name = "size" id = "size" required><span class = "error">*</span>
			<option value = "small">Small</option>
			<option value = "medium">Medium</option>
			<option value = "large">Large</option>
			<option value = "Xlarge">X Large</option>
			<option value = "XXlarge">XX Large</option>
		</select>
	</p>
	
	<p>Please let us know what you want printed on your shirt:
		<textarea rows = "5" cols = "40" name = "description" id = "description" required>
		</textarea><span class = "error">*</span>
	</p>
	
	<p>If you have a photo or picture<br>of what you want printed on the shirt, <br>please upload the picture:  
		<input type = "file" name = "file" id = "file">
	</p>
	
	<p>Please select a quantity:<br>(limit 10 per person)
		<select name = "quantity" id = "quantity" required><span class = "error">*</span>
			<option value = "1">1</option>
			<option value = "2">2</option>
			<option value = "3">3</option>
			<option value = "4">4</option>
			<option value = "5">5</option>
			<option value = "6">6</option>
			<option value = "7">7</option>
			<option value = "8">8</option>
			<option value = "9">9</option>
			<option value = "10">10</option>
		</select>
	</p>

	<p>Place another order?
		<select name = "more" id = "more" required>
			<option value = "yes">yes</option>
			<option value = "no">no</option>
		</select>
	</p>
	
	<p>Enter the promo code to recieve 25% off of your custom order:
		<input type = "text" name = "promo" id = "promo">
	</p>
	
<br><br>
	<input type = "submit" name = "submit" id = "submit">
	<input type = "reset" name = "reset" id = "reset">
		
	</form>
	
</div>

<br>

<footer>

	<p>To review your order, click <a href = "RJ's Check Order.php">Here</a>
	<p>to update your order, click <a href = "RJ's Update.php">Here</a>
	<p>to cancel your order, click <a href = "RJ's Delete Order.php">Here</a>
	
<hr>
<hr>

	<h2>RJ's Custom T-Shirts</h2>
<hr>
	<p>Website created by Robin Jennings<br><a href = "http://www.nephilim42.com/myPersonalWebsite/mySiteIndex.html">Nephilim42Coding</a><br>515-422-6630<br>rsjennings@dmacc.edu</p>

</footer>

</body>

</html>