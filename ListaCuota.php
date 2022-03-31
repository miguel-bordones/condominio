<?php
require('Reportes-pdf-php/fpdf/fpdf.php');
//require "funciones/conexion.php";
require "funciones/cn.php";
$mes  = ($_GET['mes']);
$year = ($_GET['year']);
$dept = ($_GET['dept']);

$total_gasto  = 0;
$total_recibo = 0;
$lineas       = 0;

$total_pagar = 0;

if ($mes == 1)  
      {
      $descMes = 'Enero';
      }
      elseif ($mes == 2)  
      {
        $descMes = 'Febrero';
      }
      elseif ($mes == 3)  
      {
        $descMes = 'Marzo';
      }
      elseif ($mes == 4)  
      {
        $descMes = 'Abril';
      }
      elseif ($mes == 5)  
      {
      $descMes = 'Mayo';
      }
      elseif ($mes == 6)  
      {
      $descMes = 'Junio'; 
      }
      elseif ($mes == 7)  
      {
      $descMes = 'Julio';
      }
      elseif ($mes == 8)
      {
      $descMes = 'Agosto';
      }
      elseif ($mes == 9) 
      {
      $descMes = 'Septiembre';
      }
      elseif($mes == 10)  
      {
      $descMes = 'Octubre';
      }
      if ($mes == 11) 
      { 
      $descMes = 'Noviembre';
      }
      elseif ($mes == 12)  
      {
      $descMes = 'Diciembre';
     }
  


$SQL_DEPT = "SELECT CD_DEPARTAMENTO_D,
                    NOMBRE_PROPIETARIO_D,
                    ALICUOTA_D
    FROM departamento
    WHERE CD_DEPARTAMENTO_D = '$dept';";
    $depto  = $mysqli->query($SQL_DEPT);
  
    $row1    = $depto->fetch_assoc();
   

$consulta = "SELECT 
GAES_DESC_GASTO DESC_GASTO,
GAEM_MT_GASTO MT_GASTO,
((GAEM_MT_GASTO * ALICUOTA_D)/100) MT_CUOTA,
GAEM_FE_GASTO FE_GASTO,
 CD_DEPARTAMENTO_D DEPTO
FROM departamento,
    gastos_especiales_mensual,
    gastos_especiales
WHERE GAEM_CD_EDIFICIO = CD_EDIFICIO_D AND
GAEM_CD_EDIFICIO = GAEM_CD_EDIFICIO AND
GAES_CD_GASTO = GAEM_CD_GASTO AND
MONTH(GAEM_FE_GASTO)  = '$mes'   AND YEAR(GAEM_FE_GASTO) = '$year' AND
   CD_DEPARTAMENTO_D  = '$dept';";

$resultado = $mysqli->query($consulta);


$SQL_EDIFICIO = "SELECT CD_ID_RESPONSABLE,RESP_BANCO,CTA_BANCO,NM_BANCO FROM edificio
WHERE CD_EDIFICIO = 1;";
$edificio    = $mysqli->query($SQL_EDIFICIO);
$r_edificio  = $edificio  ->fetch_assoc();


$pdf = new FPDF();
      $pdf -> AliasNbPages();
      $pdf->AddPage();
      $pdf->Image('imagenes/LogoDunaF.png',90,8,33);
      $pdf->Ln(30);
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(60);
      $pdf->Cell(30,10,'Cuota Especial',0,0,'L');
      $pdf->Cell(30,10,$descMes,0,0,'C');
      $pdf->Cell(30,10,$year,0,0,'C');
      $pdf->Ln(10);
      $pdf->Cell(20);
      $pdf->Cell(10, 10, $row1['CD_DEPARTAMENTO_D'], 0, 0,'L', 0);
      $pdf->Cell(30, 10, $row1['NOMBRE_PROPIETARIO_D'], 0, 0,'L', 0);
      $pdf->Cell(82);
      $pdf->Cell(10, 10, $row1['ALICUOTA_D'], 0, 0,'R', 0);
      $pdf->Cell(20, 10, '% Alicuota', 0, 0,'C', 0);
      $pdf->Ln(10);

   
      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(70, 10, 'Descripcion Cuota', 0, 0,'C', 0);
      $pdf->Cell(80, 10, 'Monto Gasto', 0, 0,'C', 0);
      $pdf->Cell(30, 10, 'Monto Cuota', 0, 1,'C', 0);
      $pdf->Ln(5);     



while($row = $resultado->fetch_assoc())
{
    
    $pdf->Cell(70, 10, utf8_decode($row['DESC_GASTO']), 0, 0,'L', 0);
    $pdf->Cell(50, 10, number_format($row['MT_GASTO'],2,",","."), 0, 0,'R', 0);
    $pdf->Cell(55, 10, number_format($row['MT_CUOTA'],2,",","."), 0, 1,'R', 0);
    
    $lineas++;
    if ($lineas > 17)
      {
            $pdf -> AliasNbPages();
      $pdf->AddPage();
      $pdf->Image('imagenes/LogoDunaF.png',90,8,33);
      $pdf->Ln(30);
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(60);
      $pdf->Cell(30,10,'Cuota Especial',0,0,'R');
      $pdf->Cell(30,10,$descMes,0,0,'C');
      $pdf->Cell(30,10,$year,0,0,'C');
      $pdf->Ln(10);
      $pdf->Cell(20);
      $pdf->Cell(30, 10, $row1['CD_DEPARTAMENTO_D'], 0, 0,'L', 0);
      $pdf->Cell(20, 10, $row1['NOMBRE_PROPIETARIO_D'], 0, 0,'L', 0);
      $pdf->Cell(82);
      $pdf->Cell(10, 10, $row1['ALICUOTA_D'], 0, 0,'R', 0);
      $pdf->Cell(20, 10, '% Alicuota', 0, 0,'C', 0);
      $pdf->Ln(10);
      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(70, 10, 'Descripcion Cuota', 0, 0,'C', 0);
      $pdf->Cell(80, 10, 'Monto Gasto', 0, 0,'C', 0);
      $pdf->Cell(30, 10, 'Monto Cuota', 0, 1,'C', 0);
      $pdf->Ln(5);     
      $lineas = 0;
      }

      $pdf->Ln(10);

  $pdf->SetFont('Arial','B',7);
  $pdf->Cell(80, 10, utf8_decode('EFECTUAR DEPÓSITO A NOMBRE DE:'), 0, 0,'C', 0);
  $pdf->Cell(30, 10, $r_edificio['RESP_BANCO'], 0, 0,'C', 0);
  $pdf->Cell(20, 10, 'C.I :', 0, 0,'C', 0);
  $pdf->Cell(30, 10, $r_edificio['CD_ID_RESPONSABLE'], 0, 0,'L', 0);
  $pdf->Ln(3);
  $pdf->Cell(16);
  $pdf->Cell(70, 10, utf8_decode($r_edificio['NM_BANCO']), 0, 0,'L', 0);
  $pdf->Cell(20, 10, 'CTA. CORRIENTE:', 0, 0,'L', 0);
  $pdf->Cell(10);
  $pdf->Cell(20, 10, $r_edificio['CTA_BANCO'], 0, 0,'L', 0);
  $pdf->Ln(3);
  
  }
 
$pdf->Output('cuota.pdf', 'I');
?>