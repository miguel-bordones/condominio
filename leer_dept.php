<!DOCTYPE html>
<html lang="en">
  <link rel="stylesheet" href="estilos.css"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
</head>
<?php  

include "conectar.php";

$SQL_READ = "SELECT * FROM DEPARTAMENTO ORDER BY CD_DEPARTAMENTO_D";
?>

<body>
       <title>       DEPARTAMENTOS </title>

       <header>
  <div class=logo1>
      <figure>
          <img src="imagenes/LogoDunaF.png" >
      </figure>
 </header>
      
 <fieldset>
                <legend>Apartamentos</legend>
<table  >
          <tr>
             <td>    Apartamento   </td>
             <td>    Propietario   </td>
             <td>    Alicuota      </td>
           </tr>
    <h3>
          <?php  
            $resultado = mysqli_query($connec,$SQL_READ);
          while($row = mysqli_fetch_array($resultado))
         { ?>
              
                <tr text-align: center;>
                  <td>  <?= $row['CD_DEPARTAMENTO_D'] ?> </td>    
                  <td>  <?= $row['NOMBRE_PROPIETARIO_D'] ?> </td>    
                  <td>  <?= $row['ALICUOTA_D'] ?> </td> 
               
              </tr>
           
         <?php  } ?>
    <h3>
  </table> 
  <a href="menu_orig.html" class="boton1"> Regresar </a>
  </fieldset>
          
  
</body>
</html>
