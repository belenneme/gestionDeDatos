<?php

	$num_total_registros = mysql_num_rows($q_pago);
	if ($num_total_registros>0) {?>
		<table class="table">
			<tr>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Id Cuenta</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">cliente</th>
				<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Saldo</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">CUIL</th>
				<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
			</tr>

<?php
	 while ($row_pago=mysql_fetch_array($q_pago)) {
	 	if ($row_pago['saldocuenta']!=0) {
	  ?>
	 		<tr>
		 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_pago['idcuenta'] ?></td>
		 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-2"><?php echo $row_pago['nombreorsocial'] ?></td>
		 		<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_pago['saldocuenta'] ?></td>
		 		<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_pago['cuilcliente'] ?></td>
				<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"> <a href="pagar_cuenta.php?idcuenta=<?php echo $row_pago['idcuenta']; ?>"><button type="button" class= "btn btn-info btn-xs"><i class="fa fa-money"> Pagar </i> </button></a> </td>
	 		</tr>
	 <?php
		}
	}
}	?>
</table>
