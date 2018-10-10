<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$id_presenza = mysqli_real_escape_string($con, $filtri['id_presenza']);
		$operatorDataInizio = trim(mysqli_real_escape_string($con, $filtri['operatorDataInizio']));
		$dataOraInizio = mysqli_real_escape_string($con, $filtri['dataOraInizio']);
		$operatorDataFine = mysqli_real_escape_string($con, $filtri['operatorDataFine']);
		$dataOraFine = mysqli_real_escape_string($con, $filtri['dataOraFine']);
		$isApprovata = mysqli_real_escape_string($con, $filtri['isApprovata']);
		$id_volontario = mysqli_real_escape_string($con, $filtri['id_volontario']);
		$id_progetto = mysqli_real_escape_string($con, $filtri['id_progetto']);

		$selezionaPresenze = "SELECT * FROM presenza WHERE 1=1 ";
		if($id_presenza != null && $id_presenza != ""){
			$selezionaPresenze .= "and id_presenza='$id_presenza'";
		}
		if($dataOraInizio != null && $dataOraInizio != ""){
			$selezionaPresenze .= "and dataOraInizio $operatorDataInizio '$dataOraInizio'";
		}
		if($dataOraFine != null && $dataOraFine != ""){
			$selezionaPresenze .= "and dataOraFine $operatorDataFine '$dataOraFine'";
		}
		if($isApprovata != null && $isApprovata != ""){
			$selezionaPresenze .= "and isApprovata='$isApprovata'";
		}
		if($id_volontario != null && $id_volontario != ""){
			$selezionaPresenze .= "and id_volontario='$id_volontario'";
		}
		if($id_progetto != null && $id_progetto != ""){
			$selezionaPresenze .= "and id_progetto='$id_progetto'";
		}
		$result = mysqli_query($con,$selezionaPresenze);
		$msg = array();
		while($row = $result->fetch_assoc()) {
			$addPresenza = array("id_presenza"=>$row["id_presenza"], "dataOraInizio"=>$row["dataOraInizio"], "dataOraFine"=>$row["dataOraFine"], "isApprovata"=>$row["isApprovata"], "id_volontario"=>$row["id_volontario"], "id_progetto"=>$row["id_progetto"]);
			array_push($msg, $addPresenza);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>