<?php
session_start();

// Destruye la sesión y redirige a la página de inicio de sesión o a donde prefieras
session_destroy();
header("Location: LoginUsuarios.php"); // Reemplaza "login.php" por la página de inicio de sesión de tu sitio
exit();
?>