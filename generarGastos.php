<?php  
	include 'includes/nav.php'; 
	include 'includes/header.html';
    require "funciones/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<title>Generar Gastos</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <body>
<br>

 
<div  id="formulario">
                      
    <center>     <h1>Generar Gastos</h1>    </center> 
    <br> <br>
    

    <center>
        
    <form action="incluirGastos.php" method="POST"  autocomplete="off" >
        <label>Mes  <input type="text" name=mes size="2" required >  </label> 
        <label>Año  <input type="text" name=year size="4" required >  </label>
    
        <br >   <br >
        <input name="Submit" type="submit" value="Incluir"  class="btn btn-outline-secondary">
     </form>
   
</center>

      
</div>
   
</body>
</html>