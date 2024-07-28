<?php
// actualizar_perfil.php

session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$edad = $_POST['edad'];
$avatar = $_POST['avatar'];

// Validación y manejo de la foto de perfil
$foto_perfil = $_FILES['foto_perfil']['name'];
$foto_tmp = $_FILES['foto_perfil']['tmp_name'];
$target_dir = "uploads/";

// Verificar si se ha subido un archivo
if ($foto_perfil) {
    $target_file = $target_dir . basename($foto_perfil);
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen
    $check = getimagesize($foto_tmp);
    if ($check === false) {
        echo "El archivo no es una imagen.";
        $upload_ok = 0;
    }

    // Verificar el tamaño del archivo
    if ($_FILES["foto_perfil"]["size"] > 500000) { // 500 KB
        echo "El archivo es demasiado grande.";
        $upload_ok = 0;
    }

    // Permitir ciertos formatos de archivo
    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
        echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $upload_ok = 0;
    }

    // Verificar si $upload_ok es 0 debido a un error
    if ($upload_ok == 0) {
        echo "Tu archivo no fue subido.";
    } else {
        if (move_uploaded_file($foto_tmp, $target_file)) {
            echo "El archivo ". htmlspecialchars(basename($foto_perfil)). " ha sido subido.";
        } else {
            echo "Hubo un error al subir tu archivo.";
        }
    }
} else {
    $target_file = null; // No se ha subido una foto
}

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ForoInteractivo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Actualizar datos del perfil
if ($target_file) {
    $sql = "UPDATE perfil_detalle SET edad = ?, foto_perfil = ?, avatar = ? WHERE usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $edad, $foto_perfil, $avatar, $usuario_id);
} else {
    $sql = "UPDATE perfil_detalle SET edad = ?, avatar = ? WHERE usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $edad, $avatar, $usuario_id);
}

if ($stmt->execute()) {
    echo "Datos del perfil actualizados correctamente.";
} else {
    echo "Error al actualizar datos del perfil: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
