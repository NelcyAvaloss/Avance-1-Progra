{{-- resources/views/perfil_actualizado.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil Actualizado</title>
    <link rel="stylesheet" href="{{ asset('css/Perfil_actualizado.css') }}">
</head>
<body>
    <div class="perfil-actualizado-container">
        <h1>¡Perfil Actualizado con Éxito!</h1>

        <div class="perfil-info">
            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto de perfil">

            


            <ul>
                <li><strong>Nombre:</strong> {{ Auth::user()->name }}</li>
                <li><strong>Correo:</strong> {{ Auth::user()->email }}</li>
                <li><strong>Universidad:</strong> {{ Auth::user()->universidad }}</li>
                <li><strong>Rol:</strong> {{ Auth::user()->rol }}</li>
                <li><strong>Tema:</strong> {{ Auth::user()->tema }}</li>
                <li><strong>Idioma:</strong> {{ Auth::user()->idioma }}</li>
                <li><strong>Categorías favoritas:</strong> {{ implode(', ', json_decode(Auth::user()->categorias_favoritas, true)) }}</li>
            </ul>
        </div>

        <a href="{{ route('home') }}" class="volver">Volver al inicio</a>
    </div>
</body>
</html>
