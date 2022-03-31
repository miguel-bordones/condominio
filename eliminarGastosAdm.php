  
<?php  

    require 'funciones/conexion.php';
    require 'funciones/gastosAdmin.php';
    $gasto = eliminarGastosAdm();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Eliminar Gastos Administrativo</h1>

<?php
  
        $clase = 'danger';
        $mensaje = 'No se pudo eliminar Gasto Administrtivo';
        if( $gasto ){
            $clase = 'success';
            $mensaje = 'Gasto Administrtivo eliminado correctamente.';
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