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
                	<img src="imgCustom/logo.jpg" style="height:26px; width: inherit;">
                </a>
            </div>
			
           <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a> 
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw "></i>Profilo Ente</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../script/logout.php"><i class="fa fa-sign-out fa-fw"></i>Disconnetti</a>
                        </li>
                    </ul>
                </li>
			</ul>
					
					
					
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
				<?php
					if($_SESSION['isAdmin'] == 1 || $_SESSION['id_regione'] > 0){
				?>
					<!-- Sezione di menu dedicata alla regione e all'admin -->
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i>Pannello di Controllo</a>
                        </li>
						<li>
                            <a href="inserisciUtente.php"><i class="fa fa-user fa-fw"></i><span data-toggle="modal" data-target="#inserisciente">Inserisci Utente</span></a>
                        </li>
						 <li>
                            <a href="inserisciEnte.php"><i class="fa fa-user fa-fw"></i><span data-toggle="modal" data-target="#inserisciente">Inserisci Ente</span></a>
                        </li>
						<li>
                            <a href="ricercaEnte.php"><i class="fa fa-user fa-fw"></i>Ricerca Ente</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-th-list fa-fw"></i> <span data-toggle="modal" data-target="#inserisciprogetto">Inserisci Progetto</i></a>
                        </li>
						<li>
                            <a href="indexrcercaprogetto.php"><i class="fa fa-th-list fa-fw"></i>Ricerca Progetto</a>
                        </li>
                        
                        <li>
                            <a href="indexrcercavolontario.php"><i class="fa fa-user fa-fw"></i>Gestione Volontari</a>
                        </li>
					<?php	}
							if($_SESSION['isAdmin'] == 1 || $_SESSION['id_ente'] > 0){
					?>
						<!-- Sezione di menu dedicata all'ente e all'admin -->
						<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i><span data-toggle="modal" data-target="#enteconsultaprogetto">Progetti</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i><span data-toggle="modal" data-target="#inseriscivolontario">Iserisci Candidati</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i>Gestione volontari in Servizio</a>
                        </li>
					<?php } ?>
                    </ul>
                </div>
            </div>
        </nav>