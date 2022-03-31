<?php  

    require 'funciones/conexion.php';
    require 'funciones/gastosGenerales.php';
    $gtosGenerales = listarGtosGen();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Administración de Gastos Generales</h1>

        <a href="menu.php" class="btn btn-outline-secondary mb-3">
            Volver a dashboard
        </a>

        <table class="table table-bordered table-stripped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Cod. Gasto</th>
                <th>Descripcion de Gasto</th>
                 <th colspan="2">
                    <a href="" class="btn btn-dark">
                        Agregar
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
<?php
        while( $generales = mysqli_fetch_assoc($gtosGenerales) ){
?>
            <tr>
                <td><?= $generales['GAGE_CD_GASTO'] ?></td>
                <td><?= $generales['GAGE_DESC_GASTO'] ?></td>
                <td>
                    <a href="" class="btn btn-outline-secondary">
                        Modificar
                    </a>
                </td>
                <td>
                    <a href="" class="btn btn-outline-secondary">
                        Eliminar
                    </a>
                </td>
            </tr>
<?php
        }
?>
            </tbody>
        </table>

        <a href="menu.php" class="btn btn-outline-secondary">
            Volver a dashboard
        </a>

    </main>

<?php  include 'includes/footer.php';  ?>