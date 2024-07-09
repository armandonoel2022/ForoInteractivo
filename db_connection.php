<?php
$servername = "localhost";
$username = "root";
$password = "Ruth5525"; // tu contraseña de MySQL
$dbname = "ForoInteractivo"; // nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>

