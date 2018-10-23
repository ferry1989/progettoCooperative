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



$variabile =  $_POST['ente'];
$variabile1 =  $_POST['titolo'];
$variabile2 =  $_POST['bando'];
$variabile3 =  $_POST['prevalente'];

$variabile5 =  $_POST['altro'];
$variabile6 =  $_POST['attuazione'];
$variabile7 =  $_POST['nv'];
$variabile8 =  $_POST['stato'];




$sql = "INSERT INTO progetto (ente, titolo, anno, prevalente, altro, sede, nv, stato)
VALUES ('$variabile', '$variabile1', '$variabile2' , '$variabile3' , '$variabile5', '$variabile6', '$variabile7', '$variabile8')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



header("Location: https://baselunare.it/regione/pages/indexr.php");
?>