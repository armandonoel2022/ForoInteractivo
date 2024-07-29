## ForoInteractivo
  ForoInteractivo es un proyecto de foro en línea destinado a usuarios en la República Dominicana. Permite a los visitantes visualizar comentarios, pero para poder participar y dejar comentarios, los usuarios deben     registrarse e iniciar sesión. La gestión de usuarios y comentarios se realiza a través de una base de datos manejada por XAMPP y MySQL Workbench. Las contraseñas de los usuarios están protegidas mediante técnicas     de hash para garantizar la seguridad.
  
## Características
  Registro de Usuarios: Los usuarios pueden registrarse proporcionando su nombre, correo electrónico y una contraseña segura.
  Inicio de Sesión: Los usuarios pueden iniciar sesión con su correo electrónico y contraseña.
  Perfil de Usuario: Los usuarios pueden actualizar su perfil con información adicional como edad y foto de perfil.
  Foros: Los usuarios registrados pueden participar en foros organizados por diferentes temas.
  Comentarios: Los usuarios pueden dejar comentarios en los foros una vez que han iniciado sesión.
  Seguridad: Las contraseñas se almacenan de forma segura utilizando técnicas de hash, protegiendo la integridad y privacidad de los datos de los usuarios.
  Estructura del Proyecto
  El proyecto consta de los siguientes archivos y directorios:
  
