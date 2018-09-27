<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$presenza = json_decode($foo, true);
			$dataOraInizio = trim(mysqli_real_escape_string($con, $presenza['dataOraInizio']));
			$dataOraFine = mysqli_real_escape_string($con, $presenza['dataOraFine']);
			$isApprovata = mysqli_real_escape_string($con, $presenza['isApprovata']);
			$id_volontario = mysqli_real_escape_string($con, $presenza['idVolontario']);
			$id_progetto = mysqli_real_escape_string($con, $presenza['idProgetto']);
			
			$verificaVolontario = "SELECT id_volontario FROM volontario where id_volontario='$id_volontario'";
			$result = mysqli_query($con,$verificaVolontario);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Volontario non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			$verificaProgetto = "SELECT id_progetto FROM progetto where id_progetto='$id_progetto'";
			$result = mysqli_query($con,$verificaProgetto);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Progetto non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			else{
				$insertpresenza = "INSERT INTO presenza (dataOraInizio, dataOraFine, isApprovata, id_volontario, id_progetto) VALUES ('$dataOraInizio', '$dataOraFine', '$isApprovata', '$id_volontario', '$id_progetto')";
				if (!mysqli_query($con,$insertpresenza)) {
					$msg = array("error"=>mysqli_error($con));
				}
				else{
					$msg = array("success"=>"presenza creata");
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