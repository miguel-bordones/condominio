  
<?php  

    require 'funciones/conexion.php';
    require 'funciones/apartamentos.php';
    $resultado = elimiMov();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Eliminar Movimientos</h1>

<?php
  
        $clase = 'danger';
        $mensaje = 'No se pudo eliminar Movimientos';
        if( $resultado ){
            $clase = 'success';
            $mensaje = ' Movimientos eliminados correctamente.';
?>
            <div class="alert alert-<?= $clase; ?> p-3">
                <?= $mensaje; ?>
                <br>
                <a href="borrarMovi.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </div>
<?php
        }
?>



    </main>

<?php  include 'includes/footer.php';  ?>