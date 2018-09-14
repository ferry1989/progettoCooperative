<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$utente = json_decode($foo, true);
		$id_utente = mysqli_real_escape_string($con, $utente['id_utente']);
		$verificaUtente = "SELECT id_utente, user FROM utente ";
		if($id_utente != null){
			$verificaUtente .= "where id_utente='$id_utente'";
		}
		$result = mysqli_query($con,$verificaUtente);
		$msg = array();
		while($row = $result->fetch_assoc()) {
			$addUser = array("id_utente"=>$row["id_utente"], "user"=>$row["user"]);
			array_push($msg, $addUser);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>