<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title> Recibo</title>

    
</head>

<?php  
   require "funciones/conexion.php";
   require "calcularDeuda.php";
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

<div class=logo1>

<center>
    <figure>
        <img src="imagenes/LogoDunaF.png" >
    </figure>
    </center>
   </div>
      <center>
        <h1>         Recibo  <?php     echo '               ',$descMes,'                 ',$yeare  ?>       </h1> 
        
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
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  
       ?>
        <a href="ListaRecibo.php?mes=<?php echo $mese;?>&year=<?php echo $yeare;?>&dept=<?php echo $depto?>" class="btn btn-outline-secondary mb-3">
            Exportar Pdf
        </a>
           

        <table class="table table-bordered table-stripped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Cod. Gasto</th>
                <th>Descripción de Gasto</th>
                <th>Monto Gasto </th>
                <th>Monto Recibo</th>
                 
            </tr>
            </thead>
            <tbody>
            
 
<?php

$SQL_READ = "SELECT 
   GACM_CD_GASTO CD_GASTO,
   GCON_DESC_GASTO DESC_GASTO,
   GACM_MT_GASTO MT_GASTO, 
   ((GACM_MT_GASTO * ALICUOTA_D)/100) MT_RECIBO,
   CD_DEPARTAMENTO_D DEPTO
   FROM departamento,
        gastos_conserje_mensual,
        gastos_conserje
   WHERE GACM_CD_EDIFICIO = CD_EDIFICIO_D AND
   GCON_CD_EDIFICIO = GACM_CD_EDIFICIO AND
   GCON_CD_GASTO = GACM_CD_GASTO AND
   MONTH(GACM_FE_GASTO)  = '$mese'   AND YEAR(GACM_FE_GASTO) = '$yeare' AND
   CD_DEPARTAMENTO_D  = '$NU_DEPTO'
   UNION
   SELECT 
    GAGE_CD_GASTO CD_GASTO,
    GAGE_DESC_GASTO DESC_GASTO,
    GAGM_MT_GASTO MT_GASTO, 
    ((GAGM_MT_GASTO * ALICUOTA_D)/100) MT_RECIBO,
      CD_DEPARTAMENTO_D DEPTO
   FROM departamento,
        gastos_general_mensual,
        gastos_general
   WHERE GAGM_CD_EDIFICIO = CD_EDIFICIO_D AND
   GAGE_CD_EDIFICIO = GAGM_CD_EDIFICIO AND
   GAGE_CD_GASTO = GAGM_CD_GASTO AND
   MONTH(GAGM_FE_GASTO)  = '$mese'   AND YEAR(GAGM_FE_GASTO) = '$yeare' AND
   CD_DEPARTAMENTO_D  = '$NU_DEPTO'
   UNION
   SELECT 
      GADM_CD_GASTO CD_GASTO,
      GAMI_DESC_GASTO DESC_GASTO,
      GADM_MT_GASTO MT_GASTO,
      ((GADM_MT_GASTO * ALICUOTA_D)/100) MT_RECIBO,

        CD_DEPARTAMENTO_D DEPTO
     FROM departamento,
          gastos_admin_mensual,
          gastos_admin
     WHERE GADM_CD_EDIFICIO = CD_EDIFICIO_D AND
     GAMI_CD_EDIFICIO = GADM_CD_EDIFICIO AND
     GAMI_CD_GASTO = GADM_CD_GASTO AND
     MONTH(GADM_FE_GASTO)  = '$mese'   AND YEAR(GADM_FE_GASTO) = '$yeare' AND
   CD_DEPARTAMENTO_D  = '$NU_DEPTO'
     UNION
     SELECT 
    GPAM_CD_GASTO CD_GASTO,
    GPAR_DESC_GASTO DESC_GASTO,
    0  MT_GASTO,
    GPAM_MT_GASTO  MT_RECIBO,
     CD_DEPARTAMENTO_D DEPTO
   FROM departamento,
        gastos_particulares_mensual,
        gastos_particulares
   WHERE GPAM_CD_EDIFICIO = CD_EDIFICIO_D AND
   GPAM_CD_EDIFICIO = GPAR_CD_EDIFICIO AND
   GPAM_CD_GASTO = GPAR_CD_GASTO AND
   GPAM_CD_DEPTO = CD_DEPARTAMENTO_D AND
   MONTH(GPAM_FE_GASTO)  = '$mese'   AND YEAR(GPAM_FE_GASTO) = '$yeare' AND
   CD_DEPARTAMENTO_D  = '$NU_DEPTO';";


            $tot_gasto   = 0;
            $tot_recibo  = 0;
            $recibos = mysqli_query($link,$SQL_READ)  or die( mysqli_error($link) );
          

        while( $movrecibo = mysqli_fetch_assoc($recibos) ){
?>
            <tr>
                <td><?= $movrecibo['CD_GASTO']      ?></td>
                <td><?= $movrecibo['DESC_GASTO']    ?></td>
                
                <td><?= number_format($movrecibo['MT_GASTO'],2,",",".")      ?></td>
                <td><?= number_format($movrecibo['MT_RECIBO'],2,",",".")    ?></td>
                <?php
                $tot_gasto = $tot_gasto + $movrecibo['MT_GASTO'];
                $tot_recibo = $tot_recibo + $movrecibo['MT_RECIBO'];
                ?>
            </tr>
<?php
        }
?>
            </tbody>
        </table>

 <?php
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
 echo "Total Recibo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  
 echo  number_format($tot_gasto,2,",","."); 
 echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
 echo number_format($tot_recibo,2,",",".");
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 Deuda Anterior &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
 echo  number_format($tot_deuda,2,",","."); 
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 Total a Pagar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;";
 $total_pagar = $tot_deuda  + $tot_recibo;
 echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
 echo number_format($total_pagar,2,",",".");
  
     

       ?>
     
     <br>
     <br>
     <br>

     <?php
     $SQL_EDIFICIO = "SELECT CD_ID_RESPONSABLE,RESP_BANCO,CTA_BANCO,NM_BANCO FROM edificio
                    WHERE CD_EDIFICIO = 1;";
     $edificio = mysqli_query($link,$SQL_EDIFICIO)  or die( mysqli_error($link));
     $row_edificio = mysqli_fetch_assoc($edificio);
     ?>
       

     <center> 
     <h5>  EFECTUAR DEPÓSITO A NOMBRE DE: <?php echo $row_edificio['RESP_BANCO'] ?>, C.I. <?php echo $row_edificio['CD_ID_RESPONSABLE'] ?>  <br>
     <?php echo $row_edificio['NM_BANCO']?>, CTA CORRIENTE: <?php echo $row_edificio['CTA_BANCO']?>  <br>
              FAVOR DEPOSITAR DENTRO DE LOS CINCO PRIMEROS DIAS DE CADA MES  </h5>
</center>
     <a href="SeleFecha.php?usuario=<?php echo $usuario;?>" class="btn btn-outline-secondary mb-3">
        Regresar
     </a>

    </main>
<?php  include 'includes/footer.php';  ?>
</html>
