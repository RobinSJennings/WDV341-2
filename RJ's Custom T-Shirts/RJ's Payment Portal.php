
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



	$subject = "Thank you for your order. These results are a confirmation of your order.";	// Place your short message for subject."


	$fromEmail = "robinjennings@nephilim42.com";		//<-- Domain Email Address. This will display in the sent email


//   DO NOT CHANGE THE FOLLOWING LINES  //

	$emailBody = "Your Results\n\n ";			//stores the content of the email
	foreach($_POST as $key => $value)		//Reads all of the name-value pairs. 	$key: field name   $value: value from the form
	{
		$emailBody.= $key."=".$value."\n";	//Adds the name value pairs to the body of the email, each one on their own line. \n = new line Unix/Mac OS
		                                                                                                                    //\r = MacOS before X
																																																												//\r\n = Windows
	}

	$headers = "From: $fromEmail" . "\r\n";				//Creates the From header with the appropriate address. Could even say it's from your cat...

 	if (mail($toEmail,$subject,$emailBody,$headers)) 	//puts pieces together and sends the email to your hosting account's email server
	{
   		header("location: RJ's Payment Portal.php"); 
  	}
	else
	{
   		echo("<p style = 'color: white;'>Message delivery failed...</p>");
  	}
}/////end emailer/////
?>

<?php

	$cardErr = "";
	$card = "";


  if (empty($_POST["card"])) {
    $cardErr = "";
  } else {
    $card = isset($_POST["card"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/\d{16}/",$card)) {
      $cardErr = ""; 
    }else {
		$cardErr = "Must be a 16 digit number.";
	}
  }

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
	
	$number = $_POST['card'];
	$type = $_POST['type'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$cvv = $_POST['cvv'];

	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$id = $conn->cust_id;

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO payment_info(cust_id, card_number, card_type, card_expiration_month, card_expiration_year, card_cvv) 
    VALUES (:id, :card, :type, :month, :year, :cvv)");
	
	$stmt->bindParam(':id', $id);
    $stmt->bindParam(':card', $number);
	$stmt->bindParam(':type', $type);
	$stmt->bindParam(':month', $month);
	$stmt->bindParam(':year', $year);
	$stmt->bindParam(':cvv', $cvv);

    $stmt->execute();// insert a row
	
	
	
	
	// execute the params
	echo id;
    echo "information has been recieved and will be processed. Please allow 3-5 business days until you recieve your order";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }

} //end insert	
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

	<img src = "tshirts.jpg" width = "22%" height = "35%" class = "side">
	
	<img src = "tshirts1.jpg" width = "22%" height = "35%" class = "side1">
<div id = "order">
		<h1 style = "text-align: center;">Order Your Custom T-Shirt</h1>

<!--/////This form is a mock-up of a payment portal/////-->
<form id = "payment" name = "payment" method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	
	<p>All orders under 30 t-shirts will cost $4.50 for shipping.<br>All orders over 30 t-shirts will cost $6.50 for shipping<br></p>
	<p class = "error">All orders will have 6&cent sales tax included in the prices.</p>
	<p>We accept all major credit cards.</p>
	
	<img src = "cards.jpg" width = "150px" height = "100px" style = "float: right;">
	
	<p>Please enter your 16 digit credit card number:
		<input type = "text" name = "card" id = "card" value = "<?php echo $card; ?>"required>
		<span class = 'error'>* <?php echo $cardErr; ?></span>
	</p>
	
	<p>What type of card:<span class = "error">*</span>
		<input type = "radio" name = "type" id = "type" value = "Mastercard" required>Mastercard
		<input type = "radio" name = "type" id = "type" value = "Visa" >Visa
		<input type = "radio" name = "type" id = "type" value = "American Express">American Express
		<input type = "radio" name = "type" id = "type" value = "Discover">Discover
	</p>
	
	<p>Please enter the expiration date: <span class = "error">*</span>  Month:
		<select name = "month"required>
			<option value = ""></option>
			<option value = "Jan">January</option>
			<option value = "Feb">February</option>
			<option value = "Mar">March</option>
			<option value = "Apr">April</option>
			<option value = "May">May</option>
			<option value = "June">June</option>
			<option value = "July">July</option>
			<option value = "Aug">August</option>
			<option value = "Sept">September</option>
			<option value = "Oct">Oct</option>
			<option value = "Nov">November</option>
			<option value = "Dec">December</option>
		</select>
		year:
		<select name = "year"required>
			<option value = ""></option>
			<option value = "2017">2017</option>
			<option value = "2018">2018</option>
			<option value = "2019">2019</option>
			<option value = "2020">2020</option>
			<option value = "2021">2021</option>
			<option value = "2022">2022</option>
			<option value = "2023">2023</option>
			<option value = "2024">2024</option>
			<option value = "2025">2025</option>
		</select>
	</p>
	
	<p>Please enter the 3 digit CVV number from the back of the card:
		<input type = "text" name = "cvv" id = "cvv" required>
		<span class = 'error'>*</span>
	</p>
	
	<p>To have an email sent to you, please enter your email address here:
		<input type = "email" name = "email" id = "email">
	</p>
	
	
	
	
	
	
<div id = "hiddenStuff">

<p>
	HoNEypOT:
		<input type = "text" name = "" value = "">
</p>

</div>
	
	
	<input type = "submit" name = "submit" id = "submit">
		
</form>
</div>

<br>

<footer>

	<p>To review your order, click <a href = "Rj's Check Order.php">Here</a>
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