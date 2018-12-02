<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$sede = json_decode($foo, true);
		$id_sede = mysqli_real_escape_string($con, $sede['id_sede']);
		$indirizzo = trim(mysqli_real_escape_string($con, $sede['indirizzo']));
		$id_ente = mysqli_real_escape_string($con, $sede['id_ente']);
		$denominazione = mysqli_real_escape_string($con, $sede['denominazione']);
		$provincia = mysqli_real_escape_string($con, $sede['provincia']);
		$comune = mysqli_real_escape_string($con, $sede['comune']);
		$numcivico = mysqli_real_escape_string($con, $sede['numcivico']);
		$capsede = mysqli_real_escape_string($con, $sede['capsede']);
		$telefono = mysqli_real_escape_string($con, $sede['telefono']);
		$fax = mysqli_real_escape_string($con, $sede['fax']);
		$titologiuridico = mysqli_real_escape_string($con, $sede['titologiuridico']);
		$sitoweb = mysqli_real_escape_string($con, $sede['sitoweb']);
		$emailordinaria = mysqli_real_escape_string($con, $sede['emailordinaria']);
		
		$verificaSede = "SELECT id_sede FROM sede where id_sede='$id_sede'";
		$result = mysqli_query($con,$verificaSede);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Sede non trovata!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updateSede = "update sede set indirizzo = '$indirizzo', id_ente = '$id_ente', denominazione = '$denominazione', provincia = '$provincia', comune = '$comune', numcivico = '$numcivico', capsede = '$capsede', telefono = '$telefono', fax = '$fax', titologiuridico = '$titologiuridico', sitoweb = '$sitoweb', emailordinaria = '$emailordinaria' where id_sede = '$id_sede'";
			if (!mysqli_query($con,$updateSede)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Sede aggiornata");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>