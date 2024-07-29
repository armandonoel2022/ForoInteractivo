<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hobbies y Pasatiempos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><a href="foros.php" class="forum-link">Volver a Listado de Foros</a></h1>
    </header>

    <div class="banner-container" style="text-align: center; margin-bottom: 20px;">
        <img src="images/banner1.png" alt="Banner 1" style="max-width: 100%; height: auto;">
    </div>

    <div class="forum-content">
        <h2>Hobbies y Pasatiempos</h2>

        <section class="main-content">
            <h3>Comentarios Recientes</h3>
            <div class="comentarios">
                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "ForoInteractivo";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $sql = "SELECT tema, comentario, created_at FROM comentarios WHERE tema='Hobbies y Pasatiempos' ORDER BY created_at DESC LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="comentario">';
                        echo '<p><strong>Tema:</strong> ' . htmlspecialchars($row['tema']) . '</p>';
                        echo '<p><strong>Comentario:</strong> ' . htmlspecialchars($row['comentario']) . '</p>';
                        echo '<p><strong>Fecha:</strong> ' . htmlspecialchars($row['created_at']) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Aún no tenemos comentarios sobre este tema. Para ser el primero en comentar, inicia sesión.</p>';
                }

                $conn->close();
                ?>
            </div>
            <p><a href="login.html">Para dejar un comentario, por favor inicia sesión</a></p>
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
