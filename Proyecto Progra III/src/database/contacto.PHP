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
    <link rel="shortcut icon" href="../img/medical-symbol.png" />
    <!-- Stylesheets -->

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>

  <body>

    <!--Cabecera  -->
    <header class="fixed-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <a class="navbar-brand" href="../index.html">CIMA</a>
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
              <a class="nav-link active" aria-current="page" href="../index.html"
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
                  <a class="dropdown-item" href="LoginColaboradores.php"
                    >Área Administrativa</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="LoginUsuarios.php"
                    >Login Usuarios</a
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                aria-current="page"
                href="contacto.php"
                >Contacto</a
              >
            </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $mensaje = $_POST["mensaje"];
        
        $destinatario = "hospitalcima.servicioalcliente@gmail.com"; // Correo de destino
        
        $asunto = "Nuevo mensaje desde el formulario del sitio web";
        
        $cuerpo = "Nombre: $nombre\n";
        $cuerpo .= "Email: $email\n";
        $cuerpo .= "Mensaje:\n$mensaje\n";
        
        $cabeceras = "From: $email";
        
        if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
            echo "Correo enviado correctamente.";
        } else {
            echo "Error al enviar el correo.";
        }
    }
    ?>



    <!--Contenido -->
<main>
  <section class="container">
    <form method="post" action="">
      <div class="mb-3">
          <label for="nombre" class="form-label">Nombre Completo</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre">
      </div>
      <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
      </div>
      <div class="mb-3">
          <label for="mensaje" class="form-label">Mensaje</label>
          <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="enviar">Primery</button>
    </form>
  </section>

  <!--Nuestras sedes -->
  <section class="container-md">
  <div class="main-title">
  <h2>Nuestras Sedes</h2>
  </div>
  <div class="Card-Sede container">
    <div class="row align-items-center m-auto">
  <div class="card" style="width: 18rem;">
    <h5 class="card-title text-center">Belen</h5>
    <img src="./css/sede-hospital-belen.jpeg" class="card-img-center" alt="...">
    <div class="card-body">
      <a href="./Sede.Belen.html" class="btn btn-primary">Ver mas</a>
    </div>
  </div>
  <div class="card" style="width: 15rem;">
    <h5 class="card-title text-center">Escazu</h5>
    <img src="./css/Sede-escazu.jpg" class="card-img-center" alt="...">
    <div class="card-body">
      <a href="./Sede-Escazu.html" class="btn btn-primary">Ver mas</a>
    </div>
  </div>

  <div class="card" style="width: 16rem;">
    <h5 class="card-title text-center">San Pedro</h5>
    <img src="./css/sede-San-Pedro.jpeg" class="card-img-center" alt="...">
    <div class="card-body">
      <a href="./Sede-SanPedro.html" class="btn btn-primary">Ver mas</a>
    </div>
  </div>
</div>
</div>



</section>
</main>
  
    <!--Pie de la pagina-->
    <footer class="pt-4 pt-md-5 border-top">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-3">
            <img class="mb-2" src="../img/health-and-care.png" alt="" />
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
    <script src="../js/modernizr-3.11.2.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="../js/LoginUsuarios.js"></script>
  </body>
</html>
