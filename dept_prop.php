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

$usuario = ($_GET['cd_usuario']);

$SQL_READ = "SELECT * FROM DEPARTAMENTO  WHERE USUARIO_D = '$usuario';";

?>
       <title>       DEPARTAMENTOS </title>
  
       <header>
        <div class=logo1>
            <figure>
                <img src="imagenes/LogoDunaF.png" >
            </figure>
       </header>
   

   <body>
                     
    
          <?php  
            $resultado = mysqli_query($connec,$SQL_READ);
           
            $row   = mysqli_fetch_array($resultado);
            
            $NU_DEPTO   = $row['CD_DEPARTAMENTO_D']; 
       
 $diaSemana = date('D');

$diaMes = date('d');
$mes = date('m');
$anio = date('Y');

switch ($diaSemana){
    case 'Sun':
        $diaSemana = 'Domingo';
        break;
    case 'Mon':
        $diaSemana = 'Lunes';
        break;
    case 'Tue':
        $diaSemana = 'Martes';
        break;
    case 'Wed':
        $diaSemana = 'Miércoles';
        break;
    case 'Thu':
        $diaSemana = 'Jueves';
        break;
    case 'Fri':
        $diaSemana = 'Viernes';
        break;
    default:
        $diaSemana = 'Sábado';
        break;
}
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $diaSemana,' ', $diaMes, '/', $mes, '/', $anio;
?>
     
       

<fieldset>

    <label>  Apartamento       :    </label>     <?= $row['CD_DEPARTAMENTO_D'] ?>     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
    <label>  Propietarios      :    </label>     <?= $row['NOMBRE_PROPIETARIO_D'] ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
    <label>  Alicuota          :    </label>      <?= $row['ALICUOTA_D'] ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    <label>  fecha (dd/mm/aaaa):
                    <input type="text" name="dia" size="2">
                    <input type="text" name="mes" size="2">
                    <input type="text" name="anio" size="4">
                     <br>
                
  
  

 </fieldset>

 <?php  
      /* <?=  $fecha = $_POST ["fecha"];  ?>
      Fecha :   <input type="date" name = "fecha"  required >  
      
      */
  $SQL_READ1 = "SELECT 
  GACM_CD_GASTO CD_GASTO1,
  GCON_DESC_GASTO DESC_GASTO1,
  GACM_MT_GASTO MT_GASTO1, 
  ((GACM_MT_GASTO * ALICUOTA_D)/100) MT_RECIBO1
  FROM DEPARTAMENTO,
       GASTOS_CONSERJE_MENSUAL,
       GASTOS_CONSERJE
  WHERE GACM_CD_EDIFICIO = CD_EDIFICIO_D AND
  GCON_CD_EDIFICIO = GACM_CD_EDIFICIO AND
  GCON_CD_GASTO = GACM_CD_GASTO AND
  CD_DEPARTAMENTO_D =  '$NU_DEPTO' AND
  GACM_FE_GASTO = '2020-07-30'";

$SQL_READ2 = "SELECT 
   GAGE_CD_GASTO CD_GASTO2,
   GAGE_DESC_GASTO DESC_GASTO2,
   GAGM_MT_GASTO MT_GASTO2, 
   ((GAGM_MT_GASTO * ALICUOTA_D)/100) MT_RECIBO2
  FROM DEPARTAMENTO,
       GASTOS_GENERAL_MENSUAL,
       GASTOS_GENERAL
  WHERE GAGM_CD_EDIFICIO = CD_EDIFICIO_D AND
  GAGE_CD_EDIFICIO = GAGM_CD_EDIFICIO AND
  GAGE_CD_GASTO = GAGM_CD_GASTO AND
  CD_DEPARTAMENTO_D = '$NU_DEPTO' AND
  GAGM_FE_GASTO = '2020-07-30'";

