<?php
    include ("/php/conexion.php");

    $id = "";
    $idcategoria = "";
    $nombre = "";
    $descripcion = "";
    $precio = "";
    $imagen = "";

    $errorMessage = "";
    $succesMessage = "";

    if ( $_SERVER['REQUEST_METHOD'] == 'GET') { 
        
        if ( !isset($_GET["id"]) ) {
            header("location: /administrador/productos/inicio.php");
            exit;
        }

        $id = $_GET["id"];

        $sql = "SELECT * FROM productos WHERE id=$id";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: /administrador/productos/inicio.php");  
            exit;
        }
    }
    else {
        //actualizar los datos de los productos
        $id=$_GET["id"];
        $idcategoria = $_POST["idcate"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));

        do {
            if (empty($id) || empty($idcategoria) || empty($nombre) || empty($descripcion) || empty($precio) || empty($imagen))  {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql ="UPDATE productos SET idCategoria='$idcategoria', nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen' WHERE id='$id' ";

            $result = $conexion->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conexion->$error;
                break;
            }

            $succesMessage = "Producto actualizado correctamente";

            header("location: /administrador/productos/inicio.php");
            exit;

        } while (true);
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="shortcut icon" href="/assets/img/extras/1logo.png">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <title>Editar un producto</title>
</head>
<body>
    <div class="container my-5">
        <h2>Editar producto</h2>

        <?php
        if ( !empty($errorMessage) ) {
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Categoría</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="idcate" value="<?php echo $idcategoria; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">nombre</label>
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
                    <input type="text" class="form-control" name="precio" value="<?php echo $precio; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Imagen</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="imagen" value="<?php echo $imagen; ?>">
                </div>
            </div>

            <?php
            if ( !empty($succesMessage) ) {

            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <button class="btn btn-outline-primary" href="/administrador/productos/inicio.php" role="button">Cancelar</button>
                </div>  
            </div>
        </form>
    </div>

<script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
