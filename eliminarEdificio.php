  
<?php  

    require 'funciones/conexion.php';
    require 'funciones/edificio.php';
    $resultado = eliminarEdificio();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Eliminar Edificio</h1>

<?php
  
        $clase = 'danger';
        $mensaje = 'No se pudo eliminar Edificio';
        if( $resultado ){
            $clase = 'success';
            $mensaje = '  Edificio eliminado correctamente.';
?>
            <div class="alert alert-<?= $clase; ?> p-3">
                <?= $mensaje; ?>
                <br>
                <a href="admEdificio.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </div>
<?php
        }
?>
    </main>

<?php  include 'includes/footer.php';  ?>