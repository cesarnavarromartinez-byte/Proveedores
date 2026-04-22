<?php require_once("tokenp.php");
$lista= $_SESSION["lista"];
echo $_SESSION['num_orde'];
$sql = "SELECT r.Codigo, isnull (REPLACE(REPLACE(r.descripcion,CHAR(10),''),CHAR(13),''),'' ) as Descripcion,r.porcentaje_iva as Iva,wlp.cantidad,case when (r.vcmto_refer>=convert(date,GETDATE()) and r.fecha_inicia_promocion<=convert(date,GETDATE())) then (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+r.porcentaje_iva/100)) else (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+r.porcentaje_iva/100)) end as 'Precio',
case when (r.vcmto_refer>=convert(date,GETDATE()) and r.fecha_inicia_promocion<=convert(date,GETDATE())) then (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+r.porcentaje_iva/100)*(1-desc_".$lista."/100)) else (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+r.porcentaje_iva/100)) end as 'Precio+Dscto',
case when (r.vcmto_refer>=convert(date,GETDATE()) and r.fecha_inicia_promocion<=convert(date,GETDATE())) then desc_".$lista." else 0.0 end as 'Dscto_Feria',w.Stock_Disponible, condicion_compra=null,bonificacion=null, Descricion_b= null
from referencias r, referencias_ter p , v_consulta_stock_disponible_pag_web w, SIMOP..documentos_web_ped wp, SIMOP..documentos_web_lin_ped wlp
where w.codigo=r.codigo  and r.codigo=p.codigo and  r.ref_anulada='N'  and r.codigo not like '%*0' and  r.codigo not like 'P%'  and  r.codigo not like 'C%'  and  r.codigo not like '999%' 
 AND r.codigo not in (select b.codigo from logistica_taboada..bonificacion_oferta b,v_consulta_stock_disponible_pag_web s where s.Codigo=b.codigo_bonifica and s.Stock_Disponible<>0) and wp.numero=wlp.numero and wlp.codigo=r.codigo and wp.nit='".$_SESSION["user"]."' and wlp.numero='".$_SESSION['num_orde']."'
union all 
SELECT r.Codigo,isnull (REPLACE(REPLACE(r.descripcion,CHAR(10),''),CHAR(13),''),'' ) as Descripcion,r.porcentaje_iva as Iva,wlp.cantidad,case when (r.vcmto_refer>=convert(date,GETDATE()) and r.fecha_inicia_promocion<=convert(date,GETDATE())) then (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+r.porcentaje_iva/100)) else (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+r.porcentaje_iva/100)) end as 'Precio',
case when (r.vcmto_refer>=convert(date,GETDATE()) and r.fecha_inicia_promocion<=convert(date,GETDATE())) then (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+r.porcentaje_iva/100)*(1-desc_".$lista."/100)) else (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+r.porcentaje_iva/100)) end as 'Precio+Dscto',
case when (r.vcmto_refer>=convert(date,GETDATE()) and r.fecha_inicia_promocion<=convert(date,GETDATE())) then desc_".$lista." else 0.0 end as 'Dscto_Feria',w.Stock_Disponible,b.condicion_compra,b.bonificacion ,isnull (REPLACE(REPLACE(r2.descripcion,CHAR(10),''),CHAR(13),''),'' ) as Descricion_b 
from referencias r, referencias_ter p , v_consulta_stock_disponible_pag_web w, logistica_taboada..bonificacion_oferta b, SIMOP..documentos_web_ped wp, SIMOP..documentos_web_lin_ped wlp, referencias r2
where b.codigo_bonifica=r2.codigo and r.codigo=b.codigo and w.codigo=r.codigo  and r.codigo=p.codigo and  r.ref_anulada='N' and r.codigo not like '%*0' and  r.codigo not like 'P%'  and  r.codigo not like 'C%'  and  r.codigo not like '999%' 
AND r.codigo  in (select b.codigo from logistica_taboada..bonificacion_oferta b,v_consulta_stock_disponible_pag_web s where s.Codigo=b.codigo_bonifica and s.Stock_Disponible<>0) and wp.numero=wlp.numero and wlp.codigo=r.codigo and  wp.nit='".$_SESSION["user"]."' and wlp.numero='".$_SESSION['num_orde']."'";
$listado=  sqlsrv_query( $link, $sql );
?>
<html>
	  	  <!--    ESTILO GENERAL   -->
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
       	<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>
	<script type="text/javascript">
function esInteger(e){
		var charCode 
		charCode = e.keyCode 
		status = charCode 
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false
		}
	return true
}
</script>

