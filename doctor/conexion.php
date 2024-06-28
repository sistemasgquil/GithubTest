<?php
$servername = "localhost";
$username = "u662531114_axel";
$password = "Sysadm7532024";
$dbname = "u662532347_AGENDA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
