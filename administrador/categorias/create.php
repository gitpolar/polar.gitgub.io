<?php
    include ("../../../polar/php/conexion.php");

    $id = "";
    $name = "";


    $errorMessage = "";
    $successMessage = "";

    if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST["id"];
        $name = $_POST["name"];

        do {
            if (empty($id) || empty($name)){
                $errorMessage = "Todos los campos son requeridos ";
                break;
            }
            // categoria nueva añadida ala base de datos 
            $sql = "INSERT INTO categorias ( idCategoria , nomCategoria ) " . "VALUES ('$id', '$name')";
            $result = $conexion->query($sql);

            if (!$result)  {
                $errorMessage = "Categoría inválida: " . $conexion->$error;
                break;
            }

            $id = "";
            $name ="";

            $successMessage = "Categoría añadida correctamente";

            header("location: /polar/administrador/categorias/inicio.php");
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
    <title>Crear una categoría</title>
</head>

<body>
     <div class="container my-5">
        <h2 class="mb-5">Agregar nueva Categoria</h2>

        <?php
           if (!empty($errorMessage) ) {
            echo"
             <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                 <strong>$errorMessage</strong>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'> </button>
              </div>
                ";
        }
        ?>


        <form method="post">
            <div class="row m-3">
                <label class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="id" value="<?php echo $id; ?>">

                </div>
            </div>
            <div class="row m-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="name" value="<?php echo $name; ?>">
                </div>
            </div>   
            

             <?php
             if (!empty($successMessage) ) {
                echo" 
            <div class='row mb-3'>  
                <div class='offset-sm-3 col-sm-6'>
                    <div class=' alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert aria-label='Close'> </button>
                    </div> 
                </div>
            </div>
               ";
             }
            ?>
         
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/polar/administrador/categorias/inicio.php" role="button">cancelar</a>
                </div>
            </div> 
        </form>
    </div>

<script src="/polar/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>