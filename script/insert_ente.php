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
			$codfis = mysqli_real_escape_string($con, $ente['codfis']);
			$tipo = mysqli_real_escape_string($con, $ente['tipo']);
			$rapplegale = mysqli_real_escape_string($con, $ente['rapplegale']);
			$cod = mysqli_real_escape_string($con, $ente['cod']);
			$web = mysqli_real_escape_string($con, $ente['web']);
			$email = mysqli_real_escape_string($con, $ente['email']);
			$pec = mysqli_real_escape_string($con, $ente['pec']);
			$fax = mysqli_real_escape_string($con, $ente['fax']);
			$password = mysqli_real_escape_string($con, $ente['password']);
			$admin = 0;
			
			$verificaEnte = "SELECT id_ente FROM ente where trim(codfis)='$codfis'";
			$result = mysqli_query($con,$verificaEnte);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"Ente già esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}

			$insertUtente = "INSERT INTO utente (user, password, isAdmin) VALUES ('$nomeEnte', '$password', '$admin')";

			if (!mysqli_query($con,$insertUtente)) {
				$msg = array("error"=>mysqli_error($con));
			}

			$selezionaUtente = "SELECT id_utente FROM utente WHERE user='$nomeEnte' limit 1";
			$result = mysqli_query($con,$selezionaUtente);
			$id_utente = mysqli_fetch_object($result)->id_utente;
			
			$insertente = "INSERT INTO ente (nomeEnte, telefono, codfis, tipo, rapplegale, cod, web, email, pec, fax, id_utente)  VALUES ('$nomeEnte', '$telefono', '$codfis', '$tipo', '$rapplegale', '$cod', '$web', '$email', '$pec', '$fax', '$id_utente')";

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