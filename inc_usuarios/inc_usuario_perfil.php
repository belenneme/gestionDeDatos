<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

$idusuario=$_SESSION["idusuario"];
$usuario = "SELECT * FROM usuario inner join empleado on empleado_idempleado=idempleado WHERE idusuario=$idusuario";
$q_usuario = mysql_query($usuario);
$row_usuario = mysql_fetch_array($q_usuario);
?>

<div class="row">
  <div class="col-md-6">
				<div class="col-xs-12 .col-md-8">Usuario</div>
					<div class="col-xs-6 .col-md-4">
					<input class="form-control" value="<?php echo $row_usuario['nombreusuario'] ?>" readonly>
					</div>
					<div class="col-xs-12 .col-md-8">
					<br>
		<a href="usuario_contrasena.php">Cambiar Contrase&ntildea</a>
		</div>

  </div>
  <div class="col-md-6">
  	<h4>Datos del Empleado</h4>
				<div class>Nombre</div>
				<div class>
					<input class="form-control" value="<?php echo $row_usuario['nombreempleado'] ?>" readonly>
				</div>
				<br>
				<div class>Apellido</div>
				<div class>
					<input class="form-control" value="<?php echo $row_usuario['apellidoempleado'] ?>" readonly>
				</div>
	</div>
  </div>
</div>
