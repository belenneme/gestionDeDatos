<?php

	$num_total_registros = mysql_num_rows($q_detalleliquidacion);
	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
                <th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">ID Liquidacion</th>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">ID Detalle Liquidacion</th>
				<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Total Haber</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Total Debe</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Fecha Deposito</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Empleado</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
			</tr>
<?php
	 while ($row_detalleliquidacion=mysql_fetch_array($q_detalleliquidacion)) { ?>
	 	<tr>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_detalleliquidacion['idliquidacion'] ?></td>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_detalleliquidacion['iddetalleliquidacion'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_detalleliquidacion['totalhaber'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_detalleliquidacion['totaldebe'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_detalleliquidacion['fechadeposito'] ?></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_detalleliquidacion['nombreempleado'] ?></td>
             <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="ver_detalleliquidacion.php?iddetalleliquidacion=<?php echo $row_detalleliquidacion['iddetalleliquidacion'] ?>&idempleado=<?php echo $row_detalleliquidacion['idempleado'] ?>&idliquidacion=<?php echo $row_detalleliquidacion['idliquidacion'] ?>"><button type="button" class= "btn btn-warning btn-xs"><span class="glyphicon glyphicon-list"> Detalle</span> </button></a></td>
	 	</tr>
	 <?php 	}
	 }	?>
</table>