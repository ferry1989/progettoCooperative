<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$volontario = json_decode($foo, true);
		$idVolontario = mysqli_real_escape_string($con, $volontario['id_volontario']);
		
		$verificavolontario = "SELECT id_volontario FROM volontario where id_volontario = '$idVolontario'";
		$result = mysqli_query($con,$verificavolontario);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"volontario non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$deletePresenza ="delete from volontario where id_volontario = '$idVolontario'";
			if (!mysqli_query($con,$deletePresenza)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"volontario eliminato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>