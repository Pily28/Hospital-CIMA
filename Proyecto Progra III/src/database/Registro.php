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
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/Registro.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"

    />
    <link rel="stylesheet" href="/css/Registro.css" />
  </head>


<body>
  <!-----Cabecera ----------->
  <header class="fixed-fluid">
      <nav class="navbar navbar-expand-lg pt-4 navbar-dark bg-primary">
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
                    <a class="dropdown-item" href="./Registro.php">Registros</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./LoginColaboradores.php"
                      >Área Administrativa</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="./LoginUsuarios.php"
                      >Login Usuarios</a
                    >
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active"
                  aria-current="page"
                  href="../contacto.html7"
                  >Contacto</a
                >
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

if (isset($_POST["CrearUsuario"])) {
  $Nombre = $_POST["nombre"];
  $PrimerApellido = $_POST["PrimerApellido"];
  $SegundoApellido = $_POST["SegundoApellido"];
  $Identificacion = $_POST["Identificacion"];
  $Correo = $_POST["Correo"];
  $Sexo = $_POST["sexo"];
  $Nacimiento = $_POST["nacimiento"];
  $Alergias = $_POST["Alergias"];
  $Tratamiento = $_POST["tratamiento"];
  $EstadoCivil = $_POST["EstadoCivil"];
  $Contraseña = $_POST["Contraseña"];
  $ConfirmarC = $_POST["ConfimarContraseña"];

  // Validar que los campos obligatorios estén completos
  if (empty($Nombre) || empty($PrimerApellido) || empty($Identificacion) || empty($Correo) || empty($Contraseña) || empty($ConfirmarC)) {
    echo "<script> alert ('ERROR: Por favor, complete todos los campos obligatorios.'); </script>";
  } else {
    // Verificar si se ha enviado un archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
      $nombreTemporal = $_FILES['imagen']['tmp_name'];
      $nombreImagen = $_FILES['imagen']['name'];

      // Directorio donde se guardarán las imágenes (asegúrate de tener los permisos adecuados)
      $directorioDestino = '../img/Usuarios/';

      // Validar que el archivo sea una imagen y tenga un formato permitido
      $formatosPermitidos = array('jpg', 'jpeg', 'png', 'gif');
      $extension = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
      if (!in_array($extension, $formatosPermitidos)) {
        echo "<script> alert ('ERROR: Solo se permiten imágenes en formato JPG, JPEG, PNG o GIF.'); </script>";
      } else {
        // Mover el archivo cargado al directorio de destino
        $rutaCompleta = $directorioDestino . $nombreImagen;
        if (move_uploaded_file($nombreTemporal, $rutaCompleta)) {
          // Aquí, en lugar de guardar la imagen directamente en la base de datos,
          // guardamos solo la ruta relativa en la base de datos
          $Imagen = '../img/Usuarios/' . $nombreImagen;

          if ($Contraseña == $ConfirmarC) {
            // Validar la fortaleza de la contraseña (por ejemplo, longitud mínima y caracteres especiales)
            if (strlen($Contraseña) < 8 || !preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $Contraseña)) {
              echo "<script> alert ('ERROR: La contraseña debe tener al menos 8 caracteres y contener letras y números.'); </script>";
            } else {
              $query = "INSERT INTO usuarios (Nombre, `Primer Apellido`, `Segundo apellido`, Identificacion, Correo, Sexo, `Fecha de nacimiento`, Alergias, Tratamiento, `Estado civil`, Contraseña, Imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
              $Sentencia = mysqli_prepare($ObtenerConexion, $query);
              mysqli_stmt_bind_param($Sentencia, "ssssssssssss", $Nombre, $PrimerApellido, $SegundoApellido, $Identificacion, $Correo, $Sexo, $Nacimiento, $Alergias, $Tratamiento, $EstadoCivil, $Contraseña, $Imagen);
              mysqli_stmt_execute($Sentencia);
              $Afectado = mysqli_stmt_affected_rows($Sentencia);
              if ($Afectado == 1) {
                echo "<script> alert ('El usuario $Nombre se creó correctamente'); location.href='/Proyecto%20Progra%20III/src/database/Registro.php'; </script>";
              } else {
                echo "<script> alert ('ERROR: El usuario $Nombre no se creó correctamente'); location.href='/Proyecto%20Progra%20III/src/database/Registro.php'; </script>";
              }
              mysqli_stmt_close($Sentencia);
              mysqli_close($ObtenerConexion);
            }
          } else {
            echo "<script> alert ('ERROR: Las contraseñas indicadas no coinciden, favor valide estos datos y cree su usuario');</script>";
          }
        } else {
          echo "<script> alert ('Error al mover el archivo al directorio de destino.'); </script>";
        }
      }
    } else {
      echo "<script> alert ('ERROR: Por favor, seleccione una imagen.'); </script>";
    }
  }
}

