<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		
		$selezionaPresenze = "select nome,cognome,codFiscale,totalePermessi,compenso,costoassenza,costoassenza*totalePermessi as costoTotaleAssenze,compenso-(costoassenza*totalePermessi) as retribuzioneNetta ".
							"	from ( ".
							"	select ".
							"	v.nome, ".
							"	v.cognome, ".
							"	v.codFiscale, ".
							"	sum(p.numpermessi) + ".
							"	sum(p.numpermessiusu) + ".
							"	sum(p.perdonazsang) + ".
							"	sum(p.perdonazsangusu) + ".
							"	sum(p.perstudio) + ".
							"	sum(p.perstudiousu) + ".
							"	sum(p.giornimalatt) + ".
							"	sum(p.giornimalattusu) + ".
							"	sum(p.malattnonretrib) + ".
							"	sum(p.malattnonretribusu) + ".
							"	sum(p.assenzaperservizio) + ".
							"	sum(p.assenzaperserviziousu) + ".
							"	sum(p.numgiornilutto) + ".
							"	sum(p.numgiorniluttousu) as totalePermessi, ".
							"	c.compenso, ".
							"	c.costoassenza ".
							"	from presenza p ".
							"	join volontario v on p.id_volontario = v.id_volontario ".
							"	join contratto c on c.id_contratto = v.id_contratto ".
							"	where MONTH(p.dataOraInizio) = (MONTH(CURRENT_DATE()) - 1)  ".
							"	group by v.id_volontario ".
							"	) as a ";

		
		$result = mysqli_query($con,$selezionaPresenze);
		$Content = "nome cognome;codice fiscale;totale ore permessi;compenso mensile;costo orario assenza; costo totale assenza; compenso netto\r\n";
		while($row = $result->fetch_assoc()) {
			$Content .= $row["nome"]. " ".$row["cognome"].";".$row["codFiscale"].";".$row["totalePermessi"].";".$row["compenso"].";".$row["costoassenza"].";".$row["costoTotaleAssenze"].";".$row["retribuzioneNetta"]."\r\n";
		}
		//$Content = $selezionaPresenze;
		mysqli_close($con);
		$FileName = "export-presenze-riepilogo".date("d-m-y-h:i:s").".csv";
		header('Content-Type: application/csv'); 
		header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
		
	}
	else{
		$Content = "Connessione al db non riuscita!";
	}
	echo $Content;
	exit();
?>