<?php
// Economía_y_Finanzas_Registrados_Comentarios.php
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

// Filtrar los comentarios de la sección de economía y finanzas
$temasPermitidos = ['Mercados_financieros', 'Inversiones', 'Economia_global', 'Gestion_financiera'];
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
    <title>Economía y Finanzas - Comentarios</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .content-wrapper {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .comment-form, .comments-display {
            flex: 1;
            max-width: 45%;
        }
        .comment-form form {
            display: flex;
            flex-direction: column;
        }
        .comment-form textarea {
            resize: none;
        }
        .comment-form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        .comment-form button:hover {
            background-color: #45a049;
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
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        #popup button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        #popup button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="foros_registrados.html" class="forum-link">Volver a Listado de Foros Registrados</a></h1>
    </header>

    <div class="banner-container" style="text-align: center; margin-bottom: 20px;">
        <img src="images/banner1.png" alt="Banner 1" style="max-width: 100%; height: auto;">
    </div>

    <div class="forum-content">
        <h2>Economía y Finanzas - Comentarios</h2>

        <div class="content-wrapper">
            <aside class="comment-form">
                <h3>Escribe tu Comentario</h3>
                <form id="comentarioForm">
                    <label for="tema">Selecciona el tema:</label><br>
                    <select id="tema" name="tema">
                        <option value="Mercados_financieros">Mercados financieros</option>
                        <option value="Inversiones">Inversiones</option>
                        <option value="Economia_global">Economía global</option>
                        <option value="Gestion_financiera">Gestión financiera personal</option>
                    </select><br><br>
                    
                    <label for="comentario">Escribe tu comentario:</label><br>
                    <textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br><br>
                    
                    <button type="button" onclick="enviarComentario()">Enviar Comentario</button>
                </form>
            </aside>

            <section class="comments-display">
                <h3>Últimos Comentarios</h3>
                <div id="comentariosList">
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
                <p><a href="ver_comentarios.php">Ver todos mis comentarios</a></p>
            </section>
        </div>
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
    function enviarComentario() {
        var form = document.getElementById('comentarioForm');
        var formData = new FormData(form);

        fetch('guardar_comentario.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            mostrarPopup();
            setTimeout(() => {
                window.location.reload();
            }, 2000); // Tiempo para mostrar el popup antes de refrescar
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function mostrarPopup() {
        document.getElementById('popup').classList.add('show');
    }

    function cerrarPopup() {
        document.getElementById('popup').classList.remove('show');
    }
    </script>
</body>
</html>
