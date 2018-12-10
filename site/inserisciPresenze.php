<?php
	session_start();
	if(empty($_SESSION['username'])){
		header("location: /site/index.php"); 
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
	<link href="dist/css/libform.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
	

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
			<div class="response-message"></div>
			<div class="row">	
				<div class="ente">
					<div class="form-group">
						<label for="exampleFormControlSelect3">Progetto</label>
						<select class="form-control" id="seleziona_progetti" name="id_progetto">
							<option value="-1">-</option>
						</select>
					</div>

					<div class="form-group">
						<label for="exampleFormControlInput1">Data Ora Inizio</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control datepicker" name="dataorainizio">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Data Ora Fine</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control datepicker" name="dataorafine">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlSelect3">Volontario</label>
						<select class="form-control" id="seleziona_volontari" name="id_volontario">
							<option value="-1">-</option>
						</select>
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Giorni Permessi</label>
						<input type="text" class="form-control" name="numpermessi" value="0">
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Giorni Permessi Donazione Sangue</label>
						<input type="text" class="form-control" name="perdonazsang" value="0">
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Giorni Permessi Studio</label>
						<input type="text" class="form-control" name="perstudio" value="0">
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Giorni Malattia</label>
						<input type="text" class="form-control" name="giornimalatt" value="0">
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Giorni Malattia non Retribuita</label>
						<input type="text" class="form-control" name="malattnonretrib" value="0">
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Giorni Assenza per Servizio</label>
						<input type="text" class="form-control" name="assenzaperservizio" value="0">
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Giorni Lutto</label>
						<input type="text" class="form-control" name="numgiornilutto" value="0">
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Data Materintà</label>
						<div class="input-group date" data-provide="datepicker">
							<input type="text" class="form-control datepicker" name="maternita">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1">Giorni Infortunio</label>
						<input type="text" class="form-control" name="infortunio" value="0">
					</div>
					
					<button type="submit" class="btn btn-info center-block" id="insert_presenza" >SALVA E CONFERMA</button>
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
	
	<!-- Boostrap daterimepicker -->
	<script src="vendor/datepicker/moment.js"></script>
	<script src="vendor/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	
	<script type="text/javascript" src="js/libform.js"></script>
	<script type="text/javascript" src="js/util.js"></script>

</body>

</html>
