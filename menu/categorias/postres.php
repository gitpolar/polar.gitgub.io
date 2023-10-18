<?php 
    include ('/php/conexion.php');

    $sql = $conexion->prepare("SELECT * FROM productos WHERE idCategoria=2");
    $sql->execute();
    $result = $sql->get_result();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            // Tu lógica para procesar cada fila de resultados
            $nombre = $row["nombre"];
            $descripcion = $row["descripcion"];
            $precio = $row["precio"];

            // Resto de tu código para mostrar los resultados en las tarjetas
        }
    } else {
        echo "No se obtuvieron resultados.";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/assets/img/extras/1logo.png">
    <link rel="stylesheet" href="/assets/css/index.css">
    <title>Heladería Polar - Postres</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
        <a class="navbar-brand" href="/php/index.php">
            <img src="/assets/img/extras/1logo.png" alt="Logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="categoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menú
                </a>
                <ul class="dropdown-menu" aria-labelledby="categoDropdown">
                    <li><a class="dropdown-item" href="/menu/categorias/helados.php">Helados</a></li>
                    <li><a class="dropdown-item" href="/menu/categorias/postres.php">Postres</a></li>
                    <li><a class="dropdown-item" href="/menu/categorias/malteadas.php">Malteadas</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/menu/nosotros/">Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/menu/login/validar.php">Iniciar Sesión</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <section>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-2">
            <div class="col-md-12 text-center">
                <h1 class="titulo custom-texto">Postres</h1>
            </div>
            <?php foreach($result as $row) { ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <?php

                            $id = $row['id'];
                            $imagen = "/assets/img/postres/" . $id . ".jpg";

                        ?>
                        <img src="<?php echo $imagen; ?>">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $row['nombre']; ?></h2>
                            <p class="card-title"><?php echo $row['descripcion']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a class="btn btn-primary">Precio: $<?php echo number_format($row['precio']); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>  

<script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
