<?php
    include ("../../../polar/php/conexion.php");

    $id = "";
    $name = "";
    $password = "";
    $email = "";
    $phone = "";
    $rol = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

            $sql = "INSERT INTO usuarios (idUsuario, nomUsuario, passUsuario, emailUsuario, telUsuario, rolsuario)" . 
                   "VALUES ('$id', '$name', '$password', '$email', '$phone', '$rol')";
            $result = $conexion->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conexion->$error;
                break;
            }

            $id = "";
            $name = "";
            $password = "";
            $email = "";
            $phone = "";
            $rol = "";

            $successMessage = "Usuario agregado correctamente";

            header("location: /polar/administrador/usuarios/inicio.php");
            exit;

            } while (false);
        }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/polar/assets/img/extras/1logo.png">
    <link rel="stylesheet" href="/polar/assets/css/index.css">
    <link rel="stylesheet" href="/polar/assets/bootstrap/css/bootstrap.min.css">
    <title>Crear un usuario</title>
</head>

<body>
    <div class="container my-5">
        <h2 class="mb-5">Agregar nuevo Usuario</h2>

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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
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
                    <a class="btn btn-outline-primary" href="/polar/administrador/usuarios/inicio.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

<script src="/polar/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>