<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$volontario = json_decode($foo, true);
			$nome = trim(mysqli_real_escape_string($con, $volontario['nome']));
			$cognome = mysqli_real_escape_string($con, $volontario['cognome']);
			$codFiscale = mysqli_real_escape_string($con, $volontario['codFiscale']);
			$sesso = mysqli_real_escape_string($con, $volontario['sesso']);
			$titolodistudio = mysqli_real_escape_string($con, $volontario['titolostudio']);
			$stato = mysqli_real_escape_string($con, $volontario['stato']);
			$nomeolp = mysqli_real_escape_string($con, $volontario['nomeolp']);
			$cognomeolp = mysqli_real_escape_string($con, $volontario['cognomeolp']);
			$codiceiban = mysqli_real_escape_string($con, $volontario['codiceiban']);
			$provincianazionenascita = mysqli_real_escape_string($con, $volontario['provincianazionenascita']);
			$esteronasc = mysqli_real_escape_string($con, $volontario['esteronasc']);
			$comuneesteronascita = mysqli_real_escape_string($con, $volontario['comuneesteronascita']);
			$provincianazioneresidenza = mysqli_real_escape_string($con, $volontario['provincianazioneresidenza']);
			$esterores = mysqli_real_escape_string($con, $volontario['esterores']);
			$comuneesteroresidenta = mysqli_real_escape_string($con, $volontario['comuneesteroresidenta']);
			$indirizzoresidenza = mysqli_real_escape_string($con, $volontario['indirizzoresidenza']);
			$numcivicoresidenza = mysqli_real_escape_string($con, $volontario['numcivicoresidenza']);
			$capresidenza = mysqli_real_escape_string($con, $volontario['capresidenza']);
			$provinciadomicilio = mysqli_real_escape_string($con, $volontario['provinciadomicilio']);
			$comunedomicilio = mysqli_real_escape_string($con, $volontario['comunedomicilio']);
			$indirizzodomicilio = mysqli_real_escape_string($con, $volontario['indirizzodomicilio']);
			$id_sedeprogetto = mysqli_real_escape_string($con, $volontario['id_sedeprogetto']);
			$numcivicodomic = mysqli_real_escape_string($con, $volontario['numcivicodomic']);
			$capdomic = mysqli_real_escape_string($con, $volontario['capdomic']);

			$verificaVolontario = "SELECT codFiscale FROM volontario where codFiscale='$codFiscale'";
			$result = mysqli_query($con,$verificaVolontario);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"Volontario già creato!");
			}else{
				$insertvolontario = "INSERT INTO volontario (nome,cognome,codFiscale,sesso,titolodistudio,stato,nomeolp,cognomeolp,codiceiban,provincianazionenascita,esteronasc,comuneesteronascita,provincianazioneresidenza,esterores,comuneesteroresidenta,indirizzoresidenza,numcivicoresidenza,capresidenza,provinciadomicilio,comunedomicilio,indirizzodomicilio,giornidiservizio,id_sedeprogetto,numcivicodomic,capdomic) VALUES ('$nome','$cognome','$codFiscale','$sesso','$titolodistudio','$stato','$nomeolp','$cognomeolp','$codiceiban','$provincianazionenascita','$esterores','$comuneesteronascita','$provincianazioneresidenza','$esterores','$comuneesteroresidenta','$indirizzoresidenza','$numcivicoresidenza','$capresidenza','$provinciadomicilio','$comunedomicilio','$indirizzodomicilio','0','$id_sedeprogetto','$numcivicodomic','$capdomic')";
				if (!mysqli_query($con,$insertvolontario)) {
						$msg = array("error"=>mysqli_error($con));
					}else{
						$msg = array("success"=>"Volontario creato");
					}
				}
			}
			mysqli_close($con);
		}else{
			$msg = array("error"=>"Connessione al db non riuscita!");
		}
		echo json_encode($msg);
?>