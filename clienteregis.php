	<?php
		 session_start();
		 if (isset ($_SESSION["user"])){
			 header("Location:pedido_cliente.php");

}