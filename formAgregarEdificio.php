<
<?php  
	
	include 'includes/header.html';
    include 'includes/nav.php';  
 ?>

    <main class="container">
        <h1>Alta de Edificio</h1>

        <div class="alert bg-light p-4 col-8 mx-auto border shadow-sm">

            <form action="agregarEdificio.php" method="post">
               
               
                <div class="form-group">
                    <label for="CD_EDIFICIO">Edificio</label>
                    <input type="text" name="CD_EDIFICIO"
                           class="form-control" id="CD_EDIFICIO" required style="text-transform:uppercase">
                </div>

                <div class="form-group">
                    <label for="NOMBRE_EDIFICIO">Nombre Edificio</label>
                    <input type="text" name="NOMBRE_EDIFICIO"
                           class="form-control" id="NOMBRE_EDIFICIO" required style="text-transform:uppercase">
                </div>

                <div class="form-group">
                    <label for="DIRECCION_EDIFICIO">Direccion Edificio</label>
                    <input type="text" name="DIRECCION_EDIFICIO"
                           class="form-control" id="DIRECCION_EDIFICIO" required  style="text-transform:uppercase">
                </div>
                
                
                <div class="form-group">
                    <label for="CTA_BANCO">Cuenta Banco</label>
                    <input type="text" name="CTA_BANCO"
                           class="form-control" id="CTA_BANCO" required>
                </div>

                <div class="form-group">
                    <label for="NM_BANCO">Banco</label>
                    <input type="text" name="NM_BANCO"
                           class="form-control" id="NM_BANCO" required style="text-transform:uppercase">
                </div>

                <div class="form-group">
                    <label for=" RESP_BANCO">Responsable Bco.</label>
                    <input type="text" name="RESP_BANCO"
                           class="form-control" id="RESP_BANCO" required style="text-transform:uppercase">
                </div>

                <div class="form-group">
                    <label for=" CD_ID_RESPONSABLE">Ced. Responsable Bco.</label>
                    <input type="text" name=" CD_ID_RESPONSABLE"
                           class="form-control" id=" CD_ID_RESPONSABLE" required>
                </div>

                
                <div class="form-group">
                    <label for="PORC_ADM"> % Administracion</label>
                    <input type="text" name="PORC_ADM"
                           class="form-control" id="PORC_ADMA" required>
                </div>

                <div class="form-group">
                    <label for="PORC_PRESTACIONES"> % Prestaciones Sociales</label>
                    <input type="text" name="PORC_PRESTACIONES"
                           class="form-control" id="PORC_PRESTACIONES" required>
                </div>

                <div class="form-group">
                    <label for="PORC_FONDO_R"> % Fondo Reserva </label>
                    <input type="text" name="PORC_FONDO_R"
                           class="form-control" id="PORC_FONDO_R" required>
                </div>

               
                <button class="btn btn-dark mr-3">Agregar Edificio</button>
                <a href="admEdificio.php" class="btn btn-outline-secondary">
                    Volver a Home
                </a>
            </form>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>
