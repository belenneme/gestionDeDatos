<?php mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
  $tipo=mysql_query("SELECT * FROM tipo");
  $venta=mysql_query("SELECT * FROM venta ORDER BY idventa DESC LIMIT 0,1");
  $row_venta=mysql_fetch_array($venta);

  $ult_venta=$row_venta['idventa']+1;

?>
<form action="alta_venta.php" method="POST" role="form" onsubmit="return validar();">

  <div class="row control-group">
    <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
          Numero Factura

          <input type="text" name="numerofactura" id="numerofactura" class="form-control" value="0000<?php echo $ult_venta?>" required="required" readonly>
      </div>
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
      </div>
    <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
          Fecha Venta
        <input type="text" name="fechaventa" id="inputFechaventa" class="form-control" value="<?php echo date("Y-m-d h:i:s");?>" required="required" readonly>
    </div>
  </div>

Datos del Cliente
 <legend></legend>
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row control-group">
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-6">
          Nombre o Razon Social
          <div class="clearfix"></div>
          <?php include "includes/chosen/index_select_cliente.php" ?>
      </div>
    </div>
    <div class="row control-group">
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
          Cuil
          <input type="text" name="cuilcliente" id="inputcuilcliente" class="form-control" value="00-00000000" required="required" readonly>
      </div>
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
          Tipo 
          <input type="text" name="itipo" id="inputtipo" class="form-control" value="Consumidor Final" required="required" readonly>
      </div>
      <div class="form-group controls col-xs-12 col-sm-6 col-md-6 col-lg-4">
        Condici&oacute;n Pago:
        <select name="condicionpago" id="inputCondicionpago" class="form-control" required="required">
          <option value="1" selected>Contado</option>
          <option value="0">Cuenta Corriente</option>
        </select>
      </div>
    </div>
  </div>
<legend></legend>

<table id="tabla" class="table table-bordered table-striped">
  <!-- Cabecera de la tabla -->
  <thead>
    <tr>
        <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Id prod.</th>
        <th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Descripci&oacute;n</th>
        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Precio Unitario</th>
        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cantidad</th>
        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Importe</th>
        <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
    </tr>
    </thead>
  <tbody>
    <?php include "inc_ventas/inc_venta_consulta_linea.php" ?>
    <?php include "inc_ventas/inc_venta_grid.php" ?>
    <tr>
      <td colspan="4" align="right">Subtotal</td>
      <td align="right">
        <input type="number" name="subtotal" id="inputsubtotal" class="form-control" value="<?php echo $importe ?>" min="0" step="any" readonly required="required">
      </td>
      <td></td>
    </tr>
    <tr>
      <td colspan="2" align="right">Descuento</td>
      <td align="right"><input type="number" name="descuento" id="inputdescuento" class="form-control" value="0" min="0" max="30" step="any"></td>
      <td align="right">Total</td>
      <td>
        <input type="number"  id="inputtotalcondesc" class="form-control" value="<?php echo $importe ?>" min="0" step="any" readonly required="required">
      </td>
      <td></td>
    </tr>

  </tbody>
</table>
<!-- Botón para agregar filas -->
    <div align="right">
    <a href="agregar_producto.php"><button type="button" class= "btn btn-default btn-md"> <span class="glyphicon glyphicon-plus"> A&ntilde;adir</span></a>
    </div>


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <br>
  <br>

  <button type="submit" class="btn boton-send btn-info pull-right btn-md">Aceptar Venta</button>

  <button type="button" id="cancelar" class="btn btn-danger btn-primary pull-left btn-md">Cancelar Venta</button>
    </div>
</form>

<script type="text/javascript">
    $('#cancelar').on('click',function(){
    $.post("cancelarventa.php", {}, function(data){
                 location.reload();
            });
    });
    </script>

<script type="text/javascript">
    $('#inputdescuento').on('change',function(){
    var descuento = 100-$(this).val();
    var subtotal = $('#inputsubtotal').val();
    var importe=subtotal*(descuento/100) ;
    $("#inputtotalcondesc").val(importe);
    });
</script>
<!-- valida que el cliente este registrado si se ingresa condicion de pago cuenta corriente -->
<script>
function validar(){
var idcliente = $('#inputidcliente').val();
var condicionpago = $('#inputCondicionpago').val();
var total = $('#inputsubtotal').val();
        if(idcliente==NULL && condicionpago==0){
        alert('Para agregar a la cuenta el cliente debe estar registrado');
        return false
        }
          else {
          if (total==0) {
            alert('cargar al menos un producto');
            return false;
          }
        }
}

</script>
