<?php require_once('../Connections/conexion_compucentro.php'); ?>
<?php include('../sis_acceso_ok.php'); ?>
<?php
include_once('../lib/pdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->SetTitle('LIBRO SUELDO');
    $this->Image('../images/logo.png',10,5,25);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->SetTextColor(39, 138, 226);

    $this->Cell(80,10,'LIBRO UNICO DE SUELDOS',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8

    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbObj();
$connString =  $db->getConnstring();

// $q_compra=mysql_query("SELECT * FROM compra");
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
if (isset($_POST['fechadesde']) && $_POST['fechadesde']!=''&& isset($_POST['fechahasta']) && $_POST['fechahasta']!='') {
  	$fecha_desde = $_POST['fechadesde'];
    $fecha_hasta = $_POST['fechahasta'];

  $result = mysqli_query($connString, "SELECT t2.apellidoempleado,t2.nombreempleado,t2.categoriaempleado_idcategoriaempleado,t3.fechaliquidacion,t1.totalhaber,t1.totaldebe,pagototal, t1.iddetalleliquidacion, t3.descripcionliq
  FROM detalleliquidacion t1
 INNER JOIN empleado t2 on empleado_idempleado=idempleado
 INNER JOIN liquidacion t3 on liquidacion_idliquidacion=idliquidacion
      where t3.fechaliquidacion >= '$fecha_desde' && t3.fechaliquidacion <= '$fecha_hasta'") or die("database error:". mysqli_error($connString));

}else {
  if (isset($_POST['fechadesde']) && $_POST['fechadesde']!='') {
    $fecha_desde = $_POST['fechadesde'];
    $result = mysqli_query($connString, "SELECT t2.apellidoempleado,t2.nombreempleado,t2.categoriaempleado_idcategoriaempleado,t3.fechaliquidacion,t1.totalhaber,t1.totaldebe,pagototal, t1.iddetalleliquidacion, t3.descripcionliq
    FROM detalleliquidacion t1
   INNER JOIN empleado t2 on empleado_idempleado=idempleado
   INNER JOIN liquidacion t3 on liquidacion_idliquidacion=idliquidacion
        where t3.fechaliquidacion >= '$fecha_desde'") or die("database error:". mysqli_error($connString));
  } else {
      if (isset($_POST['fechahasta']) && $_POST['fechahasta']!='') {
        $fecha_hasta = $_POST['fechahasta'];
        $result = mysqli_query($connString, "SELECT t2.apellidoempleado,t2.nombreempleado,t2.categoriaempleado_idcategoriaempleado,t3.fechaliquidacion,t1.totalhaber,t1.totaldebe,pagototal, t1.iddetalleliquidacion, t3.descripcionliq
        FROM detalleliquidacion t1
       INNER JOIN empleado t2 on empleado_idempleado=idempleado
       INNER JOIN liquidacion t3 on liquidacion_idliquidacion=idliquidacion
            where t3.fechaliquidacion <= '$fecha_hasta'") or die("database error:". mysqli_error($connString));
      } else{
        $result = mysqli_query($connString, "SELECT t2.apellidoempleado,t2.nombreempleado,t2.categoriaempleado_idcategoriaempleado,t3.fechaliquidacion,t1.totalhaber,t1.totaldebe,pagototal, t1.iddetalleliquidacion, t3.descripcionliq
            FROM detalleliquidacion t1
           INNER JOIN empleado t2 on empleado_idempleado=idempleado
           INNER JOIN liquidacion t3 on liquidacion_idliquidacion=idliquidacion
           order by t1.iddetalleliquidacion Desc
           ") or die("database error:". mysqli_error($connString));

      }
  }
}

$pdf = new PDF();
//header
$pdf->AddPage('L','A4',-90);
//foter page
$pdf->AliasNbPages();
$pdf->SetTextColor(39, 138, 226);
$pdf->SetFont('Arial','B',6);

$pdf->SetX(93);
$pdf->Cell(135,6,"Haberes",1,0,'C');
$pdf->Cell(50,6,"Debes",1,0,'C');
$pdf->Ln();

$pdf->Cell(20,6,"Apellido",1,0,'C');
$pdf->Cell(21,6,"Nombre",1,0,'C');
$pdf->Cell(21,6,"Fecha",1,0,'C');
$pdf->Cell(21,6,"Descrip. Liq.",1,0,'C');
$pdf->Cell(18,6,"Suel.basic.",1,0,'C');
$pdf->Cell(18,6,"Antiguedad",1,0,'C');
$pdf->Cell(22,6,"Asignacion por Hijo",1,0,'C');
$pdf->Cell(26,6,"Asignacion por Hijo disc.",1,0,'C');
$pdf->Cell(18,6,"Presentismo",1,0,'C');
$pdf->Cell(18,6,"Aguinaldo",1,0,'C');
$pdf->Cell(15,6,"Total Haber",1,0,'C');
$pdf->Cell(20,6,"Aporte Jubilatorio",1,0,'C');
$pdf->Cell(15,6,"Obra Social",1,0,'C');
$pdf->Cell(15,6,"Total Debe",1,0,'C');
$pdf->Cell(16,6,"Total",1,0,'C');


$total = 0;

while($row=mysqli_fetch_assoc($result))
  {
    $apellido= $row['apellidoempleado'];
    $nombre= $row['nombreempleado'];
    $fecha= $row['fechaliquidacion'];
    $totaldebe= $row['totaldebe'];
    $totalhaber= $row['totalhaber'];
    $descipcionliquidacion=$row['descripcionliq'];
    $categoriaempleado_idcategoriaempleado = $row['categoriaempleado_idcategoriaempleado'];
    $descipcionliquidacionSubstring =substr ( $descipcionliquidacion , 0,14  ).".";

    $q_salariobasico = mysqli_query($connString, "SELECT salariobasicocategoria from categoriaempleado WHERE idcategoriaempleado=$categoriaempleado_idcategoriaempleado") or die("database error:". mysqli_error($connString));
  	$salario=mysqli_fetch_array($q_salariobasico)['salariobasicocategoria'];
    $pagototal= 0;
    if ($row['pagototal']!=''|| $row['pagototal']!=null) {
      $pagototal= $row['pagototal'];
    }

    $iddetalleliquidacion= $row['iddetalleliquidacion'];

    $total = $total + $row['pagototal'];

    $antiguedad= 0;
    $aguinaldo = 0;
    $aporte_jubilatorio = 0;
    $obra_social = 0;
    $presentismo = 0;
    $asignacion_por_hijo_discapacitado=0;
    $asignacion_por_hijo= 0;
    $basico=0;

    $concepto_result = mysqli_query($connString, "SELECT concepto_idconcepto, subtotal, descripcionconcepto from detalleconcepto
      INNER JOIN concepto on concepto_idconcepto=idconcepto WHERE
      detalleliquidacion_iddetalleliquidacion = $iddetalleliquidacion ") or die("database error:". mysqli_error($connString));
      while($row_concepto=mysqli_fetch_assoc($concepto_result)){
          switch ($row_concepto['concepto_idconcepto']) {

            case 2:
                $antiguedad = $row_concepto['subtotal'];
                break;

            case 9:
                $obra_social= $row_concepto['subtotal'];
                break;
            case 11:
                $asignacion_por_hijo= $row_concepto['subtotal'];
                break;
            case 12:
                $presentismo= $row_concepto['subtotal'];
                break;
            case 13:
                $aporte_jubilatorio= $row_concepto['subtotal'];
                break;
            case 14:
                  $aguinaldo= $row_concepto['subtotal'];
                break;
            case 15:
             $asignacion_por_hijo_discapacitado= $row_concepto['subtotal'];
                 break;
            case 16:
             $basico= $row_concepto['subtotal'];
                break;
          }
      }

        $pdf->Ln();
        $pdf->SetTextColor(100);
        $pdf->SetFont('Arial','',6);
        $pdf->Cell(20,6,$apellido,1,0,'C');
        $pdf->Cell(21,6,$nombre,1,0,'C');
        $pdf->Cell(21,6,$fecha,1,0,'C');
        $pdf->Cell(21,6,$descipcionliquidacionSubstring,1,0,'C');
        $pdf->Cell(18,6,$basico,1,0,'C');
        $pdf->Cell(18,6,$antiguedad,1,0,'C');
        $pdf->Cell(22,6,$asignacion_por_hijo,1,0,'C');
        $pdf->Cell(26,6,$asignacion_por_hijo_discapacitado,1,0,'C');
        $pdf->Cell(18,6,$presentismo,1,0,'C');
        $pdf->Cell(18,6,$aguinaldo,1,0,'C');
        $pdf->SetTextColor(242, 19, 19);
        $pdf->Cell(15,6,$totalhaber,1,0,'C');
        $pdf->SetTextColor(100);
        $pdf->Cell(20,6,$aporte_jubilatorio,1,0,'C');
        $pdf->Cell(15,6,$obra_social,1,0,'C');
        $pdf->SetTextColor(242, 19, 19);
        $pdf->Cell(15,6,$totaldebe,1,0,'C');
        $pdf->SetTextColor(100);
        $pdf->Cell(16,6,$salario+$pagototal,1,0,'C');
  }

$pdf->Ln();

$pdf->SetX(228);
$pdf->SetTextColor(208, 49, 53);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(24,8,'Total',1,0,'C');
$pdf->Cell(24,8,round($total, 2),1,0,'C');
$pdf->SetTextColor(100);

$pdf->Output('','LIBRO_SUELDO.pdf');
?>
