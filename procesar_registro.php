<?php
// procesar_registro.php

// Conexión a la base de datos
$servername = "127.0.0.1";
$database = "ForoInteractivo";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir y validar los datos del formulario
$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($nombre) || empty($email) || empty($password)) {
    die("Todos los campos son obligatorios.");
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email no válido.");
}

// Hash de la contraseña
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $passwordHashed);

if ($stmt->execute()) {
    // Redirigir después del registro exitoso
    session_start();
    $_SESSION['usuario_id'] = $stmt->insert_id; // Guardar el ID del nuevo usuario en la sesión
    $_SESSION['nombre'] = $nombre;

    header("Location: perfil.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
