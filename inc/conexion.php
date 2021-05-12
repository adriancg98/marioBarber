<?php

    $mysqli = mysqli_connect("localhost", "localhost", "admin", "login");

    if (!$mysqli){
        echo "Conexión Fallida: ", mysqli_connect_error();
        exit();
    }

?>