<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$sede = json_decode($foo, true);
		$idSede = mysqli_real_escape_string($con, $sede['idSede']);
		$indirizzo = mysqli_real_escape_string($con, $sede['indirizzo']);
		
		$verificaSede = "SELECT id_sede FROM sede where id_sede='$idSede'";
		$result = mysqli_query($con,$verificaSede);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Sede non trovata!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updateSede = "update sede set indirizzo = '$indirizzo' where id_sede = '$idSede'";
			if (!mysqli_query($con,$updateSede)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Sede aggiornata");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>