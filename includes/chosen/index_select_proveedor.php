<?php 
 mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

  $q_proveedores=mysql_query("SELECT * FROM proveedor
    WHERE estado=1
  ORDER BY razonsocialproveedor");  
?>
  <select data-placeholder="Proveedores" class="form-control chosen-select" tabindex="4" name="idproveedor" id="inputidproveedor">
       <option value="0">Seleccionar proveedor</option>
      <?php 
      while ($row_proveedor=mysql_fetch_array($q_proveedores)){ 
        if ($row_proveedor['idproveedor']!=0) { ?>
          <option value="<?php echo $row_proveedor['idproveedor']?>"><?php echo $row_proveedor['razonsocialproveedor']?></option>
                      
      <?php }
      } ?>
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
    $('select#inputidproveedor').on('change',function(){
    var idproveedorjs = $(this).val();
    $.post("includes/obtenerproveedor.php", { idproveedorjs: idproveedorjs }, function(data){
                $("#inputcuilproveedor").val(data);
            });
    });
    </script>