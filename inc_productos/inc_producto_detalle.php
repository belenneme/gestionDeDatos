<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idproducto=$_GET['idproducto'];
$producto="SELECT * FROM producto
INNER JOIN categoriaproducto ON categoriaproducto_idcategoriaproducto=idcategoriaproducto
WHERE idproducto=$idproducto";
$q_producto=mysql_query($producto);
$row_producto= mysql_fetch_array($q_producto);
?>

<table class='table table-bordered table-striped'>

<tr>
	<td><div align='right'>id: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $idproducto; ?></div></td>
</tr>

<tr>
	<td><div align='right'>Nombre: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_producto['nombreproducto'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Categor&iacute;a: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_producto['nombrecategoria'] ?></div></td>

</tr>

<tr>
	<td><div align='right'>Marca: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_producto['marca'] ?></div></td>

</tr>

<tr>
	<td><div align='right'>Stock: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_producto['stockproducto'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Stock M&iacute;nimo: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_producto['stockcritico'] ?></div></td>
</tr>

<tr>
	<td><div align='right'>Precio de Compra: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_producto['preciocompra'] ?></div></td>
</tr>
<tr>
	<td><div align='right'>Porcentaje Ganancia: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_producto['porcentajeganancia']."%" ?></div></td>
</tr>
<tr>
	<td><div align='right'>Precio de venta: </div></td>
	<td class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><div><?php echo $row_producto['precioventa'] ?></div></td>
</tr>

</table>
