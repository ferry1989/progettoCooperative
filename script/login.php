<?php
$username = trim($_POST['username']);
$password = trim($_POST['password']);
include_once '../config/db.php';
$msg = "";
	if($con != null){
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$verificaUtente = "SELECT u.isAdmin,u.user , e.id_ente, e.nomeEnte".
						"	FROM utente u ".
						"	left join ente e on u.id_utente = e.id_utente ".
						"	where u.user = '$username' and u.password = '$password'";
		$result = mysqli_query($con,$verificaUtente);

		if ($row = $result->fetch_assoc()) {
			session_start();
			$_SESSION['isAdmin'] = $row["isAdmin"];
			$_SESSION['username'] = trim($row["user"]);
			$_SESSION['id_ente'] = trim($row["id_ente"]);
			$_SESSION['nomeEnte'] = trim($row["nomeEnte"]);
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