<?php
include ("../../../polar/php/conexion.php");

$name = "";
$password = "";
$rolsuario = "";

// Recupera los datos del formulario
$name = $_POST['name'];
$password = $_POST['password'];

// Consulta SQL para verificar si el usuario es administrador (tipo = 1) o usuario (tipo = 2)
$sql = "SELECT * FROM usuarios WHERE nomUsuario='$name' AND passUsuario='$password' ";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['rolsuario'] == 1) {
        // Si el usuario es administrador, redirige a una página de administrador
        header("Location: /polar/administrador/page.php");
    } else {
        // Si el usuario es usuario normal, redirige a una página de usuario
        header("Location: /polar/index.php");
    }
} else {
    // Si no se encontró el usuario en la base de datos, redirige a una página de error o muestra un mensaje.
    echo "Usuario o contraseña incorrectos.";
}

// Cierra la conexión
$conexion->close();
?>