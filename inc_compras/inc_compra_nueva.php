<?php mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
?>
<form action="alta_compra.php" method="POST" role="form" onsubmit="return validar()">
  <div class="row control-group">
    <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-3 col-sm-offset-6 col-md-offset-6 col-lg-offset-9">
        <input type="text" name="fechacompra" id="inputFechacompra" class="form-control" value="<?php echo date("Y-m-d h:i:s");?>" required="required" readonly>
    </div>
  </div>
Datos del Proveedor
 <legend></legend>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row control-group">
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-6">
Nombre Proveedor
          <div class="clearfix"></div>
          <?php include "includes/chosen/index_select_proveedor.php" ?>
      </div>
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
          Cuil
          <input type="text" name="cuilproveedor" id="inputcuilproveedor" class="form-control" value="00-00000000" required="required" readonly>
      </div>
    </div>
    <div class="row control-group">
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
          Factura n&uacute;mero
          <input type="text" name="numerofactura" id="inputnumerofactura" class="form-control" value="">
      </div>
    </div>
  </div>
<legend></legend>

<table id="tabla" class="table table-bordered table-striped">
  <!-- Cabecera de la tabla -->
  <thead>
    <tr>
        <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Id producto</th>
        <th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Descripci&oacute;n</th>
        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Precio Unitario</th>
        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cantidad</th>
        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Importe</th>
        <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
    </tr>
    </thead>
  <tbody>
    <?php include "inc_compras/inc_compra_consulta_linea.php" ?>
    <?php include "inc_compras/inc_compra_grid.php" ?>
    <tr>
      <td colspan="4" align="right">Total</td>
      <td align="right">
        <input type="number"  id="inputsubtotal" class="form-control" value="<?php echo $importe ?>" min="0" step="any" readonly required="required">
      </td>
      <td></td>
    </tr>
  </tbody>
</table>
<!-- Botón para agregar filas -->
    <div align="right">
    <a href="agregar_producto_compra.php"><button type="button" class= "btn btn-default btn-md"> <span class="glyphicon glyphicon-plus"> A&ntilde;adir</span></a>
    <br>
    </div>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <br>
  <br>

  <button type="submit" class="btn boton-send btn-info pull-right btn-md">Aceptar Compra</button>

  <button type="button" id="cancelar" class="btn btn-danger btn-primary pull-left btn-md">Cancelar Compra</button>
    </div>
</form>

<script type="text/javascript">
    $('#cancelar').on('click',function(){
    $.post("cancelarcompra.php", {}, function(data){
                 location.reload();
            });
    });
    </script>
<!-- valida que el cliente este registrado si se ingresa condicion de pago cuenta corriente -->
<script>
function validar(){
var idproveedor = $('#inputidproveedor').val();
var total = $('#inputsubtotal').val();
        if(idproveedor==0){
        alert('Debe seleccionar un proveedor');
        return false;
        }
        else {
          if (total==0) {
            alert('cargar al menos un producto');
            return false;
          }
        }
}
</script>
