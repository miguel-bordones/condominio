
<?php  
    require 'funciones/conexion.php';
	include 'includes/header.html';
    include 'includes/nav.php';  
    require 'funciones/gastosAdmin.php';
    $resultado = agregarGastosAdm();
 ?>

<main class="container">
    <h1>Agregar  de una nuevo gasto administrativo</h1>

<?php
    $clase = 'danger';
    $mensaje = 'No se pudo agregar el gasto administrativo';
    if( $resultado ){
        $clase = 'success';
        $mensaje = 'Gasto administrativo agregado correctamente.';
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
