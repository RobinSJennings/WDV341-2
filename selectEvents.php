<?php
		include 'dbConnect.php';			//connects to the database
try {
	
	
	$sql = $conn->prepare ("SELECT contact_name, contact_email, contact_rep, contact_reason, contact_comments, contact_newsletter, contact_more_products, contact_date, contact_time, contact_follow_up, contact_time_frame FROM wdv_341_customer_contacts");	// SQL command
	$sql->execute();
	
	echo "Successfully updated the record";
	echo $sql;
	
}catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}
$conn = null;
	
	/*$query = $conn->prepare($sql) or die("<h1>Prepare Error</h1>");	//prepare the Statement Object
	
	//run the statement
	
	if( $query->execute() )	//Run Query and Make sure the Query ran correctly
	{
		$query->bind_result($presenter_id,$presenter_first_name,$presenter_last_name,$presenter_city,$presenter_st,$presenter_zip,$presenter_email);
	
		$query->store_result();
	}
	else
	{
		//Problems were encountered.
		$message = "<h1 style='color:red'>Houston, We have a problem!</h1>";	
		$message .= "mysqli_error($conn)";		//Display error message information	
		echo $message;
	}
	session_destroy();*/
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
	

$conn = null;
$stmt = null;
?>