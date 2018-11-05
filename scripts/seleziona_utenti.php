<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$filtri = json_decode($foo, true);
		$type = mysqli_real_escape_string($con, $filtri['type']);
		$fillForm = mysqli_real_escape_string($con, $filtri['fillForm']);

		if($type && $type == 'search') {
			$id_utente = mysqli_real_escape_string($con, $filtri['id_utente']);
			$user = trim(mysqli_real_escape_string($con, $filtri['user']));
			$password = mysqli_real_escape_string($con, $filtri['password']);
			$isAdmin = mysqli_real_escape_string($con, $filtri['isAdmin']);

			$selezionaUtenti = "SELECT * FROM utente WHERE 1=1 ";
			if($id_utente != null && $id_utente != ""){
				$selezionaUtenti .= "and id_utente='$id_utente'";
			}
			if($user != null && $user != ""){
				$selezionaUtenti .= "and trim(user) LIKE '%$user%'";
			}
			if($password != null && $password != ""){
				$selezionaUtenti .= "and password='$password'";
			}
			if($isAdmin != null && $isAdmin != ""){
				$selezionaUtenti .= "and isAdmin='$isAdmin'";
			}
		}else{
			$selezionaUtenti = "SELECT * FROM utente WHERE 1=1 ";
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