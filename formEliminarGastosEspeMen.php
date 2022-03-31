<?php  
    require 'funciones/conexion.php';
    require 'funciones/gastosEspecialesMen.php';
    $gasto = verEspeMenPorID();
	include 'includes/header.html';
    include 'includes/nav.php';  
    $GAEM_FE_GASTO = $_GET['GAEM_FE_GASTO'];
    $year = substr($GAEM_FE_GASTO,0,4);
    $mes = substr($GAEM_FE_GASTO,5,2);
  
 ?>

    <main class="container">
        <h1>Eliminar Cuota Especial Mensual</h1>

        <div class="alert bg-light p-4 col-6 mx-auto border border-danger shadow-sm">
            <div class="row">
        
                <div class="col text-danger">
                    <h2> Codigo de Cuota: <?=  $gasto['GAEM_CD_GASTO']   ?></h2>
                         Desc. Cuota :    <?=  $gasto['GAES_DESC_GASTO'] ?><br>
                   

                    <form action="eliminarGastosEspeMen.php" method="post">
                        <input type="hidden" name="GAEM_CD_GASTO"
                               value="<?= $gasto['GAEM_CD_GASTO'] ?>">
                         <input type="hidden" name="GAEM_FE_GASTO"
                               value="<?= $gasto['GAEM_FE_GASTO'] ?>">
                         <input type="hidden" name="$year"
                               value="<?= year ?>">
                         <input type="hidden" name="$mes"
                               value="<?= mes ?>">
                        <button class="btn btn-danger btn-block my-2">
                            Confirmar Eliminar
                        </button>
                        <a href="mostrarGastos.php?mes=<?php echo $mes;?>&year=<?php echo $year;?>" class="btn btn-outline-secondary btn-block">
                        Volver a Gastos
                        </a>
                    </form>
                   
                </div>
            </div>
        </div>
  
        <script>
            Swal.fire({
                title: 'Advertencia',
                text: "Esta acción no se puede deshacer.",
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#999',
                confirmButtonText: 'Si, quiero eliminarlo',
                cancelButtonText: 'NO, no quiero eliminarlo'
            }).then((result) => {
                if (!result.value) {
                    //redirección a panel productos
                    window.location = 'mostrarGastos.php?mes=<?php echo $mes;?>&year=<?php echo $year;?>';
                }
            })
        </script>

    </main>

<?php  include 'includes/footer.php';  ?>