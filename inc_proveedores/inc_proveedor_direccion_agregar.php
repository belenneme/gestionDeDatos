<?php
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
$idproveedor=$_GET['idproveedor'];
?>

<table class='table table-bordered table-striped'>
<form action="proveedor_direccion_agregar_ok.php" method="POST">
  <input type="hidden" name="idproveedor" id="" class="form-control" value="<?php echo $idproveedor; ?>"> 
<tr>
  <td><div align='right'>Provincia: </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <?php include "includes/select_multiple/index_select_provincia.php" ?>
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
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="barrio"></div></td>
</tr>

<tr>
  <td><div align='right'>Manzana: </div></td>
  <td><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><input class="form-control" type="text" name="manzana" size="25" ></div></td>
</tr> 

<tr>
  <td><div align='right'>Calle (*): </div></td>
  <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="calle" size="45" required></div></td>
</tr>

<tr>
  <td><div align='right'>N&uacute;mero (*): </div></td>
  <td><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><input class="form-control" type="number" min="0" name="numero" required></div></td>
</tr>

<tr>
  <td></td>
  <td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Agregar"></td>
</tr>
</form> 
</table>