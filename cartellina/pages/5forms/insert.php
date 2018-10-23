<?php
$servername = "localhost";
$username = "ks2lrdkn_alex2";
$password = "progettoregione";
$dbname = "ks2lrdkn_ale";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$variabile =  $_POST['nomeenteform'];



$sql = "INSERT INTO ente (nomeente)
VALUES ('$variabile')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>