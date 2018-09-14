<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$ente = json_decode($foo, true);
			$nomeEnte = trim(mysqli_real_escape_string($con, $ente['nomeEnte']));
			$telefono = mysqli_real_escape_string($con, $ente['telefono']);
			$id_regione = mysqli_real_escape_string($con, $ente['regione']);
			$id_utente = mysqli_real_escape_string($con, $ente['utente']);
			
			$verificaEnte = "SELECT id_ente FROM ente where trim(nomeEnte)='$nomeEnte'";
			$result = mysqli_query($con,$verificaEnte);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"Ente già esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			$verificaUtente = "SELECT id_utente FROM utente where id_utente='$id_utente'";
			$result = mysqli_query($con,$verificaUtente);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Utente non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			$verificaRegione = "SELECT id_regione FROM regione where id_regione='$id_regione'";
			$result = mysqli_query($con,$verificaRegione);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Regione non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			else{
				$insertente = "INSERT INTO ente (nomeEnte, telefono, id_regione, id_utente) VALUES ('$nomeEnte', '$telefono', '$id_regione', '$id_utente')";
				if (!mysqli_query($con,$insertente)) {
					$msg = array("error"=>mysqli_error($con));
				}
				else{
					$msg = array("success"=>"ente creato");
				}
			}
			mysqli_close($con);
		}
		else{
			$msg = array("error"=>"Connessione al db non riuscita!");
		}
		echo json_encode($msg);
	}
?>