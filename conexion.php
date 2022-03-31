<?php
const SERVER    = 'localhost';
const USUARIO   = 'id16086829_dunaflor';
const CLAVE     = ')-GLf$X%Bf&QoB4z'; 
const BASE      = 'id16086829_condominio';

function conectar()
{
    $link = mysqli_connect(
            SERVER,
            USUARIO,
            CLAVE,
            BASE);
    return $link;
}
  
?>