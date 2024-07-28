<?php
// guardar_comentario.php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$tema = $_POST['tema'];
$comentario = $_POST['comentario'];

// Conexión a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ForoInteractivo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Insertar comentario en la base de datos
$sql = "INSERT INTO comentarios (usuario_id, tema, comentario) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $usuario_id, $tema, $comentario);

if ($stmt->execute()) {
    // Comentario guardado exitosamente
    echo "Comentario enviado exitosamente.";
} else {
    // Error al guardar comentario
    echo "Error al enviar comentario.";
}

$stmt->close();
$conn->close();
?>
