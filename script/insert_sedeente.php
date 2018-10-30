<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$regioneprogetto = json_decode($foo, true);
			$idRegione = trim(mysqli_real_escape_string($con, $regioneprogetto['idRegione']));
			$idProgetto = mysqli_real_escape_string($con, $regioneprogetto['idProgetto']);
			
			$verificaRegione = "SELECT id_regione FROM regione where id_regione='$idRegione'";
			$result = mysqli_query($con,$verificaRegione);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Regione non esistente!");
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
			
			$verificaRegioneProgetto = "SELECT id_regioneprogetto FROM regioneprogetto where id_progetto='$idProgetto' and id_regione='$idRegione'";
			$result = mysqli_query($con,$verificaRegioneProgetto);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"Collegamento già esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			else{
				$insertprogettoregione = "INSERT INTO regioneprogetto (id_regione,id_progetto) VALUES ('$idRegione','$idProgetto')";
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