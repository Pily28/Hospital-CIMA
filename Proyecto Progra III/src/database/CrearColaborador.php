<?php
include("ConexionBD.php");
$ObtenerBD = new ConectarBD();
$ObtenerConexion = $ObtenerBD->conex();

if (isset($_POST["CrearUsuario"])) {
  $Nombre = $_POST["nombre"];
  $PrimerApellido = $_POST["PrimerApellido"];
  $SegundoApellido = $_POST["SegundoApellido"];
  $Puesto = $_POST["Cargo"];
  $EstadoCivil = $_POST["EstadoCivil"];
  $Direccion = $_POST["Direccion"];
  $Correo = $_POST["Correo"];
  $Usuario = $_POST["Usuario"];
  $AñoCont = $_POST["AnoContrato"];
  $Contraseña = $_POST["Contraseña"];
  $ConfirmarC = $_POST["ConfimarContraseña"];

  if ($Contraseña == $ConfirmarC){
    $query = "INSERT INTO colaboradores (Nombre, `Primer Apellido`, `Segundo apellido`, Cargo, `Estado civil`, Direccion, Correo, Usuario, `Año de Contrato`,Contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    $Sentencia = mysqli_prepare($ObtenerConexion, $query);
    mysqli_stmt_bind_param($Sentencia, "ssssssssis", $Nombre, $PrimerApellido, $SegundoApellido, $Puesto, $EstadoCivil, $Direccion, $Correo, $Usuario, $AñoCont,$Contraseña);
    mysqli_stmt_execute($Sentencia);
    $Afectado = mysqli_stmt_affected_rows($Sentencia);
    if ($Afectado == 1) {
      echo "<script> alert ('El colaborador $Nombre se creó correctamente'); location.href='/Proyecto%20Progra%20III/src/database/CrearColaborador.php'; </script>";
    } else {
      echo "<script> alert ('ERROR: El colaborador $Nombre no se creó correctamente');</script>";
    }
    mysqli_stmt_close($Sentencia);
    mysqli_close($ObtenerConexion);
  }else{
    echo "<script> alert ('ERROR: Las contraseñas indicas no coinciden, favor valide estos datos y cree su usuario');</script>";

  }
}
if (isset($_POST["Volver"])) {
  echo "<script> location.href='/Proyecto%20Progra%20III/src/index.html'; </script>";
} 
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
  <link rel="shortcut icon" href="/src/img/medical-symbol.png" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="/css/main.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body>
  <header class="fixed-fluid">
    <!-- Sección pública -->
    <nav class="navbar navbar-expand-lg pt-4 navbar-dark bg-primary ">
      <div class="container">
        <a class="navbar-brand" href="../index.html">CIMA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!---Menu Desktop-->
        <div class="collapse navbar-collapse justify-content-center" id="navbar-content" class="collapse navbar-collapse justify-content-center" id="navbar-content">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.html">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tramites
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <a class="dropdown-item" href="Registro.php">Registros</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="CrearColaborador.php"
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
              <a class="nav-link active" aria-current="page" href="#">Contacto</a>
            </li>
            <div class="collapse" id="navbarToggleExternalContent">
            </div>
        </div>
    </nav>
    <header>

      <main class="my-4 container text-center">
        <section class="row justify-content-center">
          <h2>Colaborador</h2>
          <form class="col-md-6 col-lg-10" action="" method="POST">
            <div class="mb-4">
              <img src="../img/Usuario.png" alt="Vista previa de la imagen" class="img-thumbnail" width="200" height="100">

            </div>
            <div class="row">
              <div class="col">
                <div class="mb-4">
                  <label for="Nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
              </div>
              <div class="col">
                <div class="mb-4">
                  <label for="PrimerApellido">Primer Apellido</label>
                  <input type="text" class="form-control" id="PrimerApellido" name="PrimerApellido">
                </div>
              </div>
              <div class="col">
                <div class="mb-4">
                  <label for="SegundoApellido">Segundo Apellido</label>
                  <input type="text" class="form-control" id="SegundoApellido" name="SegundoApellido">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-4">
                  <label for="Cargo">Cargo</label>
                  <select name="Cargo" id="Cargo" class="form-select">
                    <option value="Auxiliar de enfermería">Auxiliar de enfermería</option>
                    <option value="Enfermero">Enfermero</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Farmacéutico">Farmacéutico</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="mb-4">
                  <label for="EstadoCivil">Estado Civil</label>
                  <input type="text" class="form-control" id="EstadoCivil" name="EstadoCivil">
                </div>
              </div>
              <div class="col">
                <div class="mb-4">
                  <label for="Direccion">Dirección</label>
                  <input type="text" class="form-control" id="Direccion" name="Direccion">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-4">
                  <label for="Correo">Correo</label>
                  <input type="text" class="form-control" id="Correo" name="Correo">
                </div>
              </div>
              <div class="col">
                <div class="mb-4">
                  <label for="Usuario">Usuario</label>
                  <input type="text" class="form-control" id="Usuario" name="Usuario">
                </div>
              </div>
              <div class="col">
                <div class="mb-4">
                  <label for="AnoContrato">Año de Contrato</label>
                  <input type="text" class="form-control" id="AnoContrato" name="AnoContrato">
                </div>
              </div>
              <div class="row">
              <div class="col">
                <div class="mb-4">
                  <label for="Contraseña">Crear contraseña</label>
                  <input type="password" class="form-control" id="Contraseña" name="Contraseña">
                </div>
              </div>
              <div class="col">
                <div class="mb-4">
                  <label for="ConfimarContraseña">Confirme su contraseña</label>
                  <input type="password" class="form-control" id="ConfimarContraseña" name="ConfimarContraseña">
                </div>
              </div>
            <div class="buttons mt-4">
              <button type="submit" class="btn btn-primary me-2" name="CrearUsuario">
                Crear Usuario
              </button>
              <button
                type="submit"
                class="btn btn-primary"
                name="Volver"
              >
                Volver
              </button>
            </div>
        </div>
          </form>
        </section>
      </main>


      <!-- Pie de pagina -->
      <!-- Footer -->
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

</body>

</html>