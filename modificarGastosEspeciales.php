  
<?php  

require 'funciones/conexion.php';
require 'funciones/gastosEspeciales.php';
$gasto = modificarGastosEspe();
include 'includes/header.html';
include 'includes/nav.php';  
?>

<main class="container">
    <h1>Modificación de Cuota Especial</h1>

<?php
    $clase = 'danger';
    $mensaje = 'No se pudo modificar la Cuota Especial';
    if( $gasto ){
        $clase = 'success';
        $mensaje = 'Cuota Especial modificado correctamente.';
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

<?php  include 'includes/footer.php';  ?>