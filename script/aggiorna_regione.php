<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$regione = json_decode($foo, true);
		$idRegione = mysqli_real_escape_string($con, $regione['idRegione']);
		$ragioneSociale = mysqli_real_escape_string($con, $regione['ragioneSociale']);
		$piva = mysqli_real_escape_string($con, $regione['piva']);
		$tel = mysqli_real_escape_string($con, $regione['tel']);
		
		$verificaProgetto = "SELECT id_regione FROM regione where id_regione='$idRegione'";
		$result = mysqli_query($con,$verificaProgetto);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Regione non trovata!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updatePresenza="update regione set ragioneSociale = '$ragioneSociale',piva = '$piva',tel = '$tel' where id_regione = '$idRegione'";
			if (!mysqli_query($con,$updatePresenza)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Regione aggiornata");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>