+  actualizar_perfil.php: Script para actualizar la información del perfil del usuario.
+ db_connect.php: Script para conectar con la base de datos.
+ db_connection.php: Script adicional para conectar con la base de datos.
+ editar_comentario.php: Script para editar comentarios existentes.
+ foros.html: Página principal del foro con enlaces a diferentes temas.
+ foros_registrados.html: Página del foro para usuarios registrados con opciones adicionales.
+ images/: Directorio que contiene imágenes usadas en el proyecto, incluyendo banners.
  banner1.png: Banner principal del foro.
  index.html: Página principal con opciones para registro e inicio de sesión.
  login.html: Página para el inicio de sesión de usuarios.
  logout.php: Script para cerrar sesión.
  perfil.php: Página donde los usuarios pueden ver y editar su perfil.
  procesar_comentario.php: Script para procesar y guardar nuevos comentarios.
  procesar_login.php: Script para procesar el inicio de sesión de usuarios.
  procesar_registro.php: Script para procesar el registro de nuevos usuarios.
  register.html: Página de registro de nuevos usuarios.
  register.php: Script adicional para procesar el registro (con funcionalidades adicionales).
  script.js: Archivo JavaScript para funcionalidades interactivas.
  styles.css: Archivo de estilos CSS para la apariencia del sitio.
  validate.js: Archivo JavaScript para validar formularios antes de enviarlos.
  Tecnologia_Gadgets.html: Página específica para la categoría de Tecnología y Gadgets.
  Tecnologia_Gadgets_Registrados_Comentarios.php: Script para manejar comentarios en la categoría de Tecnología y Gadgets para usuarios registrados.
  Tecnologia_Gadgets_Visitantes_Comentarios.php: Página para que los visitantes vean comentarios en la categoría de Tecnología y Gadgets.
  Animales_Mascotas_Registrados_Comentarios.php: Script para comentarios en la categoría de Animales y Mascotas para usuarios registrados.
  Animales_Mascotas_Visitantes.php: Página para comentarios en la categoría de Animales y Mascotas para visitantes.
  Arte_Cultura_Registrados_Comentarios.php: Script para comentarios en la categoría de Arte y Cultura para usuarios registrados.
  Arte_Cultura_Visitantes.php: Página para comentarios en la categoría de Arte y Cultura para visitantes.
  Automoviles_Transporte_Registrados_Comentarios.php: Script para comentarios en la categoría de Automóviles y Transporte para usuarios registrados.
  Automoviles_Transporte_Visitantes.php: Página para comentarios en la categoría de Automóviles y Transporte para visitantes.
  Ciencia_Tecnologia_Registrados_Comentarios.php: Script para comentarios en la categoría de Ciencia y Tecnología para usuarios registrados.
  Ciencia_Tecnologia_Visitantes.php: Página para comentarios en la categoría de Ciencia y Tecnología para visitantes.
  Ciencias_Ocultas_Misterios_Registrados_Comentarios.php: Script para comentarios en la categoría de Ciencias Ocultas y Misterios para usuarios registrados.
  Ciencias_Ocultas_Misterios_Visitantes.php: Página para comentarios en la categoría de Ciencias Ocultas y Misterios para visitantes.
  Cine_Series_Registrados_Comentarios.php: Script para comentarios en la categoría de Cine y Series para usuarios registrados.
  Cine_Series_Visitantes.php: Página para comentarios en la categoría de Cine y Series para visitantes.
  Cocina_Gastronomia_Registrados_Comentarios.php: Script para comentarios en la categoría de Cocina y Gastronomía para usuarios registrados.
  Cocina_Gastronomia_Visitantes.php: Página para comentarios en la categoría de Cocina y Gastronomía para visitantes.
  Deportes_Registrados_Comentarios.php: Script para comentarios en la categoría de Deportes para usuarios registrados.
  Deportes_Visitantes.php: Página para comentarios en la categoría de Deportes para visitantes.
  Economia_Finanzas_Registrados_Comentarios.php: Script para comentarios en la categoría de Economía y Finanzas para usuarios registrados.
  Economia_Finanzas_Visitantes.php: Página para comentarios en la categoría de Economía y Finanzas para visitantes.
  Educacion_Registrados_Comentarios.php: Script para comentarios en la categoría de Educación para usuarios registrados.
  Educacion_Visitantes.php: Página para comentarios en la categoría de Educación para visitantes.
  Emprendimiento_Negocios_Registrados_Comentarios.php: Script para comentarios en la categoría de Emprendimiento y Negocios para usuarios registrados.
  Emprendimiento_Negocios_Visitantes.php: Página para comentarios en la categoría de Emprendimiento y Negocios para visitantes.
  Hobbies_Pasatiempos_Registrados_Comentarios.php: Script para comentarios en la categoría de Hobbies y Pasatiempos para usuarios registrados.
  Hobbies_Pasatiempos_Visitantes.php: Página para comentarios en la categoría de Hobbies y Pasatiempos para visitantes.
  Literatura_Registrados_Comentarios.php: Script para comentarios en la categoría de Literatura para usuarios registrados.
  Moda_Belleza_Registrados_Comentarios.php: Script para comentarios en la categoría de Moda y Belleza para usuarios registrados.
  Moda_Belleza_Visitantes.php: Página para comentarios en la categoría de Moda y Belleza para visitantes.
  Musica_Registrados_Comentarios.php: Script para comentarios en la categoría de Música para usuarios registrados.
  Musica_Visitantes.php: Página para comentarios en la categoría de Música para visitantes.
  Politica_Sociedad_Registrados_Comentarios.php: Script para comentarios en la categoría de Política y Sociedad para usuarios registrados.
  Politica_Sociedad_Visitantes.php: Página para comentarios en la categoría de Política y Sociedad para visitantes.
  Programacion_Desarrollo_Registrados_Comentarios.php: Script para comentarios en la categoría de Programación y Desarrollo para usuarios registrados.
  Programacion_Desarrollo_Visitantes.php: Página para comentarios en la categoría de Programación y Desarrollo para visitantes.
  Salud_Bienestar_Registrados_Comentarios.php: Script para comentarios en la categoría de Salud y Bienestar para usuarios registrados.
  Salud_Bienestar_Visitantes.php: Página para comentarios en la categoría de Salud y Bienestar para visitantes.
  Tecnologia_Gadgets.html: Página específica para la categoría de Tecnología y Gadgets.
  Tecnologia_Gadgets_Registrados_Comentarios.php: Script para manejar comentarios en la categoría de Tecnología y Gadgets para usuarios registrados.
  Tecnologia_Gadgets_Visitantes_Comentarios.php: Página para que los visitantes vean comentarios en la categoría de Tecnología y Gadgets.
  Viajes_Turismo_Registrados_Comentarios.php: Script para comentarios en la categoría de Viajes y Turismo para usuarios registrados.
  Viajes_Turismo_Visitantes.php: Página para comentarios en la categoría de Viajes y Turismo para visitantes.
  Videojuegos_Registrados_Comentarios.php: Script para comentarios en la categoría de Videojuegos para usuarios registrados.
  Videojuegos_Visitantes.php: Página para comentarios en la categoría de Videojuegos para visitantes.
  Instalación
  Para instalar y configurar el proyecto en tu máquina local, sigue estos pasos:
  
  Clona el Repositorio:
  
  bash
  Copy code
  git clone https://github.com/armandonoel2022/ForoInteractivo.git
  Configura tu Entorno Local:
  
  Asegúrate de tener XAMPP instalado y funcionando.
  Coloca los archivos del proyecto en el directorio htdocs de XAMPP.
  Configura la Base de Datos:
  
  Crea una base de datos llamada ForoInteractivo en MySQL.
  Ejecuta los scripts SQL proporcionados en db_connect.php y db_connection.php para crear las tablas necesarias.
  Inicia XAMPP:
  
  Asegúrate de que los servicios de Apache y MySQL estén en funcionamiento.
  Accede al Proyecto en tu Navegador:
  
  Abre tu navegador web y visita:
  
  bash
  Copy code
  http://localhost/ForoInteractivo/index.html
  Futuras Mejoras
  Chat Privado: Implementar una funcionalidad de chat privado utilizando una API.
  Mejoras en la UI: Optimizar la interfaz de usuario para una experiencia más fluida.
  Notificaciones: Agregar notificaciones para nuevas publicaciones y mensajes privados.
  Contribuciones
  Las contribuciones son bienvenidas. Si deseas contribuir al proyecto, por favor:
  
  Abre un issue para discutir cualquier cambio importante antes de enviar un pull request.
  Asegúrate de que tus cambios estén bien documentados y probados.
  Licencia
  Este proyecto está bajo la Licencia MIT.
  
  Contacto
  Para cualquier consulta o contacto, puedes comunicarte con:
  
  Armando Noel
  Email: armandonoel@outlook.com
  Teléfono: 829-802-6640
