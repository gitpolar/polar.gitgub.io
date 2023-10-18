<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/polar/assets/img/extras/1logo.png">
    <link rel="stylesheet" href="/polar/assets/css/index.css">
    <link rel="stylesheet" href="/polar/assets/bootstrap/css/bootstrap.min.css">
    <title>Categorías</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
            <a class="navbar-brand" href="/polar/administrador/page.php">
                <img src="/polar/assets/img/extras/1logo.png" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestión Polar
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                            <li><a class="dropdown-item" href="/polar/administrador/usuarios/inicio.php">Usuarios</a></li>
                            <li><a class="dropdown-item" href="/polar/administrador/categorias/inicio.php">Categorías</a></li>
                            <li><a class="dropdown-item" href="/polar/administrador/productos/inicio.php">Productos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/polar/index.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center">Lista de categorías</h2>
        <div class="text-center">
            <a class="btn btn-success"href="/polar/administrador/categorias/create.php" role="button">Nueva Categoría</a>
            <a class="btn btn-secondary" href="/polar/administrador/page.php" role="button">Regresar</a>
        </div>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include ("../../../polar/php/conexion.php");

                $sql = "SELECT * FROM categorias ";
                $result = $conexion->query($sql);

                if (!$result) {
                    die("Consulta inválida: " . $conexion->$error);
                }
                
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[idCategoria]</td>
                        <td>$row[nomCategoria]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/polar/administrador/categorias/edit.php?id=$row[idCategoria]'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='/polar/administrador/categorias/delete.php?id=$row[idCategoria]'>Eliminar</a>
                        </td>
                    </tr>
                    ";
                }
            ?>
            </tbody>
        </table>
    </div>
    
<script src="/polar/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>