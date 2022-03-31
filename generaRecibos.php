  
<?php  
    require 'funciones/conexion.php';
    require 'funciones/apartamentos.php';
    $resultado = creaMovi();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Generar Recibos</h1>

<?php


        $clase = 'danger';
        $mensaje = 'No se pudo crear recibos';
        if( $resultado ){


            $clase = 'success';
            $mensaje = 'Recibos generados correctamente.';
?>
            <div class="alert alert-<?= $clase; ?> p-3">
                <?= $mensaje; ?>
                <br>
                <a href="menu.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </div>
<?php
        }
?>
    </main>

<?php  include 'includes/footer.php';  ?>