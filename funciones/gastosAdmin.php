<?php
function listarGtosAdm()
{
   $link = conectar();
   $sql = "select GAMI_CD_GASTO,GAMI_DESC_GASTO FROM gastos_admin;";
   $gtosGenerales = mysqli_query($link,$sql);
    return $gtosGenerales;              
 }

  

 function agregarGastosAdm()
 {
    $GAMI_CD_GASTO   =  $_POST['GAMI_CD_GASTO']; 
    $GAMI_DESC_GASTO =  $_POST['GAMI_DESC_GASTO'];
    $link = conectar();
    $sql = "INSERT INTO gastos_admin
    (GAMI_CD_EDIFICIO, 
    GAMI_CD_GASTO, 
    GAMI_DESC_GASTO)
      VALUE 
      ('1',
        '".$GAMI_CD_GASTO."',
        '".$GAMI_DESC_GASTO."')";
     $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );
     return $resultado;
 }

 
  function  verGastosAdmPorID()
 {
       $GAMI_CD_GASTO   =  $_GET['GAMI_CD_GASTO']; 
       $link = conectar();
       $sql = "SELECT GAMI_CD_GASTO,GAMI_DESC_GASTO
                   FROM gastos_admin
                   WHERE GAMI_CD_GASTO =".$GAMI_CD_GASTO;
       $resultado = mysqli_query($link,$sql) or die(mysqli_error($link));
       $gasto = mysqli_fetch_assoc($resultado);
       return $gasto;
  }

  function modificarGastosAdm()
  {       
   
 
    $GAMI_CD_GASTO   =  $_POST['GAMI_CD_GASTO']; 
    $GAMI_DESC_GASTO =  $_POST['GAMI_DESC_GASTO'];

      $link = conectar();
      $sql = "UPDATE  gastos_admin
              SET   GAMI_DESC_GASTO = '".$GAMI_DESC_GASTO."'
              WHERE GAMI_CD_GASTO   = ".$GAMI_CD_GASTO;
       $resultado = mysqli_query( $link, $sql )  or die( mysqli_error($link) );
      return $resultado;
  }


 function  eliminarGastosAdm()
 { 
  $GAMI_CD_GASTO   =  $_POST['GAMI_CD_GASTO']; 
  $link = conectar();
  $sql = "DELETE FROM gastos_admin
          WHERE GAMI_CD_EDIFICIO = 1 AND
          GAMI_CD_GASTO = $GAMI_CD_GASTO";
    $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );
    return $resultado;
 }

 

?>





