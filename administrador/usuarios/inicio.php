<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/polar/assets/img/extras/1logo.png">
    <link rel="stylesheet" href="/polar/assets/css/index.css">
    <link rel="stylesheet" href="/polar/assets/bootstrap/css/bootstrap.min.css">
    <title>Usuarios</title>
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
        <h2 class="text-center">Lista de usuarios</h2>
        <div class="text-center">
            <a class="btn btn-success" href="/polar/administrador/usuarios/create.php" role="button">Nuevo usuario</a>
            <a class="btn btn-secondary" href="/polar/administrador/page.php" role="button">Regresar</a>
        </div>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Contraseña</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include ("../../../polar/php/conexion.php");

                        $sql = "SELECT * FROM usuarios";
                        $result = $conexion->query($sql);

                        if (!$result) {
                            die("Consulta inválida: " . $conexion->$error);
                        }

                        while($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>$row[idUsuario]</td>
                                <td>$row[nomUsuario]</td>
                                <td>$row[passUsuario]</td>
                                <td>$row[emailUsuario]</td>
                                <td>$row[telUsuario]</td>
                                <td>$row[rolsuario]</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='/polar/administrador/usuarios/edit.php?id=$row[idUsuario]'>Editar</a>
                                    <a class='btn btn-danger btn-sm' href='/polar/administrador/usuarios/delete.php?id=$row[idUsuario]'>Eliminar</a>
                                </td>
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="/polar/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>