<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idcliente=$_GET['idcliente'];
$cuenta="SELECT * FROM cuenta
INNER JOIN cliente ON cliente_idcliente=idcliente
WHERE idcliente=$idcliente";

$q_cuenta=mysql_query($cuenta);
?>


<table class='table table-bordered table-striped'>
	<thead>
		<th>ID cuenta</th>
		<th>Saldo</th>
	</thead>
	<tbody>
	<?php while ($row_cuenta = mysql_fetch_array($q_cuenta)) { ?>
		<tr>
			<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_cuenta['idcuenta']; ?></td>
			<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_cuenta['saldocuenta']; ?></td>
		</tr>
	<?php } ?>
	</tbody>

</table>