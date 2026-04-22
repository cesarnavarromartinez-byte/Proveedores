<html>
<head>
</head>
<body>
<?php
$nit= $_GET['id'];
if(isset($nit)){
	include("tokenp.php");
   	$link=Conectarse();
$sql = "SELECT  t.nit,Nombres, telefono_1,Lista,Bloqueo,celular, convert (date, fecha_cumple_ter) as fecha_cumple ,mail, direccion ,Condicion,vendedor, convert(varchar,(Cupo_Credito*1.2)) as Cupo_Credito from terceros t where  t.nit= '".$nit."'";
$Usuari=  sqlsrv_query($link, $sql);
$usuario  = sqlsrv_fetch_array( $Usuari, SQLSRV_FETCH_ASSOC);
if (isset ($usuario['nit'])){
	$sql2 = "SELECT   t.nit, (Select COUNT(*) as Num_Facturas from v_cartera_edades where Nit='".$nit."' AND SW=1 and Saldo>0 and Dias_Vencido>5) Vencidas, isnull (sum(v.Saldo),0) as Saldo,  isnull ((select sum(p.valor_total) from documentos_ped p  where p.anulado=0 and despacho is null and p.nit='".$nit."' and sw=1 ),0) Valor_Total_Pedidos, ((t.cupo_credito*1.2) - isnull( SUM(v.Saldo),0) - isnull((select sum(p.valor_total) from documentos_ped p  where p.anulado=0 and despacho is null and p.nit='".$nit."' and sw=1 ),0) )Cupo_disponible   FROM v_cartera_edades v, terceros t WHERE v.Saldo >0 and v.Nit = t.nit  AND t.nit = '".$nit."' GROUP BY t.nit, t.cupo_credito";
	$cr= sqlsrv_query( $link, $sql2);
	$cartera = sqlsrv_fetch_array( $cr, SQLSRV_FETCH_ASSOC);
	session_start();
		$_SESSION["user"]=$usuario["nit"];
		$_SESSION["celular"]=$usuario["celular"];
		$_SESSION["cumple"]=$usuario["fecha_cumple"];
		$_SESSION["email"]=$usuario["email"];
		$_SESSION["direccion"]=$usuario["direccion"];
		$_SESSION["nombre"]= $usuario["Nombres"];
		$_SESSION["telefono_1"]= $usuario["telefono_1"];
	    $_SESSION["auten"]= 1;
		 $_SESSION["auten"]= 1;
		if ($usuario["Lista"]==98){
		$_SESSION["lista"]=1;	
		}else{	
		$_SESSION["lista"]= $usuario["Lista"];
		}
		$_SESSION["Saldo_pendiente"]= $cartera["Saldo"];
		$_SESSION["cupo"]= $Usuario["Cupo_Credito"];
        $_SESSION["Cupo_Disponible"]=$cartera["Cupo_disponible"]; 		
				if($_SESSION["Cupo_disponible"]<=0){
					$_SESSION["swc"]=1;
				}else{
					$_SESSION["swc"]=0;
				}
		$_SESSION["Saldo_pedidos"]=$cartera["Valor_Total_Pedidos"];
				
				if (($_SESSION["factu"]=$cartera["Vencidas"])>0){
					$_SESSION["swf"]=1;
				}else{
					$_SESSION["swf"]=0;
				}
		$_SESSION["bloqueo"]= $usuario["Bloqueo"];
		$_SESSION["condicion"]=$usuario["Condicion"];
		$_SESSION["vendedor"]=$usuario["vendedor"];
		$_SESSION["totalcoste"]=0;
				header("Location:pedido_cliente.php");
                exit();
       
		}else  if ($usuario['nit'] != $_GET['id'] ){
		$_SESSION["user"]= "";
    ?>
    	<script language="JavaScript" type="text/JavaScript">
        	alert("<-::El usuario no existe o esta incorrecto::->"); 
            window.location.replace("index.php");
        </script>
     <?php
            }
  
} else
	header("Location:clientes.php");
?>
</body>
</html>