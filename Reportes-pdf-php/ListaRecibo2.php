
<?php
require('fpdf/fpdf.php');
require "cn.php";
//require('../funciones/conexion.php');
$total_gasto  = 0;
$total_recibo = 0;
$lineas       = 0;

$total_pagar = 0;

$SQL_DEPT = "SELECT CD_DEPARTAMENTO_D,
                    NOMBRE_PROPIETARIO_D,
                    ALICUOTA_D
    FROM departamento
    WHERE CD_DEPARTAMENTO_D = '7B'";
    $depto  = $mysqli->query($SQL_DEPT);
    $row1    = $depto->fetch_assoc();
    //$deptoNum  = row['CD_DEPARTAMENTO_D'];
   // echo "   row ",$row['CD_DEPARTAMENTO_D'];

$consulta = "SELECT  RECI_CD_GASTO CD_GASTO, 
GCON_DESC_GASTO DESC_GASTO,
RECI_MT_GASTO MT_GASTO, 
RECI_MT_RECIBO MT_RECIBO
FROM recibosmov,gastos_conserje
WHERE RECI_CD_EDIFICIO = 1 AND
	  RECI_NU_TORRE = 1 AND
      MONTH(RECI_FE_RECIBO)  = 12  AND YEAR(RECI_FE_RECIBO) = 2020 AND
      RECI_NU_DEPTO = '7B' AND
      GCON_CD_GASTO = RECI_CD_GASTO
            UNION
      SELECT  RECI_CD_GASTO CD_GASTO, 
      GAGE_DESC_GASTO DESC_GASTO,
      RECI_MT_GASTO MT_GASTO, 
      RECI_MT_RECIBO MT_RECIBO 
      FROM recibosmov,gastos_general
WHERE RECI_CD_EDIFICIO = 1 AND
	  RECI_NU_TORRE = 1 AND
      MONTH(RECI_FE_RECIBO)  = 12  AND YEAR(RECI_FE_RECIBO) = 2020 AND
      RECI_NU_DEPTO = '7B' AND
      GAGE_CD_GASTO = RECI_CD_GASTO
       UNION
      SELECT  RECI_CD_GASTO, 
      GAMI_DESC_GASTO DESC_GASTO,
      RECI_MT_GASTO MT_GASTO, 
      RECI_MT_RECIBO MT_RECIBO
      FROM recibosmov,gastos_admin
WHERE RECI_CD_EDIFICIO = 1 AND
	  RECI_NU_TORRE = 1 AND
      MONTH(RECI_FE_RECIBO)  = 12  AND YEAR(RECI_FE_RECIBO) = 2020 AND
      RECI_NU_DEPTO = '7B' AND
      GAMI_CD_GASTO = RECI_CD_GASTO
      UNION
      SELECT  RECI_CD_GASTO, 
      GAGE_DESC_GASTO,
      RECI_MT_GASTO, 
      RECI_MT_RECIBO 
      FROM recibosmov,gastos_general
WHERE RECI_CD_EDIFICIO = 1 AND
	  RECI_NU_TORRE = 1 AND
      MONTH(RECI_FE_RECIBO)  = 12  AND YEAR(RECI_FE_RECIBO) = 2020 AND
      RECI_NU_DEPTO = '7B' AND
      GAGE_CD_GASTO = RECI_CD_GASTO
       UNION
      SELECT  RECI_CD_GASTO CD_GASTO, 
      GPAR_DESC_GASTO DESC_GASTO,
      RECI_MT_GASTO MT_GASTO, 
      RECI_MT_RECIBO MT_RECIBO
      FROM recibosmov,gastos_particulares
WHERE RECI_CD_EDIFICIO = 1 AND
	  RECI_NU_TORRE = 1 AND
      MONTH(RECI_FE_RECIBO)  = 12  AND YEAR(RECI_FE_RECIBO) = 2020 AND
      RECI_NU_DEPTO = '7B' AND
      GPAR_CD_GASTO = RECI_CD_GASTO";
$resultado = $mysqli->query($consulta);

$SQL_DEUDA = "SELECT
SA_MT_ANO_ANTERIOR +
IF(SA_IND_ENERO = 'S',0,SA_MT_ENERO) +
IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
IF(SA_IND_MARZO = 'S',0,SA_MT_MARZO) +
IF(SA_IND_ABRIL = 'S',0,SA_MT_ABRIL) +
IF(SA_IND_JUNIO = 'S',0,SA_MT_JUNIO) +
IF(SA_IND_JULIO = 'S',0,SA_MT_JULIO) +
IF(SA_IND_AGOSTO = 'S',0,SA_MT_AGOSTO) +
IF(SA_IND_SEPTIEMBRE = 'S',0,SA_MT_SEPTIEMBRE) +
IF(SA_IND_OCTUBRE = 'S',0,SA_MT_OCTUBRE) +
IF(SA_IND_NOVIEMBRE = 'S',0,SA_MT_NOVIEMBRE)  DEUDA
from saldo_propietarios
WHERE SA_CD_EDIFICIO = 1 AND
SA_NU_TORRE    = 1 AND
SA_DEPTO       = '7B' AND
SA_ANO         = 2020;";
   $deuda       =  $mysqli->query($SQL_DEUDA);
   $tot_deuda   = $deuda ->fetch_assoc();

   $SQL_EDIFICIO = "SELECT CD_ID_RESPONSABLE,RESP_BANCO,CTA_BANCO,NM_BANCO FROM edificio
   WHERE CD_EDIFICIO = 1;";
 $edificio    = $mysqli->query($SQL_EDIFICIO);
 $r_edificio  = $edificio  ->fetch_assoc();

 /*SA_DEPTO       = '$NU_DEPTO' AND
SA_ANO         = '$yeare';"; */


