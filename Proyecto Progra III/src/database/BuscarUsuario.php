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
    <link rel="stylesheet" href="../css/Tablas.css" />
    <link rel="stylesheet" href="../css/Consultas.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <!-- Header -->
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
          </div>
        </div>
      </nav>
    </header>
    <?php
    include("ConexionBD.php");
    $ObtenerBD = new ConectarBD();
    $ObtenerConexion = $ObtenerBD->conex();

    if (isset($_POST['buscar'])) {
        $busqueda = $_POST['busqueda'];

        // Consulta para filtrar los datos de la tabla por nombre o identificación
        $sql = "SELECT Nombre, `Primer Apellido`, `Segundo apellido`, Identificacion, Correo, Sexo, `Estado civil`, `Fecha de nacimiento`, Alergias, `Tratamiento` FROM usuarios WHERE Nombre LIKE '%$busqueda%' OR Identificacion LIKE '%$busqueda%'";
        $result = $ObtenerConexion->query($sql);
    } else {
        // Consulta para obtener todos los datos de la tabla
        $sql = "SELECT Nombre, `Primer Apellido`, `Segundo apellido`, Identificacion, Correo, Sexo, `Estado civil`, `Fecha de nacimiento`, Alergias, `Tratamiento` FROM usuarios";
        $result = $ObtenerConexion->query($sql);
    }
    ?>

    <main class="my-4 container text-center">
      <section class="row justify-content-center">
        <h2>Usuarios</h2>
        <div class="description">
        <p>En el siguiente cuadro de búsqueda, podrás filtrar el listado de usuarios según tu preferencia, ya sea por nombre de usuario o por su número de cédula, para una mayor efectividad.</p>
        </div>
        <div class="col-md-6 col-lg-4">
            <form method="post" action="">
                <div class="row">
                    <div class="col">
                        <div class="mb-4 text-center">
                            <button type="submit" class="btn btn-primary" name="buscar">Buscar</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <input type="text" class="form-control" id="Usuario" name="busqueda" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </section>
      <section>
        <div class="container mt-5">
          <h4 class="text-center mb-4">Tabla de Usuarios</h4>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Correo</th>
                  <th>Sexo</th>
                  <th>Estado Civil</th>
                  <th>Fecha de nacimiento</th>
                  <th>Alergias</th>
                  <th>Tratamiento</th>
                  
                  
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["Nombre"] . "</td>";
                  echo "<td>" . $row["Primer Apellido"] . "</td>";
                  echo "<td>" . $row["Identificacion"] . "</td>";
                  echo "<td>" . $row["Correo"] . "</td>";
                  echo "<td>" . $row["Sexo"] . "</td>";
                  echo "<td>" . $row["Estado civil"] . "</td>";
                  echo "<td>" . $row["Fecha de nacimiento"] . "</td>";
                  echo "<td>" . $row["Alergias"] . "</td>";
                  echo "<td>" . $row["Tratamiento"] . "</td>";
                  echo "</tr>";
                  }
                } else {
                   echo "<tr><td colspan='9'>No se encontraron datos.</td></tr>";
                }
                ?>
              </tbody>
              
            </table>
          </div>
          <div class="text-end custom-margin">
            <button type="button" id="Volver" class="btn btn-primary btn-lg">
                Volver
            </button>
          </div>
        </div>
      </section>
    </main>

    <!-- Pie de pagina -->
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

    <!-- Scripts -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-o+RDsa0aH3Z5wWN6wZp0Lw1RpGBGOtbUROL2WrqBFXhUiv8Xqq5owB4MK6c5KUp"
      crossorigin="anonymous"
    ></script>
    <script src="../js/Consultas.js"></script>
  </body>
</html>
