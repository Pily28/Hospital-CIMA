<?php
include("ConexionBD.php");
$ObtenerBD = new ConectarBD();
$ObtenerConexion = $ObtenerBD->conex();

if (isset($_POST["actualizar"])) {
    $Usuario = $_SESSION["user_id"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];

    // Actualizar la información del usuario en la base de datos
    $sql = "UPDATE usuarios SET nombre = '$nombre', email = '$email' WHERE id = '$Usuario'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION["user_name"] = $nombre;
        $_SESSION["user_email"] = $email;
        header("Location: Inicio.php");
        exit();
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}

mysqli_close($ObtenerConexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar información</title>
</head>
<body>
    <h1>Actualizar información</h1>
    <form method="post" action="procesar_actualizar.php">
        <label for="nombre">Nombre completo:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION["user_name"]; ?>" required><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" value="<?php echo $_SESSION["user_email"]; ?>" required><br>

        <input type="submit" name="actualizar" value="Actualizar información">
    </form>
</body>
</html>