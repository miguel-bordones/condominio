<?php  
    require 'funciones/conexion.php';
    require 'funciones/gastosEspeciales.php';
    $gasto = eliminarEspe();
	include 'includes/header.html';
    include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Eliminar Cuota Especial Mensual</h1>

<?php
        $clase = 'danger';
        $mensaje = 'No se pudo eliminar Cuota Especial ';
        if( $gasto ){
            $clase = 'success';
            $mensaje = 'Cuota Especial eliminado correctamente.';
?>
            <div class="alert alert-<?= $clase; ?> p-3">
                <?= $mensaje; ?>
                <br>
                <a href="adminGastos.php" class="btn btn-outline-secondary">
                    Volver a Gastos
                </a>
            </div>
<?php
        }
?>
    </main>

<?php  include 'includes/footer.php';  ?>

