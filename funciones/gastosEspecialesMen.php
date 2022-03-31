<?php

function mostrarGtosEspeMen()
{
   $link = conectar();
   $mes  = $_GET['mes'];
   $year = $_GET['year'];
   $sql = "select  GAEM_CD_GASTO,GAES_DESC_GASTO,GAEM_MT_GASTO,GAEM_FE_GASTO 
   from gastos_especiales_mensual,
        gastos_especiales
    WHERE GAEM_CD_GASTO = GAES_CD_GASTO AND
          MONTH(GAEM_FE_GASTO)  = '$mes'   AND YEAR(GAEM_FE_GASTO) = '$year'
      ORDER BY GAEM_FE_GASTO DESC,
      GAEM_CD_GASTO";
    $gtosEspe = mysqli_query($link,$sql);
    return $gtosEspe;
 }

function listarGtosEspeMen()
{
   $link = conectar();
   $mes  = $_POST['mes'];
   $year = $_POST['year'];
   $sql = "select  GAEM_CD_GASTO,GAES_DESC_GASTO,GAEM_MT_GASTO,GAEM_FE_GASTO 
   from gastos_especiales_mensual,
   gastos_especiales
    WHERE GAEM_CD_GASTO = GAES_CD_GASTO AND
          MONTH(GAEM_FE_GASTO)  = '$mes'   AND YEAR(GAEM_FE_GASTO) = '$year'
          ORDER BY GAEM_FE_GASTO DESC,
          GAEM_CD_GASTO";
    $gtosEspe = mysqli_query($link,$sql);
    return $gtosEspe;
 }

 function listarEspeMenSolo()
 {
    $link = conectar();
    $sql = "SELECT GAES_CD_GASTO,GAES_DESC_GASTO
            FROM gastos_especiales
            ORDER BY GAES_CD_GASTO";
     $gastoE = mysqli_query($link,$sql) or die( mysqli_error($link));  
     return $gastoE;
  }

  function agregarEspeMen()
  {
  
     $GAES_CD_GASTO   = $_POST['GAES_CD_GASTO']; 
     $GAEM_MT_GASTO   = $_POST['GAEM_MT_GASTO'];
     $GAEM_FE_GASTO   = $_POST['GAEM_FE_GASTO'];
     $link = conectar();
     $sql = "INSERT INTO gastos_especiales_mensual
     (GAEM_CD_EDIFICIO,
     GAEM_CD_GASTO,
     GAEM_MT_GASTO,
     GAEM_FE_GASTO)
      VALUE 
       ('1',
         '".$GAES_CD_GASTO."',
         '$GAEM_MT_GASTO',
         '".$GAEM_FE_GASTO."')";
         $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );
      return $resultado;
    }
  
    function verEspeMenPorID()
  {
      $link = conectar();
      $GAEM_CD_GASTO   =  $_GET['GAEM_CD_GASTO']; 
      $GAEM_FE_GASTO   =  $_GET['GAEM_FE_GASTO'];
          
      $sql = "select GAEM_CD_GASTO, 
      GAES_DESC_GASTO,
      GAEM_MT_GASTO,
      GAEM_FE_GASTO 
      from gastos_especiales_mensual,
           gastos_especiales
       WHERE GAEM_CD_GASTO = GAES_CD_GASTO AND
             GAEM_CD_GASTO  =  $GAEM_CD_GASTO AND
             GAEM_FE_GASTO = '".$GAEM_FE_GASTO."'
             ORDER BY GAEM_FE_GASTO DESC,
            GAEM_CD_GASTO";
      $resultado = mysqli_query($link,$sql) or die(mysqli_error($link));
      $gasto = mysqli_fetch_assoc($resultado);
      return $gasto;
   }
  
   function  eliminarEspeMen()
  {
      $GAEM_CD_GASTO   = $_POST['GAEM_CD_GASTO']; 
      $GAEM_FE_GASTO   = $_POST['GAEM_FE_GASTO'];
  
   
   $link = conectar();
   $sql = "DELETE FROM gastos_especiales_mensual
           WHERE GAEM_CD_EDIFICIO = 1 AND
           GAEM_CD_GASTO =  $GAEM_CD_GASTO AND
           GAEM_FE_GASTO =  '".$GAEM_FE_GASTO."'";
     $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );
     return $resultado;
  }
  

?>





