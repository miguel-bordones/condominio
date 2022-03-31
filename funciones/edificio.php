<?php
   /* ########################
    #### EDIFICIO ####*/

    function verEdificio()
    {
      
       $EDIFICIO   =  $_GET['CD_EDIFICIO'];
        $link = conectar();
        $sql = "SELECT 
                CD_EDIFICIO,
                MT_FONDO_RESERVA,
                MT_FONDO_PRESTACIONES_SOC,
                CTA_BANCO,
                NM_BANCO,
                RESP_BANCO,
                CD_ID_RESPONSABLE,
                PORC_ADM,
                PORC_PRESTACIONES,
                PORC_FONDO_R,
                ANTICIPO_FONDO,
                ANTICIPO_PRESTACIONES
         FROM  edificio
         WHERE CD_EDIFICIO = ".$EDIFICIO;
              
         $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );
         $edificio  = mysqli_fetch_assoc($resultado);
        return $edificio;
    }
 
 
    function verEdificioPorID()
    {
        $EDIFICIO   =  $_GET['CD_EDIFICIO'];
     
        $link = conectar();
        $sql = "SELECT 
                   CD_EDIFICIO,
                   NOMBRE_EDIFICIO
                   FROM edificio 
                   WHERE CD_EDIFICIO = ".$EDIFICIO;
         $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );
         $edificio = mysqli_fetch_assoc($resultado);
        return  $edificio;

    }



    function modiEdificio()
    {
        $EDIFICIO                        = $_POST['CD_EDIFICIO'];
        $CD_ID_RESPONSABLE               = $_POST['CD_ID_RESPONSABLE'];
        $NM_BANCO                        = $_POST['NM_BANCO'];
        $RESP_BANCO                      = $_POST['RESP_BANCO'];
        $CTA_BANCO                       = $_POST['CTA_BANCO'];
        $PORC_ADM                        = $_POST['PORC_ADM'];
        $PORC_PRESTACIONES               = $_POST['PORC_PRESTACIONES'];
        $PORC_FONDO_R                    = $_POST['PORC_FONDO_R'];
             

        $link = conectar();
        $sql = "UPDATE   edificio
                SET CTA_BANCO                  = '".$CTA_BANCO."',
                    NM_BANCO                   = UPPER('".$NM_BANCO."'),
                    RESP_BANCO                 = UPPER('".$RESP_BANCO."'),
                    CD_ID_RESPONSABLE          = '".$CD_ID_RESPONSABLE."',        
                    PORC_ADM                   = '".$PORC_ADM."',
                    PORC_PRESTACIONES          = '".$PORC_PRESTACIONES."',
                    PORC_FONDO_R               = '".$PORC_FONDO_R."'
                    WHERE CD_EDIFICIO  = ".$EDIFICIO;
        $resultado = mysqli_query( $link, $sql )
                            or die( mysqli_error($link) );
        return $resultado;
    }
   
    function modiFondo()
    {
        $EDIFICIO                        = $_POST['CD_EDIFICIO'];
        $MT_FONDO_RESERVA                = $_POST['MT_FONDO_RESERVA'];
        $MT_FONDO_PRESTACIONES_SOC       = $_POST['MT_FONDO_PRESTACIONES_SOC'];
        $ANTICIPO_FONDO                  = $_POST['ANTICIPO_FONDO'];
        $ANTICIPO_PRESTACIONES           = $_POST['ANTICIPO_PRESTACIONES'];

         

        $link = conectar();
        $sql = "UPDATE   edificio
                SET 
                    MT_FONDO_PRESTACIONES_SOC  =  '".$MT_FONDO_PRESTACIONES_SOC."',
                    MT_FONDO_RESERVA           =  '".$MT_FONDO_RESERVA."',
                    ANTICIPO_FONDO             =  '".$ANTICIPO_FONDO."',
                    ANTICIPO_PRESTACIONES      =  '".$ANTICIPO_PRESTACIONES."',
                    MT_FONDO_RESERVA           = (MT_FONDO_RESERVA  - '".$ANTICIPO_FONDO."'),
                    MT_FONDO_PRESTACIONES_SOC  = (MT_FONDO_PRESTACIONES_SOC - '".$ANTICIPO_PRESTACIONES."')
                WHERE CD_EDIFICIO  = ".$EDIFICIO;
        $resultado = mysqli_query( $link, $sql )
                            or die( mysqli_error($link) );
        return $resultado;
    }
   

    function agregarAnticipos()
    {
        $SAED_MT_ADELANTO_PREST    = $_POST['SAED_MT_ADELANTO_PREST'];
        $SAED_MT_ADELANTO_RESERVA  = $_POST['SAED_MT_ADELANTO_RESERVA'];
        $SAED_FECHA_PROC           = $_POST['SAED_FECHA_PROC'];
        $link = conectar();
        $sql = "INSERT INTO saldos_edificio
                          (SAED_CD_EDIFICIO,    
                          SAED_MT_ADELANTO_PREST,  
                          SAED_MT_ADELANTO_RESERVA,  
                          SAED_FECHA_PROC)
                    VALUE 
                       ( '".$SAED_CD_EDIFICIO."'
                          '".$SAED_MT_ADELANTO_PREST."',
                          '".$SAED_MT_ADELANTO_RESERVA."',
                          '".$SAED_FECHA_PROC."')";
        $resultado = mysqli_query( $link, $sql )
                        or die( mysqli_error($link) );
        return $resultado;
    }
    
    function agregarEdificio()
    {
        $CD_EDIFICIO           = $_POST['CD_EDIFICIO'];
        $NOMBRE_EDIFICIO       = $_POST['NOMBRE_EDIFICIO'];
        $DIRECCION_EDIFICIO    = $_POST['DIRECCION_EDIFICIO'];
        $CTA_BANCO             = $_POST['CTA_BANCO'];
        $NM_BANCO              = $_POST['NM_BANCO'];
        $RESP_BANCO            = $_POST['RESP_BANCO'];
        $CD_ID_RESPONSABLE     = $_POST['CD_ID_RESPONSABLE'];
        $PORC_ADM              = $_POST['PORC_ADM'];
        $PORC_PRESTACIONES     = $_POST['PORC_PRESTACIONES'];
        $PORC_FONDO_R          = $_POST['PORC_FONDO_R'];


        $link = conectar();
        $sql = "INSERT INTO edificio
                          (CD_EDIFICIO,
                           NOMBRE_EDIFICIO,
                           DIRECCION_EDIFICIO,
                           CTA_BANCO, 
                           NM_BANCO,
                           RESP_BANCO,
                           CD_ID_RESPONSABLE, 
                           PORC_ADM, 
                           PORC_PRESTACIONES,
                           PORC_FONDO_R)
                    VALUE 
                        ('".$CD_EDIFICIO."',
                           UPPER('".$NOMBRE_EDIFICIO."'),
                           UPPER('".$DIRECCION_EDIFICIO."'),
                           '".$CTA_BANCO."',
                           '".$NM_BANCO."',
                           UPPER('".$RESP_BANCO."'),
                           '".$CD_ID_RESPONSABLE."',
                           '".$PORC_ADM."',
                           '".$PORC_PRESTACIONES."',
                           '".$PORC_FONDO_R."')";
        $resultado = mysqli_query( $link, $sql )
                        or die( mysqli_error($link) );
        return $resultado;
    }

    function eliminarEdificio()
    {
        $CD_EDIFICIO       = $_POST['CD_EDIFICIO'];
        $link = conectar();
        $sql = "DELETE FROM   edificio
                 WHERE CD_EDIFICIO = ".$CD_EDIFICIO;
        $resultado = mysqli_query($link,$sql)  or die(mysqli_error($link) );
        return $resultado;
    }


?>
