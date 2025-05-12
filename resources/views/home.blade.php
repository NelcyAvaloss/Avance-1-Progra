<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

   <link rel="stylesheet" href="{{ asset('css/Home.css') }}">

</head>
<body>

    <div class="Encabezado">
        <img src="{{ asset('imagenes/Gatitos.jpg') }}" id="Sociedad_literaria" alt="">
    </div>

    {{-- Componentes de galería --}}
    @include('Componentes.galeria1')
    @include('Componentes.galeria2')
    @include('Componentes.galeria3')

    <footer class="footer">
        <p>© 2025 Sociedad Literaria del Minino. Todos los derechos reservados.</p>
        <p>Hecho con 🐾 y libros.</p>
    </footer>

   <script src="{{ asset('js/Home.js') }}"></script>

</body>
</html>
