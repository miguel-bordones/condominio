<?php  
    require 'funciones/conexion.php';
    require 'funciones/gastosEspe.php';
    $gasto = verGastosEspePorID();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de Cuotas Especiales</h1>

        <div class="alert bg-light p-4 col-8 mx-auto border shadow-sm">

            <form action="modificarGastosEspeciales.php" method="post">
                <div class="form-group">
                    <label for="GAES_DESC_GASTO">Descripcion Gasto</label>
                    <input type="text" name="GAES_DESC_GASTO"
                           value="<?= $gasto['GAES_DESC_GASTO'] ?>"
                           class="form-control" id="GAES_DESC_GASTO" required>
                </div>
                <input type="hidden" name="GAES_CD_GASTO" value="<?= $gasto['GAES_CD_GASTO'] ?>">
                <button class="btn btn-dark mr-3">Modificar Cuota Especial</button>
                <a href="adminGastos.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?> 



 
