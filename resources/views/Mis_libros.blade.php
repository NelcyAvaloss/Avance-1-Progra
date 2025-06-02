<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mis Libros</title>
  <link rel="stylesheet" href="{{ asset('css/Mis_Libros.css') }}">
</head>
<body>

<a href="{{ route('home') }}" class="open-btn">Volver a Inicio</a>

<!-- Sección de subida de libros -->
<section id="mis-libros" class="mis-libros">
  <h2>Subir Mis Libros</h2>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="titulo">Título del libro</label><br>
    <input type="text" id="titulo" name="titulo" required><br><br>

    <label for="descripcion">Descripción del libro</label><br>
    <textarea id="descripcion" name="descripcion" required></textarea><br><br>

    <label for="categoria">Categoría</label><br>
    <select id="categoria" name="categoria" required>
      <option value="" disabled selected>Selecciona una categoría</option>
      <option value="terror">Terror</option>
      <option value="fantasia">Fantasía</option>
      <option value="romance">Romance</option>
      <option value="ciencia-ficcion">Ciencia ficción</option>
      <option value="aventura">Aventura</option>
      <option value="misterio">Misterio</option>
      <option value="historia">Historia</option>
      <option value="suspenso">Suspenso</option>
      <option value="otros">Otros</option>
    </select><br><br>

    <label for="portada">Sube imagen de portada</label><br>
    <input type="file" id="portada" name="portada" accept="image/*" required>


    <label for="archivo">Sube el libro (PDF, JPG, PNG)</label><br>
    <input type="file" id="archivo" name="archivo" accept=".pdf,.jpg,.png" required><br><br>

    <button type="submit">Subir libro</button>
  </form>
</section>

<h1>Mis Libros</h1>

<div class="gallery" id="libros-subidos">
  @foreach ($libros as $libro)
    <div class="container">
      <img src="{{ asset('storage/' . $libro->imagen) }}" alt="{{ $libro->titulo }}">
      <p class="info"><strong>{{ $libro->titulo }}</strong></p>

      <div class="actions">
        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="delete-btn">🗑️ Eliminar</button>
        </form>
        <a href="{{ route('libros.edit', $libro->id) }}" class="edit-btn">✏️ Editar</a>
      </div>
    </div>
  @endforeach
</div>


<script src="{{ asset('js/Mis_libros.js') }}"></script>

<footer class="footer">
  <p>© 2025 Sociedad Literaria del Minino. Todos los derechos reservados.</p>
  <p>Hecho con 🐾 y libros.</p>
</footer>

</body>
</html>
