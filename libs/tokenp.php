

<?php
session_start();
include("conex.php");
$link=Conectarse();
$sql = "SELECT tokenp FROM tabla_tranferencista_simop WHERE usuario ='".$_SESSION["Usuario"]."' and clave_2  ='".$_SESSION["pass_tran"]."' and tokenp ='".$_SESSION["tokenp"]."'";
$tk=  sqlsrv_query( $link, $sql );
$tkn  = sqlsrv_fetch_array( $tk, SQLSRV_FETCH_ASSOC);
if (!isset($tkn["tokenp"])){
header("Location:index.php");
exit();
}

?>
