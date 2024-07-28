<?php
// editar_comentario.php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$comentario_id = $_POST['id'];
$nuevo_comentario = $_POST['comentario'];

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ForoInteractivo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Actualizar comentario en la base de datos
$sql = "UPDATE comentarios SET comentario = ? WHERE id = ? AND usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $nuevo_comentario, $comentario_id, $usuario_id);

if ($stmt->execute()) {
    header("Location: Tecnologia_Gadgets_Registrados_Comentarios.php?success=1");
} else {
    header("Location: Tecnologia_Gadgets_Registrados_Comentarios.php?error=1");
}

$stmt->close();
$conn->close();
?>
