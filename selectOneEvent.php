<?php

echo "<table style='border: solid thick red;'>";
 echo "<tr><td>Contact's ID</td><th>Name of contact</th><th>Contact's Email</td><td>contact's Representative</td><td>Reason for Contact</td><td>Contact's Comments</td><td>Newsletter?</td><td>Product Brochure?</td><td>Date of contact</td><td>Time of day?</td><td>Follow up date</td><td>A.M. or P.M.</td></tr>";


class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: thick solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
		session_start();

	$servername = "localhost";
	$username = "nephilim42_wdv";
	$password = "nephilim42";
	$dbname = "nephilim42_wdv";
	
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM wdv_341_customer_contacts WHERE cust_id = '11'"); 
    $stmt->execute();
		echo "connected Successfully";
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
	echo "These items have been selected";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>