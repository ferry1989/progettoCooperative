<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$utente = json_decode($foo, true);
		$user = mysqli_real_escape_string($con, $utente['user']);
		$password = mysqli_real_escape_string($con, $utente['password']);
		$admin = 1;
		
		
		$verificaUtente = "SELECT id_utente FROM utente where user='$user'";
		$result = mysqli_query($con,$verificaUtente);

		if ($result->num_rows > 0) {
			$msg = array("error"=>"Utente già creato!");
		}
		
		else{
			$insertUtente="INSERT INTO utente (user, password, isAdmin) VALUES ('$user', '$password', '$admin')";
			if (!mysqli_query($con,$insertUtente)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"utente creato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>