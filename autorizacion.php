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
    <link rel="stylesheet" href="css/materialize.min.css">
    
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
                            <li><a href="#" class="waves-effect waves-light">Cartera</a></li>
                            <li class="NavLateralDivider"></li>
                            <li><a href="#" class="waves-effect waves-light">Historial de Facturas</a></li>
                        </ul>
                    </li>
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-widgets zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i>Procesos</a>
                        <ul class="full-width">
                            <li><a href="#" class="waves-effect waves-light">Pedidos Pendientes</a></li>
                            <li class="NavLateralDivider"></li>
                            <li><a href="#" class="waves-effect waves-light">Forms</a></li>
                        </ul>
                    </li>
                    <li class="NavLateralDivider"></li>
                    <li>
                        <a href="#" class="NavLateral-DropDown  waves-effect waves-light"><i class="zmdi zmdi-view-web zmdi-hc-fw"></i> <i class="zmdi zmdi-chevron-down NavLateral-CaretDown"></i> Logistica</a>
                        <ul class="full-width">
                            <li><a href="#" class="waves-effect waves-light">Estado de Pedidos</a></li>
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
       
		 <div class="NavLateralDivider"></div>
        <!-- Your code here -->
  <?php
$comentario= $_POST["comentarios"];
$link=Conectarse();
$nit=$_SESSION["user"];
	$sql = "SELECT t.nit, sum(v.Saldo) as Saldo FROM v_cartera_edades v, terceros t, documentos d ,v_vendedores vv WHERE d.sw = 1 AND v.Saldo >0 and v.Nit = t.nit and v.Tipo = d.tipo and v.Numero = d.numero and t.vendedor = vv.vendedor AND t.nit = '".$nit."' GROUP BY t.nit";
	$scartera= sqlsrv_query( $link, $sql );
	$sql2 = "Select COUNT(*) as Num_Facturas from v_cartera_edades where Nit='".$nit."' AND SW=1 and Saldo>0 and Dias_Vencido>6";
	$factu= sqlsrv_query( $link, $sql2 );
	$sql3 = "select p.Nit,t.Nombres,sum(p.valor_total) as Valor_Total_Pedidos from documentos_ped p , terceros t where p.anulado=0 and p.nit=t.nit and despacho is null and p.nit='".$nit."' and sw=1 group by p.nit,t.Nombres order by t.nombres";
	$reped= sqlsrv_query( $link, $sql3 );
	$sql4 = "SELECT Nit,Nombres,Lista,Bloqueo,Condicion,vendedor, convert(varchar,Cupo_Credito) as Cupo_Credito from terceros  where nit= '".$nit."'";
	$result= sqlsrv_query( $link, $sql4 );
   	$cartera=sqlsrv_fetch_array($scartera, SQLSRV_FETCH_ASSOC);
	$fac=sqlsrv_fetch_array($factu, SQLSRV_FETCH_ASSOC);
	$ped=sqlsrv_fetch_array($reped, SQLSRV_FETCH_ASSOC);
	$row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
					          
				$_SESSION["Saldo_pendiente"]= $cartera["Saldo"];	
				if(($_SESSION["Cupo_Disponible"]= ($_SESSION["cupo"]-$cartera["Saldo"]- $ped["Valor_Total_Pedidos"]))<=0){
					$_SESSION["swc"]=1;
				}else{
					$_SESSION["swc"]=0;
				}
				if (($_SESSION["factu"]=$fac["Num_Facturas"])>0){
					$_SESSION["swf"]=1;
				}else{
					$_SESSION["swf"]=0;
				}
				$_SESSION["Saldo_pedidos"]=$ped["Valor_Total_Pedidos"];
				$_SESSION["bloqueo"]= $row["Bloqueo"];
			$seq=0;
			$stock_real=0;
			//se trae el consecutivo del siguiente pedido
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------
			$sql5 = "select top 1 Numero+1 as conse  from documentos_ped_historia where bodega=1 AND sw=2 order by numero desc";
			$conse= sqlsrv_query( $link, $sql5 );
			$csti=sqlsrv_fetch_array($conse, SQLSRV_FETCH_ASSOC);
			$consecutivo= $csti['conse'];
			$sql4 = "select numero from documentos_ped where bodega=1 and sw=2 and numero='".$csti["conse"]."'";	
			$valida_concecutivo=sqlsrv_query( $link, $sql4);
				if( $valida_concecutivo === false) {
					die( print_r( sqlsrv_errors(), true) );
				}
			$v_concecu=sqlsrv_fetch_array($valida_concecutivo, SQLSRV_FETCH_ASSOC);
			if (!isset($v_concecu['numero'])){
			//inserta en la cavezara de docuemntos_ped y documentos_ped_historia  
			//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			if(isset($_SESSION['carro'])){
				$sql5 = "insert into documentos_ped (sw,bodega,numero,nit,vendedor,fecha,condicion,dias_validez,descuento_pie,valor_total,fecha_hora,anulado,notas,usuario,pc,duracion,concepto,fecha_hora_entrega,codigo_direccion,Lista_Precios,fletes,iva_fletes )
				values (2,1,'".$consecutivo."','".$_SESSION["user"]."','".$_SESSION["vendedor"]."',CONVERT(datetime, DATEDIFF(d, 0, getdate()), 102),'".$_SESSION["condicion"]."','10','".$_SESSION["desc_pie"]."','".$_SESSION["totalcoste"]."',getdate(),'0','//TRANSFERENCIA VIA WEB 2.0 - ".$comentario."//','".$_SESSION["Usuario"]."','PC_WEB','1','4',getdate()+1,'0','".$_SESSION["lista"]."','0','0' )";
				$smtp= sqlsrv_query( $link, $sql5 );	
				//historia
				$sql6 = "insert into documentos_ped_historia (sw,bodega,numero,nit,vendedor,fecha,condicion,dias_validez,valor_total,fecha_hora,anulado,notas,usuario,pc,duracion,codigo_direccion,fletes,iva_fletes )
				values (2,1,'".$consecutivo."','".$_SESSION["user"]."','".$_SESSION["vendedor"]."',CONVERT(datetime, DATEDIFF(d, 0, getdate()), 102),'".$_SESSION["condicion"]."','10','".$_SESSION["totalcoste"]."',getdate(),'0','//TRANSFERENCIA VIA WEB 2.0 - ".$comentario."//','".$_SESSION["Usuario"]."','PC_WEB','1','0','0','0' )";
				$smtp= sqlsrv_query( $link, $sql6 );	
				//web
				$sql7 = "insert into documentos_ped_web (sw,numero,usuario)
				values (2,'".$consecutivo."','".$_SESSION["Usuario"]."')";
				$smtp= sqlsrv_query( $link, $sql7 );
												
				//setrae el codigo y la cantidad insertadors en el array de la seseion carro de comparas para insertarlo en el detalle
				//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
				foreach($_SESSION['carro'] as $id => $x){
					$id = (string) $id;
					$lista= $_SESSION["lista"];
					$sql8 = "SELECT r.Codigo,convert(varchar,r.porcentaje_iva) as iva, convert(float,r.valor_unitario*(1 - r.factor_venta_".$lista.")) as Precio_Uni FROM referencias r WHERE  r.codigo = '".$id."' and ref_anulada='N'";
					$stmt= sqlsrv_query( $link, $sql8 );
					$mifila=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
					
					$sql9 = "select (desc_".$lista.") as descu,convert(varchar,vcmto_refer) as fecha_venci  from referencias r,referencias_ter p  where r.codigo='".$id."' and r.codigo=p.codigo and convert (date,fecha_inicia_promocion)<= convert (date,GETDATE()) and CONVERT(date,vcmto_refer)>=convert (date, GETDATE())";
					$des= sqlsrv_query( $link, $sql9 );
					$desc=sqlsrv_fetch_array($des, SQLSRV_FETCH_ASSOC);
					
					$sql10 = "SELECT l.Codigo,r.Descripcion,(can_ini+can_ent-can_sal) as Stock ,sum(l.cantidad - isnull(cantidad_despachada,0)) as Pendiente,sum(despacho_virtual) as Despacho_Virtual,case when (((can_ini+can_ent-can_sal)-sum(l.cantidad - isnull(cantidad_despachada,0)))) <0 then 0 else ((can_ini+can_ent-can_sal)-sum(l.cantidad - isnull(cantidad_despachada,0))) end as Stock_Disponible
					FROM documentos_lin_ped l ,documentos_ped p , referencias_sto s , referencias r
					WHERE  p.numero=l.numero and p.bodega=l.bodega and p.sw=l.sw  and l.sw = 1 And l.bodega in( 1)  And l.cantidad - isnull(cantidad_despachada,0) > 0 and p.despacho is null
				 	and l.codigo=s.codigo and s.bodega=l.bodega and r.codigo=l.codigo and r.codigo=s.codigo  and s.codigo='".$id."'  and ANO=DATEPART(YYYY,GETDATE())  and mes=DATEPART(MM,GETDATE())
					group by l.codigo,r.descripcion,can_ini,can_ent,can_sal
					union
					select s.Codigo,r.Descripcion,(can_ini+can_ent-can_sal) as Stock ,Pendiente=0,Despacho_Virtual=0,Stock_Disponible=(can_ini+can_ent-can_sal)
					FROM referencias_sto s , referencias r
					where r.codigo=s.codigo and ANO=DATEPART(YYYY,GETDATE())  and mes=DATEPART(MM,GETDATE()) and s.bodega=1 and s.codigo='".$id."' and s.codigo not in
					(select distinct codigo from documentos_lin_ped l,documentos_ped p 
					where p.numero=l.numero and p.bodega=l.bodega and p.sw=l.sw  and l.sw = 1 And l.bodega in( 1)  And l.cantidad - isnull(cantidad_despachada,0) > 0 and p.despacho is null )
					ORDER BY r.descripcion";
					$depreal= sqlsrv_query( $link, $sql10 );
					$stdisp=sqlsrv_fetch_array($depreal, SQLSRV_FETCH_ASSOC);
					
					//--------------------------------------------------------------------------
					$descuen= $desc['descu'];
					$id = $mifila['Codigo'];
					$precio = $mifila['Precio_Uni'];
					$iva = $mifila['iva'];
					$stock_dis=$stdisp['Stock_Disponible'];
					$seq++;
					if ($x > $stock_dis){
						$stock_real= $stock_dis;	
					}else if ($x <= $stock_dis){
						$stock_real=$x;
					}
					//inserta el detalle del pedido en docuemntos_ped y docuemntos_ped_historia
					//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
					$sql11 = "insert into documentos_lin_ped (sw,bodega,numero,codigo,seq,cantidad,cantidad_despachada,valor_unitario,porcentaje_iva,porcentaje_descuento,und,cantidad_und,despacho_virtual,porc_dcto_2,porc_dcto_3)
					VALUES(2,1,'".$consecutivo."','".$id."','".$seq."','".$x."',0,'".$precio."','".$iva."',0,'UND',1,'".$stock_real."',0,'".$descuen."')";
					$smtp= sqlsrv_query( $link, $sql11);
					
					$sql12 = "insert into documentos_lin_ped_historia (sw,bodega,numero,codigo,id,seq,cantidad,cantidad_despachada,valor_unitario,porcentaje_iva,porcentaje_descuento,und,cantidad_und,despacho_virtual,porc_dcto_2,porc_dcto_3)
					VALUES(2,1,'".$consecutivo."','".$id."',convert(varchar,(select id from documentos_lin_ped where bodega=1 and sw=2 and numero= '".$consecutivo."' and codigo='".$id."')),'".$seq."','".$x."',0,'".$precio."','".$iva."',0,'UND',1,'".$stock_real."',0,'".$descuen."')";
					$smtp= sqlsrv_query( $link, $sql12);
					
					//------------------------para insertar bonificados-----------------------------------------------------------------------------------------------------------	
					
					$sql13 = "select f.codigo, codigo_bonifica,r.descripcion ,condicion_compra, bonificacion,s.Stock_Disponible ,nota 
										from logistica_taboada..bonificacion_oferta f, v_consulta_stock_disponible_pag_web s, referencias r
										where f.codigo_bonifica=r.codigo and f.codigo_bonifica=s.Codigo and s.Stock_Disponible>0 and f.codigo='".$id."'";
					$pro= sqlsrv_query( $link, $sql13 );
					$pomo=sqlsrv_fetch_array($pro, SQLSRV_FETCH_ASSOC);
					
					if ($pomo['codigo']!=""){
						$codb= $pomo['codigo_bonifica'];
						
						$sql14 = "SELECT r.Codigo,convert(varchar,r.porcentaje_iva) as iva, convert(float,r.valor_unitario*(1 - r.factor_venta_".$lista.")) as Precio_Uni FROM referencias r WHERE  r.codigo = '".$codb."' and ref_anulada='N'";
						$stmt= sqlsrv_query( $link, $sql14 );
						$mifila=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
						
						$sql15= "select (desc_".$lista.") as descu,convert(varchar,vcmto_refer) as fecha_venci  from referencias r,referencias_ter p  where r.codigo='".$codb."' and r.codigo=p.codigo and fecha_inicia_promocion<=GETDATE() and vcmto_refer>=GETDATE()";
						$des= sqlsrv_query( $link, $sql15 );
						$desc=sqlsrv_fetch_array($des, SQLSRV_FETCH_ASSOC);
						
						$sql16= "SELECT l.Codigo,r.Descripcion,(can_ini+can_ent-can_sal) as Stock ,sum(l.cantidad - isnull(cantidad_despachada,0)) as Pendiente,sum(despacho_virtual) as Despacho_Virtual,case when (((can_ini+can_ent-can_sal)-sum(l.cantidad - isnull(cantidad_despachada,0)))) <0 then 0 else ((can_ini+can_ent-can_sal)-sum(l.cantidad - isnull(cantidad_despachada,0))) end as Stock_Disponible
						FROM documentos_lin_ped l ,documentos_ped p , referencias_sto s , referencias r
						WHERE  p.numero=l.numero and p.bodega=l.bodega and p.sw=l.sw  and l.sw = 1 And l.bodega in( 1)  And l.cantidad - isnull(cantidad_despachada,0) > 0 and p.despacho is null
				 		and l.codigo=s.codigo and s.bodega=l.bodega and r.codigo=l.codigo and r.codigo=s.codigo  and s.codigo='".$codb."'  and ANO=DATEPART(YYYY,GETDATE())  and mes=DATEPART(MM,GETDATE())
						group by l.codigo,r.descripcion,can_ini,can_ent,can_sal
						union
						select s.Codigo,r.Descripcion,(can_ini+can_ent-can_sal) as Stock ,Pendiente=0,Despacho_Virtual=0,Stock_Disponible=(can_ini+can_ent-can_sal)
						FROM referencias_sto s , referencias r
						where r.codigo=s.codigo and ANO=DATEPART(YYYY,GETDATE())  and mes=DATEPART(MM,GETDATE()) and s.bodega=1 and s.codigo='".$codb."' and s.codigo not in
						(select distinct codigo from documentos_lin_ped l,documentos_ped p 
						where p.numero=l.numero and p.bodega=l.bodega and p.sw=l.sw  and l.sw = 1 And l.bodega in( 1)  And l.cantidad - isnull(cantidad_despachada,0) > 0 and p.despacho is null )
						ORDER BY r.descripcion";
						$depreal= sqlsrv_query( $link, $sql16);
						$stdisp=sqlsrv_fetch_array($depreal, SQLSRV_FETCH_ASSOC);
												
					//--------------------------------------------------------------------------
						$descuen= $desc['descu'];
						$id = $mifila['Codigo'];
						$precio = $mifila['Precio_Uni'];
						$iva = $mifila['iva'];
						$stock_dis=$stdisp['Stock_Disponible'];
						if($stock_dis>0){
							$x=(int)$x;
							$prom=$x*$pomo['bonificacion']/$pomo['condicion_compra'];
							$prom=(int)$prom;
							if($prom<=$stock_dis){
								$C_bonificacion=$prom;
							}else{
								$C_bonificacion=$stock_dis;
							}
							if($C_bonificacion>0){
								$seq++;
								$sql17 = "insert into documentos_lin_ped (sw,bodega,numero,codigo,seq,cantidad,cantidad_despachada,valor_unitario,porcentaje_iva,porcentaje_descuento,und,cantidad_und,despacho_virtual,porc_dcto_2,porc_dcto_3)
								VALUES(2,1,'".$consecutivo."','".$id."','".$seq."','".$C_bonificacion."',0,'".$precio."','".$iva."',0,'UND',1,'".$C_bonificacion."',0,'".$descuen."')";
								$smtp= sqlsrv_query( $link, $sql17 );
								$sql18 = "insert into documentos_lin_ped_historia (sw,bodega,numero,codigo,id,seq,cantidad,cantidad_despachada,valor_unitario,porcentaje_iva,porcentaje_descuento,und,cantidad_und,despacho_virtual,porc_dcto_2,porc_dcto_3)
								VALUES(2,1,'".$consecutivo."','".$id."',convert(varchar,(select id from documentos_lin_ped where bodega=1 and sw=2 and numero= '".$consecutivo."' and codigo='".$id."')),'".$seq."','".$C_bonificacion."',0,'".$precio."','".$iva."',0,'UND',1,'".$C_bonificacion."',0,'".$descuen."')";
								$smtp= sqlsrv_query( $link, $sql18 );
								
							}
						}
					}	
				
			}
			$seq++;
			$sql10 = "insert into documentos_lin_ped (sw,bodega,numero,codigo,seq,cantidad,cantidad_despachada,valor_unitario,porcentaje_iva,porcentaje_descuento,und,cantidad_und,despacho_virtual,porc_dcto_2,porc_dcto_3)
					VALUES(2,1,'".$consecutivo."','999000','".$seq."','2',0,'0','0',0,'UND',1,'2',0,'0')";
						$stmt = sqlsrv_query( $link, $sql10);
						if( $stmt === false ) {
							die( print_r( sqlsrv_errors(), true));
						}
					$sql11 = "insert into documentos_lin_ped_historia (sw,bodega,numero,codigo,id,seq,cantidad,cantidad_despachada,valor_unitario,porcentaje_iva,porcentaje_descuento,und,cantidad_und,despacho_virtual,porc_dcto_2,porc_dcto_3)
					VALUES(2,1,'".$consecutivo."','999000',convert(varchar,(select id from documentos_lin_ped where bodega=1 and sw='2' and numero= '".$consecutivo."' and codigo='999000')),'".$seq."','2',0,'0','0',0,'UND',1,'2',0,'0')";
						$stmt = sqlsrv_query( $link, $sql11);
						if( $stmt === false ) {
							die( print_r( sqlsrv_errors(), true));
						}						
			
			$sql19 = "UPDATE SIMOP..documentos_web_ped SET estado='1' where numero='".$_SESSION['num_orde']."'";
			$smtp= sqlsrv_query( $link, $sql19 );
			unset($_SESSION['num_orde']);
			unset($_SESSION['carro']);
			}else{
				?>
			<script language="JavaScript" type="text/JavaScript">
            		alert(" No hay Pedido Cargado"); 
            		window.location.replace("pedido_cliente.php");  
            	</script>
             <?php	
			}
			}else {?>
			<script language="JavaScript" type="text/JavaScript">
            		alert("Se presentaron errores al actualizar intentelo de nuevo"); 
            		window.location.replace("http://www.taboada.com.co/simop_clientes/carroCompras/carro.php?action=mostrar");  
            	</script>
				 <?php
		}			
