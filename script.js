// Validación del formulario de registro
document.getElementById('registroForm').addEventListener('submit', function(event) {
    let password = document.getElementById('password').value;
    if (password.length < 8) {
        alert('La contraseña debe tener al menos 8 caracteres');
        event.preventDefault();
    }
});

// Script para intercambiar automáticamente los banners cada 5 segundos
let currentBanner = 1;
const totalBanners = 3;
let interval = setInterval(changeBanner, 5000); // Variable para el intervalo

function changeBanner() {
    document.querySelector('.banner.active').classList.remove('active');
    document.getElementById(banner${currentBanner}).classList.add('active');
    currentBanner = (currentBanner % totalBanners) + 1;
}

// Evento para detener el cambio automático al pasar el ratón sobre un banner
document.querySelectorAll('.banner').forEach(banner => {
    banner.addEventListener('mouseover', () => {
        clearInterval(interval);
    });
    
    banner.addEventListener('mouseout', () => {
        interval = setInterval(changeBanner, 5000);
    });
});

// Iniciar el cambio automático de banners al cargar la página
window.addEventListener('load', () => {
    interval; // Reanuda el intervalo al cargar la página
});
