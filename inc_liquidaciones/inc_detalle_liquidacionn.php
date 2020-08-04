<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$iddetalleliquidacion=$_GET['iddetalleliquidacion'];
	$idempleado=$_GET['idempleado'];
	$idliquidacion=$_GET['idliquidacion'];

	$detalleliquidacion="SELECT * FROM detalleliquidacion
	INNER JOIN empleado ON empleado_idempleado=idempleado
	INNER JOIN liquidacion ON liquidacion_idliquidacion=idliquidacion
	WHERE iddetalleliquidacion=$iddetalleliquidacion";
	$q_detalleliquidacion=mysql_query($detalleliquidacion);
	$row_detalleliquidacion=mysql_fetch_array($q_detalleliquidacion);

	$q_conceptos=mysql_query("SELECT * FROM detalleconcepto 
		INNER JOIN concepto ON concepto_idconcepto=idconcepto
		WHERE detalleliquidacion_iddetalleliquidacion=$iddetalleliquidacion");
    // Hago esta consulta para obtener el nombre de categoria y pder mostrarlo en el detalle de la liquidacion
    $q_consulta= "SELECT * FROM empleado
    INNER JOIN categoriaempleado ON categoriaempleado_idcategoriaempleado=idcategoriaempleado
    WHERE idempleado=$idempleado";

    $q_categoria=mysql_query($q_consulta);
    $row_categoria=mysql_fetch_array($q_categoria);
    //-----------------------------------------------------------------
    


    
 ?>

<body>
<br><br>
<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-info">
        <p class="panel-heading no-collapse"><i class="fa fa-check" aria-hidden="true"></i>Liquidacion detalle</p>
        <div class="panel-body">
            <table class='table table-bordered table-striped'>
				<tr>
					<td class="info" align="right" class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><div align='right'>C.U.I.T </div></td>
					<td  align="left" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div><?php echo ("30-23456453-2") ?></div></td>
					<td class="info" align="right"><div align='right'>Periodo Desde</div></td>
					<td  align="lef" colspan="3" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div><?php echo $row_detalleliquidacion['desde']; ?></div></td>
                    <td class="info" align="right"><div align='right'>Periodo Hasta</div></td>
					<td  align="lef" colspan="3" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div><?php echo $row_detalleliquidacion['hasta']; ?></div></td>
                </tr>
				<tr>
					<td class="info" ><div align='right'>Empleado: </div></td>
					<td><?php echo $row_detalleliquidacion['nombreempleado']; ?> <?php echo $row_detalleliquidacion ['apellidoempleado'];?></td>
					<td class="info"><div align='right'>Cuil: </div></td>
					<td align="lef" colspan="3" class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><?php echo $row_detalleliquidacion['cuilempleado']; ?></td>
					
				</tr>
				<tr>
					<td class="info" ><div class="info" align='right'>Fecha Ingreso Empleado: </div></td>
					<td  colspan="5"><?php echo $row_detalleliquidacion['fechaingresoempleado']; ?></td>
                    <td class="info" ><div class="info" align='right'>Categoria Empleado: </div></td>
					<td  colspan="5"><?php echo $row_categoria['nombrecategoria']; ?></td>
				</tr>
				<tr>

					<br>
					<td colspan="6"><div align='center'><strong>Conceptos</strong></div></td>
					
				</tr>
				<tr>
					<td class="info" align="right">Item</td>
					<td class="info" align="right">Nombre Concepto</td>
					<td class="info" align="right">Tipo Concepto</td>
					<td class="info" align="right">Importe</td>
					<td class="info" colspan="2" align="right">Total</td>
				</tr>
				<?php 
					$i=1;
					while ($row_conceptos_m=mysql_fetch_array($q_conceptos)) {
						//$preciounitario=$row_lineas_m['neto']/$row_lineas_m['cantidad'];
					 ?>
						<tr>
							<td align="right"><?php echo $i ?></td>
							<td align="right"><?php echo $row_conceptos_m['descripcionconcepto'] ?></td>
                            <td align="right"><?php 
                                        if($row_conceptos_m['tipoconcepto']==0){
                                            echo ("Haber con Aporte");
                                        }
                                        if($row_conceptos_m['tipoconcepto']==1){
                                            echo ("Haber sin Aporte");
                                        }
                                        if($row_conceptos_m['tipoconcepto']==2) {
                                            echo ("Deduccion");
                                        }
                                        
                                    
                                        ?></td>
							<td align="right"><?php echo $row_conceptos_m['subtotal'] ?></td>
							<td align="right"><?php echo $row_conceptos_m['subtotal'] ?></td>
							
						</tr>

					<?php $i++;}
					//$bruto=$row_compra['totalcompra']/1.21;
					//$iva=$row_compra['totalcompra']-$bruto;
				?>

</tr>
				<td colspan="6"></td>
				 <tr>
				<tr>					
					<td colspan="3" align="right"><strong>Total Haber</strong></td>
					<td colspan="3" align="right" ><?php echo $row_detalleliquidacion['totalhaber'] ?></td>
				</tr>
				<tr>
					<td colspan="3" align='right'><strong>Total Debe </strong> </td>
					<td colspan="3" align='right'><?php echo $row_detalleliquidacion['totaldebe'] ?></td>
				</tr>
				<tr>
				 	
					<td colspan="3" align='right'><strong>Total </strong> </td>
					<td colspan="3" align='right'><?php echo $row_detalleliquidacion['pagototal']; ?></td>
				</tr>
				<tr>
				 	
				</tr>
		</table>
		<div><a href="historico_liquidacioness.php"><strong>Volver a Liquidaciones</strong></a></div>
	
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