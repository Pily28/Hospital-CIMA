<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion BD</title>
</head>
<body>
    <?php
    $enlace = mysqli_connect("localhost","root","progra3","hospital_cima");

    if(!$enlace){
        die("No se pudo establecer la conexión correctamente".mysqli_error());
    }
    echo "conexion exitosa";
    mysqli_close($enlace);

    ?>
</body>
</html>