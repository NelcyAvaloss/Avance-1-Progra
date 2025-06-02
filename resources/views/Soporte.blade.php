<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Soporte - Reporte al Administrador</title>
  <link rel="stylesheet" href="{{ asset('css/Soporte.css') }}">
</head>

<body>
  <div class="wrapper">
    <img src="{{ asset('imagenes/Gato_soporte.jpg') }}" id="Sociedad_literaria" alt="">
    <main class="contenedor">
      <h1>🛠️ Enviar reporte al administrador</h1>
      <p>¿Encontraste un problema o tienes una sugerencia?</p>

      @if(session('success'))
        <div style="color: green; font-weight: bold;">✅ {{ session('success') }}</div>
      @endif

      <form action="{{ route('soporte.enviar') }}" method="POST">
        @csrf

        <label for="tipo">Tipo de reporte:</label>
        <select name="tipo" required>
          <option value="">Selecciona una opción</option>
          <option value="error">Error en el sistema</option>
          <option value="sugerencia">Sugerencia</option>
          <option value="otro">Otro</option>
        </select>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" rows="6" placeholder="Escribe tu reporte aquí..." required></textarea>

        <label for="correo">Tu correo (opcional):</label>
        <input type="email" name="correo" placeholder="tucorreo@example.com" />

        <button type="submit">📩 Enviar Reporte</button>
      </form>

      <a href="{{ route('home') }}" class="volver">← Volver al inicio</a>
    </main>
  </div>
</body>
</html>
