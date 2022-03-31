<?php  
    require 'funciones/conexion.php';
    require 'funciones/gastosPart.php';
    $gasto = verGastosPartPorID();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de Gastos Particulares</h1>

        <div class="alert bg-light p-4 col-8 mx-auto border shadow-sm">

            <form action="modificarGastosPart.php" method="post">
                <div class="form-group">
                    <label for="GPAR_DESC_GASTO">Descripcion Gasto</label>
                    <input type="text" name="GPAR_DESC_GASTO"
                           value="<?= $gasto['GPAR_DESC_GASTO'] ?>"
                           class="form-control" id="GPAR_DESC_GASTO" required>
                </div>
                <input type="hidden" name="GPAR_CD_GASTO" value="<?= $gasto['GPAR_CD_GASTO'] ?>">
                <button class="btn btn-dark mr-3">Modificar Gasto Particular</button>
                <a href="adminGastos.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?> 



 
