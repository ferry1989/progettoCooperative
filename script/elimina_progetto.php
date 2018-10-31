<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$progetto = json_decode($foo, true);
		$id_progetto = mysqli_real_escape_string($con, $progetto['id_progetto']);
		
		$verificaProgetto = "SELECT id_progetto FROM progetto where id_progetto = '$id_progetto'";
		$result = mysqli_query($con,$verificaProgetto);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Progetto non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$deleteProgetto ="delete from progetto where id_progetto = '$id_progetto'";
			if (!mysqli_query($con,$deleteProgetto)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Progetto eliminato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>