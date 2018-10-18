<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$id_volontario = mysqli_real_escape_string($con, $filtri['id_volontario']);
		$id_progetto = mysqli_real_escape_string($con, $filtri['id_progetto']);

		$selezionaRegioniProgetti = "SELECT * FROM volontarioprogetto rp JOIN volontario r on rp.id_volontario = r.id_volontario JOIN progetto p on p.id_progetto = rp.id_progetto WHERE 1=1 ";
		if($id_volontario != null && $id_volontario != ""){
			$selezionaRegioniProgetti .= "and rp.id_volontario='$id_volontario'";
		}
		if($id_progetto != null && $id_progetto != ""){
			$selezionaRegioniProgetti .= "and rp.id_progetto='$id_progetto'";
		}
		$result = mysqli_query($con,$selezionaRegioniProgetti);
		$msg = array();
		while($row = $result->fetch_assoc()) {
			$addVolontario = array("id_volontario"=>$row["id_volontario"], "ragioneSociale"=>$row["ragioneSociale"], "piva"=>$row["piva"], "telefono"=>$row["telefono"], "id_utente"=>$row["id_utente"]);
			$addProgetto = array("id_progetto"=>$row["id_progetto"], "titolo"=>$row["titolo"]);
			$addVolontarioProgetto = array("volontario"=>$addVolontario ,"progetto"=>$addProgetto);
			array_push($msg, $addVolontarioProgetto);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>