$pdf = new FPDF();
      $pdf -> AliasNbPages();
      $pdf->AddPage();
      $pdf->Image('../imagenes/LogoDunaF.png',90,8,33);
      $pdf->Ln(30);
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(80);
      $pdf->Cell(30,10,'Recibo Condominio',0,0,'R');
      $pdf->Ln(10);
      $pdf->Cell(20);
      $pdf->Cell(10, 10, $row1['CD_DEPARTAMENTO_D'], 0, 0,'L', 0);
      $pdf->Cell(30, 10, $row1['NOMBRE_PROPIETARIO_D'], 0, 0,'L', 0);
      $pdf->Cell(82);
      $pdf->Cell(10, 10, $row1['ALICUOTA_D'], 0, 0,'R', 0);
      $pdf->Cell(20, 10, '% Alicuota', 0, 0,'C', 0);
      $pdf->Ln(10);

   
      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(20, 10, 'Cd. Gasto', 0, 0,'C', 0);
      $pdf->Cell(70, 10, 'Descripcion Gasto', 0, 0,'C', 0);
      $pdf->Cell(80, 10, 'Monto Gasto', 0, 0,'C', 0);
      $pdf->Cell(30, 10, 'Monto Recibo', 0, 1,'C', 0);
      $pdf->Ln(5);     



while($row = $resultado->fetch_assoc())
{
    $pdf->Cell(20, 10, $row['CD_GASTO'], 0, 0,'R', 0);
    $pdf->Cell(70, 10, utf8_decode($row['DESC_GASTO']), 0, 0,'L', 0);
    $pdf->Cell(70, 10, number_format($row['MT_GASTO'],2,",","."), 0, 0,'R', 0);
    $pdf->Cell(30, 10, number_format($row['MT_RECIBO'],2,",","."), 0, 1,'R', 0);
    $total_gasto = $total_gasto + $row['MT_GASTO'];
    $total_recibo = $total_recibo + $row['MT_RECIBO'];
    $lineas++;
    if ($lineas > 17)
      {
            $pdf -> AliasNbPages();
      $pdf->AddPage();
      $pdf->Image('../imagenes/LogoDunaF.png',90,8,33);
      $pdf->Ln(30);
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(80);
      $pdf->Cell(30,10,'Recibo Condominio',0,0,'R');
      $pdf->Ln(10);
      $pdf->Cell(20);
      $pdf->Cell(30, 10, $row1['CD_DEPARTAMENTO_D'], 0, 0,'L', 0);
      $pdf->Cell(20, 10, $row1['NOMBRE_PROPIETARIO_D'], 0, 0,'L', 0);
      $pdf->Cell(20, 10, $row1['ALICUOTA_D'], 0, 0,'L', 0);
      $pdf->Ln(10);
      $pdf->SetFont('Arial','B',8);
      $pdf->Cell(20, 10, 'Cd. Gasto', 0, 0,'C', 0);
      $pdf->Cell(70, 10, 'Descripcion Gasto', 0, 0,'C', 0);
      $pdf->Cell(80, 10, 'Monto Gasto', 0, 0,'C', 0);
      $pdf->Cell(30, 10, 'Monto Recibo', 0, 1,'C', 0);
      $pdf->Ln(5);     
      $lineas = 0;
      }

  }
  $pdf->Ln(5);
  $pdf->Cell(80, 10, 'Total Recibo', 0, 0,'C', 0);
  
  $pdf->Cell(80, 10, number_format($total_gasto,2,",","."), 0, 0,'R', 0);
  $pdf->Cell(30, 10, number_format($total_recibo,2,",","."), 0, 0,'R', 0);
  $pdf->Ln(5);
  $pdf->Cell(80, 10, 'Total Deuda', 0, 0,'C', 0);
  $pdf->Cell(110, 10, number_format($tot_deuda['DEUDA'],2,",","."), 0, 0,'R', 0);
  $pdf->Ln(5);

  $total_pagar = $total_recibo + $tot_deuda['DEUDA'];

  $pdf->Cell(80, 10, 'Total a Pagar', 0, 0,'C', 0);
  $pdf->Cell(110, 10, number_format($total_pagar,2,",","."), 0, 0,'R', 0);
  $pdf->Ln(20);

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
  $pdf->Cell(20);
  $pdf->Cell(105, 10, '                      FAVOR DEPOSITAR DENTRO DE LOS CINCO PRIMEROS DIAS DE CADA MES ', 0, 0,'C', 0);
  
$pdf->Output();
?>