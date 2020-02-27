<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idcliente=$_GET['idcliente'];
$cliente="SELECT * FROM cliente WHERE idcliente=$idcliente";
$q_cliente=mysql_query($cliente);
$row_cliente= mysql_fetch_array($q_cliente);

?>

<table class='table table-bordered table-striped'>
<form action="cliente_editar_ok.php" method="POST">

<input type="hidden" name="idcliente" id="" class="form-control" value="<?php echo $idcliente; ?>">

<tr>
	<td><div align='right'>Nombre y Apellido|Razon social </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="nombreorsocial" required="required" value="<?php echo $row_cliente['nombreorsocial'] ?>"></div></td>

</tr>

<tr>
	<td><div align='right'>CUIL|CUIT </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="cuilcliente" value="<?php echo $row_cliente['cuilcliente'] ?>"></div></td>
</tr>

<tr>
	<td><div align='right'>E-mail </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="email" name="mailcliente" value="<?php echo $row_cliente['mailcliente'] ?>"></div></td>
</tr>
<tr>
	<td><div align='right'>Telefono </div></td>
	<td><div class="col-xs-12 col-sm-8 col-md-12 col-lg-12"><input class="form-control" type="text" name="telefonocliente" size="25" value="<?php echo $row_cliente['telefonocliente'] ?>" ></div></td>
</tr>
<tr>
	<td><div align='right'>Tipo de cliente </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php  include "includes/select_multiple/index_select_tipocliente_editar.php" ?>
	</div></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Modificar"></td>
</tr>

</form>
</table>
