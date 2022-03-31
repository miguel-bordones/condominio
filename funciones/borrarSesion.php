<?php

    session_start();

    //borrar 1 variable
    unset($_SESSION['numero']);

    //borrar todas las variables de sesión
    session_unset();

    //eliminar la sesión
    session_destroy();
 ?>
