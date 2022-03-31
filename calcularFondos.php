<?php  
    require "funciones/conexion.php";
    $link = conectar();

    $mes    =  $_GET['mes'];
    $year   =  $_GET['year'];
   

$SQL_CONT   = " SELECT * from gastos_admin_mensual
where   MONTH(GADM_FE_GASTO)  = '$mes'   AND YEAR(GADM_FE_GASTO) = '$year' AND
GADM_CD_EDIFICIO  = 1 AND 
GADM_CD_GASTO = 300;";
   

$SQL_GCONSE = "SELECT SUM(GACM_MT_GASTO) MONTO_CONSE from gastos_conserje_mensual
where   MONTH(GACM_FE_GASTO)  = '$mes'   AND YEAR(GACM_FE_GASTO) = '$year';";

$SQL_GENE = "SELECT sum(GAGM_MT_GASTO) MONTO_GENE,  GAGM_FE_GASTO from gastos_general_mensual
where   MONTH(GAGM_FE_GASTO)  = '$mes'   AND YEAR(GAGM_FE_GASTO) = '$year';";

$SQL_ADM = "SELECT GADM_MT_GASTO FROM gastos_admin_mensual
where  GADM_CD_EDIFICIO   = 1 AND
       GADM_CD_GASTO      = 301 AND
       MONTH(GADM_FE_GASTO)  = '$mes'   AND YEAR(GADM_FE_GASTO) = '$year';";


$SQL_EDIF = "SELECT PORC_ADM,PORC_PRESTACIONES,PORC_FONDO_R
               FROM edificio 
               WHERE CD_EDIFICIO = 1;";

if ($result =  mysqli_query($link,$SQL_CONT)) 
{

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);
     /* close result set */
    mysqli_free_result($result);

   
}

if($row_cnt == 0)
{
    $MTO_CONSE = 0;
        $conse = mysqli_query($link,$SQL_GCONSE)  or die( mysqli_error($link));
        $movconse = mysqli_fetch_assoc($conse);
        $MTO_CONSE = $movconse['MONTO_CONSE'];

        $MTO_GENE = 0;
        $gene = mysqli_query($link,$SQL_GENE)  or die( mysqli_error($link));
        $movgene = mysqli_fetch_assoc($gene);
        $MTO_GENE = $movgene['MONTO_GENE'];
        $FECHA    = $movgene['GAGM_FE_GASTO'];

            
     
        $edif = mysqli_query($link,$SQL_EDIF)  or die( mysqli_error($link));
        $movedif = mysqli_fetch_assoc($edif);
        $PORC_ADM   = $movedif['PORC_ADM'];
        $PORC_PRES  = $movedif['PORC_PRESTACIONES'];
        $PORC_FONDO = $movedif['PORC_FONDO_R'];

        $MTO_ADMCON = 0;
        $adm = mysqli_query($link,$SQL_ADM)  or die( mysqli_error($link));
        $movadm = mysqli_fetch_assoc($adm);
        $MTO_ADMCON = $movadm['GADM_MT_GASTO'];
           

        $MTO_GASTOS = $MTO_CONSE + $MTO_GENE;
        $MTO_ADM  = 0;

        $MTO_ADM = ($MTO_GASTOS * $PORC_ADM) / 100; 


        $MTO_ADMCON = 0;
        $adm = mysqli_query($link,$SQL_ADM)  or die( mysqli_error($link));
        $movadm = mysqli_fetch_assoc($adm);
        $MTO_ADMCON = $movadm['GADM_MT_GASTO'];
        
        $MONTO_TOTAL = $MTO_GASTOS + $MTO_ADM + $MTO_ADMCON;
        


        $link = conectar();
        $sql = "INSERT INTO gastos_admin_mensual
        (GADM_CD_EDIFICIO,
         GADM_CD_GASTO,
         GADM_MT_GASTO,
         GADM_FE_GASTO)
         VALUE 
          ('1',
            '300',
            '$MTO_ADM',
            '".$FECHA."')";
            $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link) );

         $MTO_FONDO_R = ($MONTO_TOTAL * $PORC_FONDO) / 100; 


       $link = conectar();
        $sql = "INSERT INTO gastos_admin_mensual
        (GADM_CD_EDIFICIO,
         GADM_CD_GASTO,
         GADM_MT_GASTO,
         GADM_FE_GASTO)
         VALUE 
          ('1',
            '302',
            '$MTO_FONDO_R',
            '".$FECHA."')";
            $resultado = mysqli_query( $link, $sql ) or die( mysqli_error($link));

        $MTO_PRESTACIONES  = ($MONTO_TOTAL * $PORC_PRES) / 100; 


        $link = conectar();
        $sql = "INSERT INTO gastos_admin_mensual
        (GADM_CD_EDIFICIO,
         GADM_CD_GASTO,
         GADM_MT_GASTO,
         GADM_FE_GASTO)
         VALUE 
          ('1',
            '303',
            '$MTO_PRESTACIONES',
            '".$FECHA."')";
            $resultado = mysqli_query($link, $sql) or die(mysqli_error($link));
          

}
  header("Location: mostrarGastos.php?mes=$mes&year=$year");
?>