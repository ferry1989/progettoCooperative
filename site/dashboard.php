<?php ?>
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
					<h2 class="page-header text-primary">Pannello di controllo per l' utente REGIONE</h2>
				</div>
			</div>

			<div class="row">
					 
				<div class="col-lg-4">
				  <form class="form-inline">
				  <h3>Ricerca Ente</h3>
				  <div class="form-group mx-sm-3 mb-2">
				  <label for="inputPassword2" class="sr-only">Ente...</label>
				  <input type="text" class="form-control" id="inputPassword2" placeholder="Ente">
				  </div>
				  <button type="submit" class="btn btn-primary mb-1">Cerca</button></form>
				</div>

				 <div class="col-lg-4">
				  <form class="form-inline">
				  <h3>Ricerca Progetto</h3>
				  <div class="form-group mx-sm-3 mb-2">
				  <label for="inputPassword2" class="sr-only">Progetto...</label>
				  <input type="text" class="form-control" id="inputPassword2" placeholder="Progetto">
				  </div>
				  <button type="submit" class="btn btn-primary mb-1">Cerca</button></form>
				</div>

				 <div class="col-lg-4">
				  <form class="form-inline">
				  <h3>Ricerca Volontario</h3>
				  <div class="form-group mx-sm-3 mb-2">
				  <label for="inputPassword2" class="sr-only">Volontario...</label>
				  <input type="text" class="form-control" id="inputPassword2" placeholder="Volontario">
				  </div>
				  <button type="submit" class="btn btn-primary mb-1">Cerca</button></form>
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
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
