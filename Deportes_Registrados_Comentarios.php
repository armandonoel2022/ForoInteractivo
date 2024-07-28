<?php
// Deportes_Registrados_Comentarios.php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deportes - Comentarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><a href="foros_registrados.html" class="forum-link">Volver a Listado de Foros Registrados</a></h1>
    </header>

    <div class="banner-container">
        <div class="banner active">
            <img src="images/banner1.png" alt="Banner 1">
        </div>
        <div class="banner">
            <img src="images/banner2.png" alt="Banner 2">
        </div>
        <div class="banner">
            <img src="images/banner3.png" alt="Banner 3">
        </div>
    </div>

    <div class="forum-content">
        <h2>Deportes - Comentarios</h2>

        <aside class="sidebar">
            <h3>Temas de Interés</h3>
            <form action="guardar_comentario.php" method="POST">
                <label for="tema">Selecciona el tema:</label><br>
                <select id="tema" name="tema">
                    <option value="Noticias deportivas">Noticias deportivas</option>
                    <option value="Resultados de partidos">Resultados de partidos</option>
                    <option value="Análisis de jugadores">Análisis de jugadores</option>
                    <option value="Eventos deportivos">Eventos deportivos</option>
                </select><br><br>
                
                <label for="comentario">Escribe tu comentario:</label><br>
                <textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br><br>
                <button type="submit">Enviar Comentario</button>
            </form>
        </aside>

        <section class="main-content">
            <!-- Contenido de la sección principal puede ser agregado según sea necesario -->
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
