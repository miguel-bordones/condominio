  
<?php  

require 'funciones/conexion.php';
require 'funciones/edificio.php';
$resultado = modiFondo();
include 'includes/header.html';
include 'includes/nav.php';  
?>

<main class="container">
    <h1>Modificación de Fondo</h1>

<?php
    $clase = 'danger';
    $mensaje = 'No se pudo modificar fondo';
    if( $resultado ){
        $clase = 'success';
        $mensaje = 'Fondo modificado correctamente.';
?>
        <div class="alert alert-<?= $clase; ?> p-3">
            <?= $mensaje; ?>
            <br>
            <a href="admFondo.php" class="btn btn-outline-secondary">
                Volver a Fondo
            </a>
        </div>
<?php
    }
?>
</main>

<?php  include 'includes/footer.php';  ?>