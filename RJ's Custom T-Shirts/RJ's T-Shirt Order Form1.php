<?php
/////////////////////////////
/////Email Script Start/////
///////////////////////////

if (isset($_POST['submit'])) {


	//$toEmail = "robinjennings@nephilim42.com";		//Email address where you want to send the form data. Whomever is wanting an email.

	$toEmail = "robinjennings@nephilim42.com, $_POST[email]"; //This will send the email to me. I'm still trying to concatenate both $toEmail variables.
	//$toEmail = $_POST[Email_Address];    //Gettin email address into variable to have email sent to user....



	$subject = "Thank you for your order";	// Place your short message for subject."


	$fromEmail = "robinjennings@nephilim42.com";		//<-- Domain Email Address. This will display in the sent email


//   DO NOT CHANGE THE FOLLOWING LINES  //

	$emailBody = "This email is a confirmation of your order. \n\n ";			//stores the content of the email
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
/////////////////////////////////
///////Begin Validation/////////
///////////////////////////////

// define variables and set to empty values
$nameErr = "";
$emailErr = "";
$commentErr = "";
$addressErr = "";
$typeErr = "";


$name = "";
$email = "";
$comment = "";
$address = "";
$type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  
  
	if (empty($_POST["description"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["description"]);
	if (!preg_match("/^[a-zA-Z ]*$/",$comment)) {
      $commentErr = "Only letters and white space allowed"; 
    }
  }
  
  
  if (empty($_POST["address"])) {
		$address = "";
	}else{
		$address = test_input($_POST["address"]);
		//check if address contains only number,letters, and whitespace
		if (preg_match("^([0-9]+ )[0-9a-zA-Z ]+$^", $address)) {
			$addressErr = "";
		}else {
			$addressErr = "<br>* Needs letters, numbers. Whitespace allowed. No special characters<br>For apartment/Unit listing, please use 'apt' rather than the '#' symbol";
		}
	}
  
  if (empty($_POST["promo"])) {
    $typeErr = "";
  } else {
    $type = test_input($_POST["promo"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$type)) {
      $typeErr = "Only letters and white space allowed"; 
    }
  }
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
/////end validation/////
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

	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO tshirt_orders (cust_id, cust_name, cust_email, cust_address, cust_color, cust_shirt_age, cust_shirt_size, cust_shirt_text, cust_file, cust_quantity, cust_more_orders, cust_promo) 
    VALUES (:id, :name, :email, :address, :color, :sizes, :size, :description, :file, :quantity, :more, :promo)");
	
	$stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
	$stmt->bindParam(':color', $color);
	$stmt->bindParam(':sizes', $sizes);
	$stmt->bindParam(':size', $size);
	$stmt->bindParam(':description', $description);
	$stmt->bindParam(':file', $file);
	$stmt->bindParam(':quantity', $quantity);
	$stmt->bindParam(':more', $more);
	$stmt->bindParam(':promo', $promo);

    $stmt->execute();// insert a row
	
	$last_id = $conn->cust_id;
	
	
	// execute the params
    //echo "New records created successfully"; //if all is good
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
		
		#payment {
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
		
<form name = "form1" method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<p>All orders under 30 t-shirts will cost $4.50 for shipping.<br>All orders over 30 t-shirts will cost $6.50 for shipping<br></p>
	<p class = "error">All orders will have 6&cent sales tax included in the prices.</p>

<p>Please fill out the information below to order your custom t-shirt</p>

	<p>Please enter your name:
		 <input type="text" name="name" id="name" value = "<?php echo $name;?>" required>
			<span class = "error">* <?php echo $nameErr;?></span>
	</p>
		
	<p>Please enter your email address:	
		<input type = "email" name = "email" id = "email" required>
		<span class = "error">* <?php echo $emailErr; ?></span>
	</p>
	
	<p>Please enter your shipping address:	
		<input type = "text" name = "address" id = "address" value = "<?php echo $address;?>"required>
		<span class = "error">* <?php echo $addressErr;?></span>
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
		</textarea><span class = "error">* <?php echo $commentErr; ?></span>
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
		<?php echo $typeErr; ?>
	</p>
	
	
	
	
	
	
	
<div id = "hiddenStuff">
<p>
	HoNEypOT:
		<input type = "text" name = "" value = "">
</p>

</div>
	
	
<br><br>
	<input type = "submit" name = "submit" id = "submit" >
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
<?php
	$conn = null;
	$stmt = null;
?>
</body>

</html>