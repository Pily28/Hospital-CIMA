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
    <link rel="shortcut icon" href="../img/medical-symbol.png" />
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

  <body style="background-color: whitesmoke;">

<?php
session_start();
?>


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
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >
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
              <a class="nav-link active" aria-current="page" href="../contacto.html"  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;">Contacto</a>
      

            </li>
            <li class="nav-item">
             
              <a class="nav-link active" aria-current="page" href="../index.html"  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;">Salir</a>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

    <?php
    include("ConexionBD.php");
    $ObtenerBD = new ConectarBD();
    $ObtenerConexion = $ObtenerBD->conex();
    
    $Nombre = $_SESSION["Nombre"];
    $Usuario = $_SESSION["Identificacion"];

    $sql = "SELECT Nombre, `Primer Apellido`, `Segundo apellido`, Cedula, Correo, Fecha, Hora, Sede, Doctor, `Tipo de cita`, Observaciones FROM registrocitas WHERE Cedula LIKE $Usuario ";
    $result = $ObtenerConexion->query($sql);
    ?>

    <main class="my-4 container text-center">
  
      <a href="generar_pdf.php" target="_blank" class="btn btn-primary btn-lg float-end">Imprimir PDF</a>
      <section class="row justify-content-center">
        <h2>Expediente Digital</h2>
        <div class="description">
          <p>Bienvenido, aquí podra ver su expediente de citas y comentarios realizados por sus doctores.</p>
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
                  <th>Primer Apellido</th>
                  <th>Segundo Apellido</th>
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
                <?php
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>" . $row["Primer Apellido"] . "</td>";
                    echo "<td>" . $row["Segundo apellido"] . "</td>";
                    echo "<td>" . $row["Cedula"] . "</td>";
                    echo "<td>" . $row["Correo"] . "</td>";
                    echo "<td>" . $row["Fecha"] . "</td>";
                    echo "<td>" . $row["Hora"] . "</td>";
                    echo "<td>" . $row["Sede"] . "</td>";
                    echo "<td>" . $row["Doctor"] . "</td>";
                    echo "<td>" . $row["Tipo de cita"] . "</td>";
                    echo "<td>" . $row["Observaciones"] . "</td>";
                    echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='11'>No se encontraron datos.</td></tr>";
                  }
                  ?>
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


    <!-- Scripts -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-o+RDsa0aH3Z5wWN6wZp0Lw1RpGBGOtbUROL2WrqBFXhUiv8Xqq5owB4MK6c5KUp"
      crossorigin="anonymous"
    ></script>
    <script src="../js/Expediente.js"></script>
  </body>
</html>
