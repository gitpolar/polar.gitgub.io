<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/polar/assets/img/extras/1logo.png">
        <link rel="stylesheet" href="/polar/assets/css/index.css">
        <link rel="stylesheet" href="/polar/assets/css/administrador.css">
        <link rel="stylesheet" href="/polar/assets/bootstrap/css/bootstrap.min.css">
        <title>Administrador</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container">
                <a class="navbar-brand" href="/polar/administrador/page.php">
                    <img  src="/polar/assets/img/extras/1logo.png" alt="Logo" class="logo">
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
                            <a class="nav-link" href="/polar/php/index.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <script src="/polar/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>