<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idproveedor=$_GET['idproveedor'];
$proveedor="SELECT * FROM proveedor WHERE idproveedor=$idproveedor";
$q_proveedor=mysql_query($proveedor);
$row_proveedor= mysql_fetch_array($q_proveedor);
?>

<table class='table table-bordered table-striped'>

<tr>
	<td><div align='right'>id Proveedor: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo $idproveedor; ?></div></td>
</tr> 

<tr>
	<td><div align='right'>CUIL: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo $row_proveedor['cuilproveedor'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Razon social (*): </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo $row_proveedor['razonsocialproveedor'] ?></div></td>
	
</tr> 
<tr>
	<td><div align='right'>E-mail: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo $row_proveedor['mailproveedor'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Telefono: </div></td>
	<td><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?php echo $row_proveedor['telefonoproveedor'] ?>"</div></td>
</tr>

</table>