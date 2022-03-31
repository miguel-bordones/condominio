<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MySQL</title>
</head>

<body>
<section>
<?php

/* <?php
if(isset($_SESSION["$buscar"]))
 {
	?>*/


$buscar=$_POST['buscar'];
echo "Su consulta: <em>".$buscar."</em><br>";


$conexion=mysqli_connect("localhost","root","","condominio") or die ("No se realizó la conexión al servidor");

$consulta=mysqli_query($conexion, "SELECT * FROM departamento  WHERE 
     CD_EDIFICIO_D = 1 AND
     NU_TORRE_D = 1  AND
	 NOMBRE_PROPIETARIO_D LIKE '%$buscar%';");
	
?>


<article style="width:60%;margin:0 auto;border:solid;padding:10px">
	<p>Cantidad de Resultados: 
	<?php
	$nros=mysqli_num_rows($consulta);
	echo $nros;
	?></p>
    
	<?php
   while($resultados=mysqli_fetch_array($consulta)) {

  	?>
    <p>
    <?php	
	echo $resultados['CD_DEPARTAMENTO_D']." ";
	echo $resultados['NOMBRE_PROPIETARIO_D']." ";
	echo $resultados['ALICUOTA_D']." ";
	?>
    </p>
    <hr />
    <?php
   }

mysqli_free_result($consulta);
mysqli_close($conexion);


?>


</article>
</section>

</body>
</html>