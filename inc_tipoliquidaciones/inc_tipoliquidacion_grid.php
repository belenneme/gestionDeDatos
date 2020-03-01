<?php include "inc_tipoliquidacion_query.php" ?>
<?php

	 $num_total_registros = mysql_num_rows($q_tipoliquidacion);

	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Id</th>
				<th class="col-xs-5 col-sm-5 col-md-5 col-lg-5">Descripcion</th>
        <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
    	</tr>
<?php
	 while ($row_tipoliquidacion=mysql_fetch_array($q_tipoliquidacion)) { ?>
	 	<tr>
	 		<td class="col-xs-6 col-sm-6 col-md-6 col-lg-7"><?php echo $row_tipoliquidacion['idtipoliquidacion'] ?></td>
	 		<td class="col-xs-6 col-sm-6 col-md-6 col-lg-7"><?php echo $row_tipoliquidacion['descripcion'] ?></td>
			 <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
	 		<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><a href="tipoliquidacion_editar.php?idtipoliquidacion=<?php echo $row_tipoliquidacion['idtipoliquidacion']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar</span></button></a></td>
		 	<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="tipoliquidacion_eliminar.php?idtipoliquidacion=<?php echo $row_tipoliquidacion['idtipoliquidacion']; ?>"><button type="button" class= "btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"> Borrar </span></button></a></td>
	</tr>
  <?php 	}
  }	?>
	</table>
