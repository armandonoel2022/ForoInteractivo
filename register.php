<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (username, email, password_hash) VALUES (:username, :email, :password_hash)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['username' => $username, 'email' => $email, 'password_hash' => $password_hash])) {
        echo "Registro exitoso. Puedes <a href='login.html'>iniciar sesión</a> ahora.";
    } else {
        echo "Hubo un error al registrar el usuario.";
    }
}
?>
