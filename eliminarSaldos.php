  
<?php  
    require 'funciones/conexion.php';
   	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Borrar Saldos</h1>

<?php


    $year    =  $_POST['year'];
    
    $link = conectar();

     $sql = "DELETE from  saldo_propietarios
     WHERE 	SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE = 1 AND
            SA_ANO = '".$year."';";
           
       $resultado = mysqli_query($link,$sql)  or die(mysqli_error($link));
        
     
        $clase = 'danger';
        $mensaje = 'No se pudo eliminar Saldos';
        if( $resultado ){
            $clase = 'success';
            $mensaje = 'Saldos eliminados correctamente.';
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