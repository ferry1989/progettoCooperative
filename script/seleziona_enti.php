<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$id_ente = mysqli_real_escape_string($con, $filtri['id_ente']);
		$telefono = trim(mysqli_real_escape_string($con, $filtri['telefono']));
		$nomeEnte = mysqli_real_escape_string($con, $filtri['nomeEnte']);
		$id_regione = mysqli_real_escape_string($con, $filtri['id_regione']);
		$id_utente = mysqli_real_escape_string($con, $filtri['id_utente']);

		$selezionaEnti = "SELECT * FROM ente WHERE 1=1 ";
		if($id_ente != null && $id_ente != ""){
			$selezionaEnti .= "and id_ente='$id_ente'";
		}
		if($telefono != null && $telefono != ""){
			$selezionaEnti .= "and trim(telefono) LIKE '%$telefono%'";
		}
		if($nomeEnte != null && $nomeEnte != ""){
			$selezionaEnti .= "and trim(nomeEnte) LIKE '%$nomeEnte%'";
		}
		if($id_regione != null && $id_regione != ""){
			$selezionaEnti .= "and id_regione='$id_regione'";
		}
		if($id_utente != null && $id_utente != ""){
			$selezionaEnti .= "and id_utente='$id_utente'";
		}
		$result = mysqli_query($con,$selezionaEnti);
		$msg = array();
		while($row = $result->fetch_assoc()) {
			$addEnte = array("id_ente"=>$row["id_ente"], "telefono"=>$row["telefono"], "nomeEnte"=>$row["nomeEnte"], "id_regione"=>$row["id_regione"], "id_utente"=>$row["id_utente"]);
			array_push($msg, $addEnte);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>