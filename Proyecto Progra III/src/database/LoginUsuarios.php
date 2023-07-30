<?php
include("ConexionBD.php");
$ObtenerBD = new ConectarBD();
$ObtenerConexion = $ObtenerBD->conex();
if (isset($_POST["Registrarse"])) {
  echo "<script> location.href='/Proyecto%20Progra%20III/src/database/Registro.php'; </script>";
} 
?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Hospital CIMA</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Hospital CIMA, Salud, Ambulacia privada"
    />
    <meta name="keywords" content="salud, citas, Citas en linea" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="/src/img/medical-symbol.png" />
    <!-- Stylesheets -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <link rel="stylesheet" href="css/LoginUsuarios.css" />
  <header class="fixed-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="index.html">CIMA</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbar-content"
          aria-controls="navbar-content"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-center"
          id="navbar-content"
        >
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html"
                >Inicio</a
              >
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle active"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Trámites
              </a>
              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <li>
                  <a class="dropdown-item" href="Registro.html">Registros</a>
                </li>
                <li>
                  <a class="dropdown-item" href="SeccionUsuario.html"
                    >Área Administrativa</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="LoginUsarios.html"
                    >Login Usuarios</a
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                aria-current="page"
                href="contacto.html"
                >Contacto</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <body>
    <section class="login-form">
      <div class="container-fluid main-container">
        <div class="d-flex align-items-center justify-content-center vh-100">
          <form class="container col-lg-4 col-md-6 col-sm-8 col-10" method="POST">
            <h2 class="mb-4">Iniciar sesión</h2>
            <div class="form-group">
              <label for="username">Nombre de usuario</label>
              <input
                type="text"
                class="form-control"
                id="username"
                placeholder="Ingrese su nombre de usuario"
              />
            </div>
            <div class="form-group mt-3">
              <label for="password">Contraseña</label>
              <input
                type="password"
                class="form-control"
                id="password"
                placeholder="Ingrese su contraseña"
              />
            </div>
            <div class="buttons mt-4">
              <button type="submit" class="btn btn-primary me-2">
                Iniciar sesión
              </button>
              <button
                type="submit"
                class="btn btn-primary"
                name="Registrarse"
              >
                Registrarse
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <footer class="pt-4 pt-md-5 border-top">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-3">
            <img class="mb-2" src="img/health-and-care.png" alt="" />
          </div>
          <div class="col-6 col-md-3">
            <h5>Localización</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">San Ramón</a></li>
              <li><a class="text-muted" href="#">San Carlos</a></li>
              <li><a class="text-muted" href="#">Rohrmoser</a></li>
              <li><a class="text-muted" href="#">Jacó</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <h5>Redes Sociales</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Instagram</a></li>
              <li><a class="text-muted" href="#">Facebook</a></li>
              <li><a class="text-muted" href="#">Twitter</a></li>
              <li><a class="text-muted" href="#">Youtube</a></li>
            </ul>
          </div>
          <div class="col-12 col-md-3">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/modernizr-3.11.2.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="js/LoginUsuarios.js"></script>
  </body>
</html>
