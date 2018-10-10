<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$id_sede = mysqli_real_escape_string($con, $filtri['id_sede']);
		$id_ente = trim(mysqli_real_escape_string($con, $filtri['id_ente']));
		$indirizzo = trim(mysqli_real_escape_string($con, $filtri['indirizzo']));

		$selezionaSedi = "SELECT * FROM sede WHERE 1=1 ";
		if($id_sede != null && $id_sede != ""){
			$selezionaSedi .= "and id_sede='$id_sede'";
		}
		if($id_ente != null && $id_ente != ""){
			$selezionaSedi .= "and id_ente='$id_ente'";
		}
		if($indirizzo != null && $indirizzo != ""){
			$selezionaSedi .= "and trim(indirizzo) LIKE '%$indirizzo%'";
		}
		$result = mysqli_query($con,$selezionaSedi);
		$msg = array();
		while($row = $result->fetch_assoc()) {
			$addSede = array("id_sede"=>$row["id_sede"], "id_ente"=>$row["id_ente"], "indirizzo"=>$row["indirizzo"]);
			array_push($msg, $addSede);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>