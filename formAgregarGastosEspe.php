<
<?php  
    require 'funciones/conexion.php';
    require 'funciones/gastosEspe.php';
    $gastos = listarGtosEspe();
    include 'includes/header.html';
    include 'includes/nav.php'; 
 ?>
    <main class="container">
        <h1>Agregar Cuotas Especiales</h1>

        <div class="alert bg-light p-4 col-8 mx-auto border shadow-sm">

          <form action="agregarGastosEspe.php" method="post" enctype="multipart/form-data">
                     
          <div class="form-group">
                    <label for="GAES_CD_GASTO">Codigo Gasto</label>
                    <input type="text" name="GAES_CD_GASTO"
                           class="form-control" id="GAES_CD_GASTO" required>
           </div>

           <div class="form-group">
                    <label for="GAES_DESC_GASTO">Descripción Cuotas Especiales</label>
                    <input type="text" name="GAES_DESC_GASTO"
                           class="form-control" id="GAES_DESC_GASTO" required>
           </div>

                <button class="btn btn-dark mr-3">Agregar Cuota Especial</button>
                <a href="AdminGastos.php" class="btn btn-outline-secondary">
                    Volver a Home
                </a>

            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>
