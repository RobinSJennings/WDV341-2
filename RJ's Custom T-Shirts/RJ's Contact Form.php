<?php
/////////////////////////////
/////Email Script Start/////
///////////////////////////

if (isset($_POST['submit'])) {


	//$toEmail = "robinjennings@nephilim42.com";		//Email address where you want to send the form data. Whomever is wanting an email.

	$toEmail = "robinjennings@nephilim42.com, $_POST[email]"; //This will send the email to me. I'm still trying to concatenate both $toEmail variables.
	//$toEmail = $_POST[Email_Address];    //Gettin email address into variable to have email sent to user....



	$subject = "Thank you for your input";	// Place your short message for subject."


	$fromEmail = "robinjennings@nephilim42.com";		//<-- Domain Email Address. This will display in the sent email


//   DO NOT CHANGE THE FOLLOWING LINES  //

	$emailBody = "This email is a confirmation of your contact. \n\n ";			//stores the content of the email
	foreach($_POST as $key => $value)		//Reads all of the name-value pairs. 	$key: field name   $value: value from the form
	{
		$emailBody.= $key."=".$value."\n";	//Adds the name value pairs to the body of the email, each one on their own line. \n = new line Unix/Mac OS
		                                                                                                                    //\r = MacOS before X
																																																												//\r\n = Windows
	}

	$headers = "From: $fromEmail" . "\r\n";				//Creates the From header with the appropriate address. Could even say it's from your cat...

 	if (mail($toEmail,$subject,$emailBody,$headers)) 	//puts pieces together and sends the email to your hosting account's email server
	{
   		header("location: RJ's Contact Form.php");
  	}
	else
	{
   		echo("<p style = 'color: white;'>Message delivery failed...</p>");
  	}
}/////end emailer/////
?>


<?php
////////////////////////////////
/////Database Insert Start/////
//////////////////////////////
	
		session_start();

	$servername = "localhost";
	$username = "nephilim42_341";
	$password = "nephilim42";
	$dbname = "nephilim42_341";

	if(isset($_POST["submit"]))
{
try {
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	$description = $_POST['description'];
	$selectId = $_POST['selectId'];

	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO tshirt_contact(cust_id, cust_name, cust_email, cust_comments, cust_product_problem, cust_select_id) 
    VALUES (:id, :name, :email, :comments, :description, :selectId)");
	
	$stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':comments', $comments);
	$stmt->bindParam(':description', $description);
	$stmt->bindParam(':selectId', $selectId);

    $stmt->execute();
	
		echo "Thank you for your input. An email was sent to you with the information filled out on this form.";
	
    }
catch(PDOException $e)
    {
		echo "Error: " . $e->getMessage();
    }

}/////end insert/////	
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
		
		#payment {
			display: none;
		}
		
		#hidden {
			display: none;
		}
		
		#hiddenStuff {
			display: none;
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
	
	
	<script>
	
		function productShow() {
			document.getElementById('hidden').style.display = 'block';
		}
	
	</script>

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
		
<form name = "form1" id = "form1" action = "RJ's Contact Form.php" method = "post">

<p>We value your input! </p>

	<p>Please enter your name:
		<input type = "text" name = "name" id = "name" required>
		<span class = "error">*</span>
	</p>
		
	<p>Please enter your email address:	
		<input type = "email" name = "email" id = "email" required>
		<span class = "error">*</span>
	</p>
<br>
	<p>Please let us know how we're doing:<br>
		<textarea rows = "5" cols = "40" name = "comments" id = "comments" required>
		</textarea><span class = "error">*</span>
	</p>
	
	<p>Would you like to address a product issue?
		<input type = "checkbox" name = "product" id = "product" onClick = "productShow()">
	</p>

<div id = "hidden">
<br><br>
	<p>We strive to ensure that every customer<br>is happy.
	
	<p>If your problem is with a specific order,<br>you may view your order by clicking <a href = "RJ's Check Order.php">HERE</a><br>Please review your orders and use the id number <br>for the corresponding order on this form.
	</p>
	
	<p>Once you have determined which order<br>you are refering to, please enter the<br>id number here so we may address that order:<br>
		<input type = "text" name = "selectId" id = "selectId">
	</p>
	
	<p>Please let us know how we can help you.<br>
		<textarea rows = "5" cols = "40" name = "description" id = "description" required>
		</textarea><span class = "error">*</span>
	</p>
</div>

<p>When form is submitted, an email will be sent to you with the information from this form</p>

<br><br>
	<input type = "submit" name = "submit" id = "submit" >
	<input type = "reset" name = "reset" id = "reset">
		
	</form>
	
</div>
	
	
<div id = "hiddenStuff">
<p>
	HoNEypOT:
		<input type = "text" name = "" value = "">
</p>
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
<?php
	$conn = null;
	$stmt = null;
?>
</body>

</html>