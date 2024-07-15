<?php
// procesar_login.php

// Conexión a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ForoInteractivo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir y validar los datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consultar el usuario en la base de datos
$sql = "SELECT id, nombre, password FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $nombre, $hash);
    $stmt->fetch();

    if (password_verify($password, $hash)) {
        // Iniciar sesión y redirigir al perfil
        session_start();
        $_SESSION['usuario_id'] = $id;
        $_SESSION['nombre'] = $nombre;
        header("Location: perfil.php");
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "No se encontró un usuario con ese email.";
}

$stmt->close();
$conn->close();
?>
