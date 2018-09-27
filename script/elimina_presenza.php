<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$presenza = json_decode($foo, true);
		$idPresenza = mysqli_real_escape_string($con, $presenza['idPresenza']);
		
		$verificaPresenza = "SELECT id_presenza FROM presenza where id_presenza = '$idPresenza'";
		$result = mysqli_query($con,$verificaPresenza);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Presenza non trovata!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$deletePresenza ="delete from presenza where id_presenza = '$idPresenza'";
			if (!mysqli_query($con,$deletePresenza)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"presenza eliminata");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>