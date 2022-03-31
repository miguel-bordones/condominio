<?php  
    require 'funciones/conexion.php';
	include 'includes/header.html';
    include 'includes/nav.php';  
    require 'funciones/edificio.php';
    $edificio = verEdificio();

?>

    <main class="container">
        <h1>Modificar Fondos</h1>

         <div class="alert bg-light p-4 col-8 mx-auto border shadow-sm">
       
            <form action="modificarFondo.php" method="post">
                
                     <label for="MT_FONDO_RESERVA">Fondo Reserva</label>      
                     <input type="double" name="MT_FONDO_RESERVA"
                     value="<?= $edificio['MT_FONDO_RESERVA'] ?>"
                     class="form-control" id="MT_FONDO_RESERVA">
                     

                     <label for="MT_FONDO_PRESTACIONES_SOC">Prestaciones Sociales</label>      
                     <input type="double" name="MT_FONDO_PRESTACIONES_SOC"
                     value="<?=  $edificio['MT_FONDO_PRESTACIONES_SOC']?>"
                     class="form-control" id="MT_FONDO_PRESTACIONES_SOC">

                     <label for="ANTICIPO_FONDO">Anticipo Fondo Reserva</label>      
                     <input type="double" name="ANTICIPO_FONDO"
                     value="<?= $edificio['ANTICIPO_FONDO']?>"
                     class="form-control" id="ANTICIPO_FONDO">

                     <label for="ANTICIPO_PRESTACIONES">Anticipo Prestaciones Sociales</label>      
                     <input type="double" name="ANTICIPO_PRESTACIONES"
                     value="<?= $edificio['ANTICIPO_PRESTACIONES']?>"
                    class="form-control" id="ANTICIPO_PRESTACIONES">
                     

                </div>
                <input type="hidden" name="CD_EDIFICIO" value="'<?=  $edificio['CD_EDIFICIO']?>'">
                <button class="btn btn-dark mr-3">Modificar Fondo</button>
                <a href="admFondo.php" class="btn btn-outline-secondary">
                    Volver a  Fondo
                </a>
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>
