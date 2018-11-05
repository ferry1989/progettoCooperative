<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$ente = json_decode($foo, true);
		$id_ente = trim(mysqli_real_escape_string($con, $ente['id_ente']));
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
		
		$verificaEnte = "SELECT id_ente FROM ente where id_ente='$id_ente'";
		$result = mysqli_query($con,$verificaEnte);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Ente non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updateEnte="update ente set telefono = '$telefono', nomeEnte = '$nomeEnte', codfis = '$codfis', tipo = '$tipo', rapplegale = '$rapplegale', cod = '$cod', web = '$web', email = '$email', pec = '$pec', fax = '$fax' where id_ente = '$id_ente'";
			if (!mysqli_query($con,$updateEnte)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Ente aggiornato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>