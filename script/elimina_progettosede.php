<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$ente = json_decode($foo, true);
		$id_sedeprogetto = mysqli_real_escape_string($con, $ente['id_progettosede']);
		
		$verificaEnte = "SELECT id_sedeprogetto FROM sediprogetti where id_sedeprogetto='$id_sedeprogetto'";
		$result = mysqli_query($con,$verificaEnte);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Collegamento non trovato!".$verificaEnte);
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$deleteEnte ="delete from sediprogetti where id_sedeprogetto = '$id_sedeprogetto'";
			if (!mysqli_query($con,$deleteEnte)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Collegamento eliminato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>