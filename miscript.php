<?php
include("tokenp.php"); //conexión con la base de datos
$id=$_POST['codigo'];
$d=$_POST['age'];
$preciod=$_POST['preciod'];
if (isset($_POST['codigo']) and $_POST['age']<>""){
	if(isset($_SESSION['carro'][$id])){
		$id=$_POST['codigo'];
		$d=$_POST['age'];
		$action = "mod";
		echo "<br>";
		echo "<div align='right'>";
		echo "<table>";
		echo "<tr>";
		echo "<th>";
		echo "TOTAL VENTA";
		echo "</th>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='right'>";
		$_SESSION["totalcoste"] =$_SESSION["totalcoste"]-($preciod*$_SESSION['carro'][$id]);
		echo "$ ".number_format( $_SESSION["totalcoste"] = $_SESSION["totalcoste"]+($preciod*$d),2);
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
	}else{
		$id=$_POST['codigo'];
		$d=$_POST['age'];
		$action = "add";
		echo "<br>";
		echo "<div align='right'>";
		echo "<table>";
		echo "<tr>";
		echo "<th>";
		echo "TOTAL VENTA";
		echo "</th>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='right'>";
		echo "$ ".number_format( $_SESSION["totalcoste"] = $_SESSION["totalcoste"]+($preciod*$d),2) ;
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
		$_SESSION["cantidadTotal"] = $xTotal; 
		$_SESSION["desc_pie"]= $desc_pie;
	}
}else { //en caso de no estar informada, le asignamos 1.---------------------------------------------------------------------------------------
	
		$id=$_POST['codigo'];
		$action = "removeProd";
		echo "<br>";
		echo "<div align='right'>";
		echo "<table>";
		echo "<tr>";
		echo "<th>";
		echo "TOTAL VENTA";
		echo "</th>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='right'>";
		echo "$ " .number_format(  $_SESSION["totalcoste"] = $_SESSION["totalcoste"]-($preciod*$_SESSION['carro'][$id]),2);
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
			
}
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
					$sql = "insert into SIMOP..documentos_web_ped (numero,nit,usuario,estado,fecha)
					values ('".$_SESSION['num_orde']."','".$_SESSION["user"]."','".$_SESSION["Usuario"]."','0',getdate())";
					$smtp=  sqlsrv_query( $link, $sql );
					
			}
		$sql = "INSERT INTO SIMOP..documentos_web_lin_ped (numero,codigo,cantidad)
		VALUES('".$_SESSION['num_orde']."','".$id."','".$d."')";
		$smtp=  sqlsrv_query( $link, $sql );	
		$_SESSION['carro'][$id]=$d;
	}
	break;
	case "removeProd":
		if(isset($_SESSION['carro'][$id])){
			$n_orden= $_SESSION['num_orde'];
			$sql = "DELETE FROM SIMOP..documentos_web_lin_ped  where numero='".$n_orden."' and codigo='".$id."'";
			$smtp=  sqlsrv_query( $link, $sql );	
			unset($_SESSION['carro'][$id]);
	} 
	break;
	case "mod":
		if(isset($_SESSION['carro'][$id])){
			$id3= $_POST['codigo'];
			$id3 = (string) $id3;
			$n_orden= $_SESSION['num_orde'];
			$sql = "UPDATE SIMOP..documentos_web_lin_ped SET cantidad='".$d."' where numero='".$n_orden."' and codigo='".$id."'";
			$smtp=  sqlsrv_query( $link, $sql );	
			$_SESSION['carro'][$id]=$d;
					
		}
	break;
}
?>

