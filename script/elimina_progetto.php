<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$progetto = json_decode($foo, true);
		$idProgetto = mysqli_real_escape_string($con, $progetto['idProgetto']);
		
		$verificaProgetto = "SELECT id_progetto FROM progetto where id_progetto = '$idProgetto'";
		$result = mysqli_query($con,$verificaProgetto);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"progetto non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$deletePresenza ="delete from progetto where id_progetto = '$idProgetto'";
			if (!mysqli_query($con,$deletePresenza)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"progetto eliminato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>