<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$ente = json_decode($foo, true);
			$nomeEnte = trim(mysqli_real_escape_string($con, $ente['nomeEnte']));
			$telefono = mysqli_real_escape_string($con, $ente['telefono']);
			$id_regione = mysqli_real_escape_string($con, $ente['id_regione']);
			$id_utente = mysqli_real_escape_string($con, $ente['id_utente']);
			$codfis = mysqli_real_escape_string($con, $ente['codfis']);
			$tipo = mysqli_real_escape_string($con, $ente['tipo']);
			$rapplegale = mysqli_real_escape_string($con, $ente['rapplegale']);
			$cod = mysqli_real_escape_string($con, $ente['cod']);
			$web = mysqli_real_escape_string($con, $ente['web']);
			$email = mysqli_real_escape_string($con, $ente['email']);
			$pec = mysqli_real_escape_string($con, $ente['pec']);
			$fax = mysqli_real_escape_string($con, $ente['fax']);	
			
			$verificaEnte = "SELECT id_ente FROM ente where trim(codfis)='$codfis'";
			$result = mysqli_query($con,$verificaEnte);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"Ente già esistente!".$verificaEnte);
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			$insertente = "INSERT INTO ente (nomeEnte, telefono, id_regione, id_utente, codfis, tipo, rapplegale, cod, web, email, pec, fax)  VALUES ('$nomeEnte', '$telefono', '$id_regione', '$id_utente', '$codfis', '$tipo', '$rapplegale', '$cod', '$web', '$email', '$pec', '$fax')";

			if (!mysqli_query($con,$insertente)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"ente creato");
			}

			mysqli_close($con);
		}
		else{
			$msg = array("error"=>"Connessione al db non riuscita!");
		}
		echo json_encode($msg);
	}
?>