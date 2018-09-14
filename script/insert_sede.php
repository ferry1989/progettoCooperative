<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");

			$sede = json_decode($foo, true);
			$indirizzo = trim(mysqli_real_escape_string($con, $sede['indirizzo']));
			$ente = mysqli_real_escape_string($con, $sede['ente']);
			
			$verificaEnte = "SELECT id_sede FROM sede where id_ente='$ente' and trim(indirizzo)='$indirizzo'";
			$result = mysqli_query($con,$verificaEnte);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"Sede già esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			$verificaEnte = "SELECT id_ente FROM ente where id_ente='$ente'";
			$result = mysqli_query($con,$verificaEnte);

			if ($result->num_rows == 0) {
				$msg = array("error"=>"Ente non esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}
			
			$insertSede = "INSERT INTO sede (indirizzo, id_ente) VALUES ('$indirizzo', '$ente')";
			if (!mysqli_query($con,$insertSede)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Sede creata");
			}
			
			mysqli_close($con);
		}
		else{
			$msg = array("error"=>"Connessione al db non riuscita!");
		}
		echo json_encode($msg);
	}
?>