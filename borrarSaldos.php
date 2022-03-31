<?php  
	include 'includes/nav.php'; 
	include 'includes/header.html';
    require "funciones/conexion.php";
    require 'funciones/apartamentos.php';
?>
<!DOCTYPE html>
<html lang="en">
<title>Borrar Saldos</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 <body>
<br>

 
<div  id="formulario">
                      
    <center>     <h1>Borrar Saldos</h1>    </center> 
    <center>
        
    <form action="eliminarSaldos.php" method="POST"  autocomplete="off" >
        <label> Año  <input type="text" name=year size="4" required >  </label>
    
        <br >   <br >
        <input name="Submit" type="submit" value="Procesar"  class="btn btn-outline-secondary">
        &nbsp;&nbsp;
        <a href="menu.php" class="btn btn-outline-secondary">
            Salir
        </a>
     </form>
   
</center>
       

</div>
<script>
            Swal.fire({
                title: 'Advertencia',
                text: "Esta acción no se puede deshacer Solo Ejecutar para eliminar Saldos del año siguiente.",
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#999',
                confirmButtonText: 'Si, quiero eliminarlo',
                cancelButtonText: 'NO, no quiero eliminarlo'
            }).then((result) => {
                if (!result.value) {
                    //redirección a panel productos
                    window.location = 'menu.php';
                }
            })
        </script>
</body>
</html>