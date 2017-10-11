<?php
$servername = "10.123.0.85:3306";
$username = "nephilim42_341";
$password = "rsjennings83";
$dbname = "nephilim42_341";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO wdv341 ('event_id', 'event_name', 'event_description', 'event_presenter', 'event_date', 'event_time')
    VALUES (?,?,?,?,?,?)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo 'Connection Failed' . $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
