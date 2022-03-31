<?php  
	
	include 'includes/header.html';
    include 'includes/nav.php';  
 ?>
    <main class="container">
        <h1>Incluir Anticipos</h1>

        <div class="alert bg-light p-4 col-8 mx-auto border shadow-sm">

            <form action="agregarAnticipos.php" method="post">
                       
                <div class="form-group">
                    <label for="SAED_MT_ADELANTO_PREST">Anticipo Prestaciones</label>
                    <input type="text" name="SAED_MT_ADELANTO_PREST"
                           class="form-control" id="SAED_MT_ADELANTO_PREST" required style="text-transform:uppercase">
                </div>

                <div class="form-group">
                    <label for="SAED_MT_ADELANTO_RESERVA">Anticipo Fondo Reserva</label>
                    <input type="text" name="SAED_MT_ADELANTO_RESERVA"
                           class="form-control" id="SAED_MT_ADELANTO_RESERVA" required style="text-transform:uppercase">
                </div>

                <div class="form-group">
                    <label for="SAED_FECHA_PROC">FEcha</label>
                    <input type="date" name="SAED_FECHA_PROC"
                           class="form-control" id="SAED_FECHA_PROC" required>
                </div>


                <button class="btn btn-dark mr-3">Agregar Anticipos</button>
                <a href="menu.php" class="btn btn-outline-secondary">
                    Volver a Home
                </a>
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>
