<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$volontario = json_decode($foo, true);
		$idVolontario = mysqli_real_escape_string($con, $volontario['idVolontario']);
		$nome = mysqli_real_escape_string($con, $volontario['nome']);
		$cognome = mysqli_real_escape_string($con, $volontario['cognome']);
		$dataNascita = mysqli_real_escape_string($con, $volontario['dataNascita']);
		$codFiscale = mysqli_real_escape_string($con, $volontario['codFiscale']);
		
		$verificaVolontario = "SELECT id_volontario FROM volontario where id_volontario='$idVolontario'";
		$result = mysqli_query($con,$verificaVolontario);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Volontario non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updateVolontario = "update volontario set nome = '$nome', cognome = '$cognome', dataNascita = '$dataNascita', codFiscale = '$codFiscale' where id_volontario = '$idVolontario'";
			if (!mysqli_query($con,$updateVolontario)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Volontario aggiornato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>