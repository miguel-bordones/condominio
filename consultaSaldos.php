<?php  
    require 'funciones/conexion.php';
    require 'funciones/edificio.php';
	include 'includes/header.html';
    include 'includes/nav.php'; 
    

$depto  =  ($_POST['depto']);
$year   =  ($_POST['year']);

    $SQL_SALDOS = "SELECT
    SA_MT_ANO_ANTERIOR MT_SALDO,
    SA_MT_ENERO MT_ENERO,
    SA_MT_FEBRERO MT_FEBRERO,
    SA_MT_MARZO MT_MARZO,
    SA_MT_ABRIL MT_ABRIL,
    SA_MT_JUNIO MT_JUNIO,
    SA_MT_JULIO MT_JULIO,
    SA_MT_AGOSTO MT_AGOSTO,
    SA_MT_SEPTIEMBRE MT_SEPTIEMBRE,
    SA_MT_OCTUBRE MT_OCTUBRE,
    SA_MT_NOVIEMBRE MT_NOVIEMBRE,
    SA_MT_DICIEMBRE MT_DICIEMBRE
    from saldo_propietarios
    WHERE SA_CD_EDIFICIO = 1 AND
    SA_NU_TORRE    = 1 AND
    SA_DEPTO       = '$depto' AND
    SA_ANO         = $year;";

?>

    <main class="container">
        <h1> Consulta Saldos</h1>

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
        $resultado = mysqli_query($link,$SQL_SALDOS) or die( mysqli_error($link));       
        while( $row = mysqli_fetch_assoc($resultado) ){
?>
            
   
                <tr>
                <?= number_format($row['MT_SALDO'],2,",",".") ?> <br>
                <?= number_format($row['MT_ENERO'],2,",",".") ?> <br>
                <?= number_format($row['MT_FEBRERO'],2,",",".") ?> <br>
                <?= number_format($row['MT_MARZO'],2,",",".") ?>
                
                
                </tr>







                <td>
                <a href="formModificarFondo.php?CD_EDIFICIO='<?php echo $row['CD_EDIFICIO'];?>'" class="btn btn-outline-secondary">
                        Modificar
                </a>
                </td>
            
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
