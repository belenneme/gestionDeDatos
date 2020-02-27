<?php include "inc_concepto_query.php" ?>
<?php 
	
	 $num_total_registros = mysql_num_rows($q_concepto);

	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Id</th>
				<th class="col-xs-5 col-sm-5 col-md-5 col-lg-5">Descripcion</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Monto fijo</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Monto variable</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Tipo concepto</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
			</tr>
<?php 
	 while ($row_concepto=mysql_fetch_array($q_concepto)) { ?>
	 	<tr>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_concepto['idconcepto'] ?></td>
	 		<td class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><?php echo $row_concepto['descripcionconcepto'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_concepto['montofijo'] ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_concepto['montovariable']." %" ?></td>
	 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
	 		<?php if ($row_concepto['tipoconcepto']==0){
	 		 echo "Haber con Aporte";
			  } 
			  if ($row_concepto['tipoconcepto']==1){
				echo "Haber sin Aporte";
				} 
	 		 if ($row_concepto['tipoconcepto']==2) {
	 		 	echo "Deducci&oacute;n";
	 		  
	 		  }  ?>
	 		 </td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="concepto_edicion.php?idconcepto=<?php echo $row_concepto['idconcepto']; ?>"><button type="button" class= "btn btn-info btn-xs"> <span class="glyphicon glyphicon-pencil"> Editar</span> </button></a></td>
	 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a href="concepto_eliminar.php?idconcepto=<?php echo $row_concepto['idconcepto']; ?>"><button type="button" class= "btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"> Borrar </span></button></a></td>
	 	</tr>
	 <?php 	}
	 }	?>
	</table>