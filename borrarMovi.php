<?php  
	include 'includes/nav.php'; 
	include 'includes/header.html';
    require "funciones/conexion.php";
    require 'funciones/apartamentos.php';
?>
<!DOCTYPE html>
<html lang="en">
<title>Borrar Movimientos Recibos</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 <body>
<br>

 
<div  id="formulario">
                      
    <center>     <h1>Eliminar Movimientos</h1>    </center> 
    <center>
    

                  
                    
    <form action="eliminarMov.php" method="POST"  autocomplete="off" >
        <label>Mes  <input type="text" name=mes size="2" required >  </label>  <label>Año  <input type="text" name=year size="4" required >  </label>
    
        <br >   <br >
        <input name="Submit" type="submit" value="Procesar"  class="btn btn-outline-secondary">
        &nbsp;&nbsp;
        <a href="menu.php" class="btn btn-outline-secondary">
            Volver a Panel   
        </a>
     </form>



   
</center>
       

</div>
<script>
            Swal.fire({
                title: 'Advertencia',
                text: "Esta acción no se puede deshacer.",
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