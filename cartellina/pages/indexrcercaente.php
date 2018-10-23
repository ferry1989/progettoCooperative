<?php $dbconnect = mysqli_connect('localhost','ks2lrdkn_alex2','progettoregione','ks2lrdkn_ale'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Servizio Civile Regionale</title>
<link rel="icon" href="../imgCustom/logoico1.ico" >

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="indexr.html">
                	<img src="../imgCustom/logo.jpg" style="height:26px; width: inherit;">
                </a>
            </div>
            <!-- /.navbar-header -->

           <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                  <!--  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a> -->
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a> -->
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a> -->
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a> 
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw "></i>Profilo Regione</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Disconnetti</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <!--  <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            
                        </li> -->
                        <li>
                            <a href="indexr.php"><i class="fa fa-dashboard fa-fw"></i>Pannello di Controllo</a>
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i><span data-toggle="modal" data-target="#inserisciente">Inserisci Ente</span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
						  <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>Ricerca Ente</a>
                            
                            
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-th-list fa-fw"></i> <span data-toggle="modal" data-target="#inserisciprogetto">Inserisci Progetto</i></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
						<!--  <li>
                            <a href="#"><i class="fa fa-th-list fa-fw"></i>Ricerca Progetto</a>
                            
                            /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>Gestione Volontari</a>
                        </li>
                        
                       
                         
                      
                        <li>
                            <a href="#"><i class="fa fa-wrench  fa-fw  "></i><span class="text-danger"> Roba di Ale (non usare!)</span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<!-- contenuto della pagina indexr (che sarebbe l' index per la regione che si logga: quando uno della regione si logga accede qui )-->




<?php
include ('5forms/anagraficaEnte.php');
?>

<?php
include ('5forms/schedaProgetto.php');
?>






<div id="page-wrapper">
            
<div class="row">
<div class="col-md-12">	
	<table class="table table-bordered" >
  <thead style="background:#428bca;">
    <tr>
     
      <th  style="color : white;">Ente</th>
      <th  style="color : white;">Codice Fiscale</th>
	  <th  style="color : white;">Tipo</th>
      <th  style="color : white;">Rappresentante Legale</th>
      <th  style="color : white;">Telefono</th>
      <th  style="color : white;">Fax</th>
      <th  style="color : white;">HTTP</th>
      <th  style="color : white;">E-Mail</th>
      <th  style="color : white;">Pec</th>
      <th  style="color : white;">Provincia</th>
      <th  style="color : white;">Comune</th>
      <th  style="color : white;">Indirizzo</th>
      <th  style="color : white;">Numero Civico</th>
      <th  style="color : white;">C.A.P.</th>
       <th  style="color : white;">Azione 1</th>
	  <th  style="color : white;">Azione 2</th>
     
     
    
    </tr>
  </thead>
  <tbody>
  <?php
  
  if(isset($_POST['search'])){
	
	$valuetosearch1 = $_POST['valuetosearch1'];
	$valuetosearch2 = $_POST['valuetosearch2'];
	$valuetosearch3 = $_POST['valuetosearch3'];
	
	$query = "SELECT * FROM ente WHERE provincia  LIKE '%".$valuetosearch1."%' AND titolo LIKE '%".$valuetosearch3."%' AND  tipo LIKE '%".$valuetosearch2."%' ";
	$search_result = filterTable($query);
}
else{
	
	
	$query ="SELECT * FROM ente ";
	$search_result = filterTable($query);
}
	

	/*
	 *faccio una funzione che riceve tutte le query che imposto
	 */
	
	function filterTable($query){
		
		global $dbconnect;
		$filter_Result = mysqli_query ($dbconnect, $query);
		return $filter_Result;
		
	}


     while($row = mysqli_fetch_array($search_result))
      {  ?>
    <tr>
	        
			<td><strong><?php  echo $row['nomeente']; ?></strong></td>
			<td><strong><?php  echo $row['cf']; ?></strong></td>
			<td><strong><?php  echo $row['tipo']; ?></strong></td>
			<td><strong><?php  echo $row['rapleg']; ?></strong></td>
			<td><strong><?php  echo $row['tel']; ?></strong></td>
			<td><strong><?php  echo $row['fax']; ?></strong></td>
			<td><strong><?php  echo $row['http']; ?></strong></td>
			<td><strong><?php  echo $row['email']; ?></strong></td>
			<td><strong><?php  echo $row['pec']; ?></strong></td>
			<td><strong><?php  echo $row['pv']; ?></strong></td>
			<td><strong><?php  echo $row['com']; ?></strong></td>
			<td><strong><?php  echo $row['ind']; ?></strong></td>
			<td><strong><?php  echo $row['nc']; ?></strong></td>
			<td><strong><?php  echo $row['cap']; ?></strong></td>
			
			<td>  <button type="button" class="btn btn-warning" >MODIFICA</button></td>
			<td>  <button type="button" class="btn btn-danger" >ELIMINA</button></td>
	</tr>
		
	
    
	<?php } ?>
  </tbody>
</table>
	
 




	
      </div>
	  
	 
	 </div> 

		
</div>
			 
			 
			 
            
                
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				

<!-- le tabelle per provincia -->
 
             

<div class="row">
               
                </div>
                <!-- /.col-lg-6 -->
            </div>









        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<!-- TUTTI GLI SCRIPT__________________________________________________________________________________________ -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
