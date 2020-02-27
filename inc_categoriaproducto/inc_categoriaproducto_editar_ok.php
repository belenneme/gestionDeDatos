<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);	
	$idcategoriaproducto=$_POST['idcategoriaproducto'];
	$nombrecategoria=$_POST['nombrecategoria'];

	$update_concepto="UPDATE categoriaproducto SET nombrecategoria='$nombrecategoria' WHERE idcategoriaproducto=$idcategoriaproducto";
	$q_update=mysql_query($update_concepto);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Modificaci&oacute;n de categoria exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="categoriaproducto_edicion.php?idcategoriaproducto=<?php echo $idcategoriaproducto; ?>">Volver</a>