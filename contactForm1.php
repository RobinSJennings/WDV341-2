<?php
	session_start();

	$servername = "localhost";
	$username = "nephilim42_wdv";
	$password = "nephilim42";
	$dbname = "nephilim42_wdv";

	if(isset($_POST["submit"]))
{
try {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$value1 = $_POST['rep'];
	$value2 = $_POST['reason'];
	$description = $_POST['Description'];
	$newsletter = $_POST['newsletter'];
	$brochure = $_POST['product'];
	$date = $_POST['todaysDate'];
	$followUp = $_POST['follow_up_date'];
	$time = $_POST['time'];
	$tframe = $_POST['tframe'];

	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO wdv_341_customer_contacts (contact_name, contact_email, contact_rep, contact_reason, contact_comments, contact_newsletter, contact_more_products, contact_date, contact_time, contact_follow_up, contact_time_frame) 
    VALUES (:name, :email, :rep, :reason, :Description, :newsletter, :product, :todaysDate, :time, :follow_up_date, :tframe)");
	
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':rep', $value1);
	$stmt->bindParam(':reason', $value2);
	$stmt->bindParam(':Description', $description);
	$stmt->bindParam(':newsletter', $newsletter);
	$stmt->bindParam(':product', $brochure);
	$stmt->bindParam(':todaysDate', $date);
	$stmt->bindParam(':follow_up_date', $followUp);
	$stmt->bindParam(':time', $time);
	$stmt->bindParam(':tframe', $tframe);

    // insert a row
   
    $stmt->execute();
	
	// execute the params

    echo "New records created successfully"; //if all is good
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
		body{
			background-color: black;
			color: white;
			text-align: center;
		}
		
		#main{
			border: solid thick red;
			width: 64%;
			margin: 0 auto;
		}
		#hr{
			border-bottom: solid thick red;
		}
		table{
			float: left;
		}
		.required {
			color: red;
		}
	</style>

</head>

<body>

	
	
<div id = "main">

	<h2>Thank you for contacting us!</h2>
	<p>Your input is valueable to us</p>
	<p>Please fill out the form below and we will make the proper accomodations</p>
<br>
	
<hr id = "hr">

	<form id = "contacts" name = "contacts" method = "post" action = "">
	
	  <p class = "required">* REQUIRED</p>
	
		<p>Please enter your name:
			<input type = "text" name = "name" id = "name" required>
				<span class = "required">*</span>
		</p>
		<p>Please enter your email address:
			<input type = "text" name = "email" id = "email" required>
				<span class = "required">*</span>
		</p>
	<br><hr id = "hr">
		<p>Let us know who you are trying to reach:  (Your representative. )<br>(An email with this information will be sent to the corresponding representative)<br>
			<select name = "rep" required>
				<option value = "empty">-Please Choose-</option>
				<option value = "Chester Cheeto">Chester Cheeto</option>
				<option value = "Pork Chop McGee">Pork Chop McGee</option>
				<option value = "Bosephus the BBQ King">Bosephus the BBQ King</option>
			</select>
			</p>
	<br>
		<p>Reason for contact:<br>
		<select name = "reason" required>
			<option value = "empty">-Please Choose-</option>
			<option value = "Product Problem">Product Problem</option>
			<option value = "Delivery Problem">Delivery Problem</option>
			<option value = "Customer Service Problem">Customer Service Problem</option>
		</select>
		</p>
		<p>Please let us know how we can help:</p>
		<textarea cols = "30" rows = "6" name = "Description" required></textarea>
			<span class = "required">*</span>
	<br><br><hr id = "hr">
		<p>Sign up for our newsletter?<span class = "required"> *</span>
			<input type = "radio" name = "newsletter" id = "newsletter" value = "yes" required/>Yes
			<input type = "radio" name = "newsletter" id = "newsletter" value = "no"required/>No
		</p>
		<p>Let us know if you would like to recieve<br> our brochure featuring more of our products:<span class = "required"> *</span>
			<input type = "radio" name = "product" id = "product" value = "yes" required/>yes
			<input type = "radio" name = "product" id = "product" value = "no" required/>no
		</p>
	<br><hr id = "hr">
		<p>Please enter today's date:<br>
			<input type = "date" name = "todaysDate" id = "todaysDate" required>
				<span class = "required">*</span>
		</p>
		<p>Please enter a date for a follow-up consultation:<br>
			<input type = "date" name = "follow_up_date" id = "follow_up_date" required>
				<span class = "required">*</span>
		</p>
		<p>Please enter a time that works best for you:<br>
			<input type = "text" name = "time" id = "time" size = "2px" required>
				<span class = "required">*</span>
		</p>
		<p>A.M. or P.M.:<br>
			<select name = "tframe">
				<option value = "empty">-Please Choose-></option>
				<option value = "A.M.">A.M.</option>
				<option value = "P.M.">P.M.</option>
			</select>
	<br><br><hr id = "hr">
		<input type = "submit" name = "submit" id = "submit" value = "SUBMIT">
<hr id = "hr">
		<p>The PPA<br> The Product Placement Agency&copy<br>Robin Jennings, Founder<br>rsjennings@dmacc.edu<br>515-555-1234<br>1234 Main Street, Johnston Iowa, 50131<br><br>Office Hours:<br>Monday - Friday: 8:00a.m. - 5:00p.m.<br>Saturday: 10:00a.m. - 3:00p.m.<br>Sunday: Closed</p>
		
	</form>
	
</div>
	 
<?php
	if(isset($_POST['submit']))
{	
?>
	<p>Below is a rendered copy of the information you had entered on this form...</p>

		<table border="1">
	<tr>
		<th>Name:</th>
		<th>Email:</th>
		<th>Representative:</th>
		<th>Reason for Contact:</th>
		<th>Description of the Reason for Contact:</th>
		<th>Newsletter?</th>
		<th>Want a Product Brochure?</th>
		<th>Today's Date</th>
		<th>Follow Up Date:</th>
		<th>What Time Works Best For You?</th>
		<th>A.M. or P.M.?</th>
		<!--<th>Update</th>
		<th>Delete</th>-->
	</tr> 
<?php
		echo "<tr>";
  		echo "<td>$name</td>";
  		echo "<td>$email</td>";
  		echo "<td>$value1</td>";
  		echo "<td>$value2</td>";
		echo "<td>$description</td>";
		echo "<td>$newsletter</td>";
		echo "<td>$brochure</td>";
		echo "<td>$date</td>";
		echo "<td>$followUp</td>";
		echo "<td>$time</td>";
		echo "<td>$tframe</td>";
		/*echo "<td><a href='updateContactForm.php?recId='>Update</a></td>";
		echo "<td><a href='presentersDelete.php?recId=$'>Delete</a></td>";*/
  		echo "</tr>\n";
	
}
$conn = null;
$stmt = null;
?>
</body>

</html>