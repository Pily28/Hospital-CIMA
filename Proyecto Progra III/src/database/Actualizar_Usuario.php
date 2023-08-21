<?php
session_start();
include("ConexionBD.php");
$ObtenerBD = new ConectarBD();
$ObtenerConexion = $ObtenerBD->conex();

if (isset($_POST["Actualizar"])) {
    $Usuario = $_SESSION["Identificacion"];
    $Nombre = $_POST["Nombre"];
    $PrimerApellido = $_POST["PrimerApellido"];
    $SegundoApellido = $_POST["SegundoApellido"];
    $Correo = $_POST["Correo"];
    $Sexo = $_POST["sexo"];
    $Nacimiento = $_POST["nacimiento"];
    $Alergias = isset($_POST["Alergias"]) ? $_POST["Alergias"] : "No";
    $Tratamiento = $_POST["Tratamiento"];
    $EstadoCivil = $_POST["EstadoCivil"];

    if (empty($Nombre) || empty($PrimerApellido) || empty($Correo)) {
        echo "<script> alert ('ERROR: Por favor, complete todos los campos obligatorios.'); </script>";
    } else {
        // Verificar si se ha enviado una imagen nueva en el formulario
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

                    // Actualizar la información del usuario en la base de datos
                    $sql = "UPDATE usuarios SET Nombre = '$Nombre', `Segundo Apellido` = '$SegundoApellido', Correo = '$Correo', Sexo = '$Sexo', `Fecha de nacimiento` = '$Nacimiento', Alergias = '$Alergias', Tratamiento = '$Tratamiento', `Estado Civil` = '$EstadoCivil', imagen = '$Imagen' WHERE Identificacion = '$Usuario'";
                    if ($ObtenerConexion->query($sql) === TRUE) {
                        // Actualizar las variables de sesión con la nueva información
                        $_SESSION["Nombre"] = $Nombre;
                        $_SESSION["Primer Apellido"] = $PrimerApellido;
                        $_SESSION["Segundo Apellido"] = $SegundoApellido;
                        $_SESSION["Correo"] = $Correo;
                        $_SESSION["Sexo"] = $Sexo;
                        $_SESSION["Fecha de nacimiento"] = $Nacimiento;
                        $_SESSION["Alergias"] = $Alergias;
                        $_SESSION["Tratamiento"] = $Tratamiento;
                        $_SESSION["Estado Civil"] = $EstadoCivil;
                        $_SESSION["imagen"] = $Imagen;
                        header("Location: Inicio.php");
                        exit();
                    } else {
                        echo "Error al actualizar la información: " . $ObtenerConexion->error;
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
    echo "<script> location.href='/Proyecto%20Progra%20III/src/database/Inicio.php'; </script>";
  }

mysqli_close($ObtenerConexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar información</title>
  <!-- Favicon -->
   <!-- Favicon -->
   <link rel="shortcut icon" href="../img/logo.png" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/ActualizarUsuario.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    />
</head>
<body>
<!-----Cabeza ------>
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

<!------Contenido------>

<main>
    <section>
    <h1>Actualizar información</h1>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="Nombre">Nombre completo:</label>
        <input type="text" name="Nombre" id="Nombre" value="<?php echo $_SESSION["Nombre"]; ?>" required>

        <label for="PrimerApellido">Primer Apellido:</label>
        <input type="text" name="PrimerApellido" id="PrimerApellido" value="<?php echo $_SESSION["Primer Apellido"]; ?>" required>

        <label for="SegundoApellido">Segundo Apellido:</label>
        <input type="text" name="SegundoApellido" id="SegundoApellido" value="<?php echo $_SESSION["Segundo Apellido"]; ?>" required>

        <label for="Identificacion">Identificación:</label>
        <input type="text" name="Identificacion" id="Identificacion" value="<?php echo $_SESSION["Identificacion"]; ?>" disabled>

        <label for="Correo">Correo Electrónico:</label>
        <input type="text" name="Correo" id="Correo" value="<?php echo $_SESSION["Correo"]; ?>" required>

        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" disabled>
            <option value="Femenino" <?php if ($_SESSION["Sexo"] === "Femenino") echo "selected"; ?>>Femenino</option>
            <option value="Masculino" <?php if ($_SESSION["Sexo"] === "Masculino") echo "selected"; ?>>Masculino</option>
        </select>

        <label for="nacimiento">Fecha de nacimiento:</label>
        <input type="text" name="nacimiento" id="nacimiento" value="<?php echo $_SESSION["Fecha de nacimiento"]; ?>" readonly>

        <label>Alergias:</label>
        <label for="si">Sí</label>
        <input type="radio" id="si" name="Alergias" value="Si" <?php if ($_SESSION["Alergias"] === "Si") echo "checked"; ?> class="radio-label">
        <label for="no">No</label>
        <input type="radio" id="no" name="Alergias" value="No" <?php if ($_SESSION["Alergias"] === "No") echo "checked"; ?> class="radio-label">

        <label for="Tratamiento">Tratamiento:</label>
        <input type="text" name="Tratamiento" id="Tratamiento" value="<?php echo $_SESSION["Tratamiento"]; ?>" required>

        <label for="EstadoCivil">Estado Civil:</label>
        <select name="EstadoCivil" id="EstadoCivil">
            <?php
            $estadosCiviles = array("Casado", "Soltero", "Unión Libre", "Divorciado", "Separado", "Viudo");
            foreach ($estadosCiviles as $estado) {
                $selected = ($_SESSION["Estado Civil"] === $estado) ? "selected" : "";
                echo "<option value='$estado' $selected>$estado</option>";
            }
            ?>
        </select>

        <label for="imagen">Foto de perfil:</label><br>
        <img id="imagenPreview" src="<?php echo $_SESSION["imagen"]; ?>" alt="Imagen de perfil"><br>
        <input type="file" id="imagen" name="imagen" accept="image/*" onchange="mostrarImagen(this);"><br>
        
        <div style="margin-top: 20px;"></div>
        <input type="submit" name="Actualizar" value="Actualizar información">
        <input type="submit" name="Volver" value="Volver">
    </form>
    </section>
</main>


    <script src="../js/ActualizarUsuario.js"></script>
</body>
</html>