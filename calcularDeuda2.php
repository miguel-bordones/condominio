<?php  
    //require "funciones/conexion.php";
     
    $mes     =   $_GET['mes'];
    $year    =   $_GET['year'];
    $depto1   =  $_GET['dept'];

 $link = conectar();
    
          if($mes==1)
          {
            $SQL_READ = "SELECT IF(A_MT_ANO_ANTERIOR > 0,SA_MT_ANO_ANTERIOR,0))  DEUDA
              from saldo_propietarios
              WHERE SA_CD_EDIFICIO = 1 AND
              SA_NU_TORRE    = 1 AND
              SA_DEPTO       = '$depto1' AND
              SA_ANO         = '$year';";
          }
           elseif($mes==2)
           {
            $SQL_READ = "SELECT
           	IF(SA_IND_ENERO = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
            }
            elseif($mes==3)
            {
            $SQL_READ = "SELECT
           	IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
            IF(SA_IND_ENERO = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
            }
           elseif($mes==4)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_MARZO   = 'S',0,SA_MT_MARZO) +
		      	IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
            IF(SA_IND_ENERO = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
            }
           elseif($mes==5)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_ABRIL    = 'S',0,SA_MT_ABRIL) +
            IF(SA_IND_MARZO   = 'S',0,SA_MT_MARZO) +
		      	IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
            IF(SA_IND_ENERO = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
            }
           elseif($mes==6)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_MAYO    = 'S',0,SA_MT_MAYO) +
            IF(SA_IND_ABRIL    = 'S',0,SA_MT_ABRIL) +
            IF(SA_IND_MARZO   = 'S',0,SA_MT_MARZO) +
		      	IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
            IF(SA_IND_ENERO = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
            }
           elseif($mes==7)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_JUNIO    = 'S',0,SA_MT_JUNIO) +
            IF(SA_IND_MAYO     = 'S',0,SA_MT_MAYO) +
            IF(SA_IND_ABRIL    = 'S',0,SA_MT_ABRIL) +
            IF(SA_IND_MARZO    = 'S',0,SA_MT_MARZO) +
		      	IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
            IF(SA_IND_ENERO    = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
            }
           elseif($mes==8)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_JULIO    = 'S',0,SA_MT_JULIO) +
            IF(SA_IND_JUNIO    = 'S',0,SA_MT_JUNIO) +
            IF(SA_IND_MAYO     = 'S',0,SA_MT_MAYO) +
            IF(SA_IND_ABRIL    = 'S',0,SA_MT_ABRIL) +
            IF(SA_IND_MARZO    = 'S',0,SA_MT_MARZO) +
		      	IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
            IF(SA_IND_ENERO    = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
           }
           elseif($mes==9)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_AGOSTO   = 'S',0,SA_MT_AGOSTO) +
            IF(SA_IND_JULIO    = 'S',0,SA_MT_JULIO) +
            IF(SA_IND_JUNIO    = 'S',0,SA_MT_JUNIO) +
            IF(SA_IND_MAYO     = 'S',0,SA_MT_MAYO) +
            IF(SA_IND_ABRIL    = 'S',0,SA_MT_ABRIL) +
            IF(SA_IND_MARZO    = 'S',0,SA_MT_MARZO) +
		      	IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
            IF(SA_IND_ENERO    = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
           }
           elseif($mes==10)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_SEPTIEMBRE   = 'S',0,SA_MT_SEPTIEMBRE) +
            IF(SA_IND_AGOSTO   = 'S',0,SA_MT_AGOSTO) +
            IF(SA_IND_JULIO    = 'S',0,SA_MT_JULIO) +
            IF(SA_IND_JUNIO    = 'S',0,SA_MT_JUNIO) +
            IF(SA_IND_MAYO     = 'S',0,SA_MT_MAYO) +
            IF(SA_IND_ABRIL    = 'S',0,SA_MT_ABRIL) +
            IF(SA_IND_MARZO    = 'S',0,SA_MT_MARZO) +
		      	IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
            IF(SA_IND_ENERO    = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
           }
           elseif($mes==11)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_OCTUBRE   = 'S',0,SA_MT_OCTUBRE) +
            IF(SA_IND_SEPTIEMBRE   = 'S',0,SA_MT_SEPTIEMBRE) +
            IF(SA_IND_AGOSTO   = 'S',0,SA_MT_AGOSTO) +
            IF(SA_IND_JULIO    = 'S',0,SA_MT_JULIO) +
            IF(SA_IND_JUNIO    = 'S',0,SA_MT_JUNIO) +
            IF(SA_IND_MAYO     = 'S',0,SA_MT_MAYO) +
            IF(SA_IND_ABRIL    = 'S',0,SA_MT_ABRIL) +
            IF(SA_IND_MARZO    = 'S',0,SA_MT_MARZO) +
		      	IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
            IF(SA_IND_ENERO    = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
           }
           elseif($mes==12)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_NOVIEMBRE   = 'S',0,SA_MT_NOVIEMBRE) +
            IF(SA_IND_OCTUBRE   = 'S',0,SA_MT_OCTUBRE) +
            IF(SA_IND_SEPTIEMBRE   = 'S',0,SA_MT_SEPTIEMBRE) +
            IF(SA_IND_AGOSTO   = 'S',0,SA_MT_AGOSTO) +
            IF(SA_IND_JULIO    = 'S',0,SA_MT_JULIO) +
            IF(SA_IND_JUNIO    = 'S',0,SA_MT_JUNIO) +
            IF(SA_IND_MAYO     = 'S',0,SA_MT_MAYO) +
            IF(SA_IND_ABRIL    = 'S',0,SA_MT_ABRIL) +
            IF(SA_IND_MARZO    = 'S',0,SA_MT_MARZO) +
		      	IF(SA_IND_FEBRERO  = 'S',0,SA_MT_FEBRERO) +
            IF(SA_IND_ENERO    = 'S',0,SA_MT_ENERO) +	SA_MT_ANO_ANTERIOR DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto1' AND
            SA_ANO         = '$year';";
            }
           $deuda = mysqli_query($link,$SQL_READ);
           $tdeuda = mysqli_fetch_assoc($deuda);
           $tot_deuda = $tdeuda['DEUDA'];
 ?>