<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gastos Mensuales</title>
</head>


<?php  

    require 'funciones/conexion.php';
    require 'funciones/gastosConserjeMen.php';
    $gtosConserje = listarConserjeMen();
    require 'funciones/gastosGeneralesMen.php';
    $gtosGenerales = listarGtosGenMen();
    require 'funciones/gastosAdmMen.php';
    $gtosAdm = listarGtosAdmMen();
    require 'funciones/gastosParticularesMen.php';
    $gtosParticulares = listarGtosParMen();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>               Gastos Conserje</h1>

        <a href="menu.php" class="btn btn-outline-secondary mb-3">
            Volver a Home
        </a>

        <table class="table table-bordered table-stripped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Cod. Gasto</th>
                <th>Descripción de Gasto</th>
                <th>Monto</th>
                 <th colspan="2">
                    <a href="" class="btn btn-dark">
                        Agregar
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
<?php
        while( $conserje = mysqli_fetch_assoc($gtosConserje) ){
?>
            <tr>
                <td><?= $conserje['GACM_CD_GASTO'] ?></td>
                <td><?= $conserje['GCON_DESC_GASTO'] ?></td>
                <td><?= $conserje['GACM_MT_GASTO'] ?></td>
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

        

    </main>

    <main class="container">
        <h1>                    Gastos Generales</h1>

          <table class="table table-bordered table-stripped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Cod. Gasto</th>
                <th>Descripción de Gasto</th>
                <th>Monto</th>
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
                <td><?= $generales['GAGM_CD_GASTO'] ?></td>
                <td><?= $generales['GAGE_DESC_GASTO'] ?></td>
                <td><?= $generales['GAGM_MT_GASTO'] ?></td>
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

        </main>

<main class="container">
    <h1>                    Gastos Administrativos</h1>

      <table class="table table-bordered table-stripped table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Cod. Gasto</th>
            <th>Descripción de Gasto</th>
            <th>Monto</th>
             <th colspan="2">
                <a href="" class="btn btn-dark">
                    Agregar
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
<?php
    while( $adm = mysqli_fetch_assoc($gtosAdm) ){
?>
        <tr>
            <td><?= $adm['GADM_CD_GASTO'] ?></td>
            <td><?= $adm['GAMI_DESC_GASTO'] ?></td>
            <td><?= $adm['GADM_MT_GASTO'] ?></td>
            
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


    <main class="container">
    <h1>                    Gastos Particulares</h1>

      <table class="table table-bordered table-stripped table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Cod. Gasto</th>
            <th>Descripción de Gasto</th>
            <th>Monto</th>
             <th colspan="2">
                <a href="" class="btn btn-dark">
                    Agregar
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
<?php
    while( $par = mysqli_fetch_assoc($gtosParticulares) ){
?>
        <tr>
            <td><?= $par['GPAM_CD_GASTO'] ?></td>
            <td><?= $par['GPAR_DESC_GASTO'] ?></td>
            <td><?= $par['GAPM_MT_GASTO'] ?></td>
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
           Volver a Home
        </a>

    </main>
<?php  include 'includes/footer.php';  ?>
</html>