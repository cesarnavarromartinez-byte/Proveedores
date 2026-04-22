<?php 
require_once("tokenp.php");
$lista= $_SESSION["lista"];
$sql = "SELECT r.Codigo,isnull (REPLACE(REPLACE(r.descripcion,CHAR(10),''),CHAR(13),''),'' ) as Descripcion,porcentaje_iva as Iva,case when (vcmto_refer>=convert(date,GETDATE()) and fecha_inicia_promocion<=convert(date,GETDATE())) then (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+porcentaje_iva/100)) else (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+porcentaje_iva/100)) end as 'Precio',
case when (vcmto_refer>=convert(date,GETDATE()) and fecha_inicia_promocion<=convert(date,GETDATE())) then (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+porcentaje_iva/100)*(1-desc_".$lista."/100)) else (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+porcentaje_iva/100)) end as 'Precio+Dscto',
case when (vcmto_refer>=convert(date,GETDATE()) and fecha_inicia_promocion<=convert(date,GETDATE())) then desc_".$lista." else 0.0 end as 'Dscto_Feria',w.Stock_Disponible, codigo_bonifica=NULL,descripcion=NULL,condicion_compra=NULL, bonificacion=NULL ,Stock_oferta=NULL, nota=NULL
from referencias r, referencias_ter p , v_consulta_stock_disponible_pag_web w, terceros t
where r.nit=t.nit and t.nit_real=".$_SESSION["nit_real"]." and w.codigo=r.codigo  and r.codigo=p.codigo and  r.ref_anulada='N' and r.codigo not like '%*0' and r.codigo not like '%*B' and  r.codigo not like 'P%'  and  r.codigo not like 'C%'  and  r.codigo not like '999%' 
AND r.codigo not in (select b.codigo from LOGISTICA_TABOADA..bonificacion_oferta b,v_consulta_stock_disponible_pag_web s where s.Codigo=b.codigo_bonifica and s.Stock_Disponible<>0)
union all 
SELECT r.Codigo,isnull (REPLACE(REPLACE(r.descripcion,CHAR(10),''),CHAR(13),''),'' ) as Descripcion,porcentaje_iva as Iva,case when (vcmto_refer>=convert(date,GETDATE()) and fecha_inicia_promocion<=convert(date,GETDATE())) then (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+porcentaje_iva/100)) else (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+porcentaje_iva/100)) end as 'Precio',
case when (vcmto_refer>=convert(date,GETDATE()) and fecha_inicia_promocion<=convert(date,GETDATE())) then (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+porcentaje_iva/100)*(1-desc_".$lista."/100)) else (r.valor_unitario*(1 - r.factor_venta_".$lista.")*(1+porcentaje_iva/100)) end as 'Precio+Dscto',
case when (vcmto_refer>=convert(date,GETDATE()) and fecha_inicia_promocion<=convert(date,GETDATE())) then desc_".$lista." else 0.0 end as 'Dscto_Feria',w.Stock_Disponible ,b.codigo_bonifica,isnull (REPLACE(REPLACE(b.descripcion,CHAR(10),''),CHAR(13),''),'' ) as descripcion,b.condicion_compra, b.bonificacion ,b.Stock_Disponible as Stock_oferta, b.nota
from referencias r, referencias_ter p , v_consulta_stock_disponible_pag_web w, SIMOP..v_bonificacion_oferta b, terceros t
where r.nit=t.nit and t.nit_real=".$_SESSION["nit_real"]." and r.codigo=b.codigo and w.codigo=r.codigo  and r.codigo=p.codigo and  r.ref_anulada='N' and  r.codigo not like '%*0' and r.codigo not like '%*B' and  r.codigo not like 'P%'  and  r.codigo not like 'C%'  and  r.codigo not like '999%'";
$listado=  sqlsrv_query( $link, $sql );
?>
<html>

        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
       	<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery-1.2.6.min.js"></script>
		

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
function recargar(id, pd){
	console.log(id+" "+pd);
   var cant = $("#txtAge"+id).val();
  console.log(id+" "+$("#txtAge"+id).val()+" "+pd);
   if(cant>0)
   {
       var con=0;
       $("#txtAge"+id).css("background","#BDBDBD");
    $.post("miscript.php", { preciod: (pd),codigo:(id), age:$("#txtAge"+id).val()},  function(data){
 $("#recargado").html(data);

 });
   } else{
       $("#txtAge"+id).css("background","White");
	     $.post("miscript.php", { preciod: (pd), codigo: (id), age:$("#txtAge"+id).val()},  function(data){
 $("#recargado").html(data);
  });
   }
}