<body>
            <div class="row">
                <a href="productos.php" class="waves-effect waves-light btn"><i class="zmdi zmdi-cloud left"></i>Panel de productos</a>
            </div>

	<table cellpadding="0" cellspacing="0" border="0" class="display"  id="tabla_lista_paises">
    	<thead>
         	<tr>  
                <th>Codigo</th>
                <th>Descripcion</th><!--Estado-->
                <th>Bon</th><!--Estado-->
                <th>Cantidad</th><!--Estado-->
                <th>Iva</th><!--Estado-->
                <th>%Des</th><!--Estado-->
                <th>Precio_neto</th><!--Estado-->
                <th>Subtotal</th><!--Estado-->
                <th>..Modificar..</th><!--Estado-->
                <th>Eliminar</th><!--Estado-->
             </tr>
          </thead>
          <tfoot>
          	<tr>
            	<th></th>
                <th></th>
				<th></th>
                <th></th>
				<th></th>
                <th></th>
				<th></th>
                <th></th>
				<th></th>
                <th></th>
            </tr>
          </tfoot>
          <tbody>
     <!--     <div id="recargado">Mi texto sin recargar</div>-->
         
           <?php
		      		while($reg= sqlsrv_fetch_array($listado, SQLSRV_FETCH_ASSOC)){
					$grantotal=$grantotal+($reg['Precio+Dscto']*$reg['cantidad']);
					$desc_p = $desc_p + ($reg['Precio']*$reg['cantidad']);
					$desc_pie=$desc_p-$grantotal;
					$id=$reg['Codigo'];
                               echo ' <tr background="#FF0000"> ';
                               echo '<td>'.($reg['Codigo']).'</td>';
							   echo '<td>'.($reg['Descripcion']).'</td>';
							   if (isset($reg['Descricion_b'])){
							   $cp=($reg['cantidad']/$reg['condicion_compra']);
                               $cb= ($cp*$reg['bonificacion']) ;  
							   echo "<td>
							   
									<ul class='tt-wrapper'>
									<li><a class='tt-gplus' href='#'><span><table>
																				<tr>
																				<td>Bonificacion</td>
																				<td>Cantidad Bonificada</td>
																				</tr>
																				<tr>
																				<td>".$reg['Descricion_b']."</td>
																				<td>".intval($cb)."</td>
																				</tr>
																				</table>
																				</span></a></li>
									</ul>
									</td>"; 			
							   }else {
							    echo '<td></td>';
							   }
							   echo '<td><center>'. number_format ($reg['cantidad']).'</center></td>';
							   echo '<td><center>'.($reg['Iva']).'</center></td>';
							     echo '<td><center>'.number_format($reg['Dscto_Feria']).'%</center></td>';
							   echo '<td> <center>'.number_format($reg['Precio+Dscto']).'</center></td>';?>
                               <td> <?php echo number_format( $_SESSION['carro'][$reg['Codigo']]*$reg['Precio+Dscto']);?> </td>  
                         	 <?php
                                echo "<td align='right'>
									<form method='POST' onkeypress='return esInteger(event)'onSubmit='return validacion(this)'action='../Proveedores/pedido_cliente.php?id=".$id."&action=mod' alt='Anadir al carro' id='fo3'name='fo3' >
									<input type='text' text-align:center;' size='1' name='cantidad'>
									<input type='submit' class='btn-floating red' value='+'/>
                    				</td>
									</form>
									<td align='left'>
									<form method='POST'onkeypress='return esInteger(event)'onSubmit='return validacion(this)'action='../Proveedores/pedido_cliente.php?id=".$id."&action=removeProd' alt='Anadir al carro' id='fo3'name='fo3'>
									<input type='submit' class='btn-floating' value='-'/>
             						</td>
									</form>
									</tr>";
						   echo '</tr>';
						}
						
                    ?>
				<tbody>
 </table>
 <?php
	echo "<table width='30%'>";
	echo "<tr class = titulo>";
	echo "<th style='width:15px;text-align:center;color: #ffffff; border-color: #FFFFFF; background-color: #204463;'>&nbsp;&nbsp;Total Descuento&nbsp;&nbsp;</th>";
	echo "<th style='width:15px;text-align:center;color: #ffffff; border-color: #FFFFFF; background-color: #204463;'>&nbsp;&nbsp;Total Compra&nbsp;&nbsp;</th>";
	echo"</tr>";
	echo "<tr>";
	$_SESSION["totalcoste"]=$grantotal;
	$_SESSION["desc_pie"]=$desc_pie;
	echo "<td align='right'><b>$ ".number_format($desc_pie,2)."</b></td>";
	echo "<td align='right'><b>$ ".number_format($grantotal,2)." </b></td>";
	echo "</tr>";
	echo "</table>";
?>
<?php
    echo "<table width='100%'>";
  	$swv= $_SESSION["Cupo_Disponible"]-$_SESSION["totalcoste"];
		if(($swv>=0) and ($_SESSION["bloqueo"]==0) and ($_SESSION["factu"]==0)){
			echo "<tr><td colspan=10><hr></td></tr>";
			echo "<td align='center' colspan='10'><br><br>
				<form method='POST' onSubmit='return validar()'action='autorizacion.php' alt='Anadir al carro' id='fo4'name='fo4'>
				<center>NOTA<BR><textarea class='componenteFormulario' name='comentarios' rows='4' cols='50'id='comentarios'></textarea></center>
				<center>
				<input type='submit' class='waves-effect waves-light btn-large' value='Autorizacion'/>
				</center>
	</td>
	</form>
	</td>";
	echo "</table>";
	}else{ 
	echo "<tr><td colspan=10><hr></td></tr>";
	echo "<td align='right' colspan='10'><br><br>
	<form method='POST' onSubmit='return validar()'action='autorizacion.php' alt='Anadir al carro' id='fo4'name='fo4'>
	<center>NOTA<BR><textarea class='componenteFormulario' name='comentarios' rows='4' cols='50'id='comentarios'></textarea></center>
	<center>
	<input type='submit' class='waves-effect waves-light btn-large' value='Autorizacion'/>
	</center>
	</td>
	<form>
	</td>";
	echo "</table>";
	} ?>
  </table>
 
 </tbody>
  
 </html>

