<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "polar";

    //crear conexion
    $conexion = new mysqli($servername, $username, $password, $database);

    //chekar conexion
    if ($conexion->connect_error) {
        die("connectio failed: " . $conexion->connect_error);
    }
?>