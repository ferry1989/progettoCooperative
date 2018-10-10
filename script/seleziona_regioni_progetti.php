<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$id_regione = mysqli_real_escape_string($con, $filtri['id_regione']);
		$id_progetto = mysqli_real_escape_string($con, $filtri['id_progetto']);

		$selezionaRegioniProgetti = "SELECT * FROM regioneprogetto rp JOIN regione r on rp.id_regione = r.id_regione JOIN progetto p on p.id_progetto = rp.id_progetto WHERE 1=1 ";
		if($id_regione != null && $id_regione != ""){
			$selezionaRegioniProgetti .= "and rp.id_regione='$id_regione'";
		}
		if($id_progetto != null && $id_progetto != ""){
			$selezionaRegioniProgetti .= "and rp.id_progetto='$id_progetto'";
		}
		$result = mysqli_query($con,$selezionaRegioniProgetti);
		$msg = array();
		while($row = $result->fetch_assoc()) {
			$addRegione = array("id_regione"=>$row["id_regione"], "ragioneSociale"=>$row["ragioneSociale"], "piva"=>$row["piva"], "telefono"=>$row["telefono"], "id_utente"=>$row["id_utente"]);
			$addProgetto = array("id_progetto"=>$row["id_progetto"], "titolo"=>$row["titolo"]);
			$addRegioneProgetto = array("regione"=>$addRegione ,"progetto"=>$addProgetto);
			array_push($msg, $addRegioneProgetto);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>