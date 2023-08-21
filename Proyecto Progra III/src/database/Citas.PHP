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
  <link rel="shortcut icon" href="../img/logo.png" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="css/LoginUsuarios.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>




  <body>
<!---Cabecera------------------->
<header class="fixed-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
        <a href="#" class="logo"><img src="../img/logo2.jpg"></a>
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
                <a class="nav-link" aria-current="page" href="./index.html"
               style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >Inicio</a
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
                  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;"  >
                  Trámites
                </a>
                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <li>
                    <a class="dropdown-item" href="database/Registro.php"  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >Registros</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="database/LoginColaboradores.php"  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >Área Administrativa</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="database/LoginUsuarios.php"  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >Login Usuarios</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active"
                  aria-current="page"
                  href="./contacto.html"
                  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >Contacto</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
<!-------Contenido---------------------->
<main>
    <section class="login-form">
      <div class="container-fluid main-container">
        <div class="d-flex align-items-center justify-content-center vh-100">
          <form class="container col-lg-4 col-md-6 col-sm-8 col-10">
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
                type="button"
                class="btn btn-primary"
                id="btn-register"
                onclick="redirigir()"
              >
                Registrarse
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
</main>

  <!-----Pie de pagina-------->
  <footer class="pt-4 pt-md-4 border-top">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-3">
            <img class="mb-2" src="../img/caduceo.png" alt="caduceo" />
          </div>
          <div class="col-6 col-md-3">
            <h5>Localización</h5>
            <ul class="list-unstyled text-small">
              <li > <a class="text-muted" href="./Sede.Belen.html" style="color: white; font-size: 20px;">Belen</a></li>
              <l><a class="text-muted" href="./Sede-Escazu.html"  style="color: white; font-size: 20px; ">Escazu</a></li>
              <li><a class="text-muted" href="./Sede-SanPedro.html" style="color: white; font-size: 20px;">San Pedro</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <h5>Redes Sociales</h5>
            <div  class="text-small">
              <i class="bi bi-instagram">Instagram</i>
              <i class="bi bi-facebook">Facebook</i>
              <i class="bi bi-youtube">Youtube</i>
            </div>
          </div>
          <div class="col-12 col-md-3">
            <h5>About</h5>
            <lu class="list-unstyled text-small">
              <li><a class="text-muted" href="#" style="color: white; font-size: 20px;"">Te gustaria trabajar con nosotros</a></li>
    
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
