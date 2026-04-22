<!DOCTYPE html>
<?php 
require_once("tokenp.php");
$sql = "select h.sw, w.usuario, h.numero, h.nit,t.nombres,t.razon_comercial,t.ciudad ,l.codigo, r.descripcion, l.despacho_virtual, l.valor_unitario, r.costo_unitario, l.despacho_virtual * l.valor_unitario as Valor_Total, l.despacho_virtual * r.costo_unitario as Costo_Total,  convert(NVARCHAR, h.fecha, 103) as fecha, r.nit as nit_prov, t2.nombres as nombre_prov, h.tipo_fac, h.numero_fac
from documentos_ped_web w, documentos_ped_historia h, documentos_lin_ped_historia l, referencias r, terceros  t, tabla_tranferencista_simop s, terceros t2 
where h.sw='1' and h.nit=t.nit and l.codigo=r.codigo and h.bodega='1' and h.sw=l.sw and h.numero=l.numero and w.numero=h.numero  and  w.usuario=s.usuario and r.nit=t2.nit and t2.nit_real='".$_SESSION["nit_real"]."' and convert (varchar,s.nit_real)=convert (varchar,t2.nit_real) and h.fecha between (getdate()- 60) and  getdate() and  r.nit=t2.nit 
union all
select h.sw, w.usuario, h.numero, h.nit,t.nombres,t.razon_comercial,t.ciudad ,l.codigo, r.descripcion, l.despacho_virtual, l.valor_unitario, r.costo_unitario, l.despacho_virtual * l.valor_unitario as Valor_Total, l.despacho_virtual * r.costo_unitario as Costo_Total,  convert(NVARCHAR, h.fecha, 103) as fecha, r.nit as nit_prov, t2.nombres  as nombre_prov, h2.tipo_fac, h2.numero_fac
from documentos_ped_web w, documentos_ped_historia h, documentos_lin_ped_historia l, referencias r, terceros  t, tabla_tranferencista_simop s, terceros t2, documentos_ped_historia h2 
where convert (varchar, h.numero)=h2.documento and h.sw='2' and h.nit=t.nit and l.codigo=r.codigo and h.bodega='1' and h.sw=l.sw and h.numero=l.numero and w.numero=h.numero  and  w.usuario=s.usuario and r.nit=t2.nit and t2.nit_real='".$_SESSION["nit_real"]."' and convert (varchar,s.nit_real)=convert (varchar,t2.nit_real) and h.fecha between (getdate()-60) and  getdate() and  r.nit=t2.nit";
$listado=  sqlsrv_query($link, $sql);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Reporte Mensual de Transferencias</title>
	<link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="media/css/buttons.dataTables.css">
	<link rel="stylesheet" type="text/css" href="examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="examples/resources/demo.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/dataTables.buttons.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/buttons.html5.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	


$(document).ready(function() {
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
		]
	} );
} );



	</script>
</head>
<body class="dt-example">
	<div class="container">
		<section>
			<h1>Reporte Mensual de Transferencias</h1>
			<div class="demo-html"></div>
			<table id="example" class="display" style="width:100%">
			<thead>
					<tr>
						<th>Usuario</th>
						<th>Numero</th>
						<th>Nit</th>
						<th>Nombre</th>
						<th>Razon Social</th>
						<th>Ciudad</th>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Despacho virtual</th>
						<th>Valor Unitario</th>
						<th>Costo Unitario</th>
						<th>Valor Total</th>
						<th>Costo Total</th>
						<th>Fecha</th>
						<th>Prefijo</th>
						<th>Numero</th>
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
							echo '<td>'.($reg['razon_comercial']).'</td>';
							echo '<td>'.($reg['ciudad']).'</td>';
							echo '<td>'.($reg['codigo']).'</td>';
							echo '<td>'.($reg['descripcion']).'</td>';
							echo '<td>'.($reg['despacho_virtual']).'</td>';
							echo '<td>'.number_format(($reg['valor_unitario'])).'</td>';
							echo '<td>'.number_format(($reg['costo_unitario'])).'</td>';
							echo '<td>'.number_format(($reg['Valor_Total'])).'</td>';
							echo '<td>'.number_format(($reg['Costo_Total'])).'</td>';
							echo '<td>'.($reg['fecha']).'</td>';
							echo '<td>'.($reg['tipo_fac']).'</td>';
							echo '<td>'.($reg['numero_fac']).'</td>';
							echo '</tr>';
                     
                        }?>
                    

				</tbody>
				
			</table>
			
	</div>
	
</body>
</html>