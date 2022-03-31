<?php
function listarGtosEspe()
{
   $link = conectar();
   $sql = "select GAES_CD_GASTO,GAES_DESC_GASTO FROM gastos_especiales";
   $gtosEspeciales = mysqli_query($link,$sql);
    return $gtosEspeciales;              
 }

  

 function agregarGastosEspe()
 {
    $GAES_CD_GASTO   =  $_POST['GAES_CD_GASTO']; 
    $GAES_DESC_GASTO =  $_POST['GAES_DESC_GASTO'];
    $link = conectar();
    $sql = "INSERT INTO gastos_especiales
    (GAES_CD_EDIFICIO, 
    GAES_CD_GASTO, 
    GAES_DESC_GASTO)
      VALUE 
      ('1',
        '".$GAES_CD_GASTO."',
        '".$GAES_DESC_GASTO."')";
     $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );
     return $resultado;
 }

 
  function  verGastosEspePorID()
 {
       $GAES_CD_GASTO   =  $_GET['GAES_CD_GASTO']; 
       $link = conectar();
       $sql = "SELECT GAES_CD_GASTO,GAES_DESC_GASTO
                   FROM gastos_especiales
                   WHERE GAES_CD_GASTO =".$GAES_CD_GASTO;
       $resultado = mysqli_query($link,$sql) or die(mysqli_error($link));
       $gasto = mysqli_fetch_assoc($resultado);
       return $gasto;
 }

  function modificarGastosEspe()
  {       
   
 
    $GAES_CD_GASTO   =  $_POST['GAES_CD_GASTO']; 
    $GAES_DESC_GASTO =  $_POST['GAES_DESC_GASTO'];

      $link = conectar();
      $sql = "UPDATE  gastos_especiales
              SET   GAES_DESC_GASTO = '".$GAES_DESC_GASTO."'
              WHERE GAES_CD_GASTO   = ".$GAES_CD_GASTO;
       $resultado = mysqli_query( $link, $sql )  or die( mysqli_error($link) );
      return $resultado;
  }


 function  eliminarEspe()
 { 
  $GAES_CD_GASTO   =  $_POST['GAES_CD_GASTO']; 
  $link = conectar();
  $sql = "DELETE FROM gastos_especiales
          WHERE GAES_CD_EDIFICIO = 1 AND
          GAES_CD_GASTO = $GAES_CD_GASTO";
    $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );
    return $resultado;
 }
?>





