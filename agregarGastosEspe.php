
<?php  
    require 'funciones/conexion.php';
	include 'includes/header.html';
    include 'includes/nav.php';  
    require 'funciones/gastosEspe.php';
    $resultado = agregarGastosEspe();
     
 ?>

<main class="container">
    <h1>Agregar  Cuota Especial</h1>

<?php

   


    $clase = 'danger';
    $mensaje = 'No se pudo agregar la cuota especial';
    if( $resultado ){
        $clase = 'success';
        $mensaje = 'Cuota especial agregado correctamente.';
?>
        <div class="alert alert-<?= $clase; ?> p-3">
            <?= $mensaje; ?>
            <br>
            <a href="adminGastos.php" class="btn btn-outline-secondary">
                Volver a panel
            </a>
        </div>
<?php
    }
?>
</main>


<?php  include 'includes/footer.php';?>
