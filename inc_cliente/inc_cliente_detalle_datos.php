<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idcliente=$_GET['idcliente'];
$cliente="SELECT * FROM cliente WHERE idcliente=$idcliente";
$q_cliente=mysql_query($cliente);
$row_cliente= mysql_fetch_array($q_cliente);
?>

<table class='table table-bordered table-striped'>

<tr>
	<td><div align='right'>ID cliente: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo $idcliente; ?></div></td>
</tr> 

<tr>
	<td><div align='right'>Nombre y apellido/Razon social: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo $row_cliente['nombreorsocial'] ?></div></td>
	
</tr>

<tr>
	<td><div align='right'>CUIL: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo $row_cliente['cuilcliente'] ?></div></td>
</tr>
 
<tr>
	<td><div align='right'>E-mail: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo $row_cliente['mailcliente'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Telefono: </div></td>
	<td><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?php echo $row_cliente['telefonocliente'] ?>"</div></td>
</tr>

</table>