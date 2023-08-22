<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Hospital CIMA</title>
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Hospital CIMA, Salud, Ambulacia privada" />
  <meta name="keywords" content="salud, citas, Citas en linea" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/medical-symbol.png" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/Inicio.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body>
  <?php
  session_start();
  ?>


  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8" />
    <title>Hospital CIMA</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Hospital CIMA, Salud, Ambulacia privada" />
    <meta name="keywords" content="salud, citas, Citas en linea" />
    <!-- Favicon -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/logo.png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/Inicio.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  </head>




  <body style="background-color: whitesmoke;">
    <!-- Header -->
    <header class="fixed-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#e3f2fd">
        <div class="container">
          <a href="#" class="logo"><img src="../img/logo2.jpg" style=" width:5rem; margin: 5px; padding: 5px;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbar-content">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">

                <a class="nav-link" aria-current="page" href="../index.html" style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;">
                  Trámites
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li>
                    <a class="dropdown-item" href="database/Registro.php" style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;">Registros</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="database/LoginColaboradores.php" style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;">Área Administrativa</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="database/LoginUsuarios.php" style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;">Login Usuarios</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../contacto.html" style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;">Contacto</a>


              </li>
              <li class="nav-item">

                <a class="nav-link active" aria-current="page" href="../index.html" style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;">Salir</a>

              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Content -->
    <div class="container-fluid">
      <main class="my-3">
        <section>
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../img/grupo_cima.jpg" class="d-block w-100" style="height: 600px" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Citas de inmediato con nuestro personal</h5>
                  <button type="button" id="ver-citas-btn" class="btn btn-warning">
                    Citas en línea
                  </button>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../img/cima_operaciones.jpg" class="d-block w-100" style="height: 600px" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5>La mejor atención médica privada</h5>
                  <button type="button" class="btn btn-warning">
                    Más información
                  </button>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../img/cima_instalaciones.jpg" class="d-block w-100" alt="..." style="height: 600px" />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Atención en minutos</h5>
                  <button type="button" id="ver-citas-btn" class="btn btn-warning">
                    Citas en línea
                  </button>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Siguiente</span>
            </button>
          </div>
        </section>

        <section>
          <div>
            <h2>Servicios</h2>
            <p>
              Aquí se presenta información sobre por qué el hospital debe ser
              elegido entre muchos otros.
            </p>
          </div>
        </section>

        <section>
          <div>
            <h2>Programa de Acción Social</h2>
            <p>
              Aquí se presenta información sobre por qué el hospital debe ser
              elegido entre muchos otros.
            </p>
          </div>
        </section>
      </main>
    </div>

    <!-- Footer -->
    <footer class="pt-4 pt-md-5 border-top" style="background-color: #45C4B0;">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-3">
            <img class="mb-2" src="../img/caduceo.png" />
          </div>
          <div class="col-6 col-md-3">
            <h5>Localización</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="../Sede.Belen.html">Belen</a></li>
              <li><a class="text-muted" href="../Sede-Escazu.html">Escazu</a></li>
              <li><a class="text-muted" href="../Sede-SanPedro.html">San Pedro</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <h5>Redes Sociales</h5>
            <ul class="list-unstyled text-small">
              <a class="text-muted" href="#"><img class="mb-2" src="../img/instagram.png" alt="instagram" /></a>
              <a class="text-muted" href="#"><img class="mb-2" src="../img/facebook.png" alt="facebook" /></a>
              <a class="text-muted" href="#"><img class="mb-2" src="../img/youtube.png" alt="youtube" /></a>
            </ul>
          </div>
          <div class="col-12 col-md-3">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Te gustaria trabajar con nosotros</a></li>

            </ul>
          </div>
        </div>
      </div>
    </footer>


    <!-- JavaScript -->
    <script src="js/modernizr-3.11.2.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="../js/Inicio.js"></script>
  </body>

  </html>