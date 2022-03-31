<?php
function listarGtosPar()
{
   $link = conectar();
   $sql = "SELECT GPAR_CD_GASTO,GPAR_DESC_GASTO FROM gastos_particulares;";
   $gtosParticulares = mysqli_query($link,$sql);
    return $gtosParticulares;
 }

?>





