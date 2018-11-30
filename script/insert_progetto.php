<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$progetto = json_decode($foo, true);
			$idEnte = trim(mysqli_real_escape_string($con, $progetto['id_ente']));
			$titolo = trim(mysqli_real_escape_string($con, $progetto['titolo']));
			$annobando = trim(mysqli_real_escape_string($con, $progetto['annobando']));
			$settoreprevalente = trim(mysqli_real_escape_string($con, $progetto['settprev']));
			$altrosettore = trim(mysqli_real_escape_string($con, $progetto['altrosett']));
			$sett24 = trim(mysqli_real_escape_string($con, $progetto['24sett']));
			$sett28 = trim(mysqli_real_escape_string($con, $progetto['28sett']));
			$sett36 = trim(mysqli_real_escape_string($con, $progetto['36sett']));
			$sedidiattuazione = trim(mysqli_real_escape_string($con, $progetto['id_sede']));
			$titolo = mysqli_real_escape_string($con, $progetto['titolo']);
			
 			$verificaProgetto = "SELECT titolo FROM progetto where titolo='$titolo'";
			$result = mysqli_query($con,$verificaProgetto);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"Progetto già esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}else{
				$insertprogetto = "INSERT INTO progetto (titolo,id_ente,annobando,settoreprevalente,altrosettore,sedidiattuazione,24sett,28sett,36sett,numerovolontari,numgiornidiservizio,nhorestettiman) VALUES ('$titolo','$idEnte','$annobando','$settoreprevalente','$altrosettore','$sedidiattuazione','$sett24','$sett28','$sett36','0','0','0')";
				if (!mysqli_query($con,$insertprogetto)) {
					$msg = array("error"=>mysqli_error($con));
				}
				else{
					$msg = array("success"=>"Progetto inserito con successo!");
				}
			}
			mysqli_close($con);
		}else{
			$msg = array("error"=>"Connessione al db non riuscita!");
		}
		echo json_encode($msg);
	}
?>