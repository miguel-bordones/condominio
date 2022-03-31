<?php
function listarRecibos()
{
   $link = conectar();

 $user=($_GET['usuario']);
$NU_DEPTO = "SELECT CD_DEPARTAMENTO_D  FROM departamento
WHERE USUARIO_D = '$user'"; 

$dept_usuario = mysqli_query($connec,$NU_DEPTO);

$reg_depto = $row = mysqli_fetch_array($dept_usuario);



   $sql = "SELECT 
   GACM_CD_GASTO CD_GASTO,
   GCON_DESC_GASTO DESC_GASTO,
   GACM_MT_GASTO MT_GASTO, 
   ((GACM_MT_GASTO * ALICUOTA_D)/100) MT_RECIBO,
   CD_DEPARTAMENTO_D DEPTO
   FROM departamento,
        gastos_conserje_mensual,
        gastos_conserje
   WHERE GACM_CD_EDIFICIO = CD_EDIFICIO_D AND
   GCON_CD_EDIFICIO = GACM_CD_EDIFICIO AND
   GCON_CD_GASTO = GACM_CD_GASTO AND
   GACM_FE_GASTO = '2020-07-30' AND
   CD_DEPARTAMENTO_D  = '7B'
   UNION
   SELECT 
    GAGE_CD_GASTO CD_GASTO,
    GAGE_DESC_GASTO DESC_GASTO,
    GAGM_MT_GASTO MT_GASTO, 
    ((GAGM_MT_GASTO * ALICUOTA_D)/100) MT_RECIBO,
      CD_DEPARTAMENTO_D DEPTO
   FROM departamento,
        gastos_general_mensual,
        gastos_general
   WHERE GAGM_CD_EDIFICIO = CD_EDIFICIO_D AND
   GAGE_CD_EDIFICIO = GAGM_CD_EDIFICIO AND
   GAGE_CD_GASTO = GAGM_CD_GASTO AND
    GAGM_FE_GASTO = '2020-07-30' AND
   CD_DEPARTAMENTO_D  = '7B'
   UNION
   SELECT 
      GADM_CD_GASTO CD_GASTO,
      GAMI_DESC_GASTO DESC_GASTO,
      GADM_MT_GASTO MT_GASTO,
      ((GADM_MT_GASTO * ALICUOTA_D)/100) MT_RECIBO,
        CD_DEPARTAMENTO_D DEPTO
     FROM departamento,
          gastos_admin_mensual,
          gastos_admin
     WHERE GADM_CD_EDIFICIO = CD_EDIFICIO_D AND
     GAMI_CD_EDIFICIO = GADM_CD_EDIFICIO AND
     GAMI_CD_GASTO = GADM_CD_GASTO AND
     GADM_FE_GASTO = '2020-07-30' AND
   CD_DEPARTAMENTO_D  = '7B'
     UNION
     SELECT 
   GPAM_CD_GASTO CD_GASTO,
   GPAR_DESC_GASTO DESC_GASTO,
   GAPM_MT_GASTO MT_GASTO, 
   ((GAPM_MT_GASTO * ALICUOTA_D)/100) MT_RECIBO,
     CD_DEPARTAMENTO_D DEPTO
   FROM departamento,
        gastos_particulares_mensual,
        gastos_particulares
   WHERE GPAM_CD_EDIFICIO = CD_EDIFICIO_D AND
   GPAM_CD_EDIFICIO = GPAR_CD_EDIFICIO AND
   GPAM_CD_GASTO = GPAR_CD_GASTO AND
   GPAM_CD_DEPTO = CD_DEPARTAMENTO_D AND
   GPAM_FE_GASTO = '2020-07-30' AND
   CD_DEPARTAMENTO_D  = '7B';";
    $recibos = mysqli_query($link,$sql);
    return $recibos;
 }
?>
