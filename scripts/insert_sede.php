<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$sede = json_decode($foo, true);
			$indirizzo = trim(mysqli_real_escape_string($con, $sede['indirizzo']));
			$id_ente = mysqli_real_escape_string($con, $sede['id_ente']);
			$denominazione = mysqli_real_escape_string($con, $sede['denominazione']);
			$numvolontari = mysqli_real_escape_string($con, $sede['numvolontari']);
			$provincia = mysqli_real_escape_string($con, $sede['provincia']);
			$comune = mysqli_real_escape_string($con, $sede['comune']);
			$numcivico = mysqli_real_escape_string($con, $sede['numcivico']);
			$capsede = mysqli_real_escape_string($con, $sede['capsede']);
			$telefono = mysqli_real_escape_string($con, $sede['telefono']);
			$fax = mysqli_real_escape_string($con, $sede['fax']);
			$titologiuridico = mysqli_real_escape_string($con, $sede['titologiuridico']);
			$sitoweb = mysqli_real_escape_string($con, $sede['sitoweb']);
			$emailordinaria = mysqli_real_escape_string($con, $sede['emailordinaria']);
			
			$verificaSede = "SELECT denominazione FROM sede where trim(denominazione)='$denominazione'";
			$result = mysqli_query($con,$verificaSede);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"Sede già esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}else{
				$insertSede = "INSERT INTO sede (indirizzo,id_ente,denominazione,numvolontari,provincia,comune,numcivico,capsede,telefono,fax,titologiuridico,sitoweb,emailordinaria) VALUES ('$indirizzo','$id_ente','$denominazione','$numvolontari','$provincia','$comune','$numcivico','$capsede','$fax','$titologiuridico','$titologiuridico','$sitoweb','$emailordinaria')";
				if (!mysqli_query($con,$insertSede)) {
					$msg = array("error"=>mysqli_error($con));
				}
				else{
					$msg = array("success"=>"Sede creata");
				}
			}
			mysqli_close($con);
		}else{
			$msg = array("error"=>"Connessione al db non riuscita!");
		}
		echo json_encode($msg);
	}
?>