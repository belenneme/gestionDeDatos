<div class="sidebar-nav">
<ul>
<li><a href="principal.php" class="nav-header"><i class="fa fa-home"></i> Home</a></li>
<li><a href="#" data-target=".dashboard-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-shopping-cart"></i> Ventas<i class="fa fa-collapse"></i></a></li>
<li>
  <ul class="dashboard-menu nav nav-list collapse">
    <li><a href="venta_nueva.php"><span class="fa fa-caret-right"></span> Crear venta</a></li>
    <li><a href="historico_ventas.php"><span class="fa fa-caret-right"></span> Listado de ventas</a></li>
  </ul>
</li>

<?php if($_SESSION["nivel"]>=2){?>
<li><a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-shopping-basket"></i> Compras<i class="fa fa-collapse"></i></a></li>
<li>
  <ul class=" premium-menu nav nav-list collapse">
    <li><a href="compra_nueva.php"><span class="fa fa-caret-right"></span> Crear Compra</a></li>
    <li><a href="historico_compras.php"><span class="fa fa-caret-right"></span> Listado de compras </a></li>
  </ul>
</li>
<?php } ?>

<?php if($_SESSION["nivel"]==5){?>
<li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-edit"></i> Liquidaci&oacute;n de sueldos<i class="fa fa-collapse"></i></a></li>
<li>
  <ul class="legal-menu nav nav-list collapse">
    <li><a href="liquidar.php"><span class="fa fa-caret-right"></span> Liquidar </a></li>
    <li><a href="liquidaciones.php"><span class="fa fa-caret-right"></span> Listar Liquidaciones</a></li>
    <li><a href="tipo_liquidaciones.php"><span class="fa fa-caret-right"></span> Tipos de Liquidaciones</a></li>
    <li><a href="conceptos.php"><span class="fa fa-caret-right"></span> Conceptos</a></li>
    <li><a href="boleta.php"><span class="fa fa-caret-right"></span> Boleta de Sueldo</a></li>
    <li><a href="historico_liquidacioness.php"><span class="fa fa-caret-right"></span> Listado de Liquidaciones </a></li>
  </ul>
</li>
<?php }?>
<?php if($_SESSION["nivel"]>=4){?>
<li><a href="#" data-target=".item2-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-users"></i> Empleados<i class="fa fa-collapse"></i></a></li>
<li>
  <ul class="item2-menu nav nav-list collapse">
    <li><a href="empleados.php"><span class="fa fa-caret-right"></span> Listar empleados</a></li>
    <li><a href="categoriaempleado.php"><span class="fa fa-caret-right"></span> Categorias</a></li>
    <li><a href="novedadempleado.php"><span class="fa fa-caret-right"></span> Novedad-Asistencia</a></li>
    
  </ul>
</li>
<?php }?>



<li><a href="#" data-target=".item-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-barcode"></i> Productos<i class="fa fa-collapse"></i></a></li>
<li>
  <ul class="item-menu nav nav-list collapse">
    <li><a href="productos.php"><span class="fa fa-caret-right"></span> Listar productos</a></li>
    <li><a href="categoriaproducto.php"><span class="fa fa-caret-right"></span> Categorias</a></li>
  </ul>
</li>
<?php if($_SESSION["nivel"]>=4){?>
<li><a href="#" data-target=".item3-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-book"></i> Reportes<i class="fa fa-collapse"></i></a></li>
<li>
  <ul class="item3-menu nav nav-list collapse">
    <li><a href="ivacompra.php"><span class="fa fa-caret-right"></span> Libro IVA Compras</a></li>
    <li><a href="ivaventa.php"><span class="fa fa-caret-right"></span> Libro IVA Ventas</a></li>
    <li><a href="librosueldos.php"><span class="fa fa-caret-right"></span> Libro Sueldos</a></li>
  </ul>
</li>
<?php }?>
<?php if($_SESSION["nivel"]>=2){?>
<li><a href="proveedores.php" class="nav-header"><i class="fa fa-truck"></i> Proveedores</a></li>
<?php }?>
<li><a href="clientes.php" class="nav-header"><i class="fa fa-male"></i> Clientes</a></li>
<li><a href="pago.php" class="nav-header"><i class="fa fa-money"></i> Cuenta Clientes</a></li>

  <li><a href="moduloseguridad.php" class="nav-header"><i class="fa fa-truck"></i> Modulo Seguridad</a></li>

 </div>
