<?php  
    require 'funciones/conexion.php';
    require 'funciones/edificio.php';
	include 'includes/header.html';
    include 'includes/nav.php'; 
 
    $SQL_READ = "SELECT CD_EDIFICIO,
    MT_FONDO_RESERVA,
    MT_FONDO_PRESTACIONES_SOC, 
    ANTICIPO_FONDO,
    ANTICIPO_PRESTACIONES
    FROM edificio
    WHERE CD_EDIFICIO = 1;";

?>
      <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Adm Fondos   </title>
    </head>
    

    <main class="container">
        <h1> Administrar Fondos</h1>

        <a href="menu.php" class="btn btn-outline-secondary mb-3">
            Volver a Home
        </a>

        <table class="table table-bordered table-stripped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Fondo Reserva     </th>
                <th>Prestaciones Sociales </th>
                <th>Anticipo Fondo Reserva     </th>
                <th>Anticipo Prestaciones Sociales </th>
               
                             
            </tr>
            </thead>
            <tbody>
<?php
        $link = conectar();       
        $resultado = mysqli_query($link,$SQL_READ) or die( mysqli_error($link));       
        while( $row = mysqli_fetch_assoc($resultado) ){
?>
            <tr>
                 
                
                <td><?= number_format($row['MT_FONDO_RESERVA'],2,",",".") ?></td>
                <td><?= number_format($row['MT_FONDO_PRESTACIONES_SOC'],2,",",".") ?></td>
                <td><?= number_format($row['ANTICIPO_FONDO'],2,",",".") ?></td>
                <td><?= number_format($row['ANTICIPO_PRESTACIONES'],2,",",".") ?></td>


                <td>
                <a href="formModificarFondo.php?CD_EDIFICIO=<?php echo 1;?>" class="btn btn-outline-secondary">
                        Modificar
                </a>
                </td>
            </tr>
<?php
        }
?>
            </tbody>
        </table>

        <a href="menu.php" class="btn btn-outline-secondary">
            Volver a Home
        </a>

    </main>

<?php  include 'includes/footer.php';  ?>
