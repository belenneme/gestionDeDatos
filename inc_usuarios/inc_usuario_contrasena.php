<?php 
  mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
  $idusuario=$_SESSION["idusuario"];
  $usuario = "SELECT * FROM usuario WHERE idusuario=$idusuario";
  $q_usuario = mysql_query($usuario);
  $row_usuario = mysql_fetch_array($q_usuario);

?>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <form action="usuario_cambio_pass.php" method="POST" id="cambio_cont" role="form">                                  
    <div class="form-group">
      <label for="">Contrase&ntildea Actual</label>
      <input type="password" name="pass_actual" id="pass_actual" class="form-control" required="required">
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
      <label for="">Nueva Contrase&ntildea</label>
      <input type="password" name="pass_nuevo" id="pass_nuevo" class="form-control" required="required" title="">
    </div>
    <div class="clearfix"></div>
    <div class="form-group">
      <label for="">Confirmar Nueva Contrase&ntildea</label>
      <input type="password" name="pass_nuevo_conf" id="pass_nuevo_conf" class="form-control" required="required" title="">
    </div>           
    <div class="clearfix"></div>
    <input type="submit" name="button" id="button" value="Aceptar" class="btn btn-info pull-left">
    <div class="clearfix"></div>
  </form>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <table class="table">
      <tr>
        <td>Usuario:</td>
        <td><strong><?php echo $row_usuario['nombreusuario'] ?></strong></td>
      </tr>
    </table> 
</div>
