<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$idcategoriaempleado=$_GET['idcategoriaempleado'];
$categoriaempleado="SELECT * FROM categoriaempleado WHERE idcategoriaempleado=$idcategoriaempleado";
$q_categoriaempleado=mysql_query($categoriaempleado);
$row_categoriaempleado= mysql_fetch_array($q_categoriaempleado);

?>

<table class='table table-bordered table-striped'>
<form action="categoriaempleado_editar_ok.php" method="POST">

<tr>
	<td><div align='right'>ID categoria</td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" value="<?php echo $idcategoriaempleado; ?>" name="idcategoriaempleado" readonly></div></td>
</tr>

<tr>
	<td><div align='right'>NombrE</div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="nombrecategoria" required="required" value="<?php echo $row_categoriaempleado['nombrecategoria'] ?>"></div></td>
	
</tr>

<tr>
	<td><div align='right'>Salario Basico</div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="salariobasicocategoria" required="required" value="<?php echo $row_categoriaempleado['salariobasicocategoria'] ?>"></div></td>
	
</tr>

<tr>
	<td></td>
	<td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Modificar"></td>
</tr>
	
</form>	
</table>