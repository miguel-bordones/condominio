<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Gastos</title>
</head>


<?php  

    require 'funciones/conexion.php';
    require 'funciones/gastosConserje.php';
    $gtosConserje = listarConserje();
    require 'funciones/gastosGenerales.php';
    $gtosGenerales = listarGtosGen();
    require 'funciones/gastosAdm.php';
    $gtosAdm = listarGtosAdm();
    require 'funciones/gastosParticulares.php';
    $gtosParticulares = listarGtosPar();
    require 'funciones/gastosEspe.php';
    $gtosEspeciales = listarGtosEspe();
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
                 <th colspan="2">
                 <a href="formAgregarGastosConserje.php" class="btn btn-dark">
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
                <td><?= $conserje['GCON_CD_GASTO'] ?></td>
                <td><?= $conserje['GCON_DESC_GASTO'] ?></td>
                <td>
                  <a href="formModificarGastosConserje.php?GCON_CD_GASTO=<?php echo $conserje['GCON_CD_GASTO'];?>" class="btn btn-outline-secondary">
                        Modificar
                    </a>
                </td>
                <td>
                 <a href="formEliminarGastosConserje.php?GCON_CD_GASTO=<?php echo $conserje['GCON_CD_GASTO'];?>" class="btn btn-outline-secondary">
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
                 <th colspan="2">
                 <a href="formAgregarGastosGeneral.php" class="btn btn-dark">
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
                    <a href="formModificarGastosGeneral.php?GAGE_CD_GASTO=<?php echo $generales['GAGE_CD_GASTO'];?>"  class="btn btn-outline-secondary">
                        Modificar
                    </a>
                </td>
                <td>
                    <a href="formEliminarGastosGeneral.php?GAGE_CD_GASTO=<?php echo $generales['GAGE_CD_GASTO'];?>" class="btn btn-outline-secondary">
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
             <th colspan="2">
                <a href="formAgregarGastosAdmin.php" class="btn btn-dark">
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
            <td><?= $adm['GAMI_CD_GASTO'] ?></td>
            <td><?= $adm['GAMI_DESC_GASTO'] ?></td>
            <td>
                <a href="formModificarGastosAdm.php?GAMI_CD_GASTO=<?php echo $adm['GAMI_CD_GASTO'];?>" class="btn btn-outline-secondary">
                    Modificar
                </a>
            </td>
            <td>
                <a href="formEliminarGastosAdm.php?GAMI_CD_GASTO=<?php echo $adm['GAMI_CD_GASTO'];?>" class="btn btn-outline-secondary">
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
             <th colspan="2">
                <a href="formAgregarGastosPart.php" class="btn btn-dark">
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
            <td><?= $par['GPAR_CD_GASTO'] ?></td>
            <td><?= $par['GPAR_DESC_GASTO'] ?></td>
            <td>
                <a href="formModificarGastosPart.php?GPAR_CD_GASTO=<?php echo $par['GPAR_CD_GASTO'];?>" class="btn btn-outline-secondary">
                    Modificar
                </a>
            </td>
            <td>
                <a href="formEliminarGastosPart.php?GPAR_CD_GASTO=<?php echo $par['GPAR_CD_GASTO'];?>" class="btn btn-outline-secondary">
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
    <h1>                    Cuotas Especiales</h1>

      <table class="table table-bordered table-stripped table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Cod. Gasto</th>
            <th>Descripción de Gasto</th>
             <th colspan="2">
                <a href="formAgregarGastosEspe.php" class="btn btn-dark">
                    Agregar
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
<?php
    while( $esp = mysqli_fetch_assoc($gtosEspeciales) ){
?>
        <tr>
            <td><?= $esp['GAES_CD_GASTO'] ?></td>
            <td><?= $esp['GAES_DESC_GASTO'] ?></td>
            <td>
                <a href="formModificarGastosEspe.php?GAES_CD_GASTO=<?php echo $esp['GAES_CD_GASTO'];?>" class="btn btn-outline-secondary">
                    Modificar
                </a>
            </td>
            <td>
                <a href="formEliminarGastosEspe.php?GAES_CD_GASTO=<?php echo $esp['GAES_CD_GASTO'];?>" class="btn btn-outline-secondary">
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