<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

    include ("../../../polar/php/conexion.php");

    $sql = "DELETE FROM usuarios WHERE idUsuario=$id";
    $conexion->query($sql);
    }

    header("location: /polar/administrador/usuarios/inicio.php");
    exit;
?>