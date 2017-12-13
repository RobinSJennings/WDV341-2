<?php
session_start();   //Provides access to the current session

$_SESSION['validUser'] = 'no';
session_unset();   //Remove all session variables
session_destroy(); //Removes current session

header("location: RJ's Login2.php");