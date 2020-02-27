<?php require_once('../Connections/conexion_compucentro.php'); ?>
<?php include('../sis_acceso_ok.php'); ?>
<?php
include_once('../lib/pdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{ $fecha_desde = $_POST['fechadesde'];
  $fecha_hasta = $_POST['fechahasta'];
    // Logo
    $this->SetTitle('LIBRO IVA_COMPRA');
    $this->Image('../images/logo1.jpg',10,5,25);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->SetTextColor(0, 0, 0);

    $this->Cell(80,10,'LIBRO IVA COMPRA',1,0,'C');
    $this->Ln(20);
    $this->Setfont('Arial','B',10);
    $this->Cell(32,8,'Periodo Desde:',0,0,'L');
    $this->Cell(32,8,$fecha_desde,0,0,'I');
    $this->Cell(16,8,'Hasta:',0,0,'L');
    $this->Cell(32,8,$fecha_hasta,0,0,'I');
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

//$db = new dbObj();
//$connString =  $db->getConnstring();

// $q_compra=mysql_query("SELECT * FROM compra");
mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
if (isset($_POST['fechadesde']) && $_POST['fechadesde']!=''&& isset($_POST['fechahasta']) && $_POST['fechahasta']!='') {
  	$fecha_desde = $_POST['fechadesde'];
    $fecha_hasta = $_POST['fechahasta'];

  $result = mysql_query("SELECT fechacompra,razonsocialproveedor,cuilproveedor,numerofactura,
     totalcompra, ivacompra FROM compra
    INNER JOIN proveedor on proveedor_idproveedor=idproveedor
    
      where fechacompra >= '$fecha_desde' && fechacompra <= '$fecha_hasta'");
}
/**}else {
  if (isset($_POST['fechadesde']) && $_POST['fechadesde']!='') {
    $fecha_desde = $_POST['fechadesde'];
    $result = mysql_query("SELECT fechacompra,razonsocialproveedor,cuilproveedor,tiponombre, numerofactura,
       totalcompra, ivacompra FROM compra
      INNER JOIN proveedor on proveedor_idproveedor=idproveedor
      INNER JOIN tipo on tipo_idtipo = idtipo
        where fechacompra >= '$fecha_desde'");
  } else {
      if (isset($_POST['fechahasta']) && $_POST['fechahasta']!='') {
        $fecha_hasta = $_POST['fechahasta'];
        $result = mysql_query("SELECT fechacompra,razonsocialproveedor,cuilproveedor,tiponombre, numerofactura,
           totalcompra, ivacompra FROM compra
          INNER JOIN proveedor on proveedor_idproveedor=idproveedor
          INNER JOIN tipo on tipo_idtipo = idtipo
            where fechacompra <= '$fecha_hasta'");
      } else{
        $result = mysql_query("SELECT fechacompra,razonsocialproveedor,cuilproveedor,tiponombre, numerofactura,
           totalcompra, ivacompra FROM compra
          INNER JOIN proveedor on proveedor_idproveedor=idproveedor
          INNER JOIN tipo on tipo_idtipo = idtipo");

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
$pdf->Cell(37,8,"Fecha de compra",1,0,'C');
$pdf->Cell(37,8,"Proveedor",1,0,'C');
$pdf->Cell(37,8,"Cuil Proveedor",1,0,'C');
//$pdf->Cell(37,8,"Cond. IVA",1,0,'C');
$pdf->Cell(37,8,"Nro Factura",1,0,'C');
$pdf->Cell(37,8,"Total($)",1,0,'C');
$pdf->Cell(37,8,"IVA",1,0,'C');

/**foreach($result as $row) {
  $pdf->SetTextColor(100);
  $pdf->SetFont('Arial','',9);
  $pdf->Ln();
  foreach($row as $column)
  $pdf->Cell(37,8,$column,1,0,'C');
}**/

$totaliva1 = 0;
$totalcompras=0;
while($row=mysql_fetch_assoc($result))
  {
    
    $pdf->SetTextColor(100);
    $pdf->SetFont('Times','',9);
    $pdf->Ln();
    $ivacompra1=0;
    $compraSinIva=0;
    $compraSinIva= $row['totalcompra']/1.21;
    $ivacompra1=$row['totalcompra']-$compraSinIva;
    $totaliva1= $totaliva1+$ivacompra1;
    $totalcompras=$totalcompras+$row['totalcompra'];
   $pdf->Cell(37,8,$row['fechacompra'],1,0,'C');
   $pdf->Cell(37,8,$row['razonsocialproveedor'],1,0,'C');
   $pdf->Cell(37,8,$row['cuilproveedor'],1,0,'C');
   //$pdf->Cell(32,8,$row['tiponombre'],1,0,'C');
   $pdf->Cell(37,8,$row['numerofactura'],1,0,'C');
   $pdf->Cell(37,8,$row['totalcompra'],1,0,'C');
   $pdf->Cell(37,8,round($ivacompra1,2),1,0,'C');
  }
$pdf->Ln();

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(37,8,NULL,0,0,'C');
$pdf->Cell(37,8,NULL,0,0,'C');
$pdf->Cell(37,8,NULL,0,0,'C');
$pdf->Cell(37,8,"ACUMULADOS: ",1,0,'C');
$pdf->Cell(37,8,round($totalcompras,2),1,0,'C');
$pdf->Cell(37,8,round($totaliva1,2),1,0,'C');

$pdf->SetTextColor(100);
$pdf->Output('','IVA_COMPRA.pdf');
?>
