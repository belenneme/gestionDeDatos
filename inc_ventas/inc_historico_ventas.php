<?php include "inc_ventas/inc_ventas_query.php" ?>
<?php include "inc_ventas/inc_ventas_grid_impresion.php"; ?>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right" id="imprimir"><button type="button" class="btn btn-info">Imprimir</button></div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="left"><a href="historico_ventas.php"><button type="button" class="btn btn-info">Volver	</button></a></div>

<script type="text/javascript">
    $('#imprimir').on('click',function(){
    window.print();
    });
</script>