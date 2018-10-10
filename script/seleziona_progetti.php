<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$id_progetto = mysqli_real_escape_string($con, $filtri['id_progetto']);
		$titolo = trim(mysqli_real_escape_string($con, $filtri['titolo']));

		$selezionaEnti = "SELECT * FROM progetto WHERE 1=1 ";
		if($id_progetto != null && $id_progetto != ""){
			$selezionaEnti .= "and id_progetto='$id_progetto'";
		}
		if($titolo != null && $titolo != ""){
			$selezionaEnti .= "and trim(titolo) LIKE '%$titolo%'";
		}
		$result = mysqli_query($con,$selezionaEnti);
		$msg = array();
		while($row = $result->fetch_assoc()) {
			$addProgetto = array("id_progetto"=>$row["id_progetto"], "titolo"=>$row["titolo"]);
			array_push($msg, $addProgetto);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>