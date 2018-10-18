<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location: /login.php"); 
	}
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/select.js"></script>
</head>
<body>
<h2>Benvenuto <?php echo $_SESSION['username'] ?></h2><a href="script/logout.php">Logout</a>
<?php
include_once 'config/db.php';
?>
<h2>Seleziona utenti</h2>
<div class="utente">
	<table>
		<tr>
			<td>id utente</td>
			<td>user</td>
			<td>password</td>
			<td>isAdmin</td>
			<td>azioni</td>
		</tr>
		<tr>
			<td><input name='id_utente' /></td>
			<td><input name='user' /></td>
			<td><input type='password' name='password' /></td>
			<td><select name='isAdmin'>
					<option value="">-</option>
					<option value='0'>NO</option>
					<option value='1'>SI</option>
				</select>
			</td>
			<td><button id="selectUtenti">cerca</button>
		</tr>
	</table>
</div><br>

<h2>Seleziona ente</h2>
<div class="ente">
	<table>
		<tr>
			<td>id ente</td>
			<td>telefono</td>
			<td>nome ente</td>
			<td>id regione</td>
			<td>id utente</td>
		</tr>
		<tr>
			<td><input name='id_ente' /></td>
			<td><input name='telefono' /></td>
			<td><input name='nomeEnte' /></td>
			<td><input name='id_regione' /></td>
			<td><input name='id_utente' /></td>
			<td><button id="selectEnti">cerca</button>
		</tr>
	</table>
</div><br>

<h2>Seleziona presenza</h2>
<div class="presenza">
	<table>
		<tr>
			<td>id presenza</td>
			<td>data ora inizio</td>
			<td>data ora fine</td>
			<td>approvata</td>
			<td>id volontario</td>
			<td>id progetto</td>
		</tr>
		<tr>
			<td><input name='id_presenza' /></td>
			<td><select name="operatorDataInizio">
					<option>=</option>
					<option>>=</option>
					<option><=</option>
					<option>></option>
					<option><</option>
				</select>
				<input name='dataOraInizio' />
			</td>
			<td><select name="operatorDataFine">
					<option>=</option>
					<option>>=</option>
					<option><=</option>
					<option>></option>
					<option><</option>
				</select>
				<input name='dataOraFine' />
			</td>
			<td><select name='isApprovata'>
					<option value="">-</option>
					<option value='0'>NO</option>
					<option value='1'>SI</option>
				</select>
			</td>
			<td><input name='id_volontario' /></td>
			<td><input name='id_progetto' /></td>
			<td><button id="selectPresenze">cerca</button>
		</tr>
	</table>
</div><br>

<h2>Seleziona progetto</h2>
<div class="progetto">
	<table>
		<tr>
			<td>id progetto</td>
			<td>titolo</td>
		</tr>
		<tr>
			<td><input name='id_progetto' /></td>
			<td><input name='titolo' /></td>
			<td><button id="selectProgetti">cerca</button>
		</tr>
	</table>
</div><br>

<h2>Seleziona regione</h2>
<div class="regione">
	<table>
		<tr>
			<td>id regione</td>
			<td>ragione sociale</td>
			<td>partita iva</td>
			<td>telefono</td>
			<td>id utente</td>
		</tr>
		<tr>
			<td><input name='id_regione' /></td>
			<td><input name='ragioneSociale' /></td>
			<td><input name='piva' /></td>
			<td><input name='telefono' /></td>
			<td><input name='id_utente' /></td>
			<td><button id="selectRegioni">cerca</button>
		</tr>
	</table>
</div><br>

<h2>Seleziona regione progetto</h2>
<div class="regioneprogetto">
	<table>
		<tr>
			<td>id regione</td>
			<td>id progetto</td>
		</tr>
		<tr>
			<td><input name='id_regione' /></td>
			<td><input name='id_progetto' /></td>
			<td><button id="selectRegioniProgetti">cerca</button>
		</tr>
	</table>
</div><br>

<h2>Seleziona sede</h2>
<div class="sede">
	<table>
		<tr>
			<td>id sede</td>
			<td>id ente</td>
			<td>indirizzo</td>
		</tr>
		<tr>
			<td><input name='id_sede' /></td>
			<td><input name='id_ente' /></td>
			<td><input name='indirizzo' /></td>
			<td><button id="selectSedi">cerca</button>
		</tr>
	</table>
</div><br>

<h2>Seleziona volontari</h2>
<div class="volontario">
	<table>
		<tr>
			<td>id volontario</td>
			<td>nome</td>
			<td>cognome</td>
			<td>data nascita</td>
			<td>codice fiscale</td>
			<td>id ente</td>
		</tr>
		<tr>
			<td><input name='id_volontario' /></td>
			<td><input name='nome' /></td>
			<td><input name='cognome' /></td>
			<td><select name="operatorDataNascita">
					<option>=</option>
					<option>>=</option>
					<option><=</option>
					<option>></option>
					<option><</option>
				</select>
				<input name='dataNascita' />
			</td>
			<td><input name='codFiscale' /></td>
			<td><input name='id_ente' /></td>
			<td><button id="selectVolontari">cerca</button>
		</tr>
	</table>
</div><br>

<h2>Seleziona volontario progetto</h2>
<div class="volontarioprogetto">
	<table>
		<tr>
			<td>id volontario</td>
			<td>id progetto</td>
		</tr>
		<tr>
			<td><input name='id_volontario' /></td>
			<td><input name='id_progetto' /></td>
			<td><button id="selectVolontariProgetti">cerca</button>
		</tr>
	</table>
</div><br>
</body>
</html>
<?php
	mysqli_close($con);
?>
