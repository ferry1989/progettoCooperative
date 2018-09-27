<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$progetto = json_decode($foo, true);
		$idProgetto = mysqli_real_escape_string($con, $progetto['idProgetto']);
		$titolo = mysqli_real_escape_string($con, $progetto['titolo']);
		
		$verificaProgetto = "SELECT id_progetto FROM progetto where id_progetto='$idProgetto'";
		$result = mysqli_query($con,$verificaProgetto);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Progetto non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updatePresenza="update progetto set titolo = '$titolo' where id_progetto = '$idProgetto'";
			if (!mysqli_query($con,$updatePresenza)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Progetto aggiornato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>