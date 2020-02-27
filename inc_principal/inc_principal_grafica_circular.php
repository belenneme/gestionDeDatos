<script src="lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
 </script>

<?php
mysql_select_db($database_conexion_compucentro, $conexion_compucentro);
//Perifericos
$query_indumentaria= mysql_query("SELECT idventa from venta inner join lineaventa ON venta_idventa=idventa
inner join producto on producto_idproducto=idproducto inner join categoriaproducto on
categoriaproducto_idcategoriaproducto= idcategoriaproducto where(categoriaproducto_idcategoriaproducto=2 AND YEAR(fechaventa)=YEAR(NOW()))");
$cant_indumentaria=mysql_num_rows($query_indumentaria);

//Juegos
$query_accesorios= mysql_query("SELECT idventa from venta inner join lineaventa ON venta_idventa=idventa
inner join producto on producto_idproducto=idproducto inner join categoriaproducto on
categoriaproducto_idcategoriaproducto= idcategoriaproducto where(categoriaproducto_idcategoriaproducto=3 AND YEAR(fechaventa)=YEAR(NOW()))");
$cant_accesorios=mysql_num_rows($query_accesorios);


//Cartuchos
$query_calzados= mysql_query("SELECT idventa from venta inner join lineaventa ON venta_idventa=idventa
inner join producto on producto_idproducto=idproducto inner join categoriaproducto on
categoriaproducto_idcategoriaproducto= idcategoriaproducto where(categoriaproducto_idcategoriaproducto=4 AND YEAR(fechaventa)=YEAR(NOW()))");
$cant_calzados=mysql_num_rows($query_calzados);

?>

<div class="panel panel-default">
    <a href="#page-stats" class="panel-heading" data-toggle="collapse">Cantidad de productos vendidos en <?php echo date("Y") ?></a>
    <div id="page-stats" class="panel-collapse panel-body collapse in">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="knob-container">
                    <input class="knob" data-width="100%" data-min="0" data-max="3200" data-displayPrevious="true" value="<?php echo $cant_indumentaria ?>" data-fgColor="#2dcec6" data-readOnly=true;>
                    <h3 class="text-muted text-center">Perifericos</h3>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="knob-container">
                    <input class="knob" data-width="100%" data-min="0" data-max="288" data-displayPrevious="true" value="<?php echo $cant_accesorios ?>" data-fgColor="#2dcec6" data-readOnly=true;>
                    <h3 class="text-muted text-center">Juegos</h3>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="knob-container">
                    <input class="knob" data-width="100%" data-min="0" data-max="132" data-displayPrevious="true" value="<?php echo $cant_calzados ?>" data-fgColor="#2dcec6" data-readOnly=true;>
                    <h3 class="text-muted text-center">Cartuchos</h3>
                </div>
            </div>
        </div>
    </div>
</div>
