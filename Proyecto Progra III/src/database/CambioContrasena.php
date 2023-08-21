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
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/Inicio.css" />
    <link rel="stylesheet" href="../css/CambiarContraseña.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <body>

  <?php
    session_start();
    include("ConexionBD.php");
    $ObtenerBD = new ConectarBD();
    $ObtenerConexion = $ObtenerBD->conex();

    $Correo = $_SESSION["Correo"];
    $destinatario = $Correo;

    function generar_contrasena_aleatoria($longitud = 10) {
      $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $contrasena = '';
      $maximoCaracteres = strlen($caracteres) - 1;
  
      for ($i = 0; $i < $longitud; $i++) {
          $indiceAleatorio = mt_rand(0, $maximoCaracteres);
          $contrasena .= $caracteres[$indiceAleatorio];
      }
  
      return $contrasena;
  }
  function enviar_correo($destinatario, $contrasena) {
    $asunto = "Recuperación de Contraseña";
    $mensaje = "Su nueva contraseña es: $contrasena";
    $cabeceras = "From: tu_correo@ejemplo.com" . "\r\n" .
                 "Reply-To: tu_correo@ejemplo.com" . "\r\n" .
                 "X-Mailer: PHP/" . phpversion();

    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "Se ha enviado un correo con la nueva contraseña.";
    } else {
        echo "Error al enviar el correo.";
    }
}


    if (isset($_POST["recuperar"])) {

      // Generar una nueva contraseña aleatoria
      $nueva_contrasena = generar_contrasena_aleatoria(); // Implementa esta función según tus necesidades

      // Actualizar la contraseña en la base de datos y enviarla por correo
      $sql = "UPDATE usuarios SET Contraseña = '$nueva_contrasena' WHERE Correo = '$Correo'";
      if ($ObtenerConexion->query($sql) === TRUE) {
          enviar_correo($Correo, $nueva_contrasena); // Implementa esta función según tus necesidades
          echo "La contraseña se ha reiniciado y se ha enviado al correo proporcionado.";
      } else {
          echo "Error al reiniciar la contraseña: ";
      }
    }

    mysqli_close($ObtenerConexion);
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


    <div class="container">
        <h1>Realice el cambio de su contraseña</h1>
        <div class="description">
          <p>Solicita el cambio te tu contraseña por este medio, la misma será enviada a su correo electronico y será una contraseña aleatoria</p>
        </div>
        <form method="post" action="">
          <label for="Correo">Correo Electrónico:</label>
          <input type="email" name="Correo" id="Correo" value="<?php echo $_SESSION["Correo"]; ?>" readonly>

          <div class="text-center">
              <button class="btn btn-primary" type="submit" name="recuperar" id="btnCambiar">Recuperar Contraseña</button>
          </div>
        </form>
    </div>

    <!-- Footer -->
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
              <li><a class="text-muted" href="../Sede-Escazu.html">San Pedro</a></li>
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
    <script src="../js/Inicio.js"></script>
  </body>
</html>