<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

	$idtipoliquidacion=$_POST['idtipoliquidacion'];
	$tipoconcepto=$_POST['tipoconcepto'];
	$nombre_concepto=$_POST['nombre_concepto'];
	$monto_fijo=$_POST['monto_fijo'];
	$monto_variable=$_POST['montovariable'];

	
    
    $insert_concepto=mysql_query("INSERT INTO concepto (descripcionconcepto, montofijo, tipoconcepto, montovariable, estado) 
    VALUES ('$nombre_concepto', '$monto_fijo', '$tipoconcepto', '$monto_variable','1')");

    /**$buscar_concepto2=mysql_query("SELECT idconcepto 
                        FROM concepto WHERE descripcionconcepto==$nombre_concepto");**/


$q_ult_concepto = mysql_query("SELECT MAX(idconcepto) AS idconcepto FROM concepto")
or die(mysql_error());
$row_ult_concepto=mysql_fetch_array($q_ult_concepto);
$ult_concepto=$row_ult_concepto['idconcepto'];
   
   $insert_relacion_concepto= mysql_query("INSERT INTO tipoliquidacion_concepto (concepto_idconcepto,tipoliquidacion_idtipoliquidacion)
    VALUES ($ult_concepto,$idtipoliquidacion)");
    
?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Alta de concepto exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="tipoliquidacion_editar.php?idtipoliquidacion=<?php echo $idtipoliquidacion; ?>">Volver</a>
