document.getElementById('registroForm').addEventListener('submit', function(event) {
    let password = document.getElementById('password').value;
    if (password.length < 8) {
        alert('La contraseña debe tener al menos 8 caracteres');
        event.preventDefault();
    }
});
