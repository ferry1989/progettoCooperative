<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$type = mysqli_real_escape_string($con, $filtri['type']);
		$fillForm = mysqli_real_escape_string($con, $filtri['fillForm']);

		if($type == 'select') {
			$denominazione = mysqli_real_escape_string($con, $filtri['denominazione']);
			$codFisc = trim(mysqli_real_escape_string($con, $filtri['codFisc']));
			$email = mysqli_real_escape_string($con, $filtri['email']);
			$pec = mysqli_real_escape_string($con, $filtri['pec']);
	
			$selezionaEnti = "SELECT * FROM ente WHERE 1=1 ";
			
			if($denominazione != null && $denominazione != ""){
				$selezionaEnti .= "and trim(nomeEnte) LIKE '%$denominazione%'";
			}
			if($codFisc != null && $codFisc != ""){
				$selezionaEnti .= "and trim(codfis) LIKE '%$codFisc%'";
			}
			if($email != null && $email != ""){
				$selezionaEnti .= "and trim(email) LIKE '%$email%'";
			}
			if($pec != null && $pec != ""){
				$selezionaEnti .= "and trim(pec) LIKE '%$pec%'";
			}
		}else{
			$selezionaEnti = "SELECT * FROM ente WHERE 1=1 ";
		}

		$result = mysqli_query($con,$selezionaEnti);
		$msg = array();
		array_push($msg,array("fillForm"=>$fillForm));
		while($row = $result->fetch_assoc()) {
			$addEnte = array("id_ente"=>$row["id_ente"], "telefono"=>$row["telefono"], "nomeEnte"=>$row["nomeEnte"], "id_regione"=>$row["id_regione"], "id_utente"=>$row["id_utente"], "codfis"=>$row["codfis"], "tipo"=>$row["tipo"], "rapplegale"=>$row["rapplegale"], "cod"=>$row["cod"], "web"=>$row["web"], "email"=>$row["email"], "pec"=>$row["pec"], "fax"=>$row["fax"]);
			array_push($msg, $addEnte);
		}

		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>