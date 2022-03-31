
 <?php
    require 'funciones/conexion.php';
    require 'funciones/Recibos.php';

    $fecha    =  ($_POST['fecha']);

    echo 'Fecha ....',$fecha;
   
    $link = conectar();

    

   $recibos = ProcRecibos($fecha);

  $SQL_DELETE = "DELETE FROM RECIBOSMOV WHERE RECI_FE_RECIBO  = '.$fecha.';";  
  $queries = mysqli_query($link,$SQL_DELETE)  or die( mysqli_error($link) );

       while( $movrecibo = mysqli_fetch_assoc($recibos))
       {
            
        $SQL_CREATE = "INSERT INTO RECIBOSMOV
          ( RECI_CD_EDIFICIO,
            RECI_NU_TORRE,
            RECI_NU_DEPTO,
            RECI_FE_RECIBO,
            RECI_CD_GASTO, 
            RECI_MT_GASTO, 
            RECI_MT_RECIBO)
            VALUES ('1',
            '1',
            '$movrecibo[DEPTO]',
            '$fecha',
            '$movrecibo[CD_GASTO]',
            '$movrecibo[MT_GASTO]',
            '$movrecibo[MT_RECIBO]');";  
           
            $queries = mysqli_query($link,$SQL_CREATE)  or die(mysqli_error($link));
            echo 'Procesando Recibos....';
        }
      
        $clase = 'danger';
        $mensaje = 'No se pudo procesar.';
        if($SQL_CREATE){
            $clase = 'success';
            $mensaje = 'Proceso ejecutado corectamente.';
        }
        header("Location: formBuscaProc.php");
   ?>
        

