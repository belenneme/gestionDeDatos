<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "sis_header.php" ?>
<title>Pasaje Materiales</title>
</head>

<body>
<div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse"><i class="fa fa-cart-plus" aria-hidden="true"></i>
        Agregar Producto</p>
        <div class="panel-body">
            <form ACTION="agregar_linea_venta.php" METHOD="POST" onsubmit="return validar();">
                <div class="form-group">
                  <?php include "includes/chosen/index_select_producto.php" ?>
                </div>
                <div class="form-group">
                    <input name="id" type="hidden" class="form-control span12" id="idproducto" required readonly>
                </div>
                <div class="form-group">
                  <label>Precio Unitario</label>
                    <input name="precioventa" type="text" class="form-control span12" id="precioventa" required readonly>
                </div>
                <div class="form-group">
                  <label>Stock</label>
                    <input name="stock" type="text" class="form-control span12" id="stockproducto" required readonly>
                </div>
                <div class="form-group">
                  <label>Cantidad</label>
                    <input name="cantidad" type="number" min="0" class="form-control span12" id="inputcantidad" step="any" required>
                </div>

                 <button type="button" id="cancelaradd" class="btn btn-danger">Cancelar</button>
                 <input type="submit" name="button" id="button" value="Enviar" class="btn btn-info pull-right" />
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
  <?php include 'inc_footer.php'; ?>
</div>
</body>

<script type="text/javascript">
    $('#cancelaradd').on('click',function(){
      window.location.href="venta_nueva.php";
    });
</script>

<script>
function validar(){
var stockproducto = $('#stockproducto').val();
var inputcantidad = $('#inputcantidad').val();
var restante = stockproducto - inputcantidad;
        if(restante < 0){
        alert('La cantidad no puede ser mayor al stock');
        return false
        }
}
 
</script> 

</html>