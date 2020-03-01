<?php require_once('../Connections/conexion_compucentro.php'); ?>
<?php include('../sis_acceso_ok.php'); ?>
<?php include_once('../lib/pdf/fpdf.php');
$idempleado=$_POST['idempleado'];
$mesliquidacion=$_POST['desde'];
$idliquidacion=$_POST['idliquidacion'];

mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
class PDF extends FPDF
{
// Page header
function Header()
{
$idempleado=$_POST['idempleado'];
$mesliquidacion=$_POST['desde'];
$idliquidacion=$_POST['idliquidacion'];
//$db = new dbObj();
//$connString =  $db->getConnstring();
$nombreempleado =  mysql_query("SELECT nombreempleado, apellidoempleado
FROM empleado
WHERE idempleado = '$idempleado'");

//$nombreempleado1 = NULL;
while($row=mysql_fetch_assoc($nombreempleado))
  {
    $nombreempleado1 = ("Apellido y Nombres: ").($row['apellidoempleado']).(" ").($row['nombreempleado']);
  }

$fechadeposito =  mysql_query("SELECT fechadeposito
FROM detalleliquidacion
INNER JOIN empleado ON empleado_idempleado= idempleado
INNER JOIN liquidacion ON liquidacion_idliquidacion=idliquidacion
where idempleado = '$idempleado' AND idliquidacion=$idliquidacion");

while($row=mysql_fetch_assoc($fechadeposito))
  {
    $fechadeposito1 = ("Fecha Deposito: ").($row['fechadeposito']);
  }


//---------SACAR FECHA "DESDE" DEL PERIODO LIQUIDADO-------------------------
$desde =  mysql_query("SELECT desde
FROM liquidacion
where idliquidacion='$idliquidacion'");


while($row=mysql_fetch_assoc($desde))
  {
    $desde1 = ("Periodo: ").($row['desde']);
  }
//----------SACAR FECHA INGRESO EMPLEADO --------------------------
$fechaingreso =  mysql_query("SELECT fechaingresoempleado
                              FROM empleado
                              WHERE idempleado = '$idempleado'");
   
while($row=mysql_fetch_assoc($fechaingreso))
    {
        $fechaingreso1 = ("Fecha de ingreso: ").($row['fechaingresoempleado']);
    }

$nombrecategoria= mysql_query("SELECT nombrecategoria
                              FROM empleado
                              INNER JOIN categoriaempleado ON categoriaempleado_idcategoriaempleado=idcategoriaempleado
                              where idempleado='$idempleado'");

    while($row=mysql_fetch_assoc($nombrecategoria)){
        $nombrecategoria1= ("Categoria: "). ($row['nombrecategoria']);
    }


  $cuilempleado= mysql_query("SELECT cuilempleado
                              FROM empleado
                              where idempleado='$idempleado'");
      while($row=mysql_fetch_assoc($cuilempleado)){
          $cuilempleado1=("CUIL: ").($row['cuilempleado']);
      }

      $iddetalleliquidacion =  mysql_query("SELECT iddetalleliquidacion
      FROM detalleliquidacion
      INNER JOIN empleado ON empleado_idempleado=idempleado
     INNER JOIN liquidacion ON liquidacion_idliquidacion=idliquidacion
     where idempleado='$idempleado' AND idliquidacion='$idliquidacion'");
      
     
  

      $rs = mysql_query("SELECT MAX(iddetalleliquidacion) AS id FROM detalleliquidacion
      INNER JOIN empleado ON empleado_idempleado=idempleado
      INNER JOIN liquidacion ON liquidacion_idliquidacion=idliquidacion
      WHERE idempleado=$idempleado AND idliquidacion=$idliquidacion");

        if ($row = mysql_fetch_row($rs)) {
          $id = trim($row[0]);
        }

    // Logo
    $this->SetTitle('BOLETA DE SUELDO');
    $this->Image('../images/logo1.jpg',150,10,25);
    $this->SetFont('Times','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->SetTextColor(0, 0, 0);
    //$this->Write(5,'Boleta de Sueldo');
    $this->Ln(10);
    $this->Cell(80,5,'FERRETERIA EL PASAJE MATERIALES',0,0,'L');
    //$this->Ln(5);
    //$this->Cell(80,5,'Cordoba 828',0,0,'L');
    $this->Ln(5);
    $this->Cell(80,5,'C.U.I.T: 30-70881234-9',0,0,'L');
    $this->Ln(20);
    $this->Cell(80,5,$desde1,20,0,'L');
    $this->Ln(10);
    $this->Cell(80,5,$fechadeposito1,20,0,'L');
    $this->Ln(10);
    $this->Cell(80,5,$nombreempleado1,20,0,'L');
    $this->Ln(10);
    $this->Cell(80,5,$cuilempleado1,20,0,'L');
    $this->Ln(10);
    $this->Cell(80,5,$nombrecategoria1,20,0,'L');
    $this->Ln(10);
    $this->Cell(80,5,$fechaingreso1,20,0,'L');
    $this->Ln(10);
   
   // $this->Cell(80,5,$id,0,2,'L');
    //$this->Ln(10);
   // $this->Cell(80,5,$idliquidacion,0,2,'L');
    // Line break
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Times italic 8
    $this->SetTextColor(0, 0, 0);
    $this->SetFont('Times','B',8);
    $this->Cell(80,5,"Firma del Empleado: ",0,2,'L');
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//$db = new dbObj();
//$connString =  $db->getConnstring();


 //mysql_select_db($database_conexion_compucentro,$conexion_compucentro);
 $result = mysql_query("SELECT descripcionconcepto,subtotal,tipoconcepto,idconcepto
 FROM detalleconcepto
 INNER JOIN concepto ON concepto_idconcepto=idconcepto
 INNER JOIN detalleliquidacion ON detalleliquidacion_iddetalleliquidacion=iddetalleliquidacion
 WHERE (empleado_idempleado='$idempleado' AND liquidacion_idliquidacion='$idliquidacion')ORDER BY idconcepto");


$pagototal =  mysql_query("SELECT pagototal
FROM detalleliquidacion
INNER JOIN empleado ON empleado_idempleado=idempleado
INNER JOIN liquidacion ON liquidacion_idliquidacion=idliquidacion
WHERE ((idempleado = '$idempleado' AND idliquidacion='$idliquidacion')
AND (SELECT MAX(iddetalleliquidacion) as id from detalleliquidacion))");

while($row=mysql_fetch_assoc($pagototal)){
  $pagototal1=($row['pagototal']);
}

$totaldebe =  mysql_query("SELECT totaldebe
FROM detalleliquidacion
INNER JOIN empleado ON empleado_idempleado=idempleado
INNER JOIN liquidacion ON liquidacion_idliquidacion=idliquidacion
WHERE ((idempleado = '$idempleado' AND idliquidacion='$idliquidacion')
AND (SELECT MAX(iddetalleliquidacion) as id from detalleliquidacion))");
while($row=mysql_fetch_assoc($totaldebe)){
  $totaldebe1=($row['totaldebe']);
}


$totalhaber =  mysql_query("SELECT totalhaber
FROM detalleliquidacion
INNER JOIN empleado ON empleado_idempleado=idempleado
INNER JOIN liquidacion ON liquidacion_idliquidacion=idliquidacion
WHERE ((idempleado = '$idempleado' AND idliquidacion='$idliquidacion')
AND (SELECT MAX(iddetalleliquidacion) as id from detalleliquidacion))");
while($row=mysql_fetch_assoc($totalhaber)){
  $totalhaber1=($row['totalhaber']);
}

/**$total = 0;
while($row=mysql_fetch_assoc($pagototal))
  {
    $total = $total + ($row['pagototal']);
  }
$total1 = 0;
while($row=mysql_fetch_assoc($totaldebe))
  {
    $total1 = $total1 + ($row['totaldebe']);
  }
$total2 = 0;
while($row=mysql_fetch_assoc($totalhaber))
  {
    $total2 = $total2 + ($row['totalhaber']);
  }**/
$pdf = new PDF();
//header
$pdf->AddPage('P','A4',0);
//foter page
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','B',9);
$pdf->Cell(40,8,"CODIGO",1,0,'C');
$pdf->Cell(60,8,"CONCEPTO",1,0,'C');
$pdf->Cell(31,8,"HABERES",1,0,'C');
$pdf->Cell(31,8,"DESCUENTOS",1,0,'C');

//while ($row = mysql_fetch_row($result)) {
 // $result1 = trim($row[0]);
//}

while ($row=mysql_fetch_assoc($result)){
  //foreach($result as $row) 
 $pdf->SetTextColor(100);
 $pdf->SetFont('Times','',9);
  $pdf->Ln();
  //foreach($row as $column)
  //$pdf->Cell(31,8,$column,1,0,'L');
  
  $pdf->Cell(40,8,$row['idconcepto'],1,0,'C');
  $pdf->Cell(60,8,$row['descripcionconcepto'],1,0,'C');
            if(($row['tipoconcepto']==0) || ($row['tipoconcepto']==1)){
              $pdf->Cell(31,8,$row['subtotal'],1,0,'C');
              $pdf->Cell(31,8,NULL,1,0,'C');
            }
            else if ($row['tipoconcepto']==2){

              $pdf->Cell(31,8,NULL,1,0,'C');
              $pdf->Cell(31,8,$row['subtotal'],1,0,'C');
            }

}

$pdf->Ln();

//$pdf->SetX(72);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','B',9);
//$pdf->Cell(60,8,NULL,0,0,'C');
$pdf->Cell(100,8,'ACUMULADOS:',1,0,'L');
$pdf->Cell(31,8,$totalhaber1,1,0,'C');
$pdf->Cell(31,8,$totaldebe1,1,0,'C');
$pdf->Ln();
//$pdf->SetX(72);
//$pdf->Cell(60,8,NULL,0,0,'C');
//$pdf->Cell(50,8,NULL,0,0,'C');
$pdf->Cell(100,8,'SON PESOS:',1,0,'L');
$pdf->Cell(62,8,$pagototal1,1,0,'C');

$pdf->SetTextColor(100);
$pdf->Output('','Boleta.pdf');
?>
