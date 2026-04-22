<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<?php 
require_once("tokenp.php");
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SIMOP</title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
        <link type="text/css" href="css/demo_table.css" rel="stylesheet" />
				<link type="text/css" href="css/style_2.css" rel="stylesheet" />
		
				
     <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    
     <!-- Materialize CSS -->
    <link rel="stylesheet" href="css/materialize_2.min.css">
    
     <!-- Material Design Iconic Font CSS -->
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    
    <!-- Malihu jQuery custom content scroller CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    
    <!-- Sweet Alert CSS -->
    <link rel="stylesheet" href="css/sweetalert.css">
    
    <!-- MaterialDark CSS -->
    <link rel="stylesheet" href="css/style.css">
	
</head>
<body>

    <!-- Nav Lateral -->
	
    <section class="NavLateral full-width">
	 
        <div class="NavLateral-FontMenu full-width ShowHideMenu"></div>
        <div class="NavLateral-content full-width">
            <header class="NavLateral-title full-width center-align">
                SIMOP 2.0 <i class="zmdi zmdi-close NavLateral-title-btn ShowHideMenu"></i>
            </header>
            <figure class="full-width NavLateral-logo">
			  <img src="assets/img/user.png" alt="material-logo" class="responsive-img center-box">
            <h6 class="center-align"><?php echo $_SESSION["nombre_tran"];?></h6>
            </figure> 
            <div class="NavLateral-Nav">
                <ul class="full-width">
                    <li>
                        <a href="home.php" class="waves-effect waves-light"><i class="zmdi zmdi-desktop-mac zmdi-hc-fw"></i>Inicio</a>
                    </li>    
                    <li class="NavLateralDivider"></li>
					<li>
                        <a href="clientes.php" class="waves-effect waves-light"><i class="zmdi zmdi-language-css3 zmdi-hc-fw"></i>Pedidos</a>
                    </li>    
                    
					<li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-language-css3 zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i>Informes</a>
                        <ul class="full-width">
                            <li><a href="typography-shadow.html" class="waves-effect waves-light">Cartera</a></li>
                            <li class="NavLateralDivider"></li>
                            <li><a href="hist_fac.php" class="waves-effect waves-light">Historial de Facturas</a></li>
                        </ul>
                    </li>
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-widgets zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i>Procesos</a>
                        <ul class="full-width">
                            <li><a href="pendientes_cli.php" class="waves-effect waves-light">Pedidos Pendientes</a></li>
                            <!--<li class="NavLateralDivider"></li>
                            <li><a href="form.html" class="waves-effect waves-light">Forms</a></li>-->
                        </ul>
                    </li>
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-view-web zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i> Logistica</a>
                        <ul class="full-width">
                            <li><a href="template.html" class="waves-effect waves-light">Estado de Pedidos</a></li>
                        </ul>
                    </li>   
                </ul>
            </div>  
        </div>  
    </section>

    <!-- Page content -->
    <section class="ContentPage full-width">
        <!-- Nav Info -->
        <div class="ContentPage-Nav full-width">
            <ul class="full-width">
                <li class="btn-MobileMenu ShowHideMenu"><a href="#" class="tooltipped waves-effect waves-light" data-position="bottom" data-delay="50" data-tooltip="Menu"><i class="zmdi zmdi-more-vert"></i></a></li>
                <li><a href="#" class="tooltipped waves-effect waves-light btn-ExitSystem" data-position="bottom" data-delay="50" data-tooltip="Logout"><i class="zmdi zmdi-power"></i></a></li>
                <li><a href="#" class="tooltipped waves-effect waves-light btn-Search" data-position="bottom" data-delay="50" data-tooltip="Search"><i class="zmdi zmdi-search"></i></a></li>
                <li>
                    <a href="#" class="tooltipped waves-effect waves-light btn-Notification" data-position="bottom" data-delay="50" data-tooltip="Notifications">
                        <i class="zmdi zmdi-notifications"></i>
                        <span class="ContentPage-Nav-indicator bg-danger">2</span>
                    </a>
                </li>
            </ul>   
        </div>

        <!-- Notifications area -->
        <section class="z-depth-3 NotificationArea">
            <div class="full-width center-align NotificationArea-title">Notifications <i class="zmdi zmdi-close btn-Notification"></i></div>
            <a href="#" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as UnRead"></i>
                        <strong>New User Registration</strong> 
                        <br>
                        <small>Just Now</small>
                    </p>
                </div>
            </a>  
            <a href="#" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle-o tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as Read"></i>
                        <strong>New Updates</strong> 
                        <br>
                        <small>30 Mins Ago</small>
                    </p>
                </div>
            </a>
            <a href="#" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as UnRead"></i>
                        <strong>Archive uploaded</strong> 
                        <br>
                        <small>31 Mins Ago</small>
                    </p>
                </div>
            </a> 
            <a href="#" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle-o tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as Read"></i>
                        <strong>New Mail</strong> 
                        <br>
                        <small>37 Mins Ago</small>
                    </p>
                </div>
            </a>
            <a href="#" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-folder bg-primary"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle-o tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as Read"></i>
                        <strong>Folder delete</strong> 
                        <br>
                        <small>1 hours Ago</small>
                    </p>
                </div>
            </a>  
        </section>
        <!-- Your code here -->
        <h4 class="center-align">
		Pedidos pendientes
		</h4>
		 <div class="NavLateralDivider"></div>
        <!-- Your code here -->
        <article id="contenido_tem"></article>
        <!-- Footer -->
        <footer class="footer-MaterialDark">
           
            <div class="footer-copyright">
                <div class="container center-align">
                    © 2020 Medimarcas S.A.S
                </div>
            </div>
        </footer>
		
    </section>
    
    <!-- Sweet Alert JS -->
    <script src="js/sweetalert.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-2.2.0.min.js"><\/script>')</script>
    
    <!-- Materialize JS -->
    <script src="js/materialize.min.js"></script>
    
    <!-- Malihu jQuery custom content scroller JS -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <!-- MaterialDark JS -->
    <script src="js/main.js"></script>
	
</body>
</html>