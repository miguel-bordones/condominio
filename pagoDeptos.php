<?php  

    require 'funciones/conexion.php';
    require 'funciones/apartamentos.php';
	include 'includes/header.html';
    include 'includes/nav.php'; 
    $yeare    =  ($_POST['year']);

    $SQL_READ = "SELECT
    SA_DEPTO,
    SA_ANO,
    SA_IND_ENERO,
    SA_IND_FEBRERO,
    SA_IND_MARZO,
    SA_IND_ABRIL,
    SA_IND_MAYO,
    SA_IND_JUNIO,
    SA_IND_JULIO,
    SA_IND_AGOSTO,
    SA_IND_SEPTIEMBRE,
    SA_IND_OCTUBRE,
    SA_IND_NOVIEMBRE,
    SA_IND_DICIEMBRE
    from SALDO_PROPIETARIOS
    WHERE SA_CD_EDIFICIO = 1 AND
    SA_NU_TORRE    = 1 AND
    SA_ANO = $yeare;";
 
?>

    <main class="container">

    <center>
        <h1>         Pagado  <?php     echo '               ',$yeare  ?>       </h1> 
        
     </center>
        

        <a href="menu.php" class="btn btn-outline-secondary mb-4">
            Volver a Home
        </a>

        <form action="actualizarPagos.php" method="post">
            <div class="form-group">

        <table class="table table-bordered table-stripped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Depto</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dec</th>
              
            </tr>
            </thead>
            <tbody>




<?php
        $link = conectar();       
        $resultado = mysqli_query($link,$SQL_READ) or die( mysqli_error($link));       
        while( $row = mysqli_fetch_assoc($resultado) ){
?>
            <tr>
                <td><?= $row['SA_DEPTO']?></td>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_ENERO']?>  "    name= "SA_IND_ENERO" />    </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_FEBRERO']?>"    name= "SA_IND_FEBRERO" />  </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_MARZO']?>"      name= "SA_IND_MARZO" />    </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_ABRIL']?>"      name= "SA_IND_ABRIL" />    </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_MAYO']?>"       name= "SA_IND_MAYO" />     </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_JUNIO']?>"      name= "SA_IND_JUNIO" />    </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_JULIO']?>"      name= "SA_IND_JULIO" />    </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_AGOSTO']?>"     name= "SA_IND_AGOSTO" />   </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_SEPTIEMBRE']?>" name= "SA_IND_SEPTIEMBRE"/> </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_OCTUBRE']?>"    name= "SA_IND_OCTUBRE" />   </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_NOVIEMBRE']?>"  name= "SA_IND_NOVIEMBRE"/>  </label>     </th>
                 <th>  <label><input type="checkbox" value = "<?= $row['SA_IND_DICIEMBRE']?>"  name= "SA_IND_DICIEMBRE" />  </label>     </th>
               </td>
                
            </tr>
            

<?php
  }

?>
        </tbody>
        </table>
        </div>

                 <input type="hidden" name="CD_DEPARTAMENTO_D" value="'<?= $row['SA_DEPTO']?>'">
                <button class="btn btn-dark mr-3">Actualizar Pago</button>
                <a href="pagoMes.php" class="btn btn-outline-secondary">
                    Volver a Pagos
                </a>
            </form>
         
 </main>
<?php  include 'includes/footer.php';  ?>
