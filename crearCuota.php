<?php  
    require "funciones/conexion.php";
    $mes     =  ($_POST['mes']);
    $year    =  ($_POST['year']);

 
 $link = conectar();
 $SQL_DELETE = "DELETE FROM recibosmov WHERE  
   RECI_CD_EDIFICIO = 1 AND
   RECI_NU_TORRE = 1 AND
   MONTH(RECI_FE_RECIBO)  = $mes AND YEAR(RECI_FE_RECIBO) = $year AND
   RECI_TIPO = 'C';";
   $queries = mysqli_query($link,$SQL_DELETE) or die( mysqli_error($link));


$SQL_READ = "SELECT 
GAEM_CD_GASTO CD_GASTO,
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
MONTH(GAEM_FE_GASTO)  = '$mes'   AND YEAR(GAEM_FE_GASTO) = '$year';"; 

   $mto_saldo = 0;
   $recibos = mysqli_query($link,$SQL_READ)  or die( mysqli_error($link));
        while($movrecibo = mysqli_fetch_assoc($recibos))
        {

            $SQL_CREATE = "INSERT INTO recibosmov
            ( RECI_CD_EDIFICIO,
              RECI_NU_TORRE,
              RECI_NU_DEPTO,
              RECI_FE_RECIBO,
              RECI_CD_GASTO, 
              RECI_MT_GASTO, 
              RECI_MT_RECIBO,
              RECI_TIPO     
              )         
              VALUES ('1',
              '1',
              '$movrecibo[DEPTO]',
              '$movrecibo[FE_GASTO]',
              '$movrecibo[CD_GASTO]',
              '$movrecibo[MT_GASTO]',
              '$movrecibo[MT_CUOTA]',
              'C');";  
               $queries = mysqli_query($link,$SQL_CREATE)  or die(mysqli_error($link));
        }

        header("Location: generarCuota.php");
?>