<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <link rel="stylesheet" href="estilos.css"> 
 
 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos</title>
</head>

<?php  

include "conectar.php";


$SQL_READ =  "select * from gastos_conserje";
$SQL_READ2 = "select * from gastos_general";
$SQL_READ3 = "select * from gastos_admin";
$SQL_READ4 = "select * from gastos_particulares";

?>
       <title>       Gastos </title>
  
       <header>
        <div class=logo1>
            <figure>
                <img src="imagenes/LogoDunaF.png" >
            </figure>
       </header>
       <?php 

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
   <body>
            <h1>  Control de Gastos </h1>
             

 <fieldset>
        <legend>Conserje</legend>               

<div tabla1>

<a href="add_conserje.html" class="boton" >Agregar Gastos Conserje  </a>

<table border="2" >
    <thead>
      <tr>
        <th>    Cod. Gasto   </th>
        <th>    Desc. Gasto   </th>
        <th>    Accion        </th>
      </tr>
   </thead> 

      <tbody>
          <?php  
          
           $resultado1 = mysqli_query($connec,$SQL_READ);
           while($row = mysqli_fetch_array($resultado1))
           { ?>
              <tr>
                 <td>  <?= $row['GCON_CD_GASTO'] ?> </td>    
                 <td>  <?= $row['GCON_DESC_GASTO'] ?> </td> 
                 <td>  <a href="elimi_conserje.php?cd_gasto=<?php echo $row['GCON_CD_GASTO'] ?> "  class="boton1">Eliminar  </a> </td>
                 
              </tr>
      <?php } ?>
       <tbody>         
   
</table> 

</div>
 </fieldset>
<br> <br> 
 <fieldset>
        <legend>Gastos Generales </legend>  


<div tabla2>
<a href="add_gastosgen.html" class="boton" >Agregar Gastos Generales  </a>

<table border="2" >
    <thead>
      <tr>
        <th>    Cod. Gasto   </th>
        <th>    Desc. Gasto   </th>
        <th>    Accion        </th>
      </tr>
   </thead> 

      <tbody>
          <?php  
          
           $resultado1 = mysqli_query($connec,$SQL_READ2);
           while($row = mysqli_fetch_array($resultado1))
           { ?>
              <tr>
                 <td>  <?= $row['GAGE_CD_GASTO'] ?> </td>    
                 <td>  <?= $row['GAGE_DESC_GASTO'] ?> </td> 
                 <td>  <a href="elimi_gastosgen.php?cd_gasto=<?php echo $row['GAGE_CD_GASTO'] ?>" class="boton1" >Eliminar  </a> </td>
               </tr>
      <?php } ?>
       <tbody>         
         
</table> 
</div>
</fieldset>
<br>  
<fieldset>
        <legend>Gastos Administrativos </legend>  

<div tabla3>
<a href="add_gastosadm.html" class="boton" >Agregar Gastos Admin.  </a>
<table border="2" >
    <thead>
      <tr>
        <th>    Cod. Gasto   </th>
        <th>    Desc. Gasto   </th>
        <th>    Accion        </th>
      </tr>
   </thead> 

      <tbody>
          <?php  
          
           $resultado1 = mysqli_query($connec,$SQL_READ3);
           while($row = mysqli_fetch_array($resultado1))
           { ?>
                 <tr>
                 <td>  <?= $row['GAMI_CD_GASTO'] ?> </td>    
                 <td>  <?= $row['GAMI_DESC_GASTO'] ?> </td> 
                 <td>  <a href="elimi_gastosadm.php?cd_gasto=<?php echo $row['GAMI_CD_GASTO'] ?>" class="boton1" >Eliminar  </a> </td>
                
                   
            </tr>
      <?php } ?>
       <tbody>         
         
</table> 
</div>
</fieldset>
<br>  
<fieldset>
        <legend>Gastos Particulares </legend>  
<div tabla4>
<a href="add_gastospart.html" class="boton" >Agregar Gastos Particulares  </a>

<table border="1" >
    <thead>
      <tr>
        <th>    Cod. Gasto   </th>
        <th>    Desc. Gasto   </th>
        <th>    Accion        </th>
      </tr>
   </thead> 

      <tbody>
          <?php  
          
           $resultado1 = mysqli_query($connec,$SQL_READ4);
           while($row = mysqli_fetch_array($resultado1))
           { ?>
                 <tr>
                 <td>  <?= $row['GPAR_CD_GASTO'] ?> </td>    
                 <td>  <?= $row['GPAR_DESC_GASTO'] ?> </td> 
                 <td>  <a href="elimi_gastospart.php?cd_gasto=<?php echo $row['GPAR_CD_GASTO'] ?>" class="boton1" >Eliminar  </a> </td>
                              
            </tr>
      <?php } ?>
       <tbody>         
 </table> 
</div>
<a href="menu_orig.html" class="boton"> Regresar</a>
 </fieldset>

 </body>
 </html>