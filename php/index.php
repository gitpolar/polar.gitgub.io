<?php 
    include ('/php/conexion.php');

    $ids = "1, 2, 3";
    $sql = $conexion->prepare("SELECT * FROM productos WHERE id IN ($ids)");
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
        <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
        <title>Heladería Polar</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container">
                <a class="navbar-brand" href="/polar/php/index.php">
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
            <div class="container mt-5">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/assets/img/extras/presentacion1.png" class="d-block w-100" alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/extras/presentacion2.jpg" class="d-block w-100" alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/extras/presentacion3.png" class="d-block w-100" alt="Imagen 3">
                        </div>
                    </div>
                    <!--Controles de navegación-->
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                    </a>
                </div>
            </div>

            <!--Mensaje de bienvenida-->
            <div class="mensaje1">
                <p class="t1">¡Los mejores productos te esperan!</p>
                <p>Disfruta de nuestra gran variedad de sabores y refrescantes helados.</p>
            </div>

            <!--Muestra de los helados más vendidos-->
            <div class="container">
                <div class="row">
                    <?php foreach($result as $row) { ?>
                        <div class="col-md-4">
                            <div class="card">
                                <?php
                                    $id = $row['id'];
                                    $imagen = "/assets/img/helados/" . $id . ".jpg";
                                ?>
                                <img src="<?php echo $imagen; ?>" class="card-img-top" alt="Helado de chocolate">
                                <div class="card-body">
                                <h3 class="card-title"><?php echo $row['nombre']; ?></h3>
                                <p class="card-text text-justify">
                                    <?php echo $row['descripcion']; ?>
                                </p>
                                <br>
                                <a href="/menu/categorias/helados.php" class="btn btn-primary d-flex justify-content-center align-items-center">
                                    LEER MÁS
                                </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            
            <!--Nuevos productos y sus mejores ofertas-->
            <div class="container-fluid bg-primary text-light mt-5">
                <div class="row">
                    <div class="col-md-12 text-center p-3">
                        <h2 class="titulo custom-texto">NUEVOS PRODUCTOS Y LAS MEJORES OFERTAS</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <div class="card">
                            <img src="/assets/img/helados/4.jpg" class="card-img-top" alt="Helado de limon">
                            <div class="card-body">
                                <h2 class="card-title title text-center text-dark">Helado de limón</h2>
                                <p class="card-text custom-texto1 text-center">$10.000</p>
                                <p class="custom-texto2 text-center">$5.000</p>
                                <a href="/menu/categorias/helados.php" class="btn btn-primary d-flex justify-content-center align-items-center">
                                    VER MÁS
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-5">
                        <div class="card">
                            <img src="/assets/img/postres/13.jpg" class="card-img-top" alt="Postre de 3 leches">
                            <div class="card-body">
                                <h2 class="card-title title text-center text-dark">Postre de 3 leches</h2>
                                <p class="card-text custom-texto1 text-center">$10.000</p>
                                <p class="pn custom-texto2 text-center">$5.000</p>
                                <a href="/menu/categorias/postres.php" class="btn btn-primary d-flex justify-content-center align-items-center">
                                    VER MÁS
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card">
                            <img src="/assets/img/postres/20.jpg" class="card-img-top" alt="Postre de fresa">
                            <div class="card-body">
                                <h2 class="card-title title text-center text-dark" id="text1">Postre de fresa</h2>
                                <p class="card-text custom-texto1 text-center">$15.000</p>
                                <p class="custom-texto2 text-center">$7.500</p>
                                <a href="/menu/categorias/postres.php" class="btn btn-primary d-flex justify-content-center align-items-center">
                                    VER MÁS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
