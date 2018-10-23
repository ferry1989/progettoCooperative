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
$variabile1 =  $_POST['codfis'];
$variabile2 =  $_POST['formtipo'];
$variabile3 =  $_POST['rapleg'];
$variabile4 =  $_POST['telefono'];
$variabile5 =  $_POST['entefax'];
$variabile6 =  $_POST['entehttp'];
$variabile7 =  $_POST['entemail'];
$variabile8 =  $_POST['entepec'];
$variabile9 =  $_POST['enteprovincia'];
$variabile10 =  $_POST['entecomune'];
$variabile11 =  $_POST['enteindirizzo'];
$variabile12 =  $_POST['entenumerocivico'];
$variabile13 =  $_POST['entecap'];



$sql = "INSERT INTO ente (nomeente, cf, tipo, rapleg, tel, fax, http, email, pec, pv, com, ind, nc, cap)
VALUES ('$variabile', '$variabile1', '$variabile2' , '$variabile3' , '$variabile4', '$variabile5', '$variabile6', '$variabile7', '$variabile8' , '$variabile9'  , '$variabile10', '$variabile11', '$variabile12', '$variabile13')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



header("Location: https://baselunare.it/regione/pages/indexr.php");
?>