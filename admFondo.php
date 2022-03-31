<?php  
    require 'funciones/conexion.php';
    require 'funciones/edificio.php';
	include 'includes/header.html';
    include 'includes/nav.php'; 
 
/*
    <td>
                <a href="formModificarFondo.php?CD_EDIFICIO=<?php echo 1;?>" class="btn btn-outline-secondary">
                        Modificar
                </a>
                </td>  */


    $SQL_READ = "SELECT SAED_MT_PRESTACIONES, 
    SAED_MT_RESERVA, 
    SAED_MT_ADELANTO_PREST,  
    SAED_MT_ADELANTO_RESERVA,
    SAED_FECHA_PROC
    FROM saldos_edificio
    WHERE SAED_CD_EDIFICIO = 1;";
    
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
                <th>Fecha Mov. </th>
                <th>Fondo Reserva     </th>
                <th>Prestaciones Soc. </th>
                <th>Anticipo Fondo Reserva     </th>
                <th>Anticipo Prest. Soc. </th>
                <th>Saldo Reserva    </th>
                <th>Saldo Prestaciones    </th>
            </tr>
            </thead>
            <tbody>
<?php
        $link = conectar();       
        $resultado = mysqli_query($link,$SQL_READ) or die( mysqli_error($link));       
        while( $row = mysqli_fetch_assoc($resultado) ){
?>
            <tr>
                 
                <td><?= $row['SAED_FECHA_PROC'] ?></td>
                <td><?= number_format($row['SAED_MT_RESERVA'],2,",",".") ?></td>
                <td><?= number_format($row['SAED_MT_PRESTACIONES'],2,",",".") ?></td>
                <td><?= number_format($row['SAED_MT_ADELANTO_RESERVA'],2,",",".") ?></td>
                <td><?= number_format($row['SAED_MT_ADELANTO_PREST'],2,",",".") ?></td>
                <td><?= number_format($row['SAED_MT_ADELANTO_PREST'],2,",",".") ?></td>
                <td><?= number_format($row['SAED_MT_ADELANTO_PREST'],2,",",".") ?></td>
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
