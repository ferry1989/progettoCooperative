<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$volontario = json_decode($foo, true);
		$idVolontario = mysqli_real_escape_string($con, $volontario['id_volontario']);
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
		$id_contratto = mysqli_real_escape_string($con, $volontario['id_contratto']);
		
		$verificaVolontario = "SELECT id_volontario FROM volontario where id_volontario='$idVolontario'";
		$result = mysqli_query($con,$verificaVolontario);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Volontario non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updateVolontario = "update volontario set nome = '$nome', cognome = '$cognome', sesso = '$sesso', titolostudio = '$titolostudio', stato = '$stato', nomeolp = '$nomeolp', cognomeolp = '$cognomeolp', codiceiban = '$codiceiban', provincianazionenascita = '$provincianazionenascita', esteronasc = '$esteronasc', comuneesteronascita = '$comuneesteronascita', comuneesteronascita = '$comuneesteronascita', provincianazioneresidenza = '$provincianazioneresidenza', esteronasc = '$esteronasc', comuneesteronascita = '$comuneesteronascita', esterores = '$esterores', comuneesteroresidenta = '$comuneesteroresidenta', indirizzoresidenza = '$indirizzoresidenza', numcivicoresidenza = '$numcivicoresidenza', capresidenza = '$capresidenza', provinciadomicilio = '$provinciadomicilio', comunedomicilio = '$comunedomicilio', indirizzodomicilio = '$indirizzodomicilio', id_sedeprogetto = '$id_sedeprogetto', numcivicodomic = '$numcivicodomic', capdomic = '$capdomic', id_contratto = '$id_contratto' where id_volontario = '$idVolontario'";
			if (!mysqli_query($con,$updateVolontario)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Volontario aggiornato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>