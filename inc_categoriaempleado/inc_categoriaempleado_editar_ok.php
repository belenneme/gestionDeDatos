<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);	
	$idcategoriaempleado=$_POST['idcategoriaempleado'];
	$nombrecategoria=$_POST['nombrecategoria'];
	$salariobasicocategoria=$_POST['salariobasicocategoria'];

	$update_concepto="UPDATE categoriaempleado SET nombrecategoria='$nombrecategoria',salariobasicocategoria='$salariobasicocategoria' WHERE idcategoriaempleado=$idcategoriaempleado";
	$q_update=mysql_query($update_concepto);
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Modificaci&oacute;n de categoria exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="categoriaempleado.php">Volver</a>