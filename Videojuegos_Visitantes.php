<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

// Conectar a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ForoInteractivo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario
$usuario_id = $_SESSION['usuario_id'];

// Filtrar los comentarios de la sección de videojuegos
$temasPermitidos = ['Noticias_Videojuegos', 'Analisis_Videojuegos', 'Tutoriales_juegos', 'Comunicades_Videojuegos'];
$temasPermitidosStr = "'" . implode("','", $temasPermitidos) . "'";

// Obtener los comentarios del usuario para los temas permitidos
$sql = "SELECT tema, comentario, created_at FROM comentarios WHERE usuario_id = ? AND tema IN ($temasPermitidosStr) ORDER BY created_at DESC LIMIT 5";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$comentarios = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos - Comentarios</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .content-wrapper {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .comments-display {
            flex: 1;
            max-width: 100%;
        }
        .comments-display {
            border-left: 1px solid #ccc;
            padding-left: 20px;
        }
        .comentario {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 20px;
        }
        #popup.show {
            display: block;
        }
        #popup {
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="foros.html" class="forum-link">Volver a Listado de Foros</a></h1>
    </header>

    <div class="banner-container" style="text-align: center; margin-bottom: 20px;">
        <img src="images/banner1.png" alt="Banner 1" style="max-width: 100%; height: auto;">
    </div>

    <div class="forum-content">
        <h2>Videojuegos - Comentarios</h2>

        <section class="main-content">
            <h3>Comentarios Recientes</h3>
            <div class="comments-display">
                <?php if (empty($comentarios)): ?>
                    <p>No hay comentarios para mostrar.</p>
                <?php else: ?>
                    <?php foreach ($comentarios as $comentario): ?>
                        <div class="comentario">
                            <p><strong>Tema:</strong> <?php echo htmlspecialchars($comentario['tema']); ?></p>
                            <p><strong>Comentario:</strong> <?php echo htmlspecialchars($comentario['comentario']); ?></p>
                            <p><strong>Fecha:</strong> <?php echo htmlspecialchars($comentario['created_at']); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <h3>TU FORO RD</h3>
            <p>Debatir nos nutre</p>
            <p>2024 Todos los derechos reservados.</p>
            <p>Creado por Armando Noel Web Designer.</p>
            <p>Contacto: 829-802-6640</p>
            <p>armandonoel@outlook.com</p>
        </div>
    </footer>

    <div id="popup" class="popup">
        <p>Comentario enviado exitosamente. <a href="ver_comentarios.php">Ver todos mis comentarios</a></p>
        <button onclick="cerrarPopup()">Cerrar</button>
    </div>

    <script>
    function cerrarPopup() {
        document.getElementById('popup').classList.remove('show');
    }
    </script>
</body>
</html>
