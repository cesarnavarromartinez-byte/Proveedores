<!--Funcion para conectarse a la base de datos-->
<?php 
function Conectarse() 
{ 
   if (!($cn= mssql_connect('192.168.11.1','sa','taboada*/*'))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   if (!mssql_select_db("DMS_PARQUE",$cn)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $cn; 
} 
?>
