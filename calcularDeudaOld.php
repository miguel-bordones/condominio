<?php  
    require "funciones/conexion.php";
     
    $mes     =  $_POST['mes'];
    $year    =  $_POST['year'];
    $depto   =  $_GET['depto'];

 $link = conectar();
    
          if($mes==1)
          {
            $SQL_READ = "SELECT IF(A_MT_ANO_ANTERIOR > 0,SA_MT_ANO_ANTERIOR,0))  DEUDA
              from saldo_propietarios
              WHERE SA_CD_EDIFICIO = 1 AND
              SA_NU_TORRE    = 1 AND
              SA_DEPTO       = '$depto' AND
              SA_ANO         = '$year';";
          }
           elseif($mes==2)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_ENERO   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO))DEUDA
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
            }
            elseif($mes==3)
            {
            $SQL_READ = "SELECT
            IF(SA_IND_FEBRERO   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO + SA_MT_FEBRERO)) DEUDA 
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
            }
           elseif($mes==4)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_MARZO   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO + SA_MT_FEBRERO + SA_MT_MARZO)) DEUDA 
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
            }
           elseif($mes==5)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_ABRIL   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO + SA_MT_FEBRERO + SA_MT_MARZO + SA_MT_ABRIL)) DEUDA 
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
            }
           elseif($mes==6)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_MAYO   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO + SA_MT_FEBRERO + SA_MT_MARZO + SA_MT_ABRIL + SA_MT_MAYO)) DEUDA 
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
            }
           elseif($mes==7)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_JUNIO   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO + SA_MT_FEBRERO + SA_MT_MARZO + SA_MT_ABRIL + SA_MT_MAYO + SA_MT_JUNIO)) DEUDA 
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
            }
           elseif($mes==8)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_JULIO   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO + SA_MT_FEBRERO + SA_MT_MARZO + SA_MT_ABRIL + SA_MT_MAYO + 
            SA_MT_JUNIO + SA_MT_JULIO)) DEUDA 
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
           }
           elseif($mes==9)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_AGOSTO   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO + SA_MT_FEBRERO + SA_MT_MARZO + SA_MT_ABRIL + SA_MT_MAYO + 
            SA_MT_JUNIO + SA_MT_JULIO + SA_MT_AGOSTO)) DEUDA 
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
           }
           elseif($mes==10)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_SEPTIEMBRE   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO + SA_MT_FEBRERO + SA_MT_MARZO + SA_MT_ABRIL + SA_MT_MAYO + 
            SA_MT_JUNIO + SA_MT_JULIO + SA_MT_AGOSTO + SA_MT_SEPTIEMBRE))    DEUDA 
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
           }
           elseif($mes==11)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_OCTUBRE   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO + SA_MT_FEBRERO + SA_MT_MARZO + SA_MT_ABRIL + SA_MT_MAYO + 
            SA_MT_JUNIO + SA_MT_JULIO + SA_MT_AGOSTO + SA_MT_SEPTIEMBRE + SA_MT_OCTUBRE)) DEUDA 
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
           }
           elseif($mes==12)
           {
            $SQL_READ = "SELECT
            IF(SA_IND_NOVIEMBRE   = 'S',0,
            (SA_MT_ANO_ANTERIOR + SA_MT_ENERO + SA_MT_FEBRERO + SA_MT_MARZO + SA_MT_ABRIL + SA_MT_MAYO + 
            SA_MT_JUNIO + SA_MT_JULIO + SA_MT_AGOSTO + SA_MT_SEPTIEMBRE + SA_MT_OCTUBRE + SA_MT_NOVIEMBRE)) DEUDA 
            from saldo_propietarios
            WHERE SA_CD_EDIFICIO = 1 AND
            SA_NU_TORRE    = 1 AND
            SA_DEPTO       = '$depto' AND
            SA_ANO         = '$year';";
            }
           
      
           $deuda = mysqli_query($link,$SQL_READ);
           $tdeuda = mysqli_fetch_assoc($deuda);
           $tot_deuda = $tdeuda['DEUDA'];
   

?>

