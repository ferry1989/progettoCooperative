<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$progetto = json_decode($foo, true);
			$idEnte = trim(mysqli_real_escape_string($con, $progetto['id_ente']));
			$idRegione = trim(mysqli_real_escape_string($con, $progetto['id_regione']));
			$titolo = mysqli_real_escape_string($con, $progetto['titolo']);
			
			$verificaRegione = "SELECT id_regione FROM regione where id_regione='$idRegione'";
			$result = mysqli_query($con,$verificaRegione);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Regione non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			else{
				$insertprogetto = "INSERT INTO progetto (titolo) VALUES ('$titolo')";
				if (!mysqli_query($con,$insertprogetto)) {
					$msg = array("error"=>mysqli_error($con));
				}
				else{
					$idProgetto = mysqli_insert_id($con);
					$insertprogettoregione = "INSERT INTO regioneprogetto (id_regione,id_progetto) VALUES ('$idRegione','$idProgetto')";
					if (!mysqli_query($con,$insertprogettoregione)) {
						$msg = array("error"=>mysqli_error($con));
					}
					else{
						$msg = array("success"=>"progetto creato");
					}
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