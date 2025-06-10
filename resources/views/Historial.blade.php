<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Historial de Lectura</title>
  <link rel="stylesheet" href="{{ asset('css/Historial.css') }}">
</head>
<body>
  <header>
    <h1>📖 Historial de Lectura</h1>
    <a href="{{ route('home') }}" class="open-btn">Volver a Inicio</a>
  </header>

  <main>
    <ul id="lista-historial" class="historial-lista"></ul>
  </main>

  <script src="{{ asset('js/Historial.js') }}"></script>
</body>
</html>
