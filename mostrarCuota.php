<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Recibo</title>
  
</head>

<center>
    <figure>
        <img src="imagenes/LogoDunaF.png" >
    </figure>
    </center>
   </div>

<?php  
    require "funciones/conexion.php";
    include 'includes/header.html';
    $mese     =  $_POST['mes'];
    $yeare    =  $_POST['year'];
    $depto    =  $_GET['depto'];


      if ($mese == 1)  
      {
      $descMes = 'Enero';
      }
      elseif ($mese == 2)  
      {
        $descMes = 'Febrero';
      }
      elseif ($mese == 3)  
      {
        $descMes = 'Marzo';
      }
      elseif ($mese == 4)  
      {
        $descMes = 'Abril';
      }
      elseif ($mese == 5)  
      {
      $descMes = 'Mayo';
      }
      elseif ($mese == 6)  
      {
      $descMes = 'Junio'; 
      }
      elseif ($mese == 7)  
      {
      $descMes = 'Julio';
      }
      elseif ($mese == 8)
      {
      $descMes = 'Agosto';
      }
      elseif ($mese == 9) 
      {
      $descMes = 'Septiembre';
      }
      elseif($mese == 10)  
      {
      $descMes = 'Octubre';
      }
      if ($mese == 11) 
      { 
      $descMes = 'Noviembre';
      }
      elseif ($mese == 12)  
      {
      $descMes = 'Diciembre';
     }
  
  
 
    $link = conectar();
   
    $SQL_READ = "SELECT CD_DEPARTAMENTO_D,
                        NOMBRE_PROPIETARIO_D,
                        ALICUOTA_D,
                        USUARIO
    FROM departamento,usuarios
    WHERE CD_DEPARTAMENTO_D = '$depto' AND	
    CD_DEPARTAMENTO_D = DEPTO_U";
   
  
?>

   <main class="container">

    <?php  
            $resultado = mysqli_query($link,$SQL_READ);
           
            $row   = mysqli_fetch_array($resultado);
            
            $NU_DEPTO   = $row['CD_DEPARTAMENTO_D']; 
            $usuario    = $row['USUARIO']; 
 

?>

      <center>
        <h1>         Cuota Especial  <?php     echo '               ',$descMes,'                 ',$yeare  ?>       </h1> 
        
        </center>
        <a href="SeleFecha.php?usuario=<?php echo $usuario;?>" class="btn btn-outline-secondary mb-3">
            Regresar
        </a>
        <?php
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            
         
       ?>
        <a href="ListaCuota.php?mes=<?php echo $mese;?>&year=<?php echo $yeare;?>&dept=<?php echo $depto?>" class="btn btn-outline-secondary mb-3">
            Exportar Pdf
        </a>
           

        <table class="table table-bordered table-stripped table-hover">
            <thead class="thead-dark">
            <tr>
            
                <th>Descripción de Cuota</th>
                <th>Monto Gasto </th>
                <th>Monto Cuota</th>
                 
            </tr>
            </thead>
            <tbody>
            
 
<?php

$SQL_READ = "SELECT 
GAEM_CD_GASTO CD_GASTO,
GAES_DESC_GASTO DESC_GASTO,
GAEM_MT_GASTO MT_GASTO,
((GAEM_MT_GASTO * ALICUOTA_D)/100) MT_CUOTA,
GAEM_FE_GASTO FE_GASTO,
  CD_DEPARTAMENTO_D DEPTO
FROM departamento,
    gastos_especiales_mensual,
    gastos_especiales
WHERE GAEM_CD_EDIFICIO = CD_EDIFICIO_D AND
GAEM_CD_EDIFICIO = GAEM_CD_EDIFICIO AND
GAES_CD_GASTO = GAEM_CD_GASTO AND
MONTH(GAEM_FE_GASTO)  = '$mese'   AND YEAR(GAEM_FE_GASTO) = '$yeare' AND
   CD_DEPARTAMENTO_D  = '$NU_DEPTO';";


         
            $recibos = mysqli_query($link,$SQL_READ)  or die( mysqli_error($link) );
          

        while( $movrecibo = mysqli_fetch_assoc($recibos) ){
?>
            <tr>
                <td><?= $movrecibo['DESC_GASTO']    ?></td>
                <td><?= number_format($movrecibo['MT_GASTO'],2,",",".")      ?></td>
                <td><?= number_format($movrecibo['MT_CUOTA'],2,",",".")    ?></td>
               
            </tr>
<?php
        }
?>
            </tbody>
        </table>
      
     <br>
     <br>
         
     <a href="SeleFecha.php?usuario=<?php echo $usuario;?>" class="btn btn-outline-secondary mb-3">
        Regresar
     </a>

    </main>
<?php  include 'includes/footer.php';  ?>
</html>