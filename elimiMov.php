<?php  
    require 'funciones/conexion.php';
       $mes     =  $_POST['mes'];
       $year    =  $_POST['year'];
 
echo ('Borrando...................................');
 $link = conectar();

 $sql = "DELETE  from recibosmov
        WHERE 	MONTH(RECI_FE_RECIBO)  = '".$mes."'   AND YEAR(RECI_FE_RECIBO) = '".$year."';";
 $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );

 header("Location: borrarMovi.php");

?>