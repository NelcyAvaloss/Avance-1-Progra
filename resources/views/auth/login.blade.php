<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sociedad Literaria del Minino</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<h1 class="titulo-encima">SOCIEDAD LITERARIA DEL MININO</h1>

<div class="container">
    <div class="form-box login">
        <form action="{{ route('login.attempt') }}" method="POST">
            @csrf
            <h1>Acceso</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Contraseña" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="forgot-link">
                <a href="#">¿Haz olvidado tu contraseña?</a>
            </div>
            <button type="submit" class="btn">Acceso</button>
            <p>o iniciar sesión con plataformas sociales</p>
            <div class="social-icons">
                <a href="#"><i class='bx bxl-google'></i></a>
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-github'></i></a>
                <a href="#"><i class='bx bxl-linkedin'></i></a>
            </div>
        </form>
    </div>

    <div class="form-box register">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h1>Regístrate</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Nombre de usuario" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Contraseña" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Registro</button>
            <p>o iniciar sesión con plataformas sociales</p>
            <div class="social-icons">
                <a href="#"><i class='bx bxl-google'></i></a>
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-github'></i></a>
                <a href="#"><i class='bx bxl-linkedin'></i></a>
            </div>
        </form>
    </div>

    <div class="toggle-box">
        <div class="toggle-panel toggle-left">
            <h1>¡Hola, Bienvenido!</h1>
            <p>¿No tienes una cuenta?</p>
            <button class="btn register-btn">Regístrate</button>
        </div>
        <div class="toggle-panel toggle-right">
            <h1>¡Bienvenido de nuevo!</h1>
            <p>¿Ya tienes una cuenta?</p>
            <button class="btn login-btn">Accede</button>
        </div>
    </div>
</div>

<script>
    const container = document.querySelector('.container');
    const registerBtn = document.querySelector('.register-btn');
    const loginBtn = document.querySelector('.login-btn');

    registerBtn.addEventListener('click', () => container.classList.add('active'));
    loginBtn.addEventListener('click', () => container.classList.remove('active'));
</script>

</body>
</html>
