<?php include('sis_acceso_ok.php'); ?>
<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

		$fechaliquidacion=$_POST['fechaliquidacionjs'];
		$idempleado=$_POST['selectedempleado'];
		$idconcepto=$_POST['selectedconcepto'];
		$cantidad_empleados=count($idempleado);
		$cantidad_conceptos=count($idconcepto);

    //veo si hay una fecha de liquidacion
  if ($fechaliquidacion==0) {
	if (isset($_POST['fechaliquidacion']) && $_POST['fechaliquidacion']!="") {
		$fechaliquidacion=$_POST['fechaliquidacion'];
	}
	else{
		$fechaliquidacion=date('Y-m-d');
	}
	$fechaliquidacion;
	//Primero debo buscar los empleados y realizar una liquidacion por cada uno
	for ($i=0; $i < $cantidad_empleados ; $i++) {
	$empleados="SELECT * FROM empleado
	INNER JOIN categoriaempleado ON categoriaempleado_idcategoriaempleado=idcategoriaempleado
	WHERE idempleado IN ($idempleado[$i]) AND estado=1";
	$q_empleados=mysql_query($empleados);

	while ($row_empleados=mysql_fetch_array($q_empleados)) {
        $totalaportes=0;
        $totalretenciones=0;
        $totalsalario=0;
            //obtengo la cantidad de personas del grupo familiar y la fecha de ingreso
		$grupo_fam=mysql_query("SELECT * FROM grupofamiliar WHERE empleado_idempleado=$row_empleados[idempleado]");
		$cant_grupo_fam= mysql_num_rows($grupo_fam);
		$fechaingreso=$row_empleados['fechaingresoempleado']; // CAMBIAR PORQUE AHORA VOY A TENER DISTINTO DINERO X tipo de parentesco

        //veo la cantidad de horas trabajadas para calcular el basico (YA NO HACE FALTA LO SACO DIRECTO DEL ATRIBUTO DE CATEGORIA)
		
		$basicoempleado=$row_empleados['horasTrabajadas'];
		

		$separafecha= explode('-', $fechaingreso);
 		$dia = $separafecha[2];
 		$mes = $separafecha[1];
   	$anio = $separafecha[0];

  	$diac =date("d");
   	$mesc =date("m");
   	$anioc =date("Y");

        //saco la cantidad de años de antiguedad del empleado

  	$antiguedad =  $anioc-$anio;
  	if($mesc < $mes && $diac < $dia || $mesc < $mes || $diac < $dia){
		$antiguedad_aux = $antiguedad - 1;
 		$antiguedad = $antiguedad_aux;
	}
     	$antiguedad;
        //creo la liquidacion
     	mysql_query("INSERT INTO liquidacion (empleado_idempleado, fechaliquidacion) VALUES ('$row_empleados[idempleado]', '$fechaliquidacion')");
     	$liq=mysql_query("SELECT * FROM liquidacion ORDER BY idliquidacion DESC LIMIT 0,1");
     	$row_liq=mysql_fetch_array($liq);
     	$ultima_liq=$row_liq['idliquidacion']."se muestra";

     	//calculo el saldo de cada concepto
			  for ($j=0; $j < $cantidad_conceptos ; $j++) {

        $conceptos=mysql_query("SELECT * FROM concepto WHERE idconcepto IN ($idconcepto[$j]) estado=1");
     	while ($row_conceptos=mysql_fetch_array($conceptos)) {
     		if ($row_conceptos['idconcepto']==2) {
     			$cantidad=$antiguedad;
     		}
     		else{
     			if ($row_conceptos['idconcepto']==5) {
     			$cantidad=$cant_grupo_fam;
     			}
     			else{
     				$cantidad=1;
     			}
     	}

     		$montofijo = $row_conceptos['montofijo'];
     		$porcentaje= $row_conceptos['montovariable']/100;
     		$montovariable = $basicoempleado*$porcentaje;
     		$totaldetalle=($montofijo+$montovariable)*$cantidad; //importe salario familiar
            //cargo cada concepto como una linea de liquidacion
     		mysql_query("INSERT INTO detalleliquidacion (cantidadconcepto, liquidacion_idliquidacion, concepto_idconcepto, total)
                VALUES ('$cantidad', '$ultima_liq', '$row_conceptos[idconcepto]', '$totaldetalle')");
     		switch ($row_conceptos['tipoconcepto']) {
     			case '0':
     				$totalretenciones=$totalretenciones+$totaldetalle;
     				break;
     			case '1':
     				$totalaportes=$totalaportes+$totaldetalle;
     				break;
     			default:
     				break;
     		}
     	}
		}
		$totalliquidacion=$basicoempleado+$totalaportes-$totalretenciones;
        //cargo saldo a la liquidacion
     	mysql_query("UPDATE liquidacion SET salarioneto='$totalliquidacion', totalaportes='$totalaportes', totalretenciones='$totalretenciones' WHERE idliquidacion='$ultima_liq'");


	} // while empleados
	$cantempleadosliquidados= mysql_num_rows($q_empleados);
}
?>

<?php //si el concepto se carga ?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Liquidaciones correctas!</h2></div>
	<br>
	</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="liquidaciones.php">Volver</a>

<?php
}
else { ?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div><h2>Liquidaciones Incorrecta!</h2></div>
    <br>
    La liquidaci&oacute;n ya fue realizada o pertecece a un año anterior
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="liquidar.php">Volver</a>
   <?php }
?>
