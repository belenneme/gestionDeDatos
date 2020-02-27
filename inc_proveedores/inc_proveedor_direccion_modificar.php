<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$iddireccion=$_GET['iddireccion'];
$idproveedor=$_GET['idproveedor'];
$direccion="SELECT * FROM direccion WHERE iddireccion=$iddireccion";
$q_direccion=mysql_query($direccion);
$row_direccion= mysql_fetch_array($q_direccion);
?>

<table class='table table-bordered table-striped'>
<form action="proveedor_direccion_modificar_ok.php" method="POST">
  <input type="hidden" name="idproveedor" id="" class="form-control" value="<?php echo $idproveedor; ?>">
<tr>
  <td><div align='right'>id Direcci&oacute;n: </td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" value="<?php echo $iddireccion; ?>" name="iddireccion" readonly></div></td>
</tr> 

<tr>
  <td><div align='right'>Provincia: </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <?php include "includes/select_multiple/index_select_provincia_edicion.php" ?>
      </div>
  </td>
</tr>

<tr>
  <td><div align='right'>Localidad: </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <select class="form-control" name="inputlocalidad" id="inputlocalidad" required ></select>
      </div>
  </td>  
</tr> 

<tr>
  <td><div align='right'>Barrio: </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="barrio" value="<?php echo $row_direccion['barrio'] ?>"></div></td>
</tr>

<tr>
  <td><div align='right'>Manzana: </div></td>
  <td><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input class="form-control" type="text" name="manzana" size="25" value="<?php echo $row_direccion['manzana'] ?>" ></div></td>
</tr> 

<tr>
  <td><div align='right'>Calle (*): </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="calle" size="45" value="<?php echo $row_direccion['calle'] ?>" required></div></td>
</tr>

<tr>
  <td><div align='right'>N&uacute;mero (*): </div></td>
  <td><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><input class="form-control" type="number" min="0" name="numero" value="<?php echo $row_direccion['numero'] ?>" required></div></td>
</tr>

<tr>
  <td></td>
  <td><input type="submit" class="btn btn-primary pull-right" name="button" id="button" value="Modificar"></td>
</tr>
  
</form> 
</table>