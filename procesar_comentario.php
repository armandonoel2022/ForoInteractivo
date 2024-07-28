<?php
// procesar_comentario.php

session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$foro_id = $_POST['foro_id'];
$comentario = trim($_POST['comentario']);

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ForoInteractivo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Insertar comentario en la base de datos
$sql = "INSERT INTO comentarios (usuario_id, foro_id, comentario) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $usuario_id, $foro_id, $comentario);

if ($stmt->execute()) {
    header("Location: foro.php?id=$foro_id"); // Redirige al foro donde se publicó el comentario
    exit();
} else {
    echo "Error al publicar el comentario: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
