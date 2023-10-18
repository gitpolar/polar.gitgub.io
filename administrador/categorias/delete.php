<?php
  include ("/php/conexion.php");

  if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $sql = "DELETE FROM categorias  WHERE  idCategoria=$id ";
    $conexion->query($sql);

    }
      
    header("location: /administrador/categorias/inicio.php");
    exit;
?>
