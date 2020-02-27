<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idproveedor=$_GET['idproveedor'];
$proveedor="SELECT * FROM proveedor WHERE idproveedor=$idproveedor";
$q_proveedor=mysql_query($proveedor);
$row_proveedor= mysql_fetch_array($q_proveedor);
?>

<table class='table table-bordered table-striped'>
<form action="proveedor_editar_ok.php" method="POST">

<tr>
	<td><div align='right'>id Proveedor: </td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" value="<?php echo $idproveedor; ?>" name="idprov" readonly></div></td>
</tr> 

<tr>
	<td><div align='right'>CUIL: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="cuilproveedor" value="<?php echo $row_proveedor['cuilproveedor'] ?>"></div></td>
</tr>
<tr>
	<td><div align='right'>Razon social (*): </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="razonsocialproveedor" required="required" value="<?php echo $row_proveedor['razonsocialproveedor'] ?>"></div></td>
	
</tr> 
<tr>
	<td><div align='right'>E-mail: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="email" name="mailproveedor" value="<?php echo $row_proveedor['mailproveedor'] ?>"></div></td>
</tr>
<tr>
	<td><div align='right'>Telefono: </div></td>
	<td><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input class="form-control" type="text" name="telefonoproveedor" size="25" value="<?php echo $row_proveedor['telefonoproveedor'] ?>" ></div></td>
</tr>	
<tr>
	<td></td>
	<td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Modificar"></td>
</tr>
	
</form>	
</table>
