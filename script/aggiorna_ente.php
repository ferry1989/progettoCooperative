<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$ente = json_decode($foo, true);
		$idEnte = mysqli_real_escape_string($con, $ente['idEnte']);
		$telefono = mysqli_real_escape_string($con, $ente['telefono']);
		$nomeEnte = mysqli_real_escape_string($con, $ente['nomeEnte']);
		
		$verificaUtente = "SELECT id_ente FROM ente where id_ente='$idEnte'";
		$result = mysqli_query($con,$verificaUtente);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Ente non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updateUtente="update ente set telefono = '$telefono', nomeEnte = '$nomeEnte' where id_ente = '$idEnte'";
			if (!mysqli_query($con,$updateUtente)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"ente aggiornato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>