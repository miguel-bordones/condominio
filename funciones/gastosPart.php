<?php
function listarGtosPart()
{
   $link = conectar();
   $sql = "select GPAR_CD_GASTO,GPAR_DESC_GASTO FROM gastos_particulares";
   $gtosGenerales = mysqli_query($link,$sql);
    return $gtosGenerales;              
 }

  

 function agregarGastosPart()
 {
    $GPAR_CD_GASTO   =  $_POST['GPAR_CD_GASTO']; 
    $GPAR_DESC_GASTO =  $_POST['GPAR_DESC_GASTO'];
    $link = conectar();
    $sql = "INSERT INTO gastos_particulares
    (GPAR_CD_EDIFICIO, 
    GPAR_CD_GASTO, 
    GPAR_DESC_GASTO)
      VALUE 
      ('1',
        '".$GPAR_CD_GASTO."',
        '".$GPAR_DESC_GASTO."')";
     $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );
     return $resultado;
 }

 
  function  verGastosPartPorID()
 {
       $GPAR_CD_GASTO   =  $_GET['GPAR_CD_GASTO']; 
       $link = conectar();
       $sql = "SELECT GPAR_CD_GASTO,GPAR_DESC_GASTO
                   FROM gastos_particulares
                   WHERE GPAR_CD_GASTO =".$GPAR_CD_GASTO;
       $resultado = mysqli_query($link,$sql) or die(mysqli_error($link));
       $gasto = mysqli_fetch_assoc($resultado);
       return $gasto;
 }

  function modificarGastosPart()
  {       
   
 
    $GPAR_CD_GASTO   =  $_POST['GPAR_CD_GASTO']; 
    $GPAR_DESC_GASTO =  $_POST['GPAR_DESC_GASTO'];

      $link = conectar();
      $sql = "UPDATE  gastos_particulares
              SET   GPAR_DESC_GASTO = '".$GPAR_DESC_GASTO."'
              WHERE GPAR_CD_GASTO   = ".$GPAR_CD_GASTO;
       $resultado = mysqli_query( $link, $sql )  or die( mysqli_error($link) );
      return $resultado;
  }


 function  eliminarGastosPart()
 { 
  $GPAR_CD_GASTO   =  $_POST['GPAR_CD_GASTO']; 
  $link = conectar();
  $sql = "DELETE FROM gastos_particulares
          WHERE GPAR_CD_EDIFICIO = 1 AND
          GPAR_CD_GASTO = $GPAR_CD_GASTO";
    $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );
    return $resultado;
 }
?>





