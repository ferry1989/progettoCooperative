<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$id_regione = mysqli_real_escape_string($con, $filtri['id_regione']);
		$ragioneSociale = mysqli_real_escape_string($con, $filtri['ragioneSociale']);
		$piva = mysqli_real_escape_string($con, $filtri['piva']);
		$telefono = mysqli_real_escape_string($con, $filtri['telefono']);
		$id_utente = mysqli_real_escape_string($con, $filtri['id_utente']);

		$selezionaRegioni = "SELECT * FROM regione WHERE 1=1 ";
		if($id_regione != null && $id_regione != ""){
			$selezionaRegioni .= "and id_regione='$id_regione'";
		}
		if($ragioneSociale != null && $ragioneSociale != ""){
			$selezionaRegioni .= "and trim(ragioneSociale) LIKE '%$ragioneSociale%'";
		}
		if($piva != null && $piva != ""){
			$selezionaRegioni .= "and trim(piva) LIKE '%$piva%'";
		}
		if($telefono != null && $telefono != ""){
			$selezionaRegioni .= "and trim(tel) LIKE '%$telefono%'";
		}
		if($id_utente != null && $id_utente != ""){
			$selezionaRegioni .= "and id_utente='$id_utente'";
		}
		$result = mysqli_query($con,$selezionaRegioni);
		$msg = array();
		while($row = $result->fetch_assoc()) {
			$addRegione = array("id_regione"=>$row["id_regione"], "ragioneSociale"=>$row["ragioneSociale"], "piva"=>$row["piva"], "telefono"=>$row["telefono"], "id_utente"=>$row["id_utente"]);
			array_push($msg, $addRegione);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>