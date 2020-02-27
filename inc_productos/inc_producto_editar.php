<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idproducto=$_GET['idproducto'];
$producto="SELECT * FROM producto WHERE idproducto=$idproducto";
$q_producto=mysql_query($producto);
$row_producto= mysql_fetch_array($q_producto);
?>

<table class='table table-bordered table-striped'>
<form action="producto_editar_ok.php" method="POST">

<tr>
	<td><div align='right'>Id: </td>
	<td><div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input class="form-control" type="text" value="<?php echo $idproducto; ?>" name="idproducto" readonly></div></td>
</tr>

<tr>
	<td><div align='right'>Nombre: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="nombreproducto" value="<?php echo $row_producto['nombreproducto'] ?>"></div></td>
</tr>

<tr>

<tr>
	<td><div align='right'>Marca: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="marcaproducto" value="<?php echo $row_producto['marca'] ?>"></div></td>
</tr>

<tr>

<tr>


	<td><div align='right'>Categor&iacute;a: </div></td>
	<td>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php include "includes/select_multiple/index_select_categoria_editar.php" ?>
		</div>
	</td>
</tr>

<tr>
	<td><div align='right'>Stock: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><input class="form-control" type="text" name="stockproducto" value="<?php echo $row_producto['stockproducto'] ?>"></div></td>
</tr>

<tr>
	<td><div align='right'>Stock M&iacute;nimo: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><input class="form-control" type="text" name="stockcritico" value="<?php echo $row_producto['stockcritico'] ?>"></div></td>
</tr>

<tr>
	<td><div align='right'>Precio Costo: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><input class="form-control" type="text" name="preciocompra" required="required" value="<?php echo $row_producto['preciocompra'] ?>"></div></td>

</tr>
<tr>
	<td><div align='right'>Porcentaje de Ganancia: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><input class="form-control" type="text" name="porcganancia" value="<?php echo $row_producto['porcentajeganancia'] ?>"></div></td>
</tr>

<tr>
	<td></td>
	<td><input type="submit" class="btn btn-info pull-center" name="button" id="button" value="Modificar"></td>
</tr>

</form>
</table>
