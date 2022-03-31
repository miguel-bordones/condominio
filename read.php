<?php

include "conectar.php";

$SQL_READ = "SELECT * FROM DEPARTAMENTO ORDER BY CD_DEPARTAMENTO";
   

$RESULT = mysqli_query($connec,$SQL_READ);

echo $SQL_READ;

?>


