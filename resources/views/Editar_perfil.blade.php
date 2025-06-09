<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="{{ asset('css/Editar_perfil.css') }}">
</head>
<body>

<a href="{{ route('home') }}" class="open-btn">Volver a Inicio</a>

<div class="perfil-container">
    <h2>Editar Perfil</h2>

    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perfil_update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="foto-preview">
            <input type="file" name="foto" id="foto" accept="image/*">
            @if(auth()->user()->foto)
                <img id="preview-img" src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto de perfil">
            @else
                <img id="preview-img" src="https://i.pinimg.com/736x/68/75/8e/68758ec65c8169b489ecf69b747f963f.jpg" alt="Foto de perfil">
            @endif
        </div>

        <label for="nombre">👤 Nombre completo / Alias:</label>
        <input type="text" id="nombre" name="name" value="{{ old('name', auth()->user()->name) }}" required>

        <label for="correo">📧 Correo electrónico:</label>
        <input type="email" id="correo" name="email" value="{{ old('email', auth()->user()->email) }}" required>

        <label for="universidad">🎓 Universidad o institución:</label>
        <input type="text" id="universidad" name="universidad" value="{{ old('universidad', auth()->user()->universidad) }}">

        <label for="rol">🧑 Rol:</label>
        <select name="rol" id="rol">
            <option value="lector" {{ old('rol', auth()->user()->rol) == 'lector' ? 'selected' : '' }}>Lector</option>
            <option value="autor" {{ old('rol', auth()->user()->rol) == 'autor' ? 'selected' : '' }}>Autor</option>
        </select>

        <label for="contraseña">🔒 Nueva contraseña:</label>
        <div class="password-wrapper">
            <input type="password" name="password" id="contraseña" placeholder="Escribe tu contraseña">
            <button type="button" class="toggle-password" onclick="togglePassword('contraseña', this)">👁️</button>
        </div>

        <label for="confirmar">🔒 Confirmar contraseña:</label>
        <div class="password-wrapper">
            <input type="password" name="password_confirmation" id="confirmar" placeholder="Repite tu contraseña">
            <button type="button" class="toggle-password" onclick="togglePassword('confirmar', this)">👁️</button>
        </div>

        <hr>
        <h4>Preferencias</h4>

        <label for="tema">🎨 Tema:</label>
        <select name="tema" id="tema">
            <option value="claro" {{ old('tema', auth()->user()->tema) == 'claro' ? 'selected' : '' }}>Claro</option>
            <option value="oscuro" {{ old('tema', auth()->user()->tema) == 'oscuro' ? 'selected' : '' }}>Oscuro</option>
        </select>

        <label for="idioma">🌐 Idioma:</label>
        <select name="idioma" id="idioma">
            <option value="es" {{ old('idioma', auth()->user()->idioma) == 'es' ? 'selected' : '' }}>Español</option>
            <option value="en" {{ old('idioma', auth()->user()->idioma) == 'en' ? 'selected' : '' }}>Inglés</option>
        </select>

        <label>📚 Categorías favoritas:</label>
        <div class="categorias-opciones" id="categorias-opciones">
            @php
                $seleccionadas = json_decode(auth()->user()->categorias_favoritas ?? '[]');
                $todas = ['fantasia','terror','aventura','romance','ciencia ficcion','misterio','historia','suspenso','otros'];
            @endphp
            @foreach ($todas as $cat)
                <button type="button" data-cat="{{ $cat }}" class="{{ in_array($cat, $seleccionadas) ? 'selected' : '' }}">
                    {{ ucfirst($cat) }}
                </button>
            @endforeach
        </div>
        <input type="hidden" name="categorias_favoritas" id="categorias" value='{{ json_encode($seleccionadas) }}'>
        <small>Haz clic en las categorías para seleccionarlas</small>

        <div class="acciones">
            <button type="submit">Guardar Cambios</button>
        </div>
    </form>
</div>

<script src="{{ asset('js/Editar_perfil.js') }}"></script>
</body>
</html>
