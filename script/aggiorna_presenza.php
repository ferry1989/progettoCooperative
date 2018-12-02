<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$presenza = json_decode($foo, true);
		$id_presenza = mysqli_real_escape_string($con, $presenza['id_presenza']);
		$dataOraInizio = mysqli_real_escape_string($con, $presenza['dataOraInizio']);
		$dataOraFine = mysqli_real_escape_string($con, $presenza['dataOraFine']);
		$isApprovata = mysqli_real_escape_string($con, $presenza['isApprovata']);
		
		$verificaUtente = "SELECT id_presenza FROM presenza where id_presenza='$id_presenza'";
		$result = mysqli_query($con,$verificaUtente);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Presenza non trovata!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updatePresenza="update presenza set dataOraInizio = '$dataOraInizio', dataOraFine = '$dataOraFine', isApprovata = '$isApprovata' where id_presenza = '$id_presenza'";
			if (!mysqli_query($con,$updatePresenza)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"presenza aggiornata");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>