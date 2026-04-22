<!--Funcion para conectarse a la base de datos-->
<?php 
function Conectarse() 
{ 
$serverName = "192.168.11.1"; //serverName\instanceName
$connectionInfo = array( "Database"=>"DMS_PARQUE", "UID"=>"sa", "PWD"=>"taboada*/*");
   if (!($link=  sqlsrv_connect( $serverName, $connectionInfo))) 
   { 
      echo "Error conectando a la base de datos."; 
	   die( print_r( sqlsrv_errors(), true));
      exit(); 
   } 
   
   return $link; 
} 
?>
