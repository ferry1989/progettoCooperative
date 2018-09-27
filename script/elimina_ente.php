<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$ente = json_decode($foo, true);
		$idEnte = mysqli_real_escape_string($con, $ente['idEnte']);
		
		$verificaEnte = "SELECT id_ente FROM ente where id_ente='$idEnte'";
		$result = mysqli_query($con,$verificaEnte);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Ente non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$deleteEnte ="delete from ente where id_ente = '$idEnte'";
			if (!mysqli_query($con,$deleteEnte)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"ente eliminato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>