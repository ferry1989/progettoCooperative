<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location: /login.php"); 
	}
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/update.js"></script>
</head>
<body>
<h2>Benvenuto <?php echo $_SESSION['username'] ?></h2><a href="script/logout.php">Logout</a>
<?php
include_once 'config/db.php';
?>
<h2>Aggiorna utente</h2>
<div class="utente">
	<table>
	<tr>
		<td>user</td>
		<td>password</td>
		<td>isAdmin</td>
	</tr>
	<?php
		$getUtenti = "SELECT * FROM utente";
		$result = mysqli_query($con,$getUtenti);
		while ($row = $result->fetch_assoc()) {
	?>
		<tr id="<?php echo $row['id_utente']; ?>">
			<td><input name="user" type="text" value="<?php echo $row['user']; ?>" /></td>
			<td><input name="password" type="password" value="<?php echo $row['password']; ?>" /></td>
			<td><input name="isAdmin" type="text" value="<?php echo $row['isAdmin']; ?>" /></td>
			<td><button class="updateUtente">Aggiorna</td>
		</tr>
	<?php
		}
	?>
		
	</table>
</div>
<h2>Aggiorna ente</h2>
<div class="ente">
	<table>
	<tr>
		<td>telefono</td>
		<td>nome</td>
	</tr>
	<?php
		$getEnti = "SELECT * FROM ente";
		$result = mysqli_query($con,$getEnti);
		while ($row = $result->fetch_assoc()) {
	?>
		<tr id="<?php echo $row['id_ente']; ?>">
			<td><input name="telefono" type="text" value="<?php echo $row['telefono']; ?>" /></td>
			<td><input name="nomeEnte" type="text" value="<?php echo $row['nomeEnte']; ?>" /></td>
			<td><button class="updateEnte">Aggiorna</td>
		</tr>
	<?php
		}
	?>
		
	</table>
</div>

<h2>Aggiorna presenza</h2>
<div class="presenza">
	<table>
	<tr>
		<td>telefono</td>
		<td>nome</td>
	</tr>
	<?php
		$getPresenze = "SELECT * FROM presenza";
		$result = mysqli_query($con,$getPresenze);
		while ($row = $result->fetch_assoc()) {
	?>
		<tr id="<?php echo $row['id_presenza']; ?>">
			<td><input name="dataOraInizio" type="text" value="<?php echo $row['dataOraInizio']; ?>" /></td>
			<td><input name="dataOraFine" type="text" value="<?php echo $row['dataOraFine']; ?>" /></td>
			<td><input name="isApprovata" type="text" value="<?php echo $row['isApprovata']; ?>" /></td>
			<td><button class="updatePresenza">Aggiorna</td>
		</tr>
	<?php
		}
	?>
		
	</table>
</div>

<h2>Aggiorna progetto</h2>
<div class="progetto">
	<table>
	<tr>
		<td>titolo</td>
	</tr>
	<?php
		$getPresenze = "SELECT * FROM progetto";
		$result = mysqli_query($con,$getPresenze);
		while ($row = $result->fetch_assoc()) {
	?>
		<tr id="<?php echo $row['id_progetto']; ?>">
			<td><input name="titolo" type="text" value="<?php echo $row['titolo']; ?>" /></td>
			<td><button class="updateProgetto">Aggiorna</td>
		</tr>
	<?php
		}
	?>
	</table>
</div>

<h2>Aggiorna regione</h2>
<div class="regione">
	<table>
	<tr>
		<td>ragione sociale</td>
		<td>partita iva</td>
		<td>telefono</td>
	</tr>
	<?php
		$getPresenze = "SELECT * FROM regione";
		$result = mysqli_query($con,$getPresenze);
		while ($row = $result->fetch_assoc()) {
	?>
		<tr id="<?php echo $row['id_regione']; ?>">
			<td><input name="ragioneSociale" type="text" value="<?php echo $row['ragioneSociale']; ?>" /></td>
			<td><input name="piva" type="text" value="<?php echo $row['piva']; ?>" /></td>
			<td><input name="tel" type="text" value="<?php echo $row['tel']; ?>" /></td>
			<td><button class="updateRegione">Aggiorna</td>
		</tr>
	<?php
		}
	?>
	</table>
</div>

<h2>Aggiorna sede</h2>
<div class="sede">
	<table>
	<tr>
		<td>titolo</td>
	</tr>
	<?php
		$getSedi = "SELECT * FROM sede";
		$result = mysqli_query($con,$getSedi);
		while ($row = $result->fetch_assoc()) {
	?>
		<tr id="<?php echo $row['id_sede']; ?>">
			<td><input name="indirizzo" type="text" value="<?php echo $row['indirizzo']; ?>" /></td>
			<td><button class="updateSede">Aggiorna</td>
		</tr>
	<?php
		}
	?>
	</table>
</div>

<h2>Aggiorna volontario</h2>
<div class="volontario">
	<table>
	<tr>
		<td>nome</td>
		<td>cognome</td>
		<td>data di nascita</td>
		<td>codice fiscale</td>
	</tr>
	<?php
		$getVolontari = "SELECT * FROM volontario";
		$result = mysqli_query($con,$getVolontari);
		while ($row = $result->fetch_assoc()) {
	?>
		<tr id="<?php echo $row['id_volontario']; ?>">
			<td><input name="nome" type="text" value="<?php echo $row['nome']; ?>" /></td>
			<td><input name="cognome" type="text" value="<?php echo $row['cognome']; ?>" /></td>
			<td><input name="dataNascita" type="text" value="<?php echo $row['dataNascita']; ?>" /></td>
			<td><input name="codFiscale" type="text" value="<?php echo $row['codFiscale']; ?>" /></td>
			<td><button class="updateVolontario">Aggiorna</td>
		</tr>
	<?php
		}
	?>
	</table>
</div>

</body>
</html>
<?php
	mysqli_close($con);
?>
