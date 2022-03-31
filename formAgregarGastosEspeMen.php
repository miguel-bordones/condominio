<?php  
    require 'funciones/conexion.php';
    require 'funciones/gastosEspecialesMen.php';
    $gastoespe =  listarEspeMenSolo();
    include 'includes/header.html';
    include 'includes/nav.php'; 
    
  ?>
    <main class="container">
        <h1>Agregar Cuotas Especial Mensual</h1>

        <div class="alert bg-light p-4 col-8 mx-auto border shadow-sm">

    
          <form action="agregarGastosEspeMen.php" method="post" enctype="multipart/form-data">
         
           <div class="form-group">
           <select class="form-control" name="GAES_CD_GASTO" id="GAES_CD_GASTO" required>
                        <option value="">Seleccione codigo</option>
<?php
                while( $espe = mysqli_fetch_assoc($gastoespe) ){
?>
                <option value="<?= $espe['GAES_CD_GASTO'] ?>"><?= $espe['GAES_CD_GASTO'].' '.$espe['GAES_DESC_GASTO'] ?></option>
<?php
                }
                
?>
               </select>
            </div>

           <div class="form-group">
                    <label for="GAEM_MT_GASTO">Monto de Cuota   </label>
                    <input type="number" name="GAEM_MT_GASTO"   step='0.01'
                           class="form-control" id="GAEM_MT_GASTO" required>
           </div>

           <div class="form-group">
                    <label for="GAEM_FE_GASTO">Fecha de Cuota</label>
                    <input type="date" name="GAEM_FE_GASTO"
                           class="form-control" id="GAEM_FE_GASTO" required>
           </div>

                        
               <button class="btn btn-dark mr-3">Agregar Cuota Especial Mensual</button>
                
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>

