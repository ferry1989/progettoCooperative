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
            <img src="../images/logo.jpg" style="height:26px; width: inherit;">
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
                <li><a href="../../scripts/logout.php"><i class="fa fa-sign-out fa-fw"></i>Disconnetti</a>
                </li>
            </ul>
        </li>
    </ul>
					
					
					
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <?php
                    if($_SESSION['isAdmin'] == 1){
                ?>
                    <!-- Sezione di menu dedicata alla regione e all'admin -->
                    <li class="dataform" name="dashboard">
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i>Pannello di Controllo</a>
                    </li>
                    <li class="dataform" name="inserisciUtente">
                        <a href="#"><i class="fa fa-user fa-fw"></i><span data-toggle="modal" data-target="#inserisciutente">Inserisci Utente</span></a>
                    </li>
                    <li class="dataform" name="inserisciEnte">
                        <a href="#"><i class="fa fa-user fa-fw"></i><span data-toggle="modal" data-target="#inserisciente">Inserisci Ente</span></a>
                    </li>
                    <li class="dataform" name="ricercaEnte">
                        <a href="#"><i class="fa fa-user fa-fw"></i><span data-toggle="modal" data-target="#ricercaente">Ricerca Ente</span></a>
                    </li>
                    <li class="dataform" name="inserisciSede">
                    <a href="#"><i class="fa fa-th-list fa-fw"></i> <span data-toggle="modal" data-target="#inseriscisede">Inserisci Sede</span></a>
                    </li>
                    <li class="dataform" name="inserisciProgetto">
                        <a href="#"><i class="fa fa-th-list fa-fw"></i> <span data-toggle="modal" data-target="#inserisciprogetto">Inserisci Progetto</span></a>
                    </li>
                <?php	
                }
                ?>
                <!-- Sezione di menu dedicata all'ente e all'admin -->
                <li class="dataform" name="ricercaProgeto">
                    <a href="#"><i class="fa fa-th-list fa-fw"></i><span data-toggle="modal" data-target="#ricercaprogetto">Ricerca Progetto</span></a>
                </li>
                <li class="dataform" name="inserisciVolontario">
                    <a href="#"><i class="fa fa-table fa-fw"></i><span data-toggle="modal" data-target="#inseriscivolontario">Inserisci Volontario</span></a>
                </li>
                <li class="dataform" name="inserisciPresenze">
                    <a href="#"><i class="fa fa-table fa-fw"></i><span data-toggle="modal" data-target="#inseriscipresenze">Inserisci Presenze</span></a>
                </li>
                <li class="dataform" name="esportaPresente">
                    <a href="#"><i class="fa fa-table fa-fw"></i><span data-toggle="modal" data-target="#esportapresenze">Esporta Presenze</span></a>
                </li>
                <li class="dataform" name="gestioneVolontari">
                    <a href="#"><i class="fa fa-user fa-fw"></i><span data-toggle="modal" data-target="#gestionevolontari">Gestione Volontari</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>