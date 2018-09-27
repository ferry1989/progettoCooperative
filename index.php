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
			<td>nome</td>
			<td>cognome</td>
			<td>data di nascita</td>
			<td>codice fiscale</td>
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
			<td><input name='nome' /></td>
			<td><input name='cognome' /></td>
			<td><input name='dataNascita' /></td>
			<td><input name='codFiscale' /></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><button id="insertVolontario">inserisci</button></td>
		</tr>
		
	</table>
</div>
<h2>Inserisci progetto</h2>
<div class="progetto">
	<table>
		<tr>
			<td>Regione</td>
			<td>Titolo progetto</td>
		</tr>
		<tr>
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
			<td><input name='titolo' /></td>
		</tr>
		<tr>
			<td></td>
			<td><button id="insertProgetto">inserisci</button></td>
		</tr>
		
	</table>
</div>
<h2>Inserisci presenza</h2>
<div class="presenza">
	<table>
		<tr>
			<td>Nome Volontario</td>
			<td>Progetto</td>
			<td>data ora inizio</td>
			<td>data ora fine</td>
			<td>Approvata</td>
		</tr>
		<tr>
			<td>
				<select name="volontario">
					<?php
						$getVolontari = "SELECT * FROM volontario";
						$result = mysqli_query($con,$getVolontari);
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['id_volontario'].'">'.$row['nome'].'</option>"';
						}
					?>
				</select>
			</td>
			<td>
				<select name="progetto">
					<?php
						$getProgetti = "SELECT * FROM progetto";
						$result = mysqli_query($con,$getProgetti);
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['id_progetto'].'">'.$row['titolo'].'</option>"';
						}
					?>
				</select>
			</td>
			<td><input name='dataOraInizio' /></td>
			<td><input name='dataOraFine' /></td>
			<td>
				<select name='approvata'>
					<option value='0'>NO</option>
					<option value='1'>SI</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><button id="insertPresenza">inserisci</button></td>
		</tr>
		
	</table>
</div>

<h2>Collega regione a progetto</h2>
<div class="regioneprogetto">
	<table>
		<tr>
			<td>Regione</td>
			<td>Progetto</td>
		</tr>
		<tr>
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
				<select name="progetto">
					<?php
						$getProgetti = "SELECT * FROM progetto";
						$result = mysqli_query($con,$getProgetti);
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['id_progetto'].'">'.$row['titolo'].'</option>"';
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button id="insertRegioneProgetto">inserisci</button></td>
		</tr>
		
	</table>
</div>
</body>
</html>
<?php
	mysqli_close($con);
?>
