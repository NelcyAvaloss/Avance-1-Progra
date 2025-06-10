<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sociedad Literaria del Minino</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="container">

        <!-- Login -->
        <div class="form-box login">
            <form action="{{ route('login.attempt') }}" method="POST">
                @csrf
                <h1>Acceso</h1>
                <div class="input-box">
                    <input type="text" name="email" placeholder="Nombre de usuario o correo" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-link">
                    <span>¿Has olvidado tu contraseña?</span>
                </div>
                <button type="submit" class="btn">Acceso</button>
            </form>
        </div>

        <!-- Registro -->
        <div class="form-box register">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1>Regístrate</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Nombre de usuario" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">Registro</button>
            </form>
        </div>

        <!-- Panel de alternancia -->
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <div class="contenedor-titulo">
                    <h1 class="tituloPrincipal">Sociedad Literaria Del Minino</h1>
                </div>
                <h1>¡Hola, Bienvenido!</h1>
                <p>¿No tienes una cuenta?</p>
                <button class="btn register-btn">Regístrate</button>
            </div>

            <div class="toggle-panel toggle-right">
                <div class="contenedor-titulo">
                    <h1 class="tituloPrincipal">Sociedad Literaria Del Minino</h1>
                </div>
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
