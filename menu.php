<?php  
    include 'includes/config/config.php'; 
    require 'funciones/autenticacion.php';
	include 'includes/header.html';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Condominio Dunaflor</title>
        <meta name="Description" content="Descargar: Menú Css Limpio simple y adaptable a cualquier proyecto" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

	<header>
	<center>
      <div class=logo1>
        <figure>
            <img src="imagenes/LogoDunaF.png" >
		</figure>
      </div>
	  </center>
   </header>
   
    <body>
<ul id="nav">
	<li class="current"><a href="#">Home</a></li>
	<li><a href="#">Gastos</a>
		<ul>
			<li><a href="#">Mant. Gastos</a>
				<ul>
					<li><a href="adminGastos.php">Declarar Gastos</a></li>
					<li><a href="generarGastos.php">Incluir Gasto Mensuales</a></li>
			    </ul>
			</li>
		</ul>
	</li>
	<li><a href="#">Propietarios</a>
	<ul>
	        <li><a href="admDeptos.php">Departamentos</a></li>
			<li><a href="seleRecibo.php">Recibos/Cuotas</a></li>
	</ul>

	
	</li>	
    <li><a href="pagoMes.php">Administraciòn</a>
	   <ul>
			<li><a href="generarMovi.php">Procesar Recibos</a></li>
			<li><a href="pagoMes.php">Marcar Pagado</a></li>
			<li><a href="generarSaldos.php">Actualizar Saldos</a></li>
			<li><a href="generarCuota.php">Cuota Especial</a></li>
			<li><a href="borrarMovi.php">Borrar Movimientos</a></li>
			<li><a href="borrarSaldos.php">Borrar Saldos</a></li>
					
	   </ul>
	</li>
	<li><a href="#">Edificio</a>
	<ul>
	        <li><a href="admEdificio.php">Adm. Edificio</a></li>
			<li><a href="admAnticipo.php">Anticipos Fondos</a></li>
			<li><a href="admFondo.php">Actualizar Fondos</a></li>
	</ul>


    <li><a href="admUsuarios.php">Usuarios</a></li>
	<li><a href="formLoginDuna.php">Salir</a></li>
</ul>



</body>

<?php  include 'includes/footer.php';  ?>
</html>