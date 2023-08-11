<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Hospital CIMA, Salud, Ambulancia privada"
    />
    <meta name="keywords" content="salud, citas, Citas en línea" />
    <title>Hospital CIMA</title>
    <!-- Favicon -->
    <link rel="manifest" href="/site.webmanifest" />
    <link
      rel="shortcut icon"
      href="/css/img/medical-symbol.png"
      type="image/png"
    />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/Tablas.css" />
    <link rel="stylesheet" href="../css/Inicio.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>

  <body>

<?php
session_start();
?>


    <!-- Header -->
    <header class="fixed-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <a class="navbar-brand" href="Inicio.php">CIMA</a>
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
                <a class="nav-link active" aria-current="page" href="Inicio.php"
                  >Inicio</a
                >
              </li>
            </ul>
            
          </div>
          <div class="user-info">
            <p>Usuario: <?php echo $_SESSION["Identificacion"]; ?></p>
            </div>
              <div class="profile-picture">
                <img src="<?php echo $_SESSION["imagen"]; ?>" alt="Imagen de perfil" id="profile-img">
                <ul class="options-list" id="options-list">
                  <li><a class="dropdown-item" href="ActualizarUsuario.php">Actualizar Información de usuario</a></li>
                  <li><a class="dropdown-item" href="CambioContrasena.php">Cambiar Contraseña</a></li>
                  <li><a class="dropdown-item" href="ExpedienteDigital.php">Expediente Digital</a></li>
                  <li><a class="dropdown-item" href="CerrarSesion.php">Cerrar Sesion</a>
                </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <main class="my-4 container text-center">
      <section class="row justify-content-center">
        <h2>Expediente Digital</h2>
        <div class="col-md-6 col-lg-4">
          <div class="row">
            <div class="col">
            <h4 class="text-center mb-4">Bienvenido</h4>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container mt-5">
          <h4 class="text-center mb-4">Registro de Citas</h4>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Correo</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Sede</th>
                  <th>Doctor</th>
                  <th>Tipo de cita</th>
                  <th>Observaciones</th>

                </tr>
              </thead>
              <tbody>
                <tr></tr>
              </tbody>
            </table>
          </div>
          <div class="text-center">
            <button class="btn btn-primary" id="btnSalir">Salir</button>
          </div>
        </div>
      </section>
    </main>

    <!-- Pie de pagina -->
    <footer class="row pt-4 pt-5 border-top">
      <div class="col-12 col-md">
        <img class="mb-2" src="/css/img/health-and-care (4).png" alt="" />
      </div>
      <div class="col-6 col-md">
        <h5>Ubicación</h5>
        <ul class="menu list-unstyled text-small">
          <li><a class="text-muted" href="#">San Ramón</a></li>
          <li><a class="text-muted" href="#">San Carlos</a></li>
          <li><a class="text-muted" href="#">Rohrmoser</a></li>
          <li><a class="text-muted" href="#">Jacó</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Redes Sociales</h5>
        <ul class="menu list-unstyled text-small">
          <li><a class="text-muted" href="#">Instagram</a></li>
          <li><a class="text-muted" href="#">Facebook</a></li>
          <li><a class="text-muted" href="#">Twitter</a></li>
          <li><a class="text-muted" href="#">Youtube</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Acerca de</h5>
        <ul class="menu list-unstyled text-small">
          <li><a class="text-muted" href="#">Equipo</a></li>
          <li><a class="text-muted" href="#">Ubicaciones</a></li>
          <li><a class="text-muted" href="#">Privacidad</a></li>
          <li><a class="text-muted" href="#">Términos</a></li>
        </ul>
      </div>
    </footer>

    <!-- Scripts -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-o+RDsa0aH3Z5wWN6wZp0Lw1RpGBGOtbUROL2WrqBFXhUiv8Xqq5owB4MK6c5KUp"
      crossorigin="anonymous"
    ></script>
    <script src="../js/Expediente.js"></script>
  </body>
</html>
