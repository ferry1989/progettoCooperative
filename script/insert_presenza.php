<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$presenza = json_decode($foo, true);
			$dataOraInizio = trim(mysqli_real_escape_string($con, $presenza['dataOraInizio']));
			$dataOraFine = mysqli_real_escape_string($con, $presenza['dataOraFine']);
			$isApprovata = mysqli_real_escape_string($con, $presenza['isApprovata']);
			$id_volontario = mysqli_real_escape_string($con, $presenza['id_volontario']);
			$id_progetto = mysqli_real_escape_string($con, $presenza['id_progetto']);
			$numpermessi = mysqli_real_escape_string($con, $presenza['numpermessi']);
			$numpermessiusu = mysqli_real_escape_string($con, $presenza['numpermessiusu']);
			$perdonazsang = mysqli_real_escape_string($con, $presenza['perdonazsang']);
			$perdonazsangusu = mysqli_real_escape_string($con, $presenza['perdonazsangusu']);
			$perstudio = mysqli_real_escape_string($con, $presenza['perstudio']);
			$perstudiousu = mysqli_real_escape_string($con, $presenza['perstudiousu']);
			$giornimalatt = mysqli_real_escape_string($con, $presenza['giornimalatt']);
			$giornimalattusu = mysqli_real_escape_string($con, $presenza['giornimalattusu']);
			$malattnonretrib = mysqli_real_escape_string($con, $presenza['malattnonretrib']);
			$malattnonretribusu = mysqli_real_escape_string($con, $presenza['malattnonretribusu']);
			$assenzaperservizio = mysqli_real_escape_string($con, $presenza['assenzaperservizio']);
			$assenzaperserviziousu = mysqli_real_escape_string($con, $presenza['assenzaperserviziousu']);
			$numgiornilutto = mysqli_real_escape_string($con, $presenza['numgiornilutto']);
			$numgiorniluttousu = mysqli_real_escape_string($con, $presenza['numgiorniluttousu']);
			$maternita = mysqli_real_escape_string($con, $presenza['maternita']);
			$infortunio = mysqli_real_escape_string($con, $presenza['infortunio']);
			$compensomensile = mysqli_real_escape_string($con, $presenza['compensomensile']);
			
			
			$verificaVolontario = "SELECT * FROM volontario where id_volontario='$id_volontario'";
			$result = mysqli_query($con,$verificaVolontario);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Volontario non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			else{
				$row = $result->fetch_assoc();
				$nomecognome = $row['nome'].' '.$row['cognome'];
				$cf = $row['codFiscale'];
				$iban = $row['codiceiban'];
			}
			
			$verificaProgetto = "SELECT id_progetto FROM progetto where id_progetto='$id_progetto'";
			$result = mysqli_query($con,$verificaProgetto);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Progetto non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			else{
				$insertpresenza = "INSERT INTO presenza (IBAN, cf, nomecognome, dataOraInizio, dataOraFine, isApprovata, id_volontario, id_progetto, numpermessi, numpermessiusu, perdonazsang, perdonazsangusu, perstudio, perstudiousu, giornimalatt, giornimalattusu, malattnonretrib, malattnonretribusu, assenzaperservizio, assenzaperserviziousu, numgiornilutto, numgiorniluttousu, maternita, infortunio, compensomensile) VALUES ('$iban', '$cf', '$nomecognome', '2018-01-01', '2018-01-01', false, '$id_volontario', '$id_progetto',  '$numpermessi', '$numpermessiusu', '$perdonazsang', '$perdonazsangusu', '$perstudio', '$perstudiousu', '$giornimalatt', '$giornimalattusu', '$malattnonretrib', '$malattnonretribusu', '$assenzaperservizio', '$assenzaperserviziousu', '$numgiornilutto', '$numgiorniluttousu', '2018-01-01', '$infortunio', '$compensomensile')";
				if (!mysqli_query($con,$insertpresenza)) {
					$msg = array("error"=>mysqli_error($con));
				}
				else{
					$msg = array("success"=>"presenza creata");
				}
			}
			mysqli_close($con);
		}
		else{
			$msg = array("error"=>"Connessione al db non riuscita!");
		}
		echo json_encode($msg);
	}
?>