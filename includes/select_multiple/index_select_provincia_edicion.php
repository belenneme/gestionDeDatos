
<?php 
  mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
  $provincia="SELECT * FROM provincia ORDER BY nombreprovincia";
  $q_provincia=mysql_query($provincia);  

  $iddireccion=$_GET['iddireccion'];
  $direccion_provincia="SELECT idlocalidad,idprovincia FROM direccion 
  INNER JOIN localidad ON localidad_idlocalidad=idlocalidad
  INNER JOIN provincia ON provincia_idprovincia=idprovincia 
  WHERE iddireccion=$iddireccion";
  $q_direccion_provincia=mysql_query($direccion_provincia);
  $row_direccion_provincia=mysql_fetch_array($q_direccion_provincia);



?>    
    <select name="inputProvincia" id="inputProvincia" class="form-control" required="required">
    <option value="0">Selecciona una provincia</option>
    <?php 
      while ($row_provincia=mysql_fetch_array($q_provincia)) { 
        if ($row_provincia['idprovincia'] == $row_direccion_provincia['idprovincia']) { ?>
          <option value="<?php echo $row_provincia['idprovincia']?>" selected><?php echo $row_provincia['nombreprovincia']?></option>
        <?php }
        else{ 
        ?>
          <option value="<?php echo $row_provincia['idprovincia']?>"><?php echo $row_provincia['nombreprovincia']?></option>
      <?php }
    }
      ?>
    </select> 
        
  <script type="text/javascript">
    $(document).ready(function(){
    var idprovinciajs = $('#inputProvincia').val();
    $.post("includes/select_multiple/localidades_edicion.php?idlocalidad=<?php echo $row_direccion_provincia['idlocalidad']; ?>", { idprovinciajs: idprovinciajs }, function(data){
                $("#inputlocalidad").html(data);
            });
    });
    </script>

    

  <script type="text/javascript">
    $('select#inputProvincia').on('change',function(){
    var idprovinciajs = $(this).val();
    $.post("includes/select_multiple/localidades.php", { idprovinciajs: idprovinciajs }, function(data){
                $("#inputlocalidad").html(data);
            });
    });
    </script>