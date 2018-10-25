<?php
$username = trim($_POST['username']);
$password = trim($_POST['password']);
include_once '../config/db.php';
$msg = "";
	if($con != null){
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$verificaUtente = "SELECT isAdmin,user,id_regione,id_ente FROM utente where user = '$username' and password = '$password'";
		$result = mysqli_query($con,$verificaUtente);

		if ($row = $result->fetch_assoc()) {
			session_start();
			$_SESSION['isAdmin'] = $row["isAdmin"];
			$_SESSION['id_regione'] = $row["id_regione"];
			$_SESSION['id_ente'] = $row["id_ente"];
			$_SESSION['username'] = trim($row["user"]);
			$msg = array("success"=>"Login Effettuato");
			header("location: ../site/dashboard.php");
		}
		else{
			$msg = array("error"=>"Combinazione username/password errata!");
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
	
?>