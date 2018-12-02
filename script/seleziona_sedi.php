<?php
	include_once '../config/db.php';
	session_start();
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$selezionaSedi = "SELECT * FROM sede WHERE 1=1 ";

		$type = mysqli_real_escape_string($con, $filtri['type']);
		$fillForm = mysqli_real_escape_string($con, $filtri['fillForm']);
		$id_sede = mysqli_real_escape_string($con, $filtri['id_sede']);
		$id_ente = trim(mysqli_real_escape_string($con, $filtri['id_ente']));
		$indirizzo = trim(mysqli_real_escape_string($con, $filtri['indirizzo']));
		if($id_sede != null && $id_sede != ""){
			$selezionaSedi .= "and id_sede='$id_sede'";
		}
		if(!empty($_SESSION["id_ente"])){
			$selezionaSedi .= "and id_ente = ".$_SESSION["id_ente"];
		}
		if($id_ente != null && $id_ente != ""){
			$selezionaSedi .= "and id_ente='$id_ente'";
		}
		if($indirizzo != null && $indirizzo != ""){
			$selezionaSedi .= "and trim(indirizzo) LIKE '%$indirizzo%'";
		}
    if( !empty($filtri['denominazione']) ) {
			$denominazione = mysqli_real_escape_string($con, $filtri['denominazione']);
		}
    if(!empty($denominazione)) {
		  $selezionaSedi .= "and denominazione LIKE '%$denominazione%'";
    }
    if( !empty($filtri['fillForm']) ) {
			$fillForm = mysqli_real_escape_string($con, $filtri['fillForm']);
		}

		$result = mysqli_query($con,$selezionaSedi);
		$msg = array();
		array_push($msg,array("fillForm"=>$fillForm));
		while($row = $result->fetch_assoc()) {
			$addSede = array("id_sede"=>$row["id_sede"], "id_ente"=>$row["id_ente"], "indirizzo"=>$row["indirizzo"], "denominazione"=>$row["denominazione"], "numvolontari"=>$row["numvolontari"], "provincia"=>$row["provincia"], "comune"=>$row["comune"], "numcivico"=>$row["numcivico"], "capsede"=>$row["capsede"], "telefono"=>$row["telefono"], "fax"=>$row["fax"], "titologiuridico"=>$row["titologiuridico"], "sitoweb"=>$row["sitoweb"], "emailordinaria"=>$row["emailordinaria"]);
			array_push($msg, $addSede);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo  json_encode($msg);
?>