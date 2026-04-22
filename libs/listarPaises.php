<?php 
require_once('tokenp.php');
$sql = "select nit, nombres, razon_comercial,direccion ,telefono_1 ,ciudad from terceros where bloqueo='0'  and (vendedor between '100' and '500' or concepto_15 ='01' )";
$listado=  sqlsrv_query( $link, $sql );
?>
	
	  	  <!--    ESTILO GENERAL   -->
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
       	<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>
	            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    <tr>
                        <th>Nit</th><!--Estado-->
                        <th>Nombres</th><!--Estado-->
						<th>Razon Social</th><!--Estado-->
                       	<th>Telefono</th><!--Estado-->
						<th>Ciudad</th><!--Estado-->
                       	<th>Pedido</th>
	                        
                    </tr>
                </thead>
              
                  <tbody>
                    <?php
                   while($reg= sqlsrv_fetch_array($listado, SQLSRV_FETCH_ASSOC))
                   {
                               echo '<tr>';
                               echo '<td>'.($reg['nit']).'</td>';
							   echo '<td>'.($reg['nombres']).'</td>';
							   echo '<td>'.($reg['razon_comercial']).'</td>';
							  	echo '<td>'.($reg['telefono_1']).'</td>';
								echo '<td>'.($reg['ciudad']).'</td>';?>
							   <td><a href="../Proveedores/validacion_cliente.php?id=<?php echo $reg['nit']; ?>"> <img src="../Proveedores/images/pedido.png" width="29" height="22"  alt=""/></a></td>
							  
<?php						   
								echo '</tr>';
                     
                        }
                    ?>
                <tbody>
				
 </table>
