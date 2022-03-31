<?php  
	
	include 'includes/header.html';
    require "funciones/conexion.php";
    /*require 'funciones/autenticacion.php';*/
 
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuscarRecibo</title>

</head>
    <center>
        <figure>
            <img src="imagenes/LogoDunaF.png" >
        </figure>
   </center>



<body>
<br>

 
<div  id="formulario">

      <center>  
             <h1> Consulta de Recibos</h1> 
    
      </center> 
    <br> <br>

                      
    <center>
        
    <form action="consultaRecibo.php" method="POST"  autocomplete="off" >
        <label>
         Depto. 
            <input type="text" name=depto size="4" required style="text-transform:uppercase">
        </label> 
        <label>
          Mes  
            <input type="text" name=mes size="2" required >
        </label> 
        <label>
         Año  
         <input type="text" name=year size="4" required > 
        </label>
    
        <br >   <br >
        <input name="Submit" type="submit" value="Buscar"  class="btn btn-outline-secondary">
        &nbsp;&nbsp;
        <a href="menu.php" class="btn btn-outline-secondary">
           Volver a Home
        </a>
     </form>
   
</center>



<center>    
<br >   <br >
 <h1> Consulta de Cuotas Especiales</h1>    </center> 

 <center>   
         <br> <br>  
         <form action="mostrarCuota1.php" method="POST"  autocomplete="off" >
         <label>
         Depto. 
            <input type="text" name=depto size="4" required style="text-transform:uppercase">
        </label> 
        <label>Mes  <input type="text" name=mes size="2" maxlength="2" required > 
        
         </label>  <label>Año  <input type="text" name=year size="4" required >  </label>
            <br >   <br >
        <input name="Submit" type="submit" value="Buscar"  class="btn btn-outline-secondary">
        &nbsp;&nbsp;
        <a href="menu.php" class="btn btn-outline-secondary">
           Volver a Home
        </a>

     <br> <br> 
     </form>



   
</center>


</div>
   
</body>
</html>