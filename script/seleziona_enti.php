<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$denominazione = mysqli_real_escape_string($con, $filtri['denominazione']);
		$codFisc = trim(mysqli_real_escape_string($con, $filtri['codFisc']));
		$email = mysqli_real_escape_string($con, $filtri['email']);
		$id_regione = mysqli_real_escape_string($con, $filtri['id_regione']);
		$id_utente = mysqli_real_escape_string($con, $filtri['id_utente']);

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
		$result = mysqli_query($con,$selezionaEnti);
		$msg = array();
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