<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);

		if( !empty($filtri['fillForm']) ) {
			$fillForm = mysqli_real_escape_string($con, $filtri['fillForm']);
		}
		if( !empty($filtri['denominazione']) ) {
			$denominazione = mysqli_real_escape_string($con, $filtri['denominazione']);
		}
		if( !empty($filtri['codFisc']) ) {
			$codFisc = trim(mysqli_real_escape_string($con, $filtri['codFisc']));
		}
		if( !empty($filtri['email']) ) {
			$email = mysqli_real_escape_string($con, $filtri['email']);
		}
		if( !empty($filtri['pec']) ) {
			$pec = mysqli_real_escape_string($con, $filtri['pec']);
		}

		$selezionaEnti = "SELECT * FROM ente WHERE 1=1 ";
		
		if(!empty($denominazione)) {
			$selezionaEnti .= "and trim(nomeEnte) LIKE '%$denominazione%'";
		}
		if(!empty($codFisc)) {
			$selezionaEnti .= "and trim(codfis) LIKE '%$codFisc%'";
		}
		if(!empty($email)) {
			$selezionaEnti .= "and trim(email) LIKE '%$email%'";
		}
		if(!empty($pec)) {
			$selezionaEnti .= "and trim(pec) LIKE '%$pec%'";
		}

		$result = mysqli_query($con,$selezionaEnti);
		$msg = array();
		array_push($msg,array("fillForm"=>$fillForm));
		while($row = $result->fetch_assoc()) {
			$addEnte = array("id_ente"=>$row["id_ente"], "telefono"=>$row["telefono"], "nomeEnte"=>$row["nomeEnte"], "codfis"=>$row["codfis"], "tipo"=>$row["tipo"], "rapplegale"=>$row["rapplegale"], "cod"=>$row["cod"], "web"=>$row["web"], "email"=>$row["email"], "pec"=>$row["pec"], "fax"=>$row["fax"]);
			array_push($msg, $addEnte);
		}

		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>