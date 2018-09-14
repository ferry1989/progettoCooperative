<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$regione = json_decode($foo, true);
			$id_utente = mysqli_real_escape_string($con, $regione['id_utente']);
			$ragioneSociale = mysqli_real_escape_string($con, $regione['ragioneSociale']);
			$piva = mysqli_real_escape_string($con, $regione['piva']);
			$tel = mysqli_real_escape_string($con, $regione['tel']);
			
			$verificaUtente = "SELECT id_utente FROM utente where id_utente='$id_utente'";
			$result = mysqli_query($con,$verificaUtente);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Utente non esistente!");
			}
			
			else{
				$insertregione = "INSERT INTO regione (id_utente, ragioneSociale, piva, tel) VALUES ('$id_utente', '$ragioneSociale', '$piva', '$tel')";
				if (!mysqli_query($con,$insertregione)) {
					$msg = array("error"=>mysqli_error($con));
				}
				else{
					$msg = array("success"=>"regione creata");
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