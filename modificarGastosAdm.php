  
<?php  

require 'funciones/conexion.php';
require 'funciones/gastosAdmin.php';
$gasto = modificarGastosAdm();
include 'includes/header.html';
include 'includes/nav.php';  
?>

<main class="container">
    <h1>Modificación de Gastos Administrativo</h1>

<?php
    $clase = 'danger';
    $mensaje = 'No se pudo modificar el Gasto Administrativo';
    if( $gasto ){
        $clase = 'success';
        $mensaje = 'Gasto Administrativo modificado correctamente.';
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