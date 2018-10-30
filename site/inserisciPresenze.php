<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location: /site/index.html"); 
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Servizio Civile Regionale</title>
	<link rel="icon" href="imgCustom/logoico1.ico" >

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>

<body>

	<div id="wrapper">
	<?php
	include ('include/menu.php');
	?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="page-header text-primary">Inserisci Presenza</h2>
				</div>
			</div>

			<div class="row">	
				<div class="ente">
					<input type="hidden" class="type" value="insert">
					<div class="form-group">
						<label for="exampleFormControlSelect3">Progetto</label>
						<select class="form-control" id="seleziona_progetti" name="id_progetti">
							<option value="-1">-</option>
						</select>
					</div>

					<div class="form-group">
						<label for="exampleFormControlInput1">Nome</label>
						<input type="text" class="form-control" name="nome">
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Cognome</label>
						<input type="text" class="form-control" name="cognome">
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Codice Fiscale</label>
						<input type="text" class="form-control" name="codfis">
					</div>

					<div class="form-group">
						<label for="exampleFormControlSelect3">Sesso</label>
						<select class="form-control" name="sesso">
							<option value="-1">-</option>
							<option value="M">M</option>
							<option value="F">F</option>
						</select>
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Provincia/Nazione di nascita</label>
						<input type="text" class="form-control" name="provnasc">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Estero</label>
						<select class="form-control" name="isesteronasc">
							<option value="-1">-</option>
							<option value="0">NO</option>
							<option value="1">SI</option>

						</select>
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Comune/Paese estero di residenza</label>
						<input type="text" class="form-control" name="paesenasc">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Estero</label>
						<select class="form-control" name="isesterores">
							<option value="-1">-</option>
							<option value="0">NO</option>
							<option value="1">SI</option>
						</select>
						
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Comune/Paese estero di residenza</label>
						<input type="text" class="form-control" name="comres">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Comune/Paese estero di nascita</label>
						<input type="text" class="form-control" name="provnasc">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Indirizzo di residenza</label>
						<input type="text" class="form-control" name="indres">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">num. Civico</label>
						<input type="text" class="form-control" name="ncivico">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">CAP</label>
						<input type="text" class="form-control" name="cap">
					</div>

					<div class="text">
						<label> ----------------------------------</label><br/>
						<label>Se Domicilio diverso dalla Residenza</label><br/>
						<label> ----------------------------------</label>
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Provincia di domicilio</label>
						<select class="form-control" name="provdom">
							<option>-</option>
							<option>Belluno</option>
							<option>Padova</option>
							<option>Venezia</option>
							<option>Verona</option>
							<option>Vicenza</option>
							<option>Rovigo</option>
							<option>Treviso</option>
						</select>
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Comune di domicilio</label>
						<input type="text" class="form-control" name="comdom">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Indirizzo di domicilio</label>
						<input type="text" class="form-control" name="inddom">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Num. Civico</label>
						<input type="text" class="form-control" name="numcivdom">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">CAP</label>
						<input type="text" class="form-control" name="capdom">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Titolo di studio</label>
						<select class="form-control" name="titolostudio">
							<option></option>
							<option>Laurea magistrale</option>
							<option>Laurea triennale</option>
							<option>Diploma di maturità</option>
							<option>Qualifica di istruzione professionale</option>
							<option>Licenza media</option>
						</select>
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Stato</label>
						<select class="form-control" name="stato">
							<option></option>
							<option>Attivo</option>
							<option>Idoneo non selezionato</option>
							<option>Non idoneo</option>
							<option>Ritirato</option>
						</select>
					</div>
					
					<button type="submit" class="btn btn-info" id="insert_volontario" >SALVA E CONFERMA</button>
				</div>
			</div>
		</div>
	</div>

<!-- TUTTI GLI SCRIPT__________________________________________________________________________________________ -->
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	
	<script type="text/javascript" src="js/index.js"></script>

</body>

</html>
