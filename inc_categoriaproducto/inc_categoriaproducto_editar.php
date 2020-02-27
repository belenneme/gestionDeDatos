<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$idcategoriaproducto=$_GET['idcategoriaproducto'];
$categoriaproducto="SELECT * FROM categoriaproducto WHERE idcategoriaproducto=$idcategoriaproducto";
$q_categoriaproducto=mysql_query($categoriaproducto);
$row_categoriaproducto= mysql_fetch_array($q_categoriaproducto);

?>

<table class='table table-bordered table-striped'>
<form action="categoriaproducto_editar_ok.php" method="POST">

<tr>
	<td><div align='right'>ID categoria: </td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" value="<?php echo $idcategoriaproducto; ?>" name="idcategoriaproducto" readonly></div></td>
</tr>

<tr>
	<td><div align='right'>Nombre:</div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="nombrecategoria" required="required" value="<?php echo $row_categoriaproducto['nombrecategoria'] ?>"></div></td>
	
</tr>

<tr>
	<td></td>
	<td><input type="submit" class="btn btn-primary pull-right" name="button" id="button" value="Modificar"></td>
</tr>
	
</form>	
</table>
