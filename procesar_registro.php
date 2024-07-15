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
    // Mostrar mensaje de registro exitoso con enlaces
    echo "<!DOCTYPE html>";
    echo "<html lang='es'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Registro Exitoso</title>";
    echo "<link rel='stylesheet' href='styles.css'>";
    echo "</head>";
    echo "<body>";
    echo "<header>";
    echo "<h1>Foro Interactivo</h1>";
    echo "</header>";

    echo "<div class='container'>";
    echo "<h2>Registro exitoso!</h2>";
    echo "<p>Bienvenido, $nombre, te has registrado correctamente.</p>";
    echo "<div class='links'>";
    echo "<a href='perfil.php' class='button'>Ir a mi perfil</a>";
    echo "<a href='#' class='button'>Ir al foro de tu preferencia</a>";
    echo "<a href='index.html' class='button'>Volver a la página de inicio</a>";
    echo "</div>";
    echo "</div>";

    echo "<footer class='footer'>";
    echo "<div class='footer-content'>";
    echo "<h3>TU FORO RD</h3>";
    echo "<p>Debatir nos nutre</p>";
    echo "<p>2024 Todos los derechos reservados.</p>";
    echo "<p>Creado por Armando Noel Web Designer.</p>";
    echo "<p>Contacto: 829-802-6640</p>";
    echo "<p>armandonoel@outlook.com</p>";
    echo "</div>";
    echo "</footer>";

    echo "</body>";
    echo "</html>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
