<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Medimarcas S.A.S</title>
	
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
<body class="font-cover" id="login">
    <div class="container-login center-align">
	<h5>Medimarcas</h5> 
        <div style="margin:15px 0;">
 <img src="assets/img/user_login.png">            
 <p>Inicia sesión con tu cuenta</p>   
        </div>
	     <form action="validacion.php" method="post">
            <div class="input-field">
                <input id="UserName" type="text" class="validate" name="UserName">
                <label for="UserName"><i class="zmdi zmdi-account"></i>&nbsp; Usuario</label>
            </div>
            <div class="input-field col s12">
                <input id="Password" type="password" class="validate" name="Password">
                <label for="Password"><i class="zmdi zmdi-lock"></i>&nbsp; Contraseña</label>
            </div>
			<br>
			  <input type="submit" class="waves-effect waves-light btn-large" name="Inicia Sesion" />
           <!--  <a href="validacion.php" class="waves-effect waves-light btn-large">Ingresar</a>-->
			 <br>
			 <br>
			       </form>
        
    </div>
    
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