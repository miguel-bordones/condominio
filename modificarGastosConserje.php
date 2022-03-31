  
<?php  

require 'funciones/conexion.php';
require 'funciones/gastosConserje.php';
$gasto = modificarGastosConserje();
include 'includes/header.html';
include 'includes/nav.php';  
?>

<main class="container">
    <h1>Modificación de Gastos Conserje</h1>

<?php
    $clase = 'danger';
    $mensaje = 'No se pudo modificar el Gasto Conserje.';
    if( $gasto ){
        $clase = 'success';
        $mensaje = 'Gasto Conserje modificado correctamente.';
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