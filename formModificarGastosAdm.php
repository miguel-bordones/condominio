<?php  
    require 'funciones/conexion.php';
    require 'funciones/gastosAdmin.php';
    $gasto = verGastosAdmPorID();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de Gastos Administrativo</h1>

        <div class="alert bg-light p-4 col-8 mx-auto border shadow-sm">

            <form action="modificarGastosAdm.php" method="post">
                <div class="form-group">
                    <label for="GAMI_DESC_GASTO">Descripcion Gasto</label>
                    <input type="text" name="GAMI_DESC_GASTO"
                           value="<?= $gasto['GAMI_DESC_GASTO'] ?>"
                           class="form-control" id="GAMI_DESC_GASTO" required>
                </div>
                <input type="hidden" name="GAMI_CD_GASTO" value="<?= $gasto['GAMI_CD_GASTO'] ?>">
                <button class="btn btn-dark mr-3">Modificar Gasto Administrativo</button>
                <a href="adminGastos.php" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?> 



 
