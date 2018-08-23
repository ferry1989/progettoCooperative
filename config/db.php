<?php

$servername = "localhost";
$username = "root";
$password = "612700";

// Create connection
$con = new mysqli($servername, $username, $password);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
echo "Connected successfully";

?>