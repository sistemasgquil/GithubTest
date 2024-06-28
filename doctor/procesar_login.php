<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "u662532358_axel", "Sysadm753", "u662532358_AGENDA");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta preparada para evitar la inyección SQL
$sql = "SELECT * FROM US_usuario WHERE US_usuario = ? AND US_clave = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Usuario autenticado correctamente
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location: clte.php"); // Redirige a la página de inicio después de iniciar sesión
} else {
    // Usuario no válido
    echo "<center><h3>Usuario o contraseña incorrectos.</h3></center>";
    //header("Location: index.php"); 
}

$stmt->close();
$conn->close();
?>
