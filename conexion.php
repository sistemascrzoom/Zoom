<?php
$servername = "localhost";
$database = "crzoomco_demo";
$username = "crzoomco_demo";
$password = "Zoom2023*";
    $conexion = mysqli_connect($servername, $username, $password, $database);
    if (mysqli_connect_error()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }

    mysqli_select_db($conexion,$database) or die("No se encuentra la base de datos");

    mysqli_set_charset($conexion,"utf8");
?>
