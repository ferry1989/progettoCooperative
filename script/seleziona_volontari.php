<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$type = mysqli_real_escape_string($con, $filtri['type']);
		$fillForm = mysqli_real_escape_string($con, $filtri['fillForm']);

		if($type == 'select') {
			$id_volontario = mysqli_real_escape_string($con, $filtri['id_volontario']);
			$nome = trim(mysqli_real_escape_string($con, $filtri['nome']));
			$cognome = trim(mysqli_real_escape_string($con, $filtri['cognome']));
			$operatorDataNascita = trim(mysqli_real_escape_string($con, $filtri['operatorDataNascita']));
			$dataNascita = trim(mysqli_real_escape_string($con, $filtri['dataNascita']));
			$codFiscale = trim(mysqli_real_escape_string($con, $filtri['codFiscale']));
			$id_ente = trim(mysqli_real_escape_string($con, $filtri['id_ente']));

			$selezionaVolontari = "select v.*, e.id_ente ".
									"from volontario v ".
									"join progetto p on v.id_progetto = p.id_progetto ".
									"join ente e on p.id_ente = e.id_ente WHERE 1=1 ";
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
			if($_SESSION["id_ente"] != null && $_SESSION["id_ente"] != ""){
				$selezionaVolontari .= "and e.id_ente = ".$_SESSION["id_ente"];
			}
		}else{
			$selezionaVolontari = "SELECT * FROM volontario WHERE 1=1 ";
		}

		$result = mysqli_query($con,$selezionaVolontari);
		$msg = array();
		array_push($msg,array("fillForm"=>$fillForm));
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