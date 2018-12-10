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
					<h2 class="page-header text-primary">Inserisci Ente</h2>
				</div>
			</div>
			<div class="response-message"></div>
			<div class="row">	
				<div class="ente">
					<div class="form-group">
						<label for="exampleFormControlInput1">Nome Ente*</label>
						<input type="text" class="form-control" name="nomeEnte">
					</div>

					<div class="form-group">
						<label for="exampleFormControlInput2">Password</label>
						<input type="text" class="form-control" name="password" type="password">
					</div>

					<button type="submit" class="center-block genpassword" >Genera Password</button>

					<div class="form-group">
					<label for="exampleFormControlInput1">Telefono</label>
					<input type="text" class="form-control" name="telefono">
					</div>

					<div class="form-group">
						<label for="exampleFormControlInput1">Codice Fiscale</label>
						<input type="text" class="form-control" name="codfis">
					</div>

					<div class="form-group">
						<label for="exampleFormControlInput1">Tipo</label>
						<select class="form-control" name="tipo">
							<option>-</option>
							<option>1. PUBBLICO a) Amministrazione statale</option>
							<option>1. PUBBLICO b)Enti Locali</option>
							<option>1. PUBBLICO c)Altri Enti Pubblici</option>
							<option>1. PUBBLICO d)Università/Scuole/Istituti</option>
							<option>1. PUBBLICO e)Piano di Zona</option>
							<option>1. PUBBLICO g)Unione dei Comuni</option>
							<option>1. PUBBLICO h)Associazione tra Enti Locali</option>
							<option>1. PUBBLICO i)Consorzio tra Enti Locali</option>
							<option>1. PUBBLICO j)Azienda Sanitaria</option>
							<option>1. PUBBLICO k)Azienda Ospedaliera</option>
							<option>2. PRIVATO a)Organizzazione di volontariato</option>
							<option>2. PRIVATO b)Associazione di promozione sociale</option>
							<option>2. PRIVATO c)Ente filantropico</option>
							<option>2. PRIVATO d)Impr. sociale incluse le coop. sociali</option>
							<option>2. PRIVATO e)Rete associativa</option>
							<option>2. PRIVATO f) Società di mutuo soccorso</option>
							<option>2. PRIVATO g)Associazione riconosciuta</option>
							<option>2. PRIVATO h)Associazione non riconosciuta</option>
							<option>2. PRIVATO i)Fondazione</option>
							<option>2. PRIVATO j) Altro Ente</option>
						</select>
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Rappresentante Legale</label>
						<input type="text" class="form-control" name="rapplegale">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Cod</label>
						<input type="text" class="form-control" name="cod">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Sito Web</label>
						<input type="text" class="form-control" name="web">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Email</label>
						<input type="text" class="form-control" name="email" type="email">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">PEC</label>
						<input type="text" class="form-control" name="pec">
					</div>

					<div class="form-group">
					<label for="exampleFormControlInput1">Fax</label>
						<input type="text" class="form-control" name="fax">
					</div>


					
					<button type="submit" class="btn btn-info center-block" id="insert_ente" >SALVA E CONFERMA</button>
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
	
	<script type="text/javascript" src="js/libform.js"></script>
	<script type="text/javascript" src="js/util.js"></script>

</body>

</html>
