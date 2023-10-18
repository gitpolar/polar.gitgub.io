<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/validar.css">
    <link rel="shortcut icon" href="/assets/img/extras/1logo.png">
    <title>Inicio de sesión</title>
  </head>

  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <h3 class="login">Inicia sesión como administrador</h3>
          <br>
          <form action="/menu/login/verificar.php" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Usuario:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Escribe tu usuario" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Escribe tu contraseña" required>
            </div>
            <div class="m-4 text-center">
              <button type="submit" class="btn btn-primary">Iniciar sesión</button>
              <a class="btn btn-secondary" href="/php/index.php" role="button">Regresar</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
