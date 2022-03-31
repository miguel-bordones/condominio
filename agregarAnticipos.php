  
<?php  

    require 'funciones/conexion.php';
    require 'funciones/edificio.php';
    $resultado = agregarAnticipos();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Agregar de Anticipos</h1>

<?php
        $clase = 'danger';
        $mensaje = 'No se pudo agregar Anticipo';
        if( $resultado ){
            $clase = 'success';
            $mensaje = 'Anticipo agregado corectamente.';
?>
            <div class="alert alert-<?= $clase; ?> p-3">
                <?= $mensaje; ?>
                <br>
                <a href="admAnticipo.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </div>
<?php
        }
?>
    </main>

<?php  include 'includes/footer.php';  ?>