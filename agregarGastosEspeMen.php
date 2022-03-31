
<?php  
    require 'funciones/conexion.php';
	include 'includes/header.html';
    include 'includes/nav.php';  
    require 'funciones/gastosEspecialesMen.php';
    $resultado = agregarEspeMen();
    $GAEM_FE_GASTO   = $_POST['GAEM_FE_GASTO'];
    $year1 = substr($GAEM_FE_GASTO,0,4);
    $mes1  = substr($GAEM_FE_GASTO,5,2);

 ?>

<main class="container">
    <h1>Agregar Cuota Especial Mensual</h1>

<?php
    $clase = 'danger';
    $mensaje = 'No se pudo agregar la cuota especial';
    if( $resultado ){
        $clase = 'success';
        $mensaje = 'Cuota Especial agregado correctamente.';
?>
        <div class="alert alert-<?= $clase; ?> p-3">
            <?= $mensaje; ?>
            <br>
            <a href="mostrarGastos.php?mes=<?php echo $mes1;?>&year=<?php echo $year1;?>" class="btn btn-outline-secondary">
                Volver a Gastos
            </a>
        </div>
<?php
    }
?>
</main>


<?php  include 'includes/footer.php';?>
