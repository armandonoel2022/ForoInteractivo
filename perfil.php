<?php
// perfil.php
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
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Perfil de Usuario</h1>
    </header>

    <!-- Mostrar el banner principal -->
    <div class="banner-container">
        <div class="banner active">
            <img src="images/banner1.png" alt="Banner 1">
        </div>
    </div>

    <div class="container">
        <h2>Bienvenido, <?php echo $_SESSION['nombre']; ?></h2>
        <p>Este es tu perfil. Aquí puedes gestionar tu información y tus publicaciones.</p>
        
        <!-- Agregar formulario para perfil detallado -->
        <h3>Perfil Detallado</h3>
        <form action="actualizar_perfil.php" method="POST" enctype="multipart/form-data">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>
            
            <label for="foto">Foto de perfil:</label>
            <input type="file" id="foto" name="foto" accept="image/*">
            
            <label for="avatar">Avatar:</label>
            <select id="avatar" name="avatar">
                <option value="avatar1">Avatar 1</option>
                <option value="avatar2">Avatar 2</option>
                <!-- Agrega más opciones de avatar según necesites -->
            </select>
            
            <button type="submit">Guardar Perfil</button>
        </form>
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
</body>
</html>
