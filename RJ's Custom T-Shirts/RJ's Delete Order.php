<?php

	

	if(isset($_POST['submit'])) {
try {
	include "RJ's Connection.php";
	
	 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$id = $_POST['id'];
    // sql to delete a record
    $sql = "DELETE FROM tshirt_orders WHERE cust_id='$id'";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}
$conn = null;
?>
<!DOCTYPE html>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RJ's Custom T-Shirts</title>
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
  <li><a href="RJ's Log Out.php">Logout</a></li>
</h2>
</ul>

	
</nav>	
<br>

		<marquee class = "rainbow"><h1>25% ALL CUSTOM ORDERS FOR THE MONTH OF DECEMBER. USE PROMO CODE: customsale</h1></marquee>
	

	<img src = "tshirtSale.png" id = "image" height = "35%" width = "100%">
	
	<br>
		
	<br><br>

	<img src = "tshirts.jpg" width = "20%" height = "35%" class = "side">
	
	<img src = "tshirts1.jpg" width = "20%" height = "35%" class = "side1">

<div id = "order">
		
	<h2 id = "center">Welcome to RJ's Custom T-shirts<br>
		A place where you can order any size t-shirt, with any color, and have your custom print or text printed on your t-shirt</h2>
	<form name = "selectForm" id = "selectForm" method = "POST" action = "RJ's Delete Order.php">
		<p>Please enter the id for the order you would like to delete:
			<input type = "text" name = "id" id = "id" required>
		</p>
		
		<input type = "submit" name = "submit" id = "submit" value = "SUBMIT">
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

<p>Below is a rendered copy of the information you had entered on this form...</p>
<?php
$conn = null;
$stmt = null;
?>

</body>

</html>