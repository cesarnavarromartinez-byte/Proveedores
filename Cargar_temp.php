<?php
include("tokenp.php");
$link=Conectarse(); 
$ord = $_GET['id'];
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
			$_SESSION['num_orde']=$ord;
			$sql = "select d.nit from SIMOP..documentos_web_ped d where d.numero='".$ord."'";
			$fact=  sqlsrv_query( $link, $sql );
			$fact_fecha=sqlsrv_fetch_array($fact, SQLSRV_FETCH_ASSOC);
			$nit=$fact_fecha['nit'];
			
			$sql2 = "SELECT t.nit, sum(v.Saldo) as Saldo FROM v_cartera_edades v, terceros t, documentos d ,v_vendedores vv WHERE d.sw = 1 AND v.Saldo >0 and v.Nit = t.nit and v.Tipo = d.tipo and v.Numero = d.numero and t.vendedor = vv.vendedor AND t.nit = '".$nit."' GROUP BY t.nit";
			$scartera=  sqlsrv_query( $link, $sql2 );
			$cartera=sqlsrv_fetch_array($scartera, SQLSRV_FETCH_ASSOC);
							
			
			$sql3 = "Select COUNT(*) as Num_Facturas from v_cartera_edades where Nit='".$nit."' AND SW=1 and Saldo>0 and Dias_Vencido>6";
			$factu=  sqlsrv_query( $link, $sql3 );
			$fac=sqlsrv_fetch_array($factu, SQLSRV_FETCH_ASSOC);
			
			$sql4 = "select p.Nit,t.Nombres,sum(p.valor_total) as Valor_Total_Pedidos from documentos_ped p , terceros t where p.anulado=0 and p.nit=t.nit and despacho is null and p.nit='".$nit."' and sw=1 group by p.nit,t.Nombres order by t.nombres";
			$reped=  sqlsrv_query( $link, $sql4);
			$ped=sqlsrv_fetch_array($reped, SQLSRV_FETCH_ASSOC);
			
					
			$sql5 = "SELECT  Nit,Nombres,razon_comercial,direccion,telefono_1,ciudad,Lista,Bloqueo,Condicion,vendedor, convert(varchar,Cupo_Credito) as Cupo_Credito from terceros  where nit= '".$nit."'";
			$result=  sqlsrv_query( $link, $sql5);
			$row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			
			$_SESSION["user"]= $nit;
			$_SESSION["nombre"]= $row["Nombres"];
			$_SESSION["razon_comercial"]= $row["razon_comercial"];
			$_SESSION["direccion"]=  $row["direccion"];
			$_SESSION["telefono_1"]=  $row["telefono_1"];
			$_SESSION["ciudad"]=  $row["ciudad"];
			$_SESSION["valid"]=1;
			$_SESSION["lista"]= $row["Lista"];
			$_SESSION["Saldo_pendiente"]= $cartera["Saldo"];
			$_SESSION["cupo"]= $row["Cupo_Credito"];
			$extra=$_SESSION["cupo"]*0.2;
				$_SESSION["cupo"]=$_SESSION["cupo"]+$extra;
				$_SESSION["Cupo_Disponible"]= ($_SESSION["cupo"]-$cartera["Saldo"]- $ped["Valor_Total_Pedidos"]);		
				if($_SESSION["Cupo_Disponible"]<=0){
					$_SESSION["swc"]=1;
				}else{
					$_SESSION["swc"]=0;
				}
				$_SESSION["Saldo_pedidos"]=$ped["Valor_Total_Pedidos"];
				
				if (($_SESSION["factu"]=$fac["Num_Facturas"])>0){
					$_SESSION["swf"]=1;
				}else{
					$_SESSION["swf"]=0;
				}
				$_SESSION["bloqueo"]= $row["Bloqueo"];
				$_SESSION["condicion"]=$row["Condicion"];
				$_SESSION["vendedor"]=$row["vendedor"];
				$_SESSION["totalcoste"]=0;

			$sql6 = "select codigo, cantidad from SIMOP..documentos_web_lin_ped  where numero='".$ord."'";
			$fact=  sqlsrv_query( $link, $sql6);
			while($fact_fecha=sqlsrv_fetch_array($fact, SQLSRV_FETCH_ASSOC)){
				$id=$fact_fecha['codigo'];
				$d=$fact_fecha['cantidad'];
				$_SESSION['carro'][$id]=$d;
			}
			header("Location:pedido_cliente.php?action=mostrar");
			
?>
