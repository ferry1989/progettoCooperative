<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$presenza = json_decode($foo, true);
			$dataOraInizio = new DateTime($presenza['dataorainizio']);
			$dataOraInizio = mysqli_real_escape_string($con,$dataOraInizio->format('Ymdhis'));
			$dataOraFine = new DateTime($presenza['dataorafine']);
			$dataOraFine = mysqli_real_escape_string($con,$dataOraFine->format('Ymdhis'));
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
			$maternita = new DateTime($presenza['maternita']);
			$maternita = mysqli_real_escape_string($con,$maternita->format('Ymdhis'));
			$infortunio = mysqli_real_escape_string($con, $presenza['infortunio']);
	
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
				$insertpresenza = "INSERT INTO presenza (IBAN, cf, nomecognome, dataOraInizio, dataOraFine, isApprovata, id_volontario, id_progetto, numpermessi, numpermessiusu, perdonazsang, perdonazsangusu, perstudio, perstudiousu, giornimalatt, giornimalattusu, malattnonretrib, malattnonretribusu, assenzaperservizio, assenzaperserviziousu, numgiornilutto, numgiorniluttousu, maternita, infortunio) VALUES ('$iban', '$cf', '$nomecognome', '$dataOraInizio', '$dataOraFine', false, '$id_volontario', '$id_progetto',  '$numpermessi', '$numpermessiusu', '$perdonazsang', '$perdonazsangusu', '$perstudio', '$perstudiousu', '$giornimalatt', '$giornimalattusu', '$malattnonretrib', '$malattnonretribusu', '$assenzaperservizio', '$assenzaperserviziousu', '$numgiornilutto', '$numgiorniluttousu', '$maternita', '$infortunio')";
				if (!mysqli_query($con,$insertpresenza)) {
					$msg = array("error"=>mysqli_error($con));
				}
				else{	
					$verificaPresenzeLimite = 	"SELECT ".
												"v.stato, ".
												"CASE WHEN (sum(p.numpermessi) + sum(p.numpermessiusu)) >= c.numpermessi THEN 1 ELSE 0 END as limitenumpermessi, ".
												"CASE WHEN (sum(p.perdonazsang) + sum(p.perdonazsangusu)) >= c.perdonazsang THEN 1 ELSE 0 END as limiteperdonazsang, ".
												"CASE WHEN (sum(p.perstudio) + sum(p.perstudiousu)) >= c.perstudio THEN 1 ELSE 0 END as limiteperstudio, ".
												"CASE WHEN (sum(p.giornimalatt) + sum(p.giornimalattusu)) >= c.giornimalatt THEN 1 ELSE 0 END as limitegiornimalatt, ".
												"CASE WHEN (sum(p.assenzaperservizio) + sum(p.assenzaperserviziousu)) >= c.assenzaperservizio THEN 1 ELSE 0 END as limiteassenzaperservizio, ".
												"CASE WHEN (sum(p.numgiornilutto) + sum(p.numgiorniluttousu)) >= c.numgiornilutto THEN 1 ELSE 0 END as limitenumgiornilutto, ".
												"CASE WHEN sum(p.infortunio) >= c.infortunio THEN 1 ELSE 0 END as limiteinfortunio ".
												"FROM presenza p ".
												"join volontario v on p.id_volontario = v.id_volontario ".
												"join contratto c on c.id_contratto = v.id_contratto ".
												"WHERE p.id_volontario = $id_volontario  ".
												"GROUP BY p.id_volontario, c.id_contratto ";
					$result = mysqli_query($con,$verificaPresenzeLimite);
					if ($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						if($row['stato'] == 'Attivo'){
							if($row['limitenumpermessi'] == '1' || $row['limiteperdonazsang'] == '1' || $row['limiteperstudio'] == '1' || $row['limitegiornimalatt'] == '1' || $row['limiteassenzaperservizio'] == '1' || $row['limitenumgiornilutto'] == '1' || $row['limiteinfortunio'] == '1'){
								$updateVolontario = "UPDATE volontario SET stato='Ritirato' WHERE id_volontario = $id_volontario ";
								if (!mysqli_query($con,$updateVolontario)) {
									$msg = array("error"=>mysqli_error($con));
								}
								else{
									$msg = array("success"=>"presenza creata. Utente Rititaro per limite assenze superato");
								}
							}
							else{
								$msg = array("success"=>"presenza creata");
							}
						}
						else{
							$msg = array("success"=>"presenza creata");
						}
					}
					else{
						$msg = array("success"=>"presenza creata");
					}
			
			
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