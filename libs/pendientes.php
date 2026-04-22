<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
require_once("tokenp.php");
$sql = "select d.numero, d.nit, t.nombres, t.razon_comercial ,d.usuario,  convert(NVARCHAR, d.fecha, 103)as fecha from SIMOP..documentos_web_ped d, terceros t where d.nit= convert (varchar,t.nit) and d.usuario='".$_SESSION["Usuario"]."' and d.estado='0' ";
$fact=  sqlsrv_query( $link, $sql );

?>
 <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
       	<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>
	    
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    <tr>
                        <th>Numero</th><!--Estado-->
                        <th>Nit</th><!--Estado-->
                        <th>Nombre</th><!--Estado-->
                        <th>Razon comercial</th><!--Estado-->
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Detalle</th>
                        <th>Cargar</th>
                        <th>Eliminar</th>
                                             
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                       
                     </tr>
                </tfoot>
                  <tbody>
                    <?php

     
                   while($fact_fecha=sqlsrv_fetch_array($fact, SQLSRV_FETCH_ASSOC))
                   {
					  
                               echo '<tr>';
                               echo '<td>'.($fact_fecha['numero']).'</td>';
							    echo '<td>'.($fact_fecha['nit']).'</td>';
                               echo '<td>'.($fact_fecha['nombres']).'</td>';
							   echo '<td>'.($fact_fecha['razon_comercial']).'</td>';
							    echo '<td>'.($fact_fecha['fecha']).'</td>';
								echo '<td>'.($fact_fecha['usuario']).'</td>';
																		
								  ?>
			<td align='center'><div style="text-align:center;"><a href="javascript:void(window.open('Detalle_temp.php?id=<?php echo $fact_fecha['numero']; ?>','','width=900,height=400,left=0,top=0,resizable=no,menubar=no,location=no,status=no,scrollbars=yes'))"> <img src="../Proveedores/images/agregar.png" alt="" width="30" height="27" border="0" onClick= "ClosingVar= false" /></a></div></td>
             <td><a href="Cargar_temp.php?id=<?php echo $fact_fecha['numero']; ?>"><img src="../Proveedores/images/pedido.png" alt="" width="30" height="27" border="0" /></a></td>
               <td><a href="eliminar_temp.php?id=<?php echo $fact_fecha['numero']; ?>" target="content"><img src="../Proveedores/images/Error Circle.png" alt="" width="30" height="27" border="0" onClick= "ClosingVar= false" /></a></td>
                               
                               <?php
        	
                               echo '</tr>';
                     
                        }
                    ?>
                <tbody>
            </table>