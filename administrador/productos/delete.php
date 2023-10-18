<?php
if  ( isset($_GET["id"])) {
    $id = $_GET["id"];

    include ("../../../polar/php/conexion.php"); 

    $sql = "DELETE FROM productos WHERE id =$id";
    $conexion->query($sql);
}

header("location: /polar/administrador/productos/inicio.php");
exit;
?>