<?php
// Iniciar o reanudar la sesión
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión u otra página de tu elección
header("Location: index.php"); // Cambia "inicio_sesion.php" a la página a la que deseas redirigir al usuario después de cerrar la sesión
exit;
?>
