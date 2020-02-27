<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include "sis_header.php" ?>
<title>Smile</title>
</head>

<body>
<div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse"><i class="fa fa-cart-plus" aria-hidden="true"></i>
        Agregar Producto</p>
        <div class="panel-body">
            <form ACTION="agregar_linea_compra.php" METHOD="POST" >
                <div class="form-group">
                  <?php include "includes/chosen/index_select_producto_compra.php" ?>
                </div>
                
                    <input name="id" type="hidden" class="form-control span12" id="idproducto" required readonly>
               
                <div class="form-group">
                  <label>Precio Compra</label>
                    <input name="preciocompra" type="text" class="form-control span12" id="preciocompra" required>
                </div>
                <div class="form-group">
                  <label>Cantidad</label>
                    <input name="cantidad" type="number" min="0" class="form-control span12" id="cantidad" required>
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
      window.location.href="compra_nueva.php";
    });
    </script>
</html>