$SQL_READ3 = "SELECT 
     GADM_CD_GASTO CD_GASTO3,
     GAMI_DESC_GASTO DESC_GASTO3,
     GADM_MT_GASTO MT_GASTO3,
     ((GADM_MT_GASTO * ALICUOTA_D)/100) MT_RECIBO3
    FROM DEPARTAMENTO,
         GASTOS_ADMIN_MENSUAL,
         GASTOS_ADMIN
    WHERE GADM_CD_EDIFICIO = CD_EDIFICIO_D AND
    GAMI_CD_EDIFICIO = GADM_CD_EDIFICIO AND
    GAMI_CD_GASTO = GADM_CD_GASTO AND
    CD_DEPARTAMENTO_D = '$NU_DEPTO' AND
    GADM_FE_GASTO = '2020-07-30'";
?>

                       <h2>   CONSERJE </h2>

<div tabla1>

<table border="2" >
   <tr>
        <td>    Cod. Gasto   </td>
        <td>    Desc. Gasto       </td>
        <td>    Mto. Gasto       </td>
        <td>    Mto. Recibo     </td>
     
      </tr>
          <?php  
      
           $gastos_total = 0;
           $total_pagar = 0;
           $resultado1 = mysqli_query($connec,$SQL_READ1);
           while($row = mysqli_fetch_array($resultado1))
           { ?>

     
        <tr>
        
                <td>  <?= $row['CD_GASTO1'] ?> </td>    
                <td>  <?= $row['DESC_GASTO1'] ?> </td> 
                <td>  <?= number_format($row['MT_GASTO1'],2,",",".") ?> </td> 
                <td>  <?= number_format($row['MT_RECIBO1'],2,",",".") ?> </td> 
          
        </tr>
                 
          <?php    
                $gastos_total +=  $row['MT_GASTO1'];
                $total_pagar  +=  $row['MT_RECIBO1'];
         } ?>
</table> 
</div>

<div tabla2>
                                <h2>   GASTOS </h2>
<table border="2" >
   
      <tr>
        <td>    Cod. Gasto   </td>
        <td>    Desc. Gasto       </td>
        <td>    Mto. Gasto       </td>
        <td>    Mto. Recibo     </td>
      </tr>
          
          <?php  
      
           $resultado2 = mysqli_query($connec,$SQL_READ2);
         
           while($row = mysqli_fetch_array($resultado2))
           { ?>
      
        <tr>
                <td>  <?= $row['CD_GASTO2'] ?> </td>    
                <td>  <?= $row['DESC_GASTO2'] ?> </td> 
                <td>  <?= number_format($row['MT_GASTO2'],2,",",".") ?> </td> 
                <td>  <?= number_format($row['MT_RECIBO2'],2,",",".") ?> </td> 
               
             
       </tr>
      
       <?php   $gastos_total +=  $row['MT_GASTO2'];
                $total_pagar  +=  $row['MT_RECIBO2'];
    } ?>
   
</table> 
</div>


</table> 
  </div>


  <div tabla3>
            <h2>   ADMINISTRACION </h2>
     <table border="2" >

        <tr>
            <td>    Cod. Gasto   </td>
            <td>    Desc. Gasto  </td>
            <td>    Mto. Gasto   </td>
            <td>    Mto. Recibo  </td>
       </tr>
            <?php  
                 
            $resultado3 = mysqli_query($connec,$SQL_READ3);
             while($row = mysqli_fetch_array($resultado3))
             { ?>
      
           <tr>
                  <td>  <?= $row['CD_GASTO3'] ?> </td>    
                  <td>  <?= $row['DESC_GASTO3'] ?> </td> 
                  <td>  <?= number_format($row['MT_GASTO3'],2,",",".") ?> </td> 
                  <td>  <?= number_format($row['MT_RECIBO3'],2,",",".") ?> </td> 
           </tr>
        
         <?php  $gastos_total +=  $row['MT_GASTO3'];
                 $total_pagar  +=  $row['MT_RECIBO3'];
      } ?>
  </table> 
  </div>


<h2>   Total a Pagar : 


<?php 
   
     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  
     echo  number_format($gastos_total,2,",","."); 
     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  
     echo number_format($total_pagar,2,",",".");
         
 ?>
</h2>

<a href="login.html" class="boton"> Salir</a>


  
 </body>
 </html>