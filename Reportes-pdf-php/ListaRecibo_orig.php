
<?php
require('fpdf/fpdf.php');
require "cn.php";

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('LogoDunaF.png',10,8,33);
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(100);
    // Título
    $this->Cell(30,10,'Recibo Condominio',0,0,'R');
    // Salto de línea
    


    
    $this->Ln(20);
    $this->SetFont('Arial','B',10);
    $this->Cell(20, 10, 'Cd. Gasto', 0, 0,'C', 0);
    $this->Cell(70, 10, 'Descripcion Gasto', 0, 0,'C', 0);
    $this->Cell(60, 10, 'Monto Gasto', 0, 0,'C', 0);
    $this->Cell(60, 10, 'Monto Recibo', 0, 1,'C', 0);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}





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


$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row = $resultado->fetch_assoc())
{
    $pdf->Cell(20, 10, $row['CD_GASTO'], 0, 0,'R', 0);
    $pdf->Cell(70, 10, utf8_decode($row['DESC_GASTO']), 0, 0,'L', 0);
    $pdf->Cell(50, 10, number_format($row['MT_GASTO'],2,",","."), 0, 0,'R', 0);
    $pdf->Cell(50, 10, number_format($row['MT_RECIBO'],2,",","."), 0, 1,'R', 0);
}

$pdf->Output();
?>