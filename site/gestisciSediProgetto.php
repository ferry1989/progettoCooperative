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
					<h2 class="page-header text-primary">Benvenuto <?php $_SESSION['username'] ?></h2>
				</div>
			</div>

			<div class="row">
					 
				<div class="col-lg-4">
				  <h3>Ricerca Sede Progetto</h3>
				  <div class="form-group mx-sm-3 mb-2">
					<div class="ente">
						<input type="hidden" class="type" value="search">
						<input type="hidden" class="file" value="progettosede">
						<table>
							<tr>
								<td>SEDE</td>
								<td>PROGETTO</td>
								<td></td>
							</tr>
							<tr>
								<td><select class="form-control" placeholder="settore intervento" id="seleziona_sedi" name='id_sede' >
										<option value="-1">-</option>
									</select>
								</td>
								<td><select class="form-control" placeholder="settore intervento" id="seleziona_progetti" name='id_progetto' >
										<option value="-1">-</option>
									</select>
								</td>
								
								<td><button type="submit" class="btn btn-primary mb-1" id="seleziona_sedi_progetti">Cerca</button></td>
							</tr>
						</table>
					</div>
				  </div>
				</div>
				
			</div>
			
			<table id="ricercati">
				<thead>
					<th>Progetto</th>
					<th>Sede</th>
					
					<th>Modifica</th>
					<th>Elimina</th>
				</thead>
				<tbody class="results">
				</tbody>
			</table>

		</div>
	</div>

<!-- TUTTI GLI SCRIPT__________________________________________________________________________________________ -->
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	<script type="text/javascript" src="js/libform.js"></script>
	<script type="text/javascript" src="js/jquery.dynatable.js"></script>
	

</body>

</html>