<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$regioneprogetto = json_decode($foo, true);
			$id_sede = trim(mysqli_real_escape_string($con, $regioneprogetto['id_sede']));
			$id_progetto = mysqli_real_escape_string($con, $regioneprogetto['id_progetto']);
			
			$verificaRegione = "SELECT id_sede FROM sede where id_sede='$id_sede'";
			$result = mysqli_query($con,$verificaRegione);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Sede non esistente!");
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
			
			$verificaRegioneProgetto = "SELECT id_sedeprogetto FROM sediprogetti where id_progetto='$id_progetto' and id_sede='$id_sede'";
			$result = mysqli_query($con,$verificaRegioneProgetto);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"Collegamento già esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			else{
				$insertprogettoregione = "INSERT INTO sediprogetti (id_sede,id_progetto) VALUES ('$id_sede','$id_progetto')";
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