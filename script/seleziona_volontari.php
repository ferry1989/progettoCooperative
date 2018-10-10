<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$id_volontario = mysqli_real_escape_string($con, $filtri['id_volontario']);
		$nome = trim(mysqli_real_escape_string($con, $filtri['nome']));
		$cognome = trim(mysqli_real_escape_string($con, $filtri['cognome']));
		$operatorDataNascita = trim(mysqli_real_escape_string($con, $filtri['operatorDataNascita']));
		$dataNascita = trim(mysqli_real_escape_string($con, $filtri['dataNascita']));
		$codFiscale = trim(mysqli_real_escape_string($con, $filtri['codFiscale']));
		$id_ente = trim(mysqli_real_escape_string($con, $filtri['id_ente']));

		$selezionaVolontari = "SELECT * FROM volontario WHERE 1=1 ";
		if($id_volontario != null && $id_volontario != ""){
			$selezionaVolontari .= "and id_volontario='$id_volontario'";
		}
		if($nome != null && $nome != ""){
			$selezionaVolontari .= "and trim(nome) LIKE '%$nome%'";
		}
		if($cognome != null && $cognome != ""){
			$selezionaVolontari .= "and trim(cognome) LIKE '%$cognome%'";
		}
		if($dataNascita != null && $dataNascita != ""){
			$selezionaVolontari .= "and dataNascita $operatorDataNascita '$dataNascita'";
		}
		if($codFiscale != null && $codFiscale != ""){
			$selezionaVolontari .= "and trim(codFiscale) LIKE '%$codFiscale%'";
		}
		if($id_ente != null && $id_ente != ""){
			$selezionaVolontari .= "and id_ente='$id_ente'";
		}
		$result = mysqli_query($con,$selezionaVolontari);
		$msg = array();
		while($row = $result->fetch_assoc()) {
			$addVolontario = array("id_volontario"=>$row["id_volontario"], "nome"=>$row["nome"], "cognome"=>$row["cognome"], "dataNascita"=>$row["dataNascita"], "codFiscale"=>$row["codFiscale"], "id_ente"=>$row["id_ente"]);
			array_push($msg, $addVolontario);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>