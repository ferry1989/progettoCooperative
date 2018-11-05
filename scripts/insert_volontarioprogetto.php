<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$regioneprogetto = json_decode($foo, true);
			$idVolontario = trim(mysqli_real_escape_string($con, $regioneprogetto['idVolontario']));
			$idProgetto = mysqli_real_escape_string($con, $regioneprogetto['idProgetto']);
			
			$verificaRegione = "SELECT id_volontario FROM volontario where id_volontario='$idVolontario'";
			$result = mysqli_query($con,$verificaRegione);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Volontario non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			$verificaProgetto = "SELECT id_progetto FROM progetto where id_progetto='$idProgetto'";
			$result = mysqli_query($con,$verificaProgetto);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Progetto non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			$verificaRegioneProgetto = "SELECT id_volontarioprogetto FROM volontarioprogetto where id_progetto='$idProgetto' and id_volontario='$idVolontario'";
			$result = mysqli_query($con,$verificaRegioneProgetto);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"Collegamento già esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			else{
				$insertprogettoregione = "INSERT INTO volontarioprogetto (id_volontario,id_progetto) VALUES ('$idVolontario','$idProgetto')";
				if (!mysqli_query($con,$insertprogettoregione)) {
					$msg = array("error"=>mysqli_error($con));
				}
				else{
					$msg = array("success"=>"Collegamento creato");
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