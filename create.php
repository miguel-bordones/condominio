<?php

include "conectar.php";


echo ' ';
echo ' ';
echo ' ';

echo ' ';
echo ' ';
echo ' ';

echo ' ';
echo ' ';
echo ' ';


$edificio = $_POST['edificio'];
$torre = $_POST['torre'];
$departamento = $_POST['departamento'];
$propietario = $_POST['propietario'];
$alicuota = $_POST['alicuota'];

if ($edificio <> 0)
{
  $SQL_CREATE = "INSERT INTO departamento
  (CD_EDIFICIO_D,
   NU_TORRE_D,
   CD_DEPARTAMENTO_D,
   NOMBRE_PROPIETARIO_D,
   ALICUOTA_D)
    VALUES ('$edificio',
    '$torre',
    '$departamento',
    '$propietario',
    '$alicuota')"; 
}


  
   $queries = mysqli_query($connec,$SQL_CREATE);

   if( $queries == true)
   {
       echo "Registro Exitoso";
   }
   else
  {
   echo "Registro Fallido";
   }
 
  header('location:../helpers/menuf.html');

?>


