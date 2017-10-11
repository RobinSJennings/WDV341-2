<?php
$servername = "127.0.0.1::3306";
$username = "nephilim42_341";
$password = "rsjennings83";



try {
$dbh = new PDO("mysql:host=$servername;dbname=wdv341", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
