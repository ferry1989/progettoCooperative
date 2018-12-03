<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$utente = json_decode($foo, true);
		$id_utente = mysqli_real_escape_string($con, $utente['id_utente']);
		
		$verificautente = "SELECT id_utente FROM utente where id_utente = '$id_utente'";
		$result = mysqli_query($con,$verificautente);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"utente non trovata!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$deletePresenza ="delete from utente where id_utente = '$id_utente'";
			if (!mysqli_query($con,$deletePresenza)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"utente eliminata");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>