<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$utente = json_decode($foo, true);
		$idUtente = mysqli_real_escape_string($con, $utente['id_utente']);
		$user = mysqli_real_escape_string($con, $utente['user']);
		$password = mysqli_real_escape_string($con, $utente['password']);
		$isAdmin = mysqli_real_escape_string($con, $utente['isAdmin']);
		
		$verificaUtente = "SELECT id_utente FROM utente where id_utente='$idUtente'";
		$result = mysqli_query($con,$verificaUtente);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Utente non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updateEnte="update utente set user = '$user', password = '$password', isAdmin = '$isAdmin' where id_utente = '$idUtente'";
			if (!mysqli_query($con,$updateEnte)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"utente aggiornato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>