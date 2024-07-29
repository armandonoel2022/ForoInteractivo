<?php
session_start();
$usuarioRegistrado = isset($_SESSION['usuario_id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programación y Desarrollo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><a href="foros.html" class="forum-link">Volver a Listado de Foros</a></h1>
    </header>

    <div class="banner-container" style="text-align: center; margin-bottom: 20px;">
        <img src="images/banner1.png" alt="Banner 1" style="max-width: 100%; height: auto;">
    </div>

    <div class="forum-content">
        <h2>Programación y Desarrollo</h2>

        <section class="main-content">
            <h3>Comentarios Recientes</h3>
            <div class="comentarios">
                <?php
                // Habilitar la visualización de errores
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                // Conectar a la base de datos
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "ForoInteractivo";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Filtrar comentarios solo para los temas permitidos
                $temasPermitidos = ['Lenguajes', 'DesarrolloWeb', 'DesarrolloApps', 'ProyectosOpenSource'];
                $temasPermitidosStr = "'" . implode("','", $temasPermitidos) . "'";

                // Obtener los últimos 5 comentarios del usuario y de los temas permitidos
                $usuario_id = $usuarioRegistrado ? $_SESSION['usuario_id'] : null;
                $sql = $usuario_id
                    ? "SELECT tema, comentario, created_at FROM comentarios WHERE usuario_id = ? AND tema IN ($temasPermitidosStr) ORDER BY created_at DESC LIMIT 5"
                    : "SELECT tema, comentario, created_at FROM comentarios WHERE tema IN ($temasPermitidosStr) ORDER BY created_at DESC LIMIT 5";

                $stmt = $conn->prepare($sql);
                if ($usuario_id) {
                    $stmt->bind_param("i", $usuario_id);
                }
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="comentario">';
                        echo '<p><strong>Tema:</strong> ' . htmlspecialchars($row['tema']) . '</p>';
                        echo '<p><strong>Comentario:</strong> ' . htmlspecialchars($row['comentario']) . '</p>';
                        echo '<p><strong>Fecha:</strong> ' . htmlspecialchars($row['created_at']) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hay comentarios recientes.</p>';
                }

                $stmt->close();
                $conn->close();
                ?>
            </div>

            <?php if (!$usuarioRegistrado): ?>
                <p><a href="login.html">Para dejar un comentario, por favor inicia sesión</a></p>
            <?php else: ?>
            <?php endif; ?>
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

    <script src="script.js"></script>
</body>
</html>
