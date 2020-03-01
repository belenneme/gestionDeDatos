<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idtipoliquidacion=$_GET['idtipoliquidacion'];
$conceptos="SELECT * FROM concepto
INNER JOIN tipoliquidacion_concepto ON idconcepto=concepto_idconcepto
WHERE tipoliquidacion_idtipoliquidacion=$idtipoliquidacion";
$q_conceptos=mysql_query($conceptos);
?>

<table class='table table-bordered table-striped'>
	<thead>
		<th>Codigo Concepto</th>
		<th>Descripcion</th>
		<th>Tipo Concepto</th>
		<th></th>
		<th></th>
	</thead>
	<tbody>
	<?php while ($row_conceptos= mysql_fetch_array($q_conceptos)) { ?>
		<tr>
			<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_conceptos['idconcepto']; ?></td>
			<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_conceptos['descripcionconcepto']; ?></td>
			<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_conceptos['tipoconcepto']; ?></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a><a href="concepto_edicion.php?idconcepto=<?php echo $row_conceptos['idconcepto']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a><a href="tipoliquidacion_eliminar_concepto.php?idtipoliquidacion=<?php echo $idtipoliquidacion ; ?>&idconcepto=<?php echo $row_conceptos['idconcepto']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
        </tr>
		<?php } ?>
		<tr>
			<td colspan="8"><div class="pull-right"><a><a href="tipoliquidacion_add_concepto.php?idtipoliquidacion=<?php echo $idtipoliquidacion ; ?>">Agregar Concepto</a></div></td>
		</tr>
	</tbody>

</table>