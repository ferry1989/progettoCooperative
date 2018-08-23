<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$utente = json_decode($foo, true);
		
		
		$user = mysqli_real_escape_string($con, $utente['user']);
		$password = mysqli_real_escape_string($con, $utente['password']);
		
		$sql="INSERT INTO utente (user, password, isAdmin) VALUES ('$user', '$password', false)";

		if (!mysqli_query($con,$sql)) {
			$msg = array("error"=>mysqli_error($con));
		}
		else{
			$msg = array("success"=>"utente creato");

		}
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	mysqli_close($con);
	echo json_encode($msg);
?>