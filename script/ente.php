<?php

	session_start();
	if(!empty($_SESSION['username'])){
		include_once '../config/db.php';
		
		$msg = "";
		if($con != null){
			$httpMethodType = $_SERVER['REQUEST_METHOD'];
			if($httpMethodType == 'POST'){
				$foo = file_get_contents("php://input");
				$ente = json_decode($foo, true);
				$nomeEnte = trim(mysqli_real_escape_string($con, $ente['nomeEnte']));
				$telefono = mysqli_real_escape_string($con, $ente['telefono']);
				$codfis = mysqli_real_escape_string($con, $ente['codfis']);
				$tipo = mysqli_real_escape_string($con, $ente['tipo']);
				$rapplegale = mysqli_real_escape_string($con, $ente['rapplegale']);
				$cod = mysqli_real_escape_string($con, $ente['cod']);
				$web = mysqli_real_escape_string($con, $ente['web']);
				$email = mysqli_real_escape_string($con, $ente['email']);
				$pec = mysqli_real_escape_string($con, $ente['pec']);
				$fax = mysqli_real_escape_string($con, $ente['fax']);
				
				$verificaEnte = "SELECT id_ente FROM ente where trim(codfis)='$codfis'";
				$result = mysqli_query($con,$verificaEnte);

				if ($result->num_rows > 0) {
					$msg = array("error"=>"Ente già esistente!");
					echo json_encode($msg);
					mysqli_close($con);
					return;
			}
			
			$insertente = "INSERT INTO ente (nomeEnte, telefono, codfis, tipo, rapplegale, cod, web, email, pec, fax)  VALUES ('$nomeEnte', '$telefono', '$codfis', '$tipo', '$rapplegale', '$cod', '$web', '$email', '$pec', '$fax')";

			if (!mysqli_query($con,$insertente)) {
				$msg = array("error"=>mysqli_error($con));
			}
			else{
				$msg = array("success"=>"ente creato");
			}

			mysqli_close($con);
			}
			if($httpMethodType == 'GET'){
				$foo = file_get_contents("php://input");
				$filtri = json_decode($foo, true);
				$type = mysqli_real_escape_string($con, $filtri['type']);
				$denominazione = mysqli_real_escape_string($con, $filtri['denominazione']);
				$codFisc = trim(mysqli_real_escape_string($con, $filtri['codFisc']));
				$email = mysqli_real_escape_string($con, $filtri['email']);
				$pec = mysqli_real_escape_string($con, $filtri['pec']);
		
				$selezionaEnti = "SELECT * FROM ente WHERE 1=1 ";
				
				if($denominazione != null && $denominazione != ""){
					$selezionaEnti .= "and trim(nomeEnte) LIKE '%$denominazione%'";
				}
				if($codFisc != null && $codFisc != ""){
					$selezionaEnti .= "and trim(codfis) LIKE '%$codFisc%'";
				}
				if($email != null && $email != ""){
					$selezionaEnti .= "and trim(email) LIKE '%$email%'";
				}
				if($pec != null && $pec != ""){
					$selezionaEnti .= "and trim(pec) LIKE '%$pec%'";
				}

				$result = mysqli_query($con,$selezionaEnti);
				$msg = array();
				array_push($msg,array("optionDisplay"=>"id_ente","optionValue"=>"nomeEnte"));
				while($row = $result->fetch_assoc()) {
					$addEnte = array("id_ente"=>$row["id_ente"], "telefono"=>$row["telefono"], "nomeEnte"=>$row["nomeEnte"], "codfis"=>$row["codfis"], "tipo"=>$row["tipo"], "rapplegale"=>$row["rapplegale"], "cod"=>$row["cod"], "web"=>$row["web"], "email"=>$row["email"], "pec"=>$row["pec"], "fax"=>$row["fax"]);
					array_push($msg, $addEnte);
				}
				mysqli_close($con);
			}
			if($httpMethodType == 'UPDATE'){
				$foo = file_get_contents("php://input");
				$ente = json_decode($foo, true);
				$id_ente = trim(mysqli_real_escape_string($con, $ente['id_ente']));
				$nomeEnte = trim(mysqli_real_escape_string($con, $ente['nomeEnte']));
				$telefono = mysqli_real_escape_string($con, $ente['telefono']);
				$codfis = mysqli_real_escape_string($con, $ente['codfis']);
				$tipo = mysqli_real_escape_string($con, $ente['tipo']);
				$rapplegale = mysqli_real_escape_string($con, $ente['rapplegale']);
				$cod = mysqli_real_escape_string($con, $ente['cod']);
				$web = mysqli_real_escape_string($con, $ente['web']);
				$email = mysqli_real_escape_string($con, $ente['email']);
				$pec = mysqli_real_escape_string($con, $ente['pec']);
				$fax = mysqli_real_escape_string($con, $ente['fax']);
				
				$verificaEnte = "SELECT id_ente FROM ente where id_ente='$id_ente'";
				$result = mysqli_query($con,$verificaEnte);

				if ($result->num_rows == 0) {
					$msg = array("error"=>"Ente non trovato!");
					echo json_encode($msg);
					mysqli_close($con);
					return;
				}
				
				else{
					$updateEnte="update ente set telefono = '$telefono', nomeEnte = '$nomeEnte', codfis = '$codfis', tipo = '$tipo', rapplegale = '$rapplegale', cod = '$cod', web = '$web', email = '$email', pec = '$pec', fax = '$fax' where id_ente = '$id_ente'";
					if (!mysqli_query($con,$updateEnte)) {
						$msg = array("error"=>mysqli_error($con));
					}
					else{
						$msg = array("success"=>"Ente aggiornato");
					}
				}
				mysqli_close($con);
				
			}
			if($httpMethodType == 'DELETE'){
				$foo = file_get_contents("php://input");
				$ente = json_decode($foo, true);
				$id_ente = mysqli_real_escape_string($con, $ente['id_ente']);
				
				$verificaEnte = "SELECT id_ente FROM ente where id_ente='$id_ente'";
				$result = mysqli_query($con,$verificaEnte);

				if ($result->num_rows == 0) {
					$msg = array("error"=>"Ente non trovato!");
					echo json_encode($msg);
					mysqli_close($con);
					return;
				}
				else{
					$deleteEnte ="delete from ente where id_ente = '$id_ente'";
					if (!mysqli_query($con,$deleteEnte)) {
						$msg = array("error"=>mysqli_error($con));
					}
					else{
						$msg = array("success"=>"Ente eliminato");
					}
				}
				mysqli_close($con);
			}
		}
		else{
			$msg = array("error"=>"Connessione al db non riuscita!");
		}
		echo json_encode($msg);
	}
?>