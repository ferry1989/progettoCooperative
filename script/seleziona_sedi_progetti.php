<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$id_sede = mysqli_real_escape_string($con, $filtri['id_sede']);
		$id_progetto = mysqli_real_escape_string($con, $filtri['id_progetto']);

		$selezionaRegioniProgetti = "SELECT * FROM sediprogetti sp JOIN sede s on sp.id_sede = s.id_sede JOIN progetto p on p.id_progetto = sp.id_progetto WHERE 1=1 ";
		if($id_sede != null && $id_sede != "" && $id_sede != "-1"){
			$selezionaRegioniProgetti .= "and sp.id_sede='$id_sede'";
		}
		if($id_progetto != null && $id_progetto != "" && $id_progetto != "-1"){
			$selezionaRegioniProgetti .= "and sp.id_progetto='$id_progetto'";
		}
		$result = mysqli_query($con,$selezionaRegioniProgetti);
		$msg = array();
		array_push($msg,array("fillForm"=>"select"));
		while($row = $result->fetch_assoc()) {
			$addSedeProgetto = array("id_sedeprogetto"=>$row["id_sedeprogetto"], "denominazione"=>$row["denominazione"], "titolo"=>$row["titolo"]);
			array_push($msg, $addSedeProgetto);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>