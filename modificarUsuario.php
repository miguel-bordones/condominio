  
<?php  

require 'funciones/conexion.php';
require 'funciones/usuarios.php';
$resultado = modificarUsuario();
include 'includes/header.html';
include 'includes/nav.php';  
?>

<main class="container">
    <h1>Modificación de Usuario</h1>

<?php
    $clase = 'danger';
    $mensaje = 'No se pudo modificar el usuario';
    if( $resultado ){
        $clase = 'success';
        $mensaje = 'Usuario modificado corectamente.';
?>
        <div class="alert alert-<?= $clase; ?> p-3">
            <?= $mensaje; ?>
            <br>
            <a href="admUsuarios.php" class="btn btn-outline-secondary">
                Volver a panel
            </a>
        </div>
<?php
    }
?>
</main>

<?php  include 'includes/footer.php';  ?>