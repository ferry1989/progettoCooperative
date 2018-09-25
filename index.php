<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location: /login.php"); 
	}
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<h2>Benvenuto <?php echo $_SESSION['username'] ?></h2><a href="script/logout.php">Logout</a>
<?php
include_once 'config/db.php'; 
?>
<h2>Inserisci utente</h2>
<div class="utente">
	<table>
		<tr>
			<td>user</td>
			<td>password</td>
		</tr>
		<tr>
			<td><input name='user' /></td>
			<td><input type='password' name='password' /></td>
		</tr>
		<tr>
			<td></td>
			<td><button id="insertUtente">inserisci</button></td>
		</tr>
		
	</table>
</div><br>
<h2>Inserisci regione</h2>
<div class="regione">
	<table>
		<tr>
			<td>ragione sociale</td>
			<td>partita iva</td>
			<td>telefono</td>
			<td>utente</td>
		</tr>
		<tr>
			<td><input name='ragioneSociale' /></td>
			<td><input name='piva' /></td>
			<td><input name='tel' /></td>
			<td><select name="id_utente"></select></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><button id="insertregione">inserisci</button></td>
		</tr>
		
	</table>
</div>
<br>
<h2>Inserisci ente</h2>
<div class="ente">
	<table>
		<tr>
			<td>nome ente</td>
			<td>telefono</td>
			<td>regione</td>
			<td>utente</td>
		</tr>
		<tr>
			<td><input name='nomeEnte' /></td>
			<td><input name='telefono' /></td>
			<td>
				<select name="regione">
					<?php
						$getRegioni = "SELECT * FROM regione";
						$result = mysqli_query($con,$getRegioni);
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['id_regione'].'">'.$row['ragioneSociale'].'</option>"';
						}
					?>
				</select>
			</td>
			<td>
				<select name="utente">
					<?php
						$getUtenti = "SELECT * FROM utente";
						$result = mysqli_query($con,$getUtenti);
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['id_utente'].'">'.$row['user'].'</option>"';
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button id="insertEnte">inserisci</button></td>
		</tr>
		
	</table>
</div>
<h2>Inserisci sede</h2>
<div class="sede">
	<table>
		<tr>
			<td>ente</td>
			<td>indirizzo</td>
		</tr>
		<tr>
			<td>
				<select name="ente">
					<?php
						$getRegioni = "SELECT * FROM ente";
						$result = mysqli_query($con,$getRegioni);
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['id_ente'].'">'.$row['nomeEnte'].'</option>"';
						}
					?>
				</select>
			</td>
			<td><input name='indirizzo' /></td>
		</tr>
		<tr>
			<td></td>
			<td><button id="insertSede">inserisci</button></td>
		</tr>
		
	</table>
</div>
<h2>Inserisci volontario</h2>
<div class="volontario">
	<table>
		<tr>
			<td>ente</td>
			<td>indirizzo</td>
		</tr>
		<tr>
			<td>
				<select name="ente">
					<?php
						$getRegioni = "SELECT * FROM ente";
						$result = mysqli_query($con,$getRegioni);
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['id_ente'].'">'.$row['nomeEnte'].'</option>"';
						}
					?>
				</select>
			</td>
			<td><input name='indirizzo' /></td>
		</tr>
		<tr>
			<td></td>
			<td><button id="insertSede">inserisci</button></td>
		</tr>
		
	</table>
</div>
</body>
</html>
<?php
	mysqli_close($con);
?>
