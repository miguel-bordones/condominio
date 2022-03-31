<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Propietarios</title>
</head>

<?php  

    require 'funciones/conexion.php';
    require 'funciones/apartamentos.php';
	include 'includes/header.html';
    include 'includes/nav.php'; 

    $SQL_READ = "SELECT SAED_MT_ADELANTO_PREST,  
    SAED_MT_ADELANTO_RESERVA, 
    SAED_FECHA_PROC FROM saldos_edificio
    WHERE SAED_CD_EDIFICIO = 1;";
?>

 
    <main class="container">
        <h1> Anticipos de Fondos</h1>

        <a href="menu.php" class="btn btn-outline-secondary mb-3">
            Volver a Home
        </a>

        <table class="table table-bordered table-stripped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Anticipo de Prestaciones</th>
                <th>Anticipo de Fondo Reserva</th>
                <th> Fecha     </th>
                <th colspan="2">
                    <a href="formAgregarAnticipo.php" class="btn btn-dark">
                        Agregar
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
<?php
        $link = conectar();       
        $resultado = mysqli_query($link,$SQL_READ) or die( mysqli_error($link));       
        while( $row = mysqli_fetch_assoc($resultado) ){
?>
            <tr>
                <td><?= number_format($row['SAED_MT_ADELANTO_PREST'],2,",",".") ?></td>
                <td><?= number_format($row['SAED_MT_ADELANTO_RESERVA'],2,",",".") ?></td>
                <td><?= $row['SAED_FECHA_PROC'] ?></td>
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
</html>