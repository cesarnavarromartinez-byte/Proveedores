<?php 
require_once('tokenp.php');
$sql = "select w.usuario, h.numero, h.nit,t.nombres , sum (l.cantidad * l.valor_unitario) as Valor_Total, sum(l.cantidad * r.costo_unitario) as Costo_Total, convert(NVARCHAR, h.fecha, 103) as fecha, h.numero_fac, h.tipo_fac
from documentos_ped_web w, documentos_ped_historia h, documentos_lin_ped_historia l, referencias r, terceros  t 
where h.nit=t.nit and l.codigo=r.codigo and h.bodega='1' and h.sw=l.sw and h.numero=l.numero and w.numero=h.numero  and  w.usuario='".$_SESSION["Usuario"]."' and h.fecha between  convert (date,'".$_SESSION["date"]."') and convert (date,'".$_SESSION["date1"]."')
group by  w.usuario, h.numero, h.nit,t.nombres, h.fecha, h.numero_fac, h.tipo_fac";
$listado=  sqlsrv_query($link, $sql);
echo $_SESSION["date"];
echo $_SESSION["date1"];

?>
	
	  	  <!--    ESTILO GENERAL   -->
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
       	<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>
	            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    <tr>
                        <th>Usuario</th><!--Estado-->
                        <th>Numero</th><!--Estado-->
                        <th>Nit</th><!--Estado-->
						<th>Nombre</th><!--Estado-->
						<th>Valor Total</th><!--Estado-->
						<th>Costo Total</th><!--Estado-->
						<th>Fecha</th><!--Estado-->
                       <th>Prefijo</th><!--Estado-->
						<th>Numero</th><!--Estado-->

						
	                        
                    </tr>
                </thead>
              
                  <tbody>
                    <?php
                   while($reg= sqlsrv_fetch_array($listado, SQLSRV_FETCH_ASSOC))
                   {
                               echo '<tr>';
                               echo '<td>'.($reg['usuario']).'</td>';
							   echo '<td>'.($reg['numero']).'</td>';
							    echo '<td>'.($reg['nit']).'</td>';
								 echo '<td>'.($reg['nombres']).'</td>';
								 echo '<td>'.number_format(($reg['Valor_Total'])).'</td>';
								echo '<td>'.number_format(($reg['Costo_Total'])).'</td>';
								echo '<td>'.($reg['fecha']).'</td>';
								echo '<td>'.($reg['tipo_fac']).'</td>';
								echo '<td>'.($reg['numero_fac']).'</td>';?>
						
							  
<?php						   
								echo '</tr>';
                     
                        }
                    ?>
                <tbody>
				
 </table>
