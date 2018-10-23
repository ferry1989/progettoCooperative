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



$variabile =  $_POST['nomevol'];
$variabile1 =  $_POST['cognomevol'];
$variabile2 =  $_POST['codfisvol'];
$variabile3 =  $_POST['sessovol'];
$variabile4 =  $_POST['pnn'];
$variabile5 =  $_POST['estero'];
$variabile6 =  $_POST['cnn'];
$variabile7 =  $_POST['indres'];
$variabile8 =  $_POST['nc'];
$variabile9 =  $_POST['Cap'];
$variabile10 =  $_POST['provdom'];
$variabile11 =  $_POST['comdom'];
$variabile12 =  $_POST['inddomi'];
$variabile13 =  $_POST['numcivdom'];
$variabile14 =  $_POST['capdom'];
$variabile15 =  $_POST['titstud'];
$variabile16 =  $_POST['suostato'];
$variabile17 =  $_POST['nolp'];
$variabile18 =  $_POST['colp'];
$variabile19 =  $_POST['iban'];



$sql = "INSERT INTO volontario (nome, cognome, codfis, sesso, provnaznas, estero, comnaznas, indres, nc, cap, provdom, comdom, inddom, ncdom, capdom, titstudio , stato, nomeolp, cognomeolp,codiban )
VALUES ('$variabile', '$variabile1', '$variabile2' , '$variabile3' , '$variabile4', '$variabile5', '$variabile6', '$variabile7', '$variabile8' , '$variabile9'  , '$variabile10', '$variabile11', '$variabile12', '$variabile13' , '$variabile14', '$variabile15', '$variabile16', '$variabile17' , '$variabile18', '$variabile19')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



header("Location: https://baselunare.it/regione/pages/indexr.php");
?>