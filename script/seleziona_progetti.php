<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$type = mysqli_real_escape_string($con, $filtri['type']);
		$fillForm = mysqli_real_escape_string($con, $filtri['fillForm']);

		if($type == 'select') {
			$titolo = mysqli_real_escape_string($con, $filtri['titolo']);
			$id_ente = trim(mysqli_real_escape_string($con, $filtri['id_ente']));
			$settoreprevalente = trim(mysqli_real_escape_string($con, $filtri['settoreprevalente']));

			$selezionaProgetti = "SELECT * FROM progetto WHERE 1=1 ";
			if($titolo != null && $titolo != ""){
				$selezionaProgetti .= "and titolo LIKE '%$titolo%'";
			}
			if($id_ente != null && $id_ente != ""){
				$selezionaEnti .= "and trim(id_ente) LIKE '%$id_ente%'";
			}
			if($settoreprevalente != null && $settoreprevalente != ""){
				$selezionaEnti .= "and trim(settoreprevalente) LIKE '%$settoreprevalente%'";
			}
		}else{
			$selezionaEnti = "SELECT * FROM progetto WHERE 1=1 ";
		}

		$result = mysqli_query($con,$selezionaEnti);
		$msg = array();
		array_push($msg,array("fillForm"=>$fillForm));
		while($row = $result->fetch_assoc()) {
			$addProgetto = array("id_progetto"=>$row["id_progetto"], "settoreprevalente"=>$row["settoreprevalente"], "titolo"=>$row["titolo"], "id_ente"=>$row["id_ente"]);
			array_push($msg, $addProgetto);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>