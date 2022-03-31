<?php  
	
     require "funciones/conexion.php";
     include 'includes/header.html';
 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" type="text/css" href="css/style.css" >
    <link rel="stylesheet" href="css/duna.css"> 
    

    <title>BuscarRecibo</title>

</head>
 
<div  id="logo1">
<center>
    <img src="imagenes/LogoDunaF.png">
  
 </center>
       
</header>

</div>
   
<body>

<div  id="formulario"></div>
     <center>     <h1> Consulta de Recibos</h1>    </center> 
  
    <?php
     $usuario = ($_GET['usuario']);
  
     $link = conectar();
     $SQL_USU = "SELECT CD_DEPARTAMENTO_D,NOMBRE_PROPIETARIO_D,ALICUOTA_D
     FROM departamento,usuarios
     WHERE USUARIO = '$usuario' AND
     CD_DEPARTAMENTO_D = DEPTO_U";
    ?>

<center>
            <tr>
                <h3>
                <th>Departamento  </th>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <th>Propietario   </th>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <th>Alicuota      </th>   </h3>
            </tr>
      
       

            <?php 

               $propietario = mysqli_query($link,$SQL_USU)  or die( mysqli_error($link) );
                $movusu = mysqli_fetch_assoc($propietario);
            ?>

            <h5>
            <tr>
                <td><?= $movusu['CD_DEPARTAMENTO_D']     ?></td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <td><?= $movusu['NOMBRE_PROPIETARIO_D']  ?></td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <td><?= $movusu['ALICUOTA_D']            ?></td>
            </tr>       </h5>
            <br>

  </center>     

    <center>
        
    <form action="mostrarRecibo.php?depto=<?php echo $movusu['CD_DEPARTAMENTO_D'];?>" method="POST"  autocomplete="off" >
        <label>Mes  <input type="text" name=mes size="2" maxlength="2" required >  </label>  <label>Año  <input type="text" name=year size="4" required >  </label>
    
        <br >   <br >
        <input name="Submit" type="submit" value="Buscar"  class="btn btn-outline-secondary">
        &nbsp;&nbsp;
        <a href="formLoginDuna.php" class="btn btn-outline-secondary">
            Salir
     </a>
     <br> <br>  <br>
     </form>


     <center>     <h1> Consulta de Cuotas Especiales</h1>    </center> 
         <br> <br>  
         <form action="mostrarCuota.php?depto=<?php echo $movusu['CD_DEPARTAMENTO_D'];?>" method="POST"  autocomplete="off" >
        <label>Mes  <input type="text" name=mes size="2" maxlength="2" required >  </label>  <label>Año  <input type="text" name=year size="4" required >  </label>
            <br >   <br >
        <input name="Submit" type="submit" value="Buscar"  class="btn btn-outline-secondary">
        &nbsp;&nbsp;
        <a href="formLoginDuna.php" class="btn btn-outline-secondary">
            Salir
     </a>
     <br> <br>  <br>
     </form>



   
</center>


</div>
   
</body>
</html>