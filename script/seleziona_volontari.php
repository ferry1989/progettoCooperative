<?php
	include_once '../config/db.php';
	session_start();
	$msg = "";
	$selezionaVolontari = "";
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
		$selezionaVolontari = "";
		if(!empty($_SESSION["id_ente"])){
			$selezionaVolontari = "select v.*, e.id_ente ".
									"from volontario v ".
									"join sediprogetti sp on sp.id_sedeprogetto = v.id_sedeprogetto ".
									"join progetto p on sp.id_progetto = p.id_progetto ".
									"join ente e on p.id_ente = e.id_ente WHERE 1=1 ".
									"and e.id_ente = ".$_SESSION["id_ente"]." ";
		}
		else{
			$selezionaVolontari = "select * from volontario v WHERE 1=1 ";
		}
		if( !empty($nome) ){
			$selezionaVolontari .= "and trim(v.nome) LIKE '%$nome%' ";
		}
		if( !empty($cognome) ){
			$selezionaVolontari .= "and trim(v.cognome) LIKE '%$cognome%' ";
		}
		if( !empty($stato) ) {
			$selezionaVolontari .= "and v.stato LIKE '%$stato%' ";
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