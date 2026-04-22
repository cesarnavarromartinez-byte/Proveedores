<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<?php 
require_once("tokenp.php");
//include("conex.php"); //conexión con la base de datos
if (isset($_GET['id'])){
	$id = $_GET['id'];
}else{ //en caso de no estar informada, le asignamos 1.---------------------------------------------------------------------------------------
	$id = 1;
}
//comprobamos si la variable action viene informada en la URL-------------------------------------------------------------------------------------
if (isset($_GET['action'])){
	$action = $_GET['action'];
}else{
	$action = "empty"; //si no viene informada, asignamos el valor "empty"----------------------------------------------------------------------
/*MOSTRAR Carro*/
}if (isset($_POST['cantidad'])){
	$d=$_POST['cantidad'];
}else{
	$d = $_SESSION['carro'][$id]; //si no viene informada, asignamos el valor "1"--------------------------------------------------------------------------------------
}
/*MOSTRAR Carro--------------------------------------------------------------------------------------------------------------------------------------*/
switch($action){
	case "add":
	if(isset($_SESSION['carro'][$id])){
			$_SESSION['carro'][$id]=$d;
		
	}else{
		if(isset($_SESSION['num_orde'])){
			}else{
					$sql = "select top 1 Numero+1 as conse  from SIMOP..documentos_web_ped order by numero desc";
					$conse=  sqlsrv_query( $link, $sql );
					$csti= sqlsrv_fetch_array($conse, SQLSRV_FETCH_ASSOC);
					$_SESSION['num_orde']=$csti['conse'];
					$sql1 = "insert into SIMOP..documentos_web_ped (numero,nit,usuario,estado,fecha)
					values ('".$_SESSION['num_orde']."','".$_SESSION["user"]."','".$_SESSION["Usuario"]."','0',getdate())";
					$conse1=  sqlsrv_query( $link, $sql1 );
					
			}
		$sql2 = "INSERT INTO SIMOP..documentos_web_lin_ped (numero,codigo,cantidad)
		VALUES('".$_SESSION['num_orde']."','".$id."','".$d."')";
		$smtp=  sqlsrv_query( $link, $sql2 );
		$_SESSION['carro'][$id]=$d;
	
		}
	
	break;
	case "removeProd":
		if(isset($_SESSION['carro'][$id])){
			$n_orden= $_SESSION['num_orde'];
			$sql3 = "DELETE FROM SIMOP..documentos_web_lin_ped  where numero='".$n_orden."' and codigo='".$id."'";
			$smtp=  sqlsrv_query( $link, $sql3);
			unset($_SESSION['carro'][$id]);
	
		} 
		
	break;
	case "mod":
		if(isset($_SESSION['carro'][$id])){
			$id3= $_GET['id'];
			$id3 = (string) $id3;
			$n_orden= $_SESSION['num_orde'];
			$sql4 = "UPDATE SIMOP..documentos_web_lin_ped SET cantidad='".$d."' where numero='".$n_orden."' and codigo='".$id."'";
			$smtp=  sqlsrv_query( $link, $sql4);
			$_SESSION['carro'][$id]=$d;
					
		}

	break;
	
}
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SIMOP</title>
	  
	  <!--    ESTILO GENERAL   -->
              <!--    ESTILO GENERAL    -->
        <!--    JQUERY   -->
	
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
        <link type="text/css" href="css/demo_table.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/style_5.css"/>
		<link type="text/css" href="css/style_2.css" rel="stylesheet" />
		
        <!--    FORMATO DE TABLAS    -->
	    
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
                            <li><a href="transferencias.php" class="waves-effect waves-light">Transferencias</a></li>
                            <li class="NavLateralDivider"></li>
                            <li><a href="hist_fac.php" class="waves-effect waves-light">Historial de Facturas</a></li>
                        </ul>
                    </li>
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-widgets zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i>Procesos</a>
                        <ul class="full-width">
                            <li><a href="pendientes_cli.php" class="waves-effect waves-light">Pedidos Pendientes</a></li>
                           <!-- <li class="NavLateralDivider"></li>
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
                <li><a href="#" class="tooltipped waves-effect waves-light btn-ExitSystem" data-position="bottom" data-delay="50" data-tooltip="Cerrar sesion"><i class="zmdi zmdi-power"></i></a></li>
                <li><a href="#" class="tooltipped waves-effect waves-light btn-Search" data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="zmdi zmdi-search"></i></a></li>
                <li>
                    <a href="#" class="tooltipped waves-effect waves-light btn-Notification" data-position="bottom" data-delay="50" data-tooltip="Cliente">
                        <i class="zmdi zmdi-notifications"></i>
                        <span class="ContentPage-Nav-indicator bg-danger">2</span>
                    </a>
                </li>
            </ul>   
        </div>

    
       <!-- Notifications area -->
        <section class="z-depth-3 NotificationArea">
            <div class="full-width center-align NotificationArea-title">Datos del cliente <i class="zmdi zmdi-close btn-Notification"></i></div>
            <a href="clientes_destruir.php" class="waves-effect Notification">
                <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle tooltipped" data-position="left" data-delay="50" data-tooltip="Notification as UnRead"></i>
                        <strong><?php echo "Nit: ".$_SESSION["user"]; ?></strong> 
                        <br>
                        <small><?php echo "Nombre: ".$_SESSION["nombre"]; ?></small>
						<br>
						<small><?php echo "Razon Comercial: ".$_SESSION["razon_comercial"]; ?></small>
						<br>
						<small><?php echo "Direccion: ".$_SESSION["direccion"]; ?></small>
						<br>
						<small><?php echo "Ciudad: ".$_SESSION["ciudad"]; ?></small>
                    </p>
                </div>
            </a>  
            
             
        </section>
        
        <!-- Your code here -->
		<thead>	
        <h4 class="center-align">
		 		Detalles del pedido
				</h4>
				  <div class="NavLateralDivider"></div>
				  
		</thead>
		 <!-- Your code here -->
        <article id="contenidocarro"></article>
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