<?php
	include_once '../config/db.php';
	
	$msg = "";
	if($con != null){
		$foo = file_get_contents("php://input");

		$progetto = json_decode($foo, true);
		$id_progetto = trim(mysqli_real_escape_string($con, $progetto['id_progetto']));
		$id_ente = trim(mysqli_real_escape_string($con, $progetto['id_ente']));
		$titolo = trim(mysqli_real_escape_string($con, $progetto['titolo']));
		$annobando = trim(mysqli_real_escape_string($con, $progetto['annobando']));
		$settoreprevalente = trim(mysqli_real_escape_string($con, $progetto['settoreprevalente']));
		$altrosettore = trim(mysqli_real_escape_string($con, $progetto['altrosettore']));
		$sett24 = trim(mysqli_real_escape_string($con, $progetto['24sett']));
		$sett28 = trim(mysqli_real_escape_string($con, $progetto['28sett']));
		$sett36 = trim(mysqli_real_escape_string($con, $progetto['36sett']));
		$sedidiattuazione = trim(mysqli_real_escape_string($con, $progetto['sedidiattuazione']));
		
		$verificaProgetto = "SELECT id_progetto FROM progetto where id_progetto='$id_progetto'";
		$result = mysqli_query($con,$verificaProgetto);

		if ($result->num_rows == 0) {
			$msg = array("error"=>"Progetto non trovato!");
			echo json_encode($msg);
			mysqli_close($con);
			return;
		}
		
		else{
			$updatePresenza="update progetto set titolo = '$titolo', annobando = '$annobando', settoreprevalente = '$settoreprevalente', altrosettore = '$altrosettore', 24sett = '$sett24', 28sett = '$sett28', 36sett = '$sett36', sedidiattuazione = '$sedidiattuazione', id_ente = '$id_ente' where id_progetto = '$id_progetto'";
			if (!mysqli_query($con,$updatePresenza)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"Progetto aggiornato");
			}
		}
		mysqli_close($con);
	}
	else{
		$msg = array("error"=>"Connessione al db non riuscita!");
	}
	echo json_encode($msg);
?>