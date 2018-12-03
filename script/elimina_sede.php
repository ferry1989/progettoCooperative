<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$sede = json_decode($foo, true);
		$id_sede = mysqli_real_escape_string($con, $sede['id_sede']);
		
		$verificasede = "SELECT id_sede FROM sede where id_sede = '$id_sede'";
		$result = mysqli_query($con,$verificasede);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"sede non trovata!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$deletePresenza ="delete from sede where id_sede = '$id_sede'";
			if (!mysqli_query($con,$deletePresenza)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"sede eliminata");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>