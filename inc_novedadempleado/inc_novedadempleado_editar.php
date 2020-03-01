<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$idnovedadempleado=$_GET['idNovedad'];
$novedadempleado="SELECT * FROM novedad WHERE idNovedad=$idnovedadempleado";
$q_novedadempleado=mysql_query($novedadempleado);
$row_novedadempleado= mysql_fetch_array($q_novedadempleado);

?>

<table class='table table-bordered table-striped'>
<form action="novedadempleado_editar_ok.php" method="POST">

<tr>
	<td><div align='right'>ID Novedad</td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" value="<?php echo $idnovedadempleado; ?>" name="idnovedadempleado" readonly></div></td>
</tr>

<tr>
	<td><div align='right'>Fecha</div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="fechaNovedad" required="required" value="<?php echo $row_novedadempleado['fechaNovedad'] ?>"></div></td>
	
</tr>

<tr>
	<td><div align='right'>Faltas</div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="falta" required="required" value="<?php echo $row_novedadempleado['falta'] ?>"></div></td>
	
</tr>

<tr>
	<td><div align='right'>Llegadas Tarde</div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="llegadaTarde" required="required" value="<?php echo $row_novedadempleado['llegadaTarde'] ?>"></div></td>
	
</tr>

<tr>
	<td></td>
	<td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Modificar"></td>
</tr>
	
</form>	
</table>