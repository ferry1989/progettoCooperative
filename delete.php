<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location: /login.php"); 
	}
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/delete.js"></script>
</head>
<body>
<h2>Benvenuto <?php echo $_SESSION['username'] ?></h2><a href="script/logout.php">Logout</a>
<?php
include_once 'config/db.php';
?>
<h2>Elimina utente</h2>
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
			<td><?php echo $row['user']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['isAdmin']; ?></td>
			<td><button class="deleteUtente">Elimina</td>
		</tr>
	<?php
		}
	?>
		
	</table>
</div>
<h2>Elimina ente</h2>
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
			<td><?php echo $row['telefono']; ?></td>
			<td><?php echo $row['nomeEnte']; ?></td>
			<td><button class="deleteEnte">Elimina</td>
		</tr>
	<?php
		}
	?>
		
	</table>
</div>

<h2>Elimina presenza</h2>
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
			<td><?php echo $row['dataOraInizio']; ?></td>
			<td><?php echo $row['dataOraFine']; ?></td>
			<td><?php echo $row['isApprovata']; ?></td>
			<td><button class="deletePresenza">Elimina</td>
		</tr>
	<?php
		}
	?>
		
	</table>
</div>

<h2>Elimina progetto</h2>
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
			<td><?php echo $row['titolo']; ?></td>
			<td><button class="deleteProgetto">Elimina</td>
		</tr>
	<?php
		}
	?>
	</table>
</div>

<h2>Elimina regione</h2>
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
			<td><?php echo $row['ragioneSociale']; ?></td>
			<td><?php echo $row['piva']; ?></td>
			<td><?php echo $row['tel']; ?></td>
			<td><button class="deleteRegione">Elimina</td>
		</tr>
	<?php
		}
	?>
	</table>
</div>

<h2>Elimina sede</h2>
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
			<td><?php echo $row['indirizzo']; ?></td>
			<td><button class="deleteSede">Elimina</td>
		</tr>
	<?php
		}
	?>
	</table>
</div>

<h2>Elimina volontario</h2>
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
			<td><?php echo $row['nome']; ?></td>
			<td><?php echo $row['cognome']; ?></td>
			<td><?php echo $row['dataNascita']; ?></td>
			<td><?php echo $row['codFiscale']; ?></td>
			<td><button class="deleteVolontario">Elimina</td>
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
