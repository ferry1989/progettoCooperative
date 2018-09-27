<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$volontario = json_decode($foo, true);
			$idEnte = trim(mysqli_real_escape_string($con, $volontario['ente']));
			$nome = mysqli_real_escape_string($con, $volontario['nome']);
			$cognome = mysqli_real_escape_string($con, $volontario['cognome']);
			$dataNascita = mysqli_real_escape_string($con, $volontario['dataNascita']);
			$codFiscale = mysqli_real_escape_string($con, $volontario['codFiscale']);
			
			$verificaEnte = "SELECT id_ente FROM ente where id_ente='$idEnte'";
			$result = mysqli_query($con,$verificaEnte);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Ente non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			else{
				$insertvolontario = "INSERT INTO volontario (nome, cognome, dataNascita, codFiscale, id_ente) VALUES ('$nome', '$cognome', '$dataNascita', '$codFiscale', '$idEnte')";
				if (!mysqli_query($con,$insertvolontario)) {
					$msg = array("error"=>mysqli_error($con));
				}
				else{
					$msg = array("success"=>"volontario creato");
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