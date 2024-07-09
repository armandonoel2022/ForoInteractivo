<?php
// procesar_registro.php

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir y validar los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $password);

if ($stmt->execute()) {
    echo "Registro exitoso!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>