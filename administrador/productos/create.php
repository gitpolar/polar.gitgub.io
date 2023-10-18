<?php
    include ('/php/conexion.php');

    $id = "";
    $idcategoria = "";
    $nombre = "";
    $descripcion = "";
    $precio = "";
    $imagen = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $idcategoria = $_POST["idcate"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));

        do {
            if (empty($id) || empty($idcategoria) || empty($nombre) || empty($descripcion) || empty($precio) || empty($imagen)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "INSERT INTO productos (id, idcategoria, nombre, descripcion, precio, imagen)" . 
                   "VALUES ('$id', '$idcategoria', '$nombre', '$descripcion', '$precio', '$imagen')";
            $result = $conexion->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conexion->$error;
                break;
            }

            $id = "";
            $idcategoria = "";
            $nombre = "";
            $descripcion = "";
            $precio = "";
            $imagen = "";

            $successMessage = "Producto agregado correctamente";

            header("location: /administrador/productos/inicio.php");
            exit;

            } while (false);
        }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/img/extras/1logo.png">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <title>Añadir un producto</title>
</head>

<body>
    <div class="container my-5">
        <h2 class="mb-5">Agregar producto</h2>

        <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
        ?>

        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Categoría</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="idcate" value="<?php echo $idcategoria; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Precio</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="precio" value="<?php echo $precio; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Imagen</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="imagen" value="<?php echo $imagen; ?>">
                </div>
            </div>

            <?php
                if (!empty($successMessage)) {
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success añert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/administrador/productos/inicio.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

<script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
