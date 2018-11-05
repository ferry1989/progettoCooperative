<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$foo = file_get_contents("php://input");
			$data = json_decode($foo, true);

			$verificaEnte = "SELECT codfis FROM ente where trim(codfis)='$codfis'";
			$result = mysqli_query($con,$verificaEnte);

			if ($result->num_rows > 0) {
				$msg = array("error"=>"ente già esistente!");
				echo json_encode($msg);
				mysqli_close($con);
				return;
			}

			$keys = '';
			$values = '';

			foreach ($data as $key => $value){
				$keys .= $key .",";
				$values .= "'".trim(mysqli_real_escape_string($con, $value))."'";
			}
			
			$insertData = "INSERT INTO ente(".$keys.") VALUES (".$values.")";

			if (!mysqli_query($con,$insertData)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"ente creato");
			}

			mysqli_close($con);
		}
		else{
			$msg = array("error"=>"Connessione al db non riuscita!");
		}
		echo json_encode($msg);
	}
?>