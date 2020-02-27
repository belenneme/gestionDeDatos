<?php require_once('../Connections/conexion_compucentro.php'); ?>
<?php include('../sis_acceso_ok.php'); ?>
<?php
include_once('../lib/pdf/fpdf.php');
$fecha_desde = $_POST['fechadesde'];
$fecha_hasta = $_POST['fechahasta'];


mysql_select_db($database_conexion_compucentro,$conexion_compucentro);

class PDF extends FPDF
{
// Page header
function Header()
{ 
  $fecha_desde = $_POST['fechadesde'];
  $fecha_hasta = $_POST['fechahasta'];
    // Logo
    $this->SetTitle('IVA_VENTA');
    $this->Image('../images/logo1.jpg',10,5,25);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->SetTextColor(0, 0, 0);

    $this->Cell(80,10,'LIBRO IVA VENTA',1,0,'C');
    $this->Ln(20);
    $this->Setfont('Arial','B',10);
    $this->Cell(32,8,'Periodo Desde:',0,0,'L');
    $this->Cell(32,8,$fecha_desde,0,0,'I');
    $this->Cell(16,8,'Hasta:',0,0,'L');
    $this->Cell(32,8,$fecha_hasta,0,0,'I');
    // Line break
    $this->Ln(30);
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

//$db = new dbObj();
//$connString =  $db->getConnstring();


if (isset($_POST['fechadesde']) && $_POST['fechadesde']!=''&& isset($_POST['fechahasta']) && $_POST['fechahasta']!='') {
  	$fecha_desde = $_POST['fechadesde'];
    $fecha_hasta = $_POST['fechahasta'];

$result = mysql_query("SELECT fechaventa,nombreorsocial,cuilcliente,tiponombre, numerofactura,totalventa,
    subtotal, ivaventa FROM venta
    INNER JOIN cliente on cliente_idcliente=idcliente
    INNER JOIN tipo on tipo_idtipo = idtipo
      where fechaventa >= '$fecha_desde' && fechaventa <= '$fecha_hasta'");
}
/* *}else {
  if (isset($_POST['fechadesde']) && $_POST['fechadesde']!='') {
    $fecha_desde = $_POST['fechadesde'];
    $result = mysql_query("SELECT fechaventa,nombreorsocial,cuilcliente,tiponombre, numerofactura,totalventa,
      subtotal, ivaventa FROM venta
      INNER JOIN cliente on cliente_idcliente=idcliente
      INNER JOIN tipo on tipo_idtipo = idtipo
        where fechaventa >= '$fecha_desde'");
  } else {
      if (isset($_POST['fechahasta']) && $_POST['fechahasta']!='') {
        $fecha_hasta = $_POST['fechahasta'];
        $result = mysql_query("SELECT fechaventa,nombreorsocial,cuilcliente,tiponombre, numerofactura,totalventa,
          subtotal, ivaventa FROM venta
          INNER JOIN cliente on cliente_idcliente=idcliente
          INNER JOIN tipo on tipo_idtipo = idtipo
            where fechaventa <= '$fecha_hasta'");
      } else{
        $result = mysql_query("SELECT fechaventa,nombreorsocial,cuilcliente,tiponombre, numerofactura,totalventa,
          subtotal, ivaventa FROM venta
          INNER JOIN cliente on cliente_idcliente=idcliente
          INNER JOIN tipo on tipo_idtipo = idtipo

        ");

      }
  }
}**/



$pdf = new PDF();
//header
$pdf->AddPage('L','A4',-90);
//foter page
//$pdf->AliasNbPages();
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','B',9);
$pdf->Cell(32,8,"Fecha de Venta",1,0,'C');
$pdf->Cell(32,8,"Cliente",1,0,'C');
$pdf->Cell(32,8,"Cuil Cliente",1,0,'C');
$pdf->Cell(32,8,"Cond. IVA",1,0,'C');
$pdf->Cell(32,8,"Nro Factura",1,0,'C');
$pdf->Cell(32,8,"Importes.\t Sin Iva",1,0,'C');
$pdf->Cell(32,8,"Total Impor.\t Fact.",1,0,'C');
$pdf->Cell(32,8,"IVA Credito\t Fiscal",1,0,'C');
/**foreach($result as $row) {
  $pdf->SetTextColor(100);
  $pdf->SetFont('Arial','',9);
  $pdf->Ln();
  $pdf->Cell(32,8,$row['fechaventa'],1,0,'C');
  $pdf->Cell(32,8,$row['nombreorsocial'],1,0,'C');
foreach($row as $column)
//$pdf->Cell(32,8,$column,1,0,'C');
$pdf->Cell(32,8,$column['fechaventa'],1,0,'C');
}**/
$totaliva1=0;
$totalventas=0;
while($row=mysql_fetch_assoc($result))

  { $pdf->SetTextColor(100);
    $pdf->SetFont('Times','',9);
    $pdf->Ln();
    $ivaventa1=0;
    $importeSinIva=0;
    //$total = $total + $row['ivaventa'];
    //echo $row['ivaventa'];
    $importeSinIva= $row['totalventa']/1.21;
    $ivaventa1=$row['totalventa']-$importeSinIva;
    $totaliva1= $totaliva1+$ivaventa1;
    $totalventas=$totalventas+$row['totalventa'];
   $pdf->Cell(32,8,$row['fechaventa'],1,0,'C');
   $pdf->Cell(32,8,$row['nombreorsocial'],1,0,'C');
   $pdf->Cell(32,8,$row['cuilcliente'],1,0,'C');
   $pdf->Cell(32,8,$row['tiponombre'],1,0,'C');
   $pdf->Cell(32,8,$row['numerofactura'],1,0,'C');
   $pdf->Cell(32,8,round($importeSinIva,2),1,0,'C');
   $pdf->Cell(32,8,$row['totalventa'],1,0,'C');
   $pdf->Cell(32,8,round($ivaventa1,2),1,0,'C');
  }
$pdf->Ln();

//$pdf->SetX(120);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(32,8,NULL,0,0,'C');
$pdf->Cell(32,8,NULL,0,0,'C');
$pdf->Cell(32,8,NULL,0,0,'C');
$pdf->Cell(32,8,NULL,0,0,'C');
$pdf->Cell(32,8,NULL,0,0,'C');
$pdf->Cell(32,8,'ACUMULADOS',1,0,'C');
$pdf->Cell(32,8,round($totalventas,2),1,0,'C');
$pdf->Cell(32,8,round($totaliva1, 2),1,0,'C');
$pdf->SetTextColor(100);

$pdf->Output('','IVA_VENTA.pdf');
?>