if (isset($_POST["Volver"])) {
  echo "<script> location.href='/Proyecto%20Progra%20III/src/database/LoginUsuarios.php'; </script>";
}
?>

  <!--Contenido------>
  <main class="my-4 container text-center">
    <section class="row justify-content-center">
      <form class="col-md-6 col-lg-10" action="" method="POST" enctype="multipart/form-data">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card mt-3">
              <div class="card-body">
                <img
                  class="img-div img-fluid"
                  src="../img/profile-picture.png"
                  alt="Profile Picture"
                />
              </div>
                <label for="imagen">Selecciona una imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/*">
                <br>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- Card 1 -->
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control"
                    placeholder="Ingrese su nombre"
                  />
                </div>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="primer-apellido">Primer Apellido</label>
                  <input
                    type="text"
                    id="PrimerApellido"
                    name="PrimerApellido"
                    class="form-control"
                    placeholder="Ingrese su primer apellido"
                  />
                </div>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="segundo-apellido">Segundo Apellido</label>
                  <input
                    type="text"
                    id="SegundoApellido"
                    name="SegundoApellido"
                    class="form-control"
                    placeholder="Ingrese su segundo apellido"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="identificacion">Identificación</label>
                  <input
                    type="text"
                    id="Identificacion"
                    name="Identificacion"
                    class="form-control"
                    placeholder="Ingrese su ID"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="sexo">Sexo</label>
                  <select
                    id="sexo"
                    name="sexo"
                    class="form-select"
                    onchange="seleccionarSexo()"
                  >
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="birth-date">Fecha de nacimiento</label>
                  <input type="date" name="nacimiento" class="form-control" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="alergias">Alergias</label>
                  <div>
                    <input type="radio" id="si" name="Alergias" value="Si" />
                    <label for="si">Sí</label>
                    <input type="radio" id="no" name="Alergias" value="No" />
                    <label for="no">No</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="tratamiento">Tratamiento</label>
                  <input
                    type="text"
                    id="tratamiento"
                    name="tratamiento"
                    class="form-control"
                    placeholder="Ingrese el tratamiento"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="EstadoCivil">Estado Civil</label>
                    <select name="EstadoCivil" id="EstadoCivil" class="form-select">
                      <option value="Casado">Casado</option>
                      <option value="Soltero">Soltero</option>
                      <option value="Union Libre">Union Libre</option>
                      <option value="Divorciado">Divorciado</option>
                      <option value="Separado">Separado</option>
                      <option value="Viudo">Viudo</option>
                    </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <label for="Correo">Correo Electronico</label>
                    <input type="text" class="form-control" id="Correo" name="Correo" placeholder="Ingrese su correo electronico">
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="Contraseña">Crear contraseña</label>
                  <input type="password" class="form-control" id="Contraseña" name="Contraseña" placeholder="Ingrese su contraseña">
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="ConfimarContraseña">Confirme su contraseña</label>
                  <input type="password" class="form-control" id="ConfimarContraseña" name="ConfimarContraseña" placeholder="Confirme su contraseña">
                </div>
              </div>
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
  <!-------Pie de la pagina------>

    <!--Pie-->

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
              <li><a class="text-muted" href="#">Youtube</a></li>
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
<!---Java Script ----------------------->
    <script src="js/modernizr-3.11.2.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="../js/Registro.js"></script>
</body>
</html>
