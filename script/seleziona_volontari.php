<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);

		
		if( !empty($filtri['fillForm']) ) {
			$fillForm = mysqli_real_escape_string($con, $filtri['fillForm']);
		}
		if( !empty($filtri['nome']) ) {
			$nome = trim(mysqli_real_escape_string($con, $filtri['nome']));
		}
		if( !empty($filtri['cognome']) ) {
			$cognome = trim(mysqli_real_escape_string($con, $filtri['cognome']));
		}
		if( !empty($filtri['stato']) ) {
			$stato = trim(mysqli_real_escape_string($con, $filtri['stato']));
		}

		$selezionaVolontari = "select v.*, e.id_ente ".
								"from volontario v ".
								"join progetto p on v.id_progetto = p.id_progetto ".
								"join ente e on p.id_ente = e.id_ente WHERE 1=1 ";

		if( !empty($nome) ) {
			$selezionaVolontari .= "and trim(nome) LIKE '%$nome%'";
		}
		if( !empty($cognome) ) {
			$selezionaVolontari .= "and trim(cognome) LIKE '%$cognome%'";
		}
		if( !empty($stato) ) {
			$selezionaVolontari .= "and stato LIKE '%$stato%'";
		}

		$result = mysqli_query($con,$selezionaVolontari);
		$msg = array();
		array_push($msg,array("fillForm"=>$fillForm));
		while($row = $result->fetch_assoc()) {
			$addVolontario = array("id_volontario"=>$row["id_volontario"], "nome"=>$row["nome"], "cognome"=>$row["cognome"], "codFiscale"=>$row["codFiscale"], "sesso"=>$row["sesso"], "titolodistudio"=>$row["titolodistudio"], "stato"=>$row["stato"], "giornidiservizio"=>$row["giornidiservizio"], "nomeolp"=>$row["nomeolp"], "cognomeolp"=>$row["cognomeolp"], "codiceiban"=>$row["codiceiban"], "provincianazionenascita"=>$row["provincianazionenascita"], "esteronasc"=>$row["esteronasc"], "comuneesteronascita"=>$row["comuneesteronascita"], "provincianazioneresidenza"=>$row["provincianazioneresidenza"], "esterores"=>$row["esterores"], "comuneesteroresidenta"=>$row["comuneesteroresidenta"], "indirizzoresidenza"=>$row["indirizzoresidenza"], "numcivicoresidenza"=>$row["numcivicoresidenza"], "capresidenza"=>$row["capresidenza"], "provinciadomicilio"=>$row["provinciadomicilio"], "comunedomicilio"=>$row["comunedomicilio"], "indirizzodomicilio"=>$row["indirizzodomicilio"], "id_sedeprogetto"=>$row["id_sedeprogetto"], "numcivicodomic"=>$row["numcivicodomic"], "capdomic"=>$row["capdomic"], "id_contratto"=>$row["id_contratto"]);
			array_push($msg, $addVolontario);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>