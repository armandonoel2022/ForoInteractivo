# ForoInteractivo

ForoInteractivo es un proyecto de foro en línea diseñado para usuarios en la República Dominicana. Los usuarios pueden registrarse, iniciar sesión y participar en diversas discusiones en diferentes temas. En el futuro, se puede agregar una funcionalidad de chat para que los usuarios interactúen de manera privada.

## Características

- **Registro de usuarios**: Los usuarios pueden registrarse proporcionando su nombre, correo electrónico y contraseña.
- **Inicio de sesión**: Los usuarios pueden iniciar sesión con su correo electrónico y contraseña.
- **Perfil de usuario**: Los usuarios pueden actualizar su perfil con información adicional como edad y foto de perfil.
- **Foros**: Los usuarios pueden navegar y participar en foros organizados por temas.
- **Seguridad**: Las contraseñas de los usuarios se almacenan de forma segura utilizando técnicas de hash.

## Estructura del Proyecto

El proyecto consta de los siguientes archivos y directorios:

- `actualizar_perfil.php`: Script para actualizar la información del perfil del usuario.
- `db_connect.php` y `db_connection.php`: Scripts de conexión a la base de datos.
- `foros.html`: Página principal del foro con enlaces a diferentes temas.
- `images/`: Directorio que contiene las imágenes del proyecto.
- `index.html`: Página principal con opciones de registro e inicio de sesión.
- `login.html`: Página de inicio de sesión.
- `logout.php`: Script para cerrar sesión.
- `perfil.php`: Página de perfil del usuario.
- `procesar_login.php`: Script para procesar el inicio de sesión.
- `procesar_registro.php`: Script para procesar el registro de usuarios.
- `register.html`: Página de registro.
- `register.php`: Script adicional para el registro (detalles adicionales).
- `script.js`: Archivo JavaScript para funciones adicionales.
- `styles.css`: Archivo de estilos CSS.
- `validate.js`: Archivo JavaScript para validación de formularios.

## Instalación

1. Clona el repositorio en tu máquina local:

   ```bash
   git clone https://github.com/armandonoel2022/ForoInteractivo.git

Configura tu entorno local:

Asegúrate de tener XAMPP instalado y configurado correctamente.
Coloca los archivos del proyecto en el directorio htdocs de XAMPP.
Configura la base de datos:

Crea una base de datos llamada ForoInteractivo en MySQL.
Ejecuta los scripts SQL proporcionados en db_connect.php y db_connection.php para crear las tablas necesarias.
Inicia XAMPP y asegúrate de que Apache y MySQL estén corriendo.

Accede al proyecto en tu navegador:

http://localhost/ForoInteractivo/index.html
Futuras Mejoras
Chat privado: Implementar una funcionalidad de chat privado utilizando una API.
Mejoras en la UI: Optimizar la interfaz de usuario para una mejor experiencia.
Notificaciones: Agregar notificaciones para nuevas publicaciones y mensajes privados.
Contribuciones
Las contribuciones son bienvenidas. Por favor, abre un issue para discutir cualquier cambio importante antes de enviar un pull request.

Licencia
Este proyecto está bajo la Licencia MIT.

Contacto
Armando Noel

Email: armandonoel@outlook.com
Teléfono: 829-802-6640
