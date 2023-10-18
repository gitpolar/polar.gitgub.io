<?php
    include ("/php/conexion.php");

    $id = "";
    $name = "";
    $password = "";
    $email = "";
    $phone = "";
    $rol = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del usuario

        if (!isset($_GET["id"])) {
            header("location: /administrador/usuarios/inicio.php");
            exit;
        }

        $id = $_GET["id"];

        // Leer la fila del cliente seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM usuarios WHERE idUsuario=$id";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: /administrador/usuarios/inicio.php");
            exit;
        }

        $name = $row["nomUsuario"];
        $password = $row["passUsuario"];
        $email = $row["emailUsuario"];
        $phone = $row["telUsuario"];
        $rol = $row["rolsuario"];
    }
    else {
        // Método POST: Actualizar los datos del usuario

        $id = $_POST["id"];
        $name = $_POST["name"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $rol = $_POST["rol"];

        do {
            if (empty($id) || empty($name) || empty($password) || empty($email) || empty($phone) || empty($rol)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE usuarios " . 
                   "SET nomUsuario = '$name', passUsuario = '$password', emailUsuario = '$email', telUsuario = '$phone', rolsuario = '$rol'" . 
                   "WHERE idUsuario = $id";

            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conexion->$error;
                break;
            }

            $successMessage = "Usuario actualizado correctamente";

            header("location: /administrador/usuarios/inicio.php");
            exit;

        } while (true);
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
    <title>Editar un usuario</title>
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-5">Editar usuario</h2>

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

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Telefono</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Rol</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="rol" value="<?php echo $rol; ?>">
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
                    <a class="btn btn-outline-primary" href="/administrador/usuarios/inicio.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

<script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
