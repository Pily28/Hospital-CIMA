
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
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/Registro.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"

    />
  </head>

  </head>
 
  <body>


    <!--Cabece de la pagina-->
    <header class="fixed-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
        <a href="Inicio.php" class="logo"><img src="../img/logo2.jpg"></a>
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

if (isset($_POST["Registrar"])) {
  $Nombre = $_POST["Nombre"];
  $PrimerApellido = $_POST["PrimerApellido"];
  $SegundoApellido = $_POST["SegundoApellido"];
  $Identificacion = $_POST["Identificacion"];
  $Correo = $_POST["Correo"];
  $Fecha = $_POST["Fecha"];
  $Hora = $_POST["Hora"];
  $Sede = $_POST["Sede"];
  $Doctor = $_POST["Doctor"];
  $TipoCita = $_POST["Tipo"];
  $Observaciones = $_POST["Observaciones"];

  // Validar que los campos obligatorios estén completos
  if (empty($Nombre) || empty($PrimerApellido) || empty($Identificacion) || empty($Correo) || empty($Fecha) || empty($Hora) || empty($Doctor) || empty($Sede) || empty($Observaciones)) {
  echo "<script> alert ('ERROR: Por favor, complete todos los campos obligatorios.'); </script>";
  } else {
    $query = "INSERT INTO registrocitas (Nombre, `Primer Apellido`, `Segundo apellido`, Cedula, Correo, Fecha, Hora, Sede, Doctor, `Tipo de cita`, Observaciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $Sentencia = mysqli_prepare($ObtenerConexion, $query);
    mysqli_stmt_bind_param($Sentencia, "sssssssssss", $Nombre, $PrimerApellido, $SegundoApellido, $Identificacion, $Correo, $Fecha, $Hora, $Sede, $Doctor, $TipoCita, $Observaciones);
    mysqli_stmt_execute($Sentencia);
    $Afectado = mysqli_stmt_affected_rows($Sentencia);
    if ($Afectado == 1) {
      echo "<script> alert ('Se realizo el registro de la cita a nombre de $Nombre, correctamente'); location.href='RegistroCITAS.php'; </script>";
    } else {
      echo "<script> alert ('ERROR: No se pudo realizar el registro correctamente, favor verifique los datos'); location.href='RegistroCITAS.php'; </script>";
   }
  mysqli_stmt_close($Sentencia);
  mysqli_close($ObtenerConexion);
  }
}
  
if (isset($_POST["Salir"])) {
  echo "<script> location.href='../InterfazColaborador.html'; </script>";
}

if (isset($_POST["Buscar"])) {
  $cedula = $_POST["Identificacion"];

  $sql = "SELECT Nombre, `Primer Apellido`, `Segundo apellido`, Correo , Identificacion FROM usuarios WHERE Identificacion = $cedula";
  $result = mysqli_query($ObtenerConexion, $sql);

  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $response = array(
        "success" => true,
        "Nombre" => $row["Nombre"],
        "PrimerApellido" => $row["Primer Apellido"],
        "SegundoApellido" => $row["Segundo apellido"],
        "Correo" => $row["Correo"],
        "Identificacion" => $row["Identificacion"]
      );
    } else {
      $response = array("success" => false);
    }
  } else {
    $response = array("success" => false);
  }
  
}
?>

<!--Contenido de la pagina-->
<main>
    <section class="container py-5">
    <h1>Registro para citas de pacientes</h1>
      <div class="description">
        <p>Registre las citas realizadas en el sistema por medio del siguiente formulario, indique el numero de cédula del paciente y proceda a agregar los datos de la cita realizada y envie los datos.</p>
      </div>
      <form class="col-md-6 col-lg-10 mx-auto" action="" method="POST">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <div class="form-group mb-3">
                <label for="Identificacion">Número de Identificación:</label>
                <input type="text" name="Identificacion" id="Identificacion" placeholder="Ingrese el ID del paciente" value="<?php echo isset($response['Identificacion']) ? $response['Identificacion'] : ''; ?>">
                <button type="submit" class="btn custom-btn" name="Buscar">Buscar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Card 1 -->
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <div class="form-group mb-3">
                  <label for="Nombre">Nombre</label>
                  <input type="text" id="Nombre" name="Nombre" class="form-control" value="<?php echo isset($response['Nombre']) ? $response['Nombre'] : ''; ?>" readonly/>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <div class="form-group mb-3">
                  <label for="PrimerApellido">Primer Apellido</label>
                  <input type="text" id="PrimerApellido" name="PrimerApellido" class="form-control" value="<?php echo isset($response['PrimerApellido']) ? $response['PrimerApellido'] : ''; ?>" readonly/>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <div class="form-group mb-3">
                  <label for="SegundoApellido">Segundo Apellido</label>
                  <input type="text" id="SegundoApellido" name="SegundoApellido" class="form-control" value="<?php echo isset($response['SegundoApellido']) ? $response['SegundoApellido'] : ''; ?>" readonly/>
                </div>
              </div>
            </div>
          </div>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <div class="form-group mb-3">
                  <label for="Correo">Correo Electronico</label>
                  <input type="text" id="Correo" name="Correo" class="form-control" value="<?php echo isset($response['Correo']) ? $response['Correo'] : ''; ?>" readonly/>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <div class="form-group mb-3">
                  <label for="birth-date">Fecha de la cita</label>
                  <input type="date" id="Fecha" name="Fecha" class="form-control" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <div class="form-group mb-3">
                  <label for="Hora">Hora:</label>
                  <input type="time" id="Hora" name="Hora" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">  
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <div class="form-group mb-3">
                  <label for="Sede">Sede de la cita</label>
                    <select name="Sede" id="Sede" class="form-select">
                      <option value="Belen">Belen</option>
                      <option value="Escazu">Escazu</option>
                      <option value="San Pedro">San Pedro</option>
                    </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <div class="form-group mb-3">
                  <label for="Doctor">Doctor</label>
                  <input type="text" id="Doctor" name="Doctor" class="form-control" placeholder="Ingrese el doctor el cual realizo la cita" />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <div class="form-group mb-3">
                  <label for="Tipo">Tipo de cita</label>
                  <select name="Tipo" id="Tipo" class="form-select">
                    <option value="Cita de Control">Cita de Control</option>
                    <option value="Cita Preoperatoria">Cita Preoperatoria</option>
                    <option value="Cita de emergencia">Cita de emergencia</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label for="Observaciones">Observaciones</label>
                    <input type="text" id="Observaciones" name="Observaciones" class="form-control" placeholder="Ingrese las observaciones realizadas" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="d-flex justify-content-center mt-3">
                <div class="login-btn me-2">
                  <button type="submit" class="btn btn-primary btn-lg" name="Registrar">Registrar</button>
                </div>
                <div class="cancelar-btn">
                  <button class="btn btn-primary btn-lg" name="Salir">Salir</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>

    <!--Pie de pagina-->
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
    <script src="../js/Registro.js"></script>
  </body>
</html>
