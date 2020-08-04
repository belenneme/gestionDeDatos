<?php

	$num_total_registros = mysql_num_rows($q_accesos);
	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Nivel de Acceso</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Nombre del Modulo</th>
				
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
			</tr>

<?php
	 while ($row_accesos=mysql_fetch_array($q_accesos)) {
	 	
	  ?>
	 		<tr>
		 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_accesos['nivel'] ?></td>
		 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-2"><?php echo $row_accesos['modulo'] ?></td>
		 		
	 		</tr>
	 <?php
		
	}
}	?>
</table>
