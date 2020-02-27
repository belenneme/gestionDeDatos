<?php require_once('Connections/conexion_compucentro.php'); ?>
<?php include('sis_acceso_ok.php'); ?>
<!doctype html>
<html lang="es">
<head>    
	<?php include "sis_header.php" ?>
</head>
<body class=" theme-blue">
	<?php include "sis_script.php" ?>
	<?php include "sis_menu_usuario.php" ?>   
	<?php include "sis_menu.php" ?>
	<div class="content">
		<div class="header">
			<h1 class="page-title">Categorias</h1>
		</div>
		<div class="main-content">
			<!-- Contenido principal -->
			<ul class="nav nav-tabs">
 				<li class="active">
 					<a href="#">Lista de categorias</a>
 				</li>
 				<li>
 					<a href="categoriaempleado_alta.php">Alta de Categoria</a>
 				</li> 
			</ul>
			<div id="myTabContent" class="tab-content">
     			<div class="tab-pane active in">   
     				<!--Contenido del listado -->
     				<?php  include "includes/buscador/inc_buscador_categoriaempleado.php" ?>  
      				<br/> 
      				<?php include "inc_categoriaempleado/inc_categoriaempleado_query.php" ?>
      				<?php include "inc_categoriaempleado/inc_categoriaempleado_grid.php" ?>         
     			</div>
    		</div>  
			<?php include "inc_footer.php" ?>
		</div>
	</div>
<?php include "sis_script_bootstrap.php" ?> 
  
</body>
</html>