</script>
<body>
<div class="row">
             <a href="pedido_cliente.php" class="waves-effect waves-light btn"><i class="zmdi zmdi-cloud left"></i>Detalle del pedido</a>
</div>
 <FORM  NAME=form1>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
    	<thead>
           	<tr>
               	<th>Codigo</th><!--Estado-->
                <th>Descripcion</th><!--Estado-->
                <th>Bon</th><!--Estado-->
                <th>Stock</th><!--Estado-->
                <th>Iva</th><!--Estado-->
                <th>Precio</th><!--Estado-->
                <th>%Des</th><!--Estado-->
                <th>Precio neto</th><!--Estado-->
              <!-- <th>codigo</th><!--Estado-->
                <th>Cantidad</th><!--Estado-->
               
             </tr>
          </thead>
          <tfoot>
          	<tr>
            	<th></th>
                <th></th>
            </tr>
          </tfoot>
          <tbody>
     <!--     <div id="recargado">Mi texto sin recargar</div>-->
         
           <?php
           		while($reg= sqlsrv_fetch_array($listado, SQLSRV_FETCH_ASSOC)){
                               echo ' <tr background="#FF0000"> ';
                               echo '<td>'.($reg['Codigo']).'</td>';
							   echo '<td>'.($reg['Descripcion']).'</td>';
							   if (isset($reg['nota'])){
							   echo "<td>
									<ul class='tt-wrapper'>
									<li><a class='tt-gplus' href='#'><span> <table FRAME='void RULES='rows'>
									<tr>
																					<td>Bonificado</td>
																					<td>Condicion</td>
																					<td>Bonificacion</td>
																					<td>Stock</td>
																					</tr>
																					<tr>
																					<td>".$reg['descripcion']."</td>
																					<td>".$reg['condicion_compra']."</td>
																					<td>".$reg['bonificacion']."</td>
																					<td>".$reg['Stock_oferta']."</td>
																					</tr>
																			</table>	
																			</span>
																			</a></li>
									</ul>
									</td>"; 			
							   }else {
							    echo '<td></td>';
							   }
							   echo '<td><center>'. number_format ($reg['Stock_Disponible']).'</center></td>';
							   echo '<td><center>'.($reg['Iva']).'</center></td>';
							   echo '<td><center>'.number_format($reg['Precio'],2).'</center></td>';
							   echo '<td><center>'.number_format($reg['Dscto_Feria'],1).'%</center></td>';
							   echo '<td> <center><label id="precioDesc'.$reg['Codigo'].'">'.number_format($reg['Precio+Dscto'],2).'</label></center></td>';	?>
                              <td><INPUT onkeypress='return esInteger(event)' TYPE='text' id="txtAge<?php echo $reg['Codigo']?>" value="<?php echo $_SESSION['carro'][$reg['Codigo']];?>" onblur='javascript:recargar("<?php echo $reg['Codigo']?>","<?php echo $reg['Precio+Dscto']?>");'  class='<?php echo $i++;?>' size='1' > </td>
              				                              		 
                           <?php
								
						   echo '</tr>';
							  
                     
                        }
						
						
                    ?>
                    
              
                <tbody>
 </table>
 <br>
 <h2><div id="recargado"></div></h2>     
   </FORM>
 </tbody>
  
 </html>

