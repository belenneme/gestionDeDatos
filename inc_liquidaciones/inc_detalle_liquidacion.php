<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
	$idliquidacion=$_GET['idliquidacion'];
	$idempleado=$_GET['idempleado'];

	$liquidacion="SELECT * FROM liquidacion
	INNER JOIN empleado ON empleado_idempleado=idempleado
	INNER JOIN categoriaempleado ON categoriaempleado_idcategoriaempleado = idcategoriaempleado
	WHERE idliquidacion=$idliquidacion";
	$q_liquidacion=mysql_query($liquidacion);
	$row_liquidacion=mysql_fetch_array($q_liquidacion);

	$q_lineas=mysql_query("SELECT * FROM detalleliquidacion
		INNER JOIN concepto ON concepto_idconcepto=idconcepto
		WHERE liquidacion_idliquidacion=$idliquidacion");

 ?>

<body>
<br><br>
<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse"><i class="fa fa-check" aria-hidden="true"></i>
         CompuCentro - Liquidaci&oacute;n detalle</p>
        <div class="panel-body">
            <table class='table table-bordered table-striped'>
				<tr>
					<td class="info" align="right"><div align='right'>id: </div></td>
					<td align="right" class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $idliquidacion; ?></div></td>
					<td class="info" align="right"><div align='right'>Fecha: </div></td>
					<td align="right" colspan="3" class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_liquidacion['fechaliquidacion']; ?></div></td>
				</tr>
				<tr>
					<td class="info"><div align='right'>Empleado: </div></td>
					<td><?php echo $row_liquidacion['apellidoempleado']; ?> <?php echo $row_liquidacion['nombreempleado']; ?></td>
					<td class="info"><div align='right'>Dni: </div></td>
					<td><?php echo $row_liquidacion['dniempleado']; ?></td>
					<td class="info"><div align='right'>estado civil: </div></td>
					<td><?php echo $row_liquidacion['estadocivilempleado']; ?></td>
				</tr>
				<tr>
					<td colspan="6" align="center"><div><strong>Conceptos</strong></div></td>

				</tr>
				<tr>
					<td class="info" align="right">Item</td>
					<td class="info" align="right">Concepto</td>
					<td class="info" align="right">Cantidad</td>
					<td class="info" colspan="2" align="right">Importe</td>
					<td class="info" colspan="2" align="right">Total concepto</td>
				</tr>
				<?php
					$i=1;
					while ($row_lineas_m=mysql_fetch_array($q_lineas)) {
						$montofijo = $row_lineas_m['montofijo'];
     					$porcentaje= $row_lineas_m['montovariable']/100;
     					$montovariable = $row_liquidacion['salariobasicocategoria']*$porcentaje;
     					$totaldetalle=$montofijo+$montovariable;
     					$totallinea=$row_lineas_m['cantidadconcepto']*$totaldetalle;
					 ?>
						<tr>
							<td align="right"><?php echo $i ?></td>
							<td align="right"><?php echo $row_lineas_m['descripcionconcepto'] ?></td>
							<td align="right"><?php echo $row_lineas_m['cantidadconcepto'] ?></td>
							<td colspan="2" align="right"><?php if ($row_lineas_m['tipoconcepto']==0) {
								echo ("-");
							} echo $totaldetalle ?></td>
							<td align="right"><?php if ($row_lineas_m['tipoconcepto']==0) {
								echo ("-");
							}echo $totallinea ?></td>

						</tr>

					<?php $i++;}
				?>
						<tr>
							<td align="right"><?php echo $i ?></td>
							<td align="right">Salario Basico</td>
							<td align="right">1</td>
							<td colspan="2" align="right"><?php echo $row_liquidacion['salariobasicocategoria']; ?></td>
							<td align="right"><?php echo $row_liquidacion['salariobasicocategoria']; ?></td>

						</tr>
				<tr>
					<td align="right" colspan="2"></td>
					<td align='right'><strong>Total Aportes</strong> </td>
					<td colspan="3" align='right'><?php echo $row_liquidacion['totalaportes']; ?></td>
				</tr>
				 <tr>
				 	<td align="right" colspan="2"></td>
					<td align='right'><strong>Total Retenciones</strong> </td>
					<td colspan="3" align='right'><?php echo $row_liquidacion['totalretenciones']; ?></td>
				</tr>
				<tr>
				 	<td colspan="2"></td>
					<td align='right'><strong>Total</strong></td>
					<td colspan="3" align='right'><?php echo $row_liquidacion['salarioneto']; ?></td>
				</tr>
				<tr>
				 	<td align="right" colspan="6"><div id="imprimir"><a><i class="fa fa-print" aria-hidden="true">    </i><strong> Imprimir</strong></a></div></td>
				</tr>
	</table>
	<div><a href="liquidaciones.php"><strong>Volver a Liquidaciones</strong></a></div>

        </div>
    </div>
  <?php include 'inc_footer.php'; ?>
</div>
</body>

<script type="text/javascript">
    $('#imprimir').on('click',function(){
    window.print();
    });
</script>

</html>
