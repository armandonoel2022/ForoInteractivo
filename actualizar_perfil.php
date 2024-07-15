<?php
// actualizar_perfil.php

session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$edad = $_POST['edad'];
$foto_perfil = $_FILES['foto_perfil']['name']; // Nombre del archivo de la foto de perfil
$avatar = $_POST['avatar'];

// Validación y manejo de la foto de perfil
$target_dir = "uploads/"; // Directorio donde se almacenarán las fotos de perfil
$target_file = $target_dir . basename($_FILES["foto_perfil"]["name"]);
move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], $target_file);

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ForoInteractivo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Insertar datos en la tabla perfil_detalle
$sql = "INSERT INTO perfil_detalle (usuario_id, edad, foto_perfil, avatar) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiss", $usuario_id, $edad, $foto_perfil, $avatar);

if ($stmt->execute()) {
    echo "Datos del perfil actualizados correctamente.";
} else {
    echo "Error al actualizar datos del perfil: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
