<?php
 mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

  $q_productos=mysql_query("SELECT * FROM producto
  ORDER BY nombreproducto");
?>
  <select data-placeholder="Productos" class="form-control chosen-select" tabindex="4" name="idproducto" id="inputidproducto">
      <option value="">Seleccione un Producto</option>
      <?php
      while ($row_productos=mysql_fetch_array($q_productos)){ ?>
          <option value="<?php echo $row_productos['idproducto']?>"><?php echo $row_productos['idproducto']?> - <?php echo $row_productos['nombreproducto']?> <?php echo $row_productos['marca']?> </option>
        <?php } ?>
  </select>


  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'No encontrado'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>

    <script type="text/javascript">
    $('select#inputidproducto').on('change',function(){
    var idproductojs = $(this).val();
    $.post("includes/obtenerproducto_compra.php", { idproductojs: idproductojs }, function(data){

                var devuelve=data.split(",");
                var idproducto = devuelve[0];
                $("#idproducto").val(idproducto);
            });
    });
    </script>
