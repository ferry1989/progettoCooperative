<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);

		if( !empty($filtri['fillForm']) ) {
			$fillForm = mysqli_real_escape_string($con, $filtri['fillForm']);
		}
		if( !empty($filtri['id_utente']) ) {
			$id_utente = mysqli_real_escape_string($con, $filtri['id_utente']);
		}
		if( !empty($filtri['user']) ) {
			$user = trim(mysqli_real_escape_string($con, $filtri['user']));
		}
		if( !empty($filtri['isAdmin']) ) {
			$isAdmin = mysqli_real_escape_string($con, $filtri['isAdmin']);
		}

		$selezionaUtenti = "SELECT * FROM utente WHERE 1=1 ";
		if(!empty($id_utente)) {
			$selezionaUtenti .= "and id_utente='$id_utente'";
		}
		if(!empty($user)) {
			$selezionaUtenti .= "and trim(user) LIKE '%$user%'";
		}
		if(!empty($isAdmin)) {
			$selezionaUtenti .= "and isAdmin='$isAdmin'";
		}

		$result = mysqli_query($con,$selezionaUtenti);
		$msg = array();
		array_push($msg,array("fillForm"=>$fillForm));
		while($row = $result->fetch_assoc()) {
			$addUser = array("id_utente"=>$row["id_utente"], "user"=>$row["user"], "password"=>$row["password"],"isAdmin"=>$row["isAdmin"]);
			array_push($msg, $addUser);
		}
		
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>