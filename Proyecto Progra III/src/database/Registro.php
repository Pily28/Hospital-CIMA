<?php
include("ConexionBD.php");
$ObtenerBD = new ConectarBD();
$ObtenerConexion = $ObtenerBD->conex();

if (isset($_POST["CrearUsuario"])) {
  $Nombre = $_POST["nombre"];
  $PrimerApellido = $_POST["PrimerApellido"];
  $SegundoApellido = $_POST["SegundoApellido"];
  $Identificacion = $_POST["Identificacion"];
  $Sexo = $_POST["sexo"];
  $Nacimiento = $_POST["nacimiento"];
  $Alergias = $_POST["Alergias"];
  $Tratamiento = $_POST["tratamiento"];
  $EstadoCivil = $_POST["EstadoCivil"];

  $query = "INSERT INTO usuarios (Nombre, `Primer Apellido`, `Segundo apellido`, Identificacion, Sexo, `Fecha de nacimiento`, Alergias, Tratamiento, `Estado civil`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $Sentencia = mysqli_prepare($ObtenerConexion, $query);
  mysqli_stmt_bind_param($Sentencia, "sssssssss", $Nombre, $PrimerApellido, $SegundoApellido, $Identificacion, $Sexo, $Nacimiento, $Alergias, $Tratamiento, $EstadoCivil);
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
if (isset($_POST["Volver"])) {
  echo "<script> location.href='/Proyecto%20Progra%20III/src/database/LoginUsuarios.php'; </script>";
} 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de usuario</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/css/Registro.css" />
  </head>

  <main class="my-4 container text-center">
    <section class="row justify-content-center">
      <form class="col-md-6 col-lg-10" action="" method="POST">
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
                    class="form-control"
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
    <script src="/js/Registro.js"></script>
  </main>
</html>
