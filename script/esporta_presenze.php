<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		
		$selezionaPresenze = "SELECT * FROM presenza WHERE 1=1 ";
		
		$dataOraInizio = new DateTime($_POST['dataorainizio']);
		$dataOraInizio = mysqli_real_escape_string($con,$dataOraInizio->format('Ymdhis'));
		$operatorDataInizio = trim(mysqli_real_escape_string($con, $_POST['operatorDataInizio']));
		$dataOraFine = new DateTime($_POST['dataorafine']);
		$dataOraFine = mysqli_real_escape_string($con,$dataOraFine->format('Ymdhis'));
		$operatorDataFine = mysqli_real_escape_string($con, $_POST['operatorDataFine']);
		$id_progetto = mysqli_real_escape_string($con, $_POST['id_progetto']);
		
		if($id_progetto != null && $id_progetto != '' && $id_progetto != '-1'){
			$selezionaPresenze .= " AND id_progetto = $id_progetto";
		}
		if($_POST['dataorainizio'] != null && $_POST['dataorainizio'] != ''){
			$selezionaPresenze .= " AND dataorainizio $operatorDataInizio '$dataOraInizio'";
		}
		if($_POST['dataorafine'] != null && $_POST['dataorafine'] != ''){
			$selezionaPresenze .= " AND dataorafine $operatorDataFine '$dataOraFine'";
		}
		
		$result = mysqli_query($con,$selezionaPresenze);
		$Content = "nome cognome;codice fiscale;Ore Permessi;Ore Permessi usu;Ore Permessi Donazioni Sangue;Ore Permessi Donazioni Sangue usu;Ore Permessi Studio;Ore Permessi Studio usu;Giorni Malattia;Giorni Malattia usu;Giorni Malattia non Retribuita;Giorni Malattia non Retribuita usu;Giorni Assenza per Servizio;Giorni Assenza per Servizio usu;Giorni Lutto;Giorni Lutto usu;Data Materintà;Giorni Infortunio;Compenso Mensile;IBAN\r\n";
		while($row = $result->fetch_assoc()) {
			$Content .= $row["nomecognome"].";".$row["cf"].";".$row["numpermessi"].";".$row["numpermessiusu"].";".$row["perdonazsang"].";".$row["perdonazsangusu"].";".$row["perstudio"].";".$row["perstudiousu"].";".$row["giornimalatt"].";".$row["giornimalattusu"].";".$row["malattnonretrib"].";".$row["malattnonretribusu"].";".$row["assenzaperservizio"].";".$row["assenzaperserviziousu"].";".$row["numgiornilutto"].";".$row["numgiorniluttousu"].";".$row["maternita"].";".$row["infortunio"].";".$row["compensomensile"].";".$row["IBAN"]."\r\n";
		}
		//$Content = $selezionaPresenze;
		mysqli_close($con);
		$FileName = "export-presenze-".date("d-m-y-h:i:s").".csv";
		header('Content-Type: application/csv'); 
		header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
		
	}
	else{
		$Content = "Connessione al db non riuscita!";
	}
	echo $Content;
	exit();
?>