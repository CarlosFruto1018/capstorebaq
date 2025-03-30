document.addEventListener('DOMContentLoaded', function() {
    // Verificar si el usuario está logueado (usando localStorage o cookies)
    const isLoggedIn = localStorage.getItem('userToken');
    const userName = localStorage.getItem('userName');
    
    const loginLink = document.getElementById('login-link');
    const userGreeting = document.getElementById('user-greeting');
    const userNameSpan = document.getElementById('user-name');
    
    if (isLoggedIn && userName) {
        // Usuario logueado: mostrar saludo
        loginLink.style.display = 'none';
        userGreeting.style.display = 'block';
        userNameSpan.textContent = userName;
    } else {
        // Usuario no logueado: mostrar enlace de login
        loginLink.style.display = 'block';
        userGreeting.style.display = 'none';
    }
    
    // Manejar el cierre de sesión
    const logoutBtn = document.getElementById('logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            // Eliminar datos de sesión
            localStorage.removeItem('userToken');
            localStorage.removeItem('userName');
            // Recargar la página o redirigir
            window.location.reload();
        });
    }
});