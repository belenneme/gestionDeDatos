<?php
	mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

    $idliquidacion=$_POST['idliquidacion'];
	$idempleado=$_POST['idempleado'];
	$fechadeposito=$_POST['fechadeposito'];
	$idtipoliquidacion=$_POST['idtipoliquidacion'];

	$getfecha=mysql_query("SELECT * from liquidacion where idliquidacion=$idliquidacion")
						or die(mysql_error());

	$fechaDesde=mysql_query("SELECT desde from liquidacion where idliquidacion=$idliquidacion")
	or die(mysql_error());
	$fechaHasta=mysql_query("SELECT hasta from liquidacion where idliquidacion=$idliquidacion")
	or die(mysql_error());

	$fecha=mysql_fetch_array($getfecha)['desde'];
	$fechaFin=mysql_fetch_array($getfecha)['hasta'];
	$separafecha= explode('-', $fecha);
	$dia = $separafecha[2];
	$mess = $separafecha[1];
	$anio = $separafecha[0];
	$mesc =date("m");
	$anioc =date("Y");

	$fechaliquidacion=$anioc."-".$mess;

	



  for ($i=0 ; $i<count($idempleado) ; $i++)
    	{
      		$insert_detalleliquidacion="INSERT INTO detalleliquidacion (fechadeposito, liquidacion_idliquidacion, empleado_idempleado)
																	VALUES ('$fechadeposito','$idliquidacion','$idempleado[$i]')";
					mysql_query($insert_detalleliquidacion) or die(mysql_error());

			//CONSULTA DE LA ULTIMA FILA DE DETALLE LIQUIDACION PARA LUEGO PONER EL IDDETALLELIQUIDACION EN DETALLE CONCEPTO

					$q_ult_detalleliquidacion = mysql_query("SELECT MAX(iddetalleliquidacion) AS iddetalleliquidacion FROM detalleliquidacion")
																			or die(mysql_error());
					$row_ult_detalleliquidacion=mysql_fetch_array($q_ult_detalleliquidacion);
		 			$ult_detalleliq=$row_ult_detalleliquidacion['iddetalleliquidacion'];


   //saco los datos del empleado para calcular el basico
	  			$q_empleado=mysql_query("SELECT * FROM empleado
	                 					INNER JOIN categoriaempleado ON categoriaempleado_idcategoriaempleado=idcategoriaempleado

	                 					WHERE idempleado=$idempleado[$i]")
		 								or die(mysql_error());
      	  $row_empleados=mysql_fetch_array($q_empleado);
  //CALCULO EL SUELDO sacando el atributo salario basico de la consulta realizada previamente
      	
			$basicoempleado=$row_empleados['salariobasicocategoria'];
		          	
    //PARA CALCULAR ANTIGUEDAD
    			$fechaingreso=$row_empleados['fechaingresoempleado'];
    			$separafecha= explode('-', $fechaingreso);
   					$dia = $separafecha[2];
   					$mes = $separafecha[1];
     				$anio = $separafecha[0];

      			$diac =date("d");
       			$mesc =date("m");
       			$anioc =date("Y");

        //saco la cantidad de años de antiguedad del empleado

      		$antiguedad =  $anioc-$anio;
			//AQUI ABAJO NO ENTIENDO QUE ES LO QUE HACE!!!!!!!!  
			  /**if($mesc < $mes && $diac < $dia || $mesc < $mes || $diac < $dia)
							{
							$antiguedad_aux = $antiguedad - 1;
     					$antiguedad = $antiguedad_aux;
     					}
     			$antiguedad;**/


				//$q_presentismo=0;
				//$presentismo=1;
//Hago una consulta para saber el grupo familiar del empleado
$grupo_fam=mysql_query("SELECT parentesco_idparentesco FROM grupofamiliar
						WHERE empleado_idempleado=$row_empleados[idempleado]")
						or die(mysql_error());
$cant_grupo_fam= mysql_num_rows($grupo_fam);
// recorro para saber del grupo familiar la cantidad de hijos o hijos discapacitados
$hijos=0;
$hijosdis=0;
				while($row=mysql_fetch_assoc($grupo_fam)){
					if ($row['parentesco_idparentesco']==4){
						$hijos=$hijos+1;
					}
					if($row['parentesco_idparentesco']==5) {
						$hijosdis=$hijosdis+1;
					}
				}
//CONSULTO PARA SACAR EL PRESENTISMO DEL EMPLEADO


/**$q_presentismo= mysql_query("SELECT * FROM asistencia 
					
					WHERE empleado_idempleado=$idempleado[$i]
					AND fechalogin like '%$fechaliquidacion%'");


$cant_q_presentismo=mysql_num_rows($q_presentismo);**/

//------------------------NUEVO PRESENTISMO opcion 2----------------------
$cantFaltas=0;
$cantLlegadasTarde=0;			
$q_noved=mysql_query("SELECT fechaNovedad,falta,llegadaTarde FROM novedad
WHERE empleado_idempleado=$row_empleados[idempleado]");
//AND fechaNovedad BETWEEN ($fechaDesde AND $fechaHasta)");

$b=0;
$cant_novedades= mysql_num_rows($q_noved);
while($row=mysql_fetch_assoc($q_noved)){
	$cantFaltas= $cantFaltas+$row['falta'];
	$cantLlegadasTarde= $cantLlegadasTarde+$row['llegadaTarde'];
}


/**$b=0;
while($row=mysql_fetch_assoc($q_noved)){
	//$cantFaltas= $cantFaltas+$row['falta'];
	//$cantLlegadasTarde= $cantLlegadasTarde+$row['llegadaTarde'];
	//if ($row['fechaNovedad'] >= $fecha && ($row['fechaNovedad']<= $fechaFin)){
		
	$fechaNovedad=mysql_fetch_array($getfecha)['fechaNovedad'];

	$separafechaNovedad= explode('-', $fechaNovedad);
	$diaN = $separafecha[2];
	$messN = $separafecha[1];
	$anioN = $separafecha[0];
	$fechaNovedadd=$anioN."-".$messN;

		if($fechaNovedadd==$fechaliquidacion) {
			$cantLlegadasTarde==TRUE;
			$cantFaltas==TRUE;
			$b=1;
		}
	}
}



/**$desde1=mysql_query("SELECT getdate() as fechalogin, cast(getdate() as date) as flogin_sin_tiempo 
			from asistencia 
			WHERE empleado_idempleado=$row_empleados[idempleado]
			AND floguin_sin_tiempo>=$fecha AND flogin_sin_tiempo<$fechaFin");

$cant_desde1=mysql_num_rows($desde1);**/

// CONSULTO LOS CONCEPTOS ASOCIADOS AL TIPO DE LIQUIDACION QUE TRAIGO DE LA VENTANA LIQUIDACION
$q_tipoliquidacion_concepto=mysql_query("SELECT * FROM tipoliquidacion_concepto
										INNER JOIN concepto ON concepto_idconcepto= idconcepto
										WHERE tipoliquidacion_idtipoliquidacion=$idtipoliquidacion
										ORDER BY tipoconcepto ASC")
										or die(mysql_error());

//RECORRO TODOS LOS CONCEPTOS ASOCIADOS AL TIPO DE LIQUIDACION
				$suma=0;
				$debe=0;
				$sumaHaberAporte=0;
				$sumaHaberSinAporte=0;
				while($row_tipoliquidacion_concepto=mysql_fetch_array($q_tipoliquidacion_concepto)){
					$tipoconcepto=$row_tipoliquidacion_concepto['tipoconcepto'];
					$idconcepto=$row_tipoliquidacion_concepto['idconcepto'];
					$nombreconcepto=$row_tipoliquidacion_concepto['descripcionconcepto'];
					//$montofijo=0;
					$montofijo=$row_tipoliquidacion_concepto['montofijo'];
					//$montovariable=0;
					$montovariable= $row_tipoliquidacion_concepto['montovariable'];
					$subtotal=0;
					$subAntiguedad=0;
					$var="Antiguedad";
			
					if($nombreconcepto=="Antiguedad"){

						$suma=$suma+($antiguedad*($basicoempleado));
						$sumaHaberAporte= $sumaHaberAporte+($antiguedad*($basicoempleado));
						$subtotal=$antiguedad*$basicoempleado;
						//$subAntiguedad= $antiguedad*$basicoempleado;
					}

					if($nombreconcepto=="Presentismo"&& $cantLlegadasTarde<2 && $cantFaltas==0)
					{
						$subAntiguedad= $antiguedad*$basicoempleado;
						$suma=$suma+($montovariable/100)*($basicoempleado+$subAntiguedad);
						$sumaHaberAporte=$sumaHaberAporte+($montovariable/100)*($basicoempleado+$subAntiguedad);
						$subtotal= ($montovariable/100)*($basicoempleado+$subAntiguedad);
						
						
					}
					if($nombreconcepto=="Presentismo" && ($cantLlegadasTarde>=2 || $cantFaltas>0))
					{
						
						$subtotal= 0;
						
					}
					
					if($tipoconcepto==0 && (!($nombreconcepto=="Antiguedad")) && (!($nombreconcepto=="Presentismo"))){

						
						if($montofijo!=0){
							$suma=$suma+$montofijo;
							$sumaHaberAporte=$sumaHaberAporte+$montofijo;
							$subtotal=$montofijo;
						}	

						if($montovariable!=0){
							$suma= $suma+(($montovariable/100)*$basicoempleado);
							$sumaHaberAporte= $sumaHaberAporte+(($montovariable/100)*$basicoempleado);
							$subtotal= ($montovariable/100)*$basicoempleado;
						}

					}
					if(($tipoconcepto==1) &&($idconcepto!=4) && ($idconcepto!=5)){
						
						if($montofijo!=0){
							$suma=$suma+$montofijo;
							$sumaHaberSinAporte=$sumaHaberSinAporte+$montofijo;
							$subtotal=$montofijo;
						}	

						if($montovariable!=0){
							$suma= $suma+(($montovariable/100)*$basicoempleado);
							$sumaHaberSinAporte= $sumaHaberSinAporte+(($montovariable/100)*$basicoempleado);
							$subtotal= ($montovariable/100)*$basicoempleado;
						}
					}
					if($idconcepto==4){
						$subtotal= $montofijo*$hijos;
						$suma= $suma+$subtotal;
					}
					if($idconcepto==5){
						$subtotal= $montofijo*$hijosdis;
						$suma=$suma+$subtotal;
					}
					if($tipoconcepto==2){
						if($montofijo!=0){
							$debe=$debe+$montofijo;
							$subtotal=$montofijo;
						}	

						if($montovariable!=0){
							$debe= $debe+(($montovariable/100)*$sumaHaberAporte);
							$subtotal=($montovariable/100)*$sumaHaberAporte;
						}

					}
				
					$insert_detalleconcepto=mysql_query("INSERT INTO detalleconcepto (subtotal, concepto_idconcepto, detalleliquidacion_iddetalleliquidacion, cantidad)
														VALUES ('$subtotal','$idconcepto','$ult_detalleliq', 1)");
				}
					
					
				
				

				



				/**---------- no tocar lo de abajo
					$idconcepto=$row_tipoliquidacion_concepto['concepto_idconcepto'];

					$q_concepto= mysql_query("SELECT * FROM concepto
																			WHERE idconcepto=$idconcepto")
												or die(mysql_error());
					$row_concepto=mysql_fetch_array($q_concepto);

					$cant_concepto=1;

					switch ($row_concepto['idconcepto']) {
					            case 2:
					                 $totalconcepto=$antiguedad*$row_concepto['montofijo'];
					                break;
											case 12:
											$tiempotrabajado = 0;
											$totalconcepto=0;
											$q_presentismo=mysql_query("SELECT * FROM asistencia WHERE empleado_idempleado=$idempleado[$i] and login like '%$fechaliquidacion%'") or die(mysql_error());
											while($row_presentismo=mysql_fetch_array($q_presentismo)){
														$tiempotrabajado= $tiempotrabajado + $row_presentismo['tiempotrabajado'];
													}

													if ($jornadaempleado==4) {
														 if ($tiempotrabajado>4500) {
															 $totalconcepto=($row_concepto['montovariable']/100)*$basicoempleado;
														 }
													}else {
														if($tiempotrabajado>9000){
															$totalconcepto=($row_concepto['montovariable']/100)*$basicoempleado;
														}
													}

														break;
											case 11:
												$totalconcepto=$hijos*$row_concepto['montofijo'];
												$cant_concepto=$hijos;
												break;
											case 15:
													$totalconcepto=$hijosdis*$row_concepto['montofijo'];
													$cant_concepto=$hijosdis;
												break;
												case 16:
														$totalconcepto=$basicoempleado;
													break;
											case 14:
												$totalconcepto=($row_concepto['montovariable']/100)*$basicoempleado;
												 break;
											default:
											if ($row_concepto['montofijo']==0)//entonces es un porcentaje
														{
															$totalconcepto=($row_concepto['montovariable']/100)*$basicoempleado;
														}
											else 	{
															$totalconcepto=$row_concepto['montofijo'];
														}
											}


								$insert_detalleconcepto=mysql_query("INSERT INTO detalleconcepto (subtotal, concepto_idconcepto, detalleliquidacion_iddetalleliquidacion, cantidad)
																											VALUES ('$totalconcepto','$idconcepto','$ult_detalleliq','$cant_concepto')");

						}**/
			/*PARA AGREGAR EN DETALLELIQUIDACION DEBE, HABER Y PAGO TOTAL, DEBO ANALIZAR QUE TIPO DE CONCEPTO ES:
			YA SEA UN APORTE = 1 O RETENCION =0. LUEGO LO INCREMENTO EN LA VARIABLE DEBE O HABER.
			----SUMO BASISCO Y RESTO HABER-DEBE PARA OBTENER EL PAGO TOTAL*/
				/**$q_detalleconcepto=mysql_query("SELECT * FROM detalleconcepto
													INNER JOIN concepto ON concepto_idconcepto=idconcepto
													WHERE detalleliquidacion_iddetalleliquidacion='$ult_detalleliq'")
				or die(mysql_error());

						$haber=0;
						$debe=0;

						while ($row_detalleconcepto=mysql_fetch_array($q_detalleconcepto)) {

							if ($row_detalleconcepto['tipoconcepto']==0){ // fijarse que tipo de concepto
								$haber=$row_detalleconcepto['subtotal']+$haber;

									}//SE AGREGA AL HABER

							if($row_detalleconcepto['tipoconcepto']==1)
							 {
								 $debe=$row_detalleconcepto['subtotal']+$debe;
							 }//se agrega al debe

						 }**/
	$pagototal=0;
	
	$pagototal=$suma-$debe;

	$update_detalleliquidacion=mysql_query("UPDATE detalleliquidacion
							 				SET  totaldebe=$debe, totalhaber=$suma, pagototal=$pagototal
							 				WHERE iddetalleliquidacion=$ult_detalleliq AND empleado_idempleado=$idempleado[$i]")
											or die(mysql_error());
			/*CALCULAR SALARIO POR HIJO*/
			/**$q_grupofamiliar=mysql_query("SELECT parentesco_idparentesco FROM grupofamiliar WHERE empleado_idempleado=$idempleado[$i]")
			or die(mysql_error());
			$subtotal_asignacionporhijo=0;
			while($row=mysql_fetch_assoc($q_grupofamiliar)){
				if($row['parentesco_idparentesco']==5)
				$subtotal_asignacionporhijo=$basicoempleado + 500;
			}**/

		}

		?>


<?php //si el tipo liquidacion se carga ?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div><h2>Alta de Liquidacion exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="liquidar.php">Volver</a>
<?php //Si no se carga mostrtar error?>
