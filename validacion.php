<html lang="es">
<meta charset="UTF-8">
<link rel="stylesheet" href="demo/libs/bootstrap.min.css">
        <script src="demo/libs/jquery.min.js"></script>
        <script src="demo/libs/bootstrap.min.js"></script>
        <script src="demo/libs/pretty.js"></script>
       <style type="text/css">
            .space10{
                height: 10px;
            }
            body{
                font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;
            }
        </style>
        
        <link rel="stylesheet" type="text/css" href="css/jquery-confirm.css" />
        <script type="text/javascript" src="js/jquery-confirm.js"></script>
<body>
<?php
$usuario= $_POST['UserName'];
$contrasena=$_POST['Password']; 
if (isset ($usuario)){
   	include("conex.php");
   	$link=Conectarse();
	$sql = "SELECT RTRIM(clave_2) AS clave_2, RTRIM(usuario) as usuario, nit_real, concepto, tokenp, nombres FROM tabla_tranferencista_simop WHERE usuario ='".$usuario."' and clave_2 ='".$contrasena."'";
	$Usuari=  sqlsrv_query( $link, $sql );
	$usuario  = sqlsrv_fetch_array( $Usuari, SQLSRV_FETCH_ASSOC);
// Usuario corecto

		if (isset($usuario ["tokenp"])){
				session_start();
				$_SESSION["Usuario"]= $usuario["usuario"];
				$_SESSION["tokenp"]=$usuario["tokenp"];
				$_SESSION["nit_real"]=$usuario["nit_real"];
				$_SESSION["concepto"]=$usuario["concepto"];
            	$_SESSION["nombre_tran"]= $usuario["nombres"];
	            $_SESSION["pass_tran"]= $_POST["Password"];
				header("Location:home.php");
			} else {
	
    ?>
    	<section id="usage">
                    <div class="row">
                      <div class="col-md-12">
                         <script type="text/javascript">
                                      $.alert({
                                            title: 'Alerta',
                                            content: 'Usuario o Contraseña Errados',
                                            confirm: function () {
                                            window.location.replace("index.php");
											
                                            }
                                        });
                                   
                                </script>
                      </div>
                    </div>
                  </section>
                  
    <script type="text/javascript" src="demo/demo.min.js"></script>
     <?php
	}
   mssql_free_result($result);
   mssql_close($link); 
}else {
header("Location:index.php");
}
?>
</body>
</html>