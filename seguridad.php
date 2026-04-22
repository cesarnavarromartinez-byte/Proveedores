<?php
session_start();
$u=1;
if ($_SESSION["auten_tran"] != $u){
header("Location: http://www.taboada.com.co/Proveedores/index.php");
exit();
}	
?>
