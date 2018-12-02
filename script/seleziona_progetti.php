<?php
	include_once '../config/db.php';
	session_start();
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		if( !empty($filtri['fillForm']) ) {
			$fillForm = mysqli_real_escape_string($con, $filtri['fillForm']);
		}
		if( !empty($filtri['titolo']) ) {
			$titolo = mysqli_real_escape_string($con, $filtri['titolo']);
		}
		if( !empty($filtri['id_ente']) ) {
			$id_ente = trim(mysqli_real_escape_string($con, $filtri['id_ente']));
		}
		if( !empty($filtri['settoreprevalente']) ) {
			$settoreprevalente = trim(mysqli_real_escape_string($con, $filtri['settoreprevalente']));
		}

		$selezionaProgetti = "SELECT * FROM progetto WHERE 1=1 ";
		if(!empty($titolo)) {
			$selezionaProgetti .= "and titolo LIKE '%$titolo%'";
		}
		if(!empty($id_ente)) {
			$selezionaProgetti .= "and id_ente = ".$id_ente;
		}
		if(!empty($settoreprevalente)) {
			$selezionaProgetti .= "and trim(settoreprevalente) LIKE '%$settoreprevalente%'";
		}
		if(!empty($_SESSION["id_ente"])){
			$selezionaProgetti .= "and id_ente = ".$_SESSION["id_ente"]." ";
		}

		$result = mysqli_query($con,$selezionaProgetti);
		$msg = array();
		array_push($msg,array("fillForm"=>$fillForm));
		while($row = $result->fetch_assoc()) {
			$addProgetto = array("id_progetto"=>$row["id_progetto"], "titolo"=>$row["titolo"], "annobando"=>$row["annobando"],"id_ente"=>$row["id_ente"], "settoreprevalente"=>$row["settoreprevalente"], "altrosettore"=>$row["altrosettore"], "sedidiattuazione"=>$row["sedidiattuazione"], "numerovolontari"=>$row["numerovolontari"], "numgiornidiservizio"=>$row["numgiornidiservizio"], "nhorestettiman"=>$row["nhorestettiman"], "24sett"=>$row["24sett"], "28sett"=>$row["28sett"], "36sett"=>$row["36sett"]);
			array_push($msg, $addProgetto);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>