?>
<center>
<table width="50%" border="0">
  <tr>
     <td class="tituloPagina" colspan="3" scope="col"><h2>Autorizacion Generada Numero:<?php echo $consecutivo; ?></h2></td>
     </tr>
  <tr>
    <td class="componenteFormulario" scope="row">Cliente </td>
    <td class="componenteFormulario" width="407"><?php echo $_SESSION["nombre"];?></td>
   
  </tr>
  <tr>
    <td class="componenteFormulario" scope="row"><p>Valor del Pedido Para Autorizar</p></td>
    <td class="componenteFormulario">$<?php echo  number_format ($_SESSION["totalcoste"],2) ?></td>
 </tr>
  
</table>
</center>
<?php
$id = $consecutivo;
	echo "<div class=verproductos>";
	echo"<center>";
	echo "<table  width='90%' border=0 cellspacing=0 cellpadding=0 class='altrowstable' id='alternatecolor'>";
	echo "<tr>";
	echo "<td style='text-align:center;color: #ffffff; background-color: #003C6D;'background=''>Codigo</td>";
	echo "<td style='text-align:center;color: #ffffff;background-color: #003C6D;'background=''>Descripcion</td>";
	echo "<td style='text-align:center;color: #ffffff; background-color: #003C6D;'background=''>Cantidad</td>";
	echo "<td style='text-align:center;color: #ffffff; background-color: #003C6D;'background=''>Despacho</td>";
	echo "<td style='text-align:center;color: #ffffff; background-color: #003C6D;'background=''>Iva</th>";
	echo "<td style='text-align:center;color: #ffffff; background-color: #003C6D;'background=''>Valor Unitario</td>";
	echo "<td style='text-align:center;color: #ffffff; background-color: #003C6D;'background=''>Descuento</td>";
	echo "<td style='text-align:center;color: #ffffff;background-color: #003C6D;'background=''>Valor Total</td>";

	echo "<tr><td colspan=10><hr></td></tr>";
	$sql21 = "select p.valor_total, l.Codigo,r.Descripcion,Cantidad,despacho_virtual,l.Porcentaje_Iva as Iva,l.Valor_Unitario,porc_dcto_3 as '% Descuento',l.Valor_Unitario*cantidad*(1+l.porcentaje_iva/100) as 'Vlr Total'
	from documentos_lin_ped l , referencias r, documentos_ped p where l.numero=p.numero and p.bodega=l.bodega and l.sw=p.sw  and l.codigo=r.codigo and l.numero='".$consecutivo."' order by descripcion";
	$fact= sqlsrv_query( $link, $sql21 );
					
	$sql22 = "select p.valor_total from documentos_lin_ped l , referencias r, documentos_ped p where l.numero=p.numero and p.bodega=l.bodega and l.sw=p.sw  and l.codigo=r.codigo and l.numero='".$consecutivo."' group by p.valor_total ";
	$Valor= sqlsrv_query( $link, $sql22 );				
	$valor_to=sqlsrv_fetch_array($Valor, SQLSRV_FETCH_ASSOC);
	
		
	while($fact_fecha=sqlsrv_fetch_array($fact, SQLSRV_FETCH_ASSOC)){
		$descri=$fact_fecha['Descripcion'];
		echo "<tr class='borde_tabla'>";
		echo "<td align='center'><font size=2>".$fact_fecha['Codigo']." </font></td>";
		echo "<td align='left'><font size=2>".$descri."</font></td>";
		echo "<td align='center'><font size=2>".$fact_fecha['Cantidad']."</font></td>";
		echo "<td align='center'><font size=2>".$fact_fecha['despacho_virtual']."</font></td>";
		echo "<td align='center'><font size=2>".$fact_fecha['Iva']."</font></td>";
		echo "<td align='center'><font size=2>".number_format ($fact_fecha['Valor_Unitario'],2)."</font></td>";
		echo "<td align='center'><font size=2>".number_format ($fact_fecha['% Descuento'],2)."</font></td>";
		echo "<td align='center'><font size=2>".number_format ($fact_fecha['Vlr Total'],2)."</font></td>";
		echo "</tr>";
	}
		echo "<tr class='borde_tabla'>";
		echo "<td align='center'  colspan='3'><font size=4>Total</font></td>";
		echo "<td align='right' colspan='6'><font size=4> $".number_format ($valor_to['valor_total'],2)."</font></td>";
		echo "</tr>";
		echo"</table>";
		echo"</center>";
		echo"</div>";
unset($_SESSION["user"]);
unset($_SESSION["nombre"]);
unset($_SESSION["razon_comercial"]);
unset($_SESSION["direccion"]);
unset($_SESSION["telefono_1"]);
unset($_SESSION["ciudad"]);
unset($_SESSION["valid"]);
unset($_SESSION["lista"]);
unset($_SESSION["Saldo_pendiente"]);
unset($_SESSION["cupo"]);
unset($_SESSION["Cupo_Disponible"]);
unset($_SESSION["swc"]);
unset($_SESSION["swf"]);
unset($_SESSION["bloqueo"]);
unset($_SESSION["condicion"]);
unset($_SESSION["vendedor"]);
unset($_SESSION["totalcoste"]);
unset($_SESSION['num_orde']);
unset($_SESSION['carro']);
?>

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