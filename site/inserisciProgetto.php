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
					<h2 class="page-header text-primary">Inserisci Progetto</h2>
				</div>
			</div>

			<div class="row">	
				<div class="progetto">
					<input type="hidden" class="type" value="project">
					<div class="form-group">
						<label for="exampleFormControlSelect3">Ente</label>
						<select class="form-control" id="seleziona_enti" name="ente">
							<option value="-1">-</option>
						</select>
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Titolo</label>
					<input type="text" class="form-control" name="titolo">
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlSelect3">Anno Bando</label>
						<select class="form-control" name="annobando">
							<option value="-1">-</option>
						</select>
					</div>
					
					<div class="form-group">
					<label for="exampleFormControlSelect3">Settore Prevalente Campi</label>
					<select class="form-control" name="settprev">
						<option value="-1">-</option>
					</select>
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Altro Settore</label>
						<input type="text" class="form-control" name="altrosett">
					</div>

					<div class="form-group">
						<label for="exampleFormControlSelect3">Sedi di attuazione</label>
						<select class="form-control" name="sede">
							<option value="-1">-</option>
						</select>
					</div>

					<button type="submit" class="btn btn-info" id="insert_progetto" >SALVA E CONFERMA</button>

					<!-- questo bottone deve rendere tutti i form disabled in modo da non permettere la modifica  -->
					<button type="submit" class="btn btn-info" >SALVA</button>
					<button class="btn btn-info" >CHIUDI</button>

					<!-- questo bottone deve rendere tutti i form enabled in modo da permettere la modifica  -->
					<button class="btn btn-info hidden" >MODIFICA</button>

					<!-- questo bottone deve pulire tutti i campi -->
					<button class="btn btn-info hidden" >ELIMINA</button>

					<!-- questo bottone reindirizza alla creazione del nuovo progetto  -->
					<button class="btn btn-info hidden" >CREA NUOVO PROGETTO</button>
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