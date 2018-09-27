<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$regione = json_decode($foo, true);
		$idRegione = mysqli_real_escape_string($con, $regione['idRegione']);
		
		$verificaregione = "SELECT id_regione FROM regione where id_regione = '$idRegione'";
		$result = mysqli_query($con,$verificaregione);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"regione non trovata!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$deletePresenza ="delete from regione where id_regione = '$idRegione'";
			if (!mysqli_query($con,$deletePresenza)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"regione eliminata");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>