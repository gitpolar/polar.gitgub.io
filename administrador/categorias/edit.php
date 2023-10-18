<?php
    include ("../../../polar/php/conexion.php");

    $id = "";
    $name = "";

    $errorMessage = "";
    $successMessage = "";

    if ( $_SERVER['REQUEST_METHOD'] == 'GET'){ 

        if ( !isset($_GET["id"]) ){
            header("location: /polar/administrador/categorias/inicio.php");
            exit;
        }

        $id = $_GET["id"];

        $sql = "SELECT * FROM categorias WHERE idCategoria=$id";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: /polar/administrador/categorias/inicio.php");
            exit;
        }
        
        $name = $row["nomCategoria"];

    } else {

        $id = $_POST["id"];
        $name = $_POST["name"];

        do {
            if (empty($id) || empty($name)){
                $errorMessage = "Todos los campos son requeridos ";
                break;
            }

            $sql = "UPDATE categorias "  .
                   "SET nomCategoria = '$name' " .
                   "WHERE idCategoria = $id";

            $result = $conexion->query($sql);
            
            if (!$result){
                $errorMessage = "consulta invalida:" . $conexion->$error;
                break;
            }

            $successMessage = " categoria actualizada correctamente";

            header("location: /polar/administrador/categorias/inicio.php");
            exit;

        }  while (true);
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
    <title>Editar una categoria</title>
</head>
<body>
     <div class="container my-5">
        <h2>Editar categoria</h2>

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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row m-3">
                <label class="col-sm-3 col-form-label">ID</label>
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
                    <a  class="btn btn-outline-primary" href="/polar/administrador/categorias/inicio.php" role="button">Cancelar</a>
                </div>
            </div> 
        </form>
    </div>

<script src="/polar/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>