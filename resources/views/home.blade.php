<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sociedad Literaria Del Minino</title>
<link rel="stylesheet" href="{{ asset('css/Home.css') }}">
</head>
<body>

  <!-- Botón Administrador en esquina superior derecha -->
 @if(Auth::check() && Auth::user()->rol === 'admin')
  <div class="admin-boton">
      <a href="{{ route('admin') }}" class="admin-link">Administrador</a>
  </div>
@endif

  <!-- Botón para abrir el menú -->
  <button class="open-btn menu-btn" onclick="toggleSidebar()">☰ Menú</button>

  <!-- Menú lateral -->
  <div id="sidebar" class="sidebar">
    <div class="user-profile">
      <div id="User-Foto">
            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto de perfil">
      </div>
        <a id="user-name" href="{{ route('perfil') }}">{{ Auth::user()->name }}</a>
    </div>

    <ul>
      <li><a href="{{ route('home') }}">🏠 Inicio</a></li>
      <li><a href="{{ route('editar_perfil') }}">✏️ Editar Perfil</a></li>
      <li><a href="{{ route('Mis_libros') }}">📚 Mis libros</a></li>
      <li><a href="{{ route('historial') }}">📜 Historial</a></li>
      <li><a href="{{ route('soporte.form') }}">⚙️ Soporte</a></li>
    </ul>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" id="logout-btn" class="logout-button">🔒 Cerrar Sesión</button>
    </form>
  </div>

  <!-- Encabezado de la página -->
 <div class="Encabezado">
 <img src="{{ asset('imagenes/Gatitos.jpg') }}" id="Sociedad_literaria" alt="">

</div>


  <!-- Sección de lista por categoría -->
  <section class="catalogo-categorias">
    <h2>Categorías de Libros</h2>
    <div class="categorias-grid">
      <a href="#categoria-fantasia" class="categoria-card fantasia">📖 Fantasía</a>
      <a href="#categoria-terror" class="categoria-card terror">👻 Terror</a>
      <a href="#categoria-aventura" class="categoria-card aventura">🗺️ Aventura</a>
      <a href="#categoria-romance" class="categoria-card romance">💖 Romance</a>
      <a href="#categoria-ciencia-ficcion" class="categoria-card ciencia-ficcion">🛸 Ciencia Ficción</a>
      <a href="#categoria-misterio" class="categoria-card misterio">🕵️ Misterio</a>
      <a href="#categoria-historia" class="categoria-card historia">🏛️ Historia</a>
      <a href="#categoria-suspenso" class="categoria-card suspenso">😱 Suspenso</a>
      <a href="#categoria-otros" class="categoria-card otros">📚 Otros</a>
    </div>
  </section>

  <!-- 🔍 Barra de búsqueda -->
  <div class="busqueda-container">
    <input type="text" id="buscador" placeholder="🔍 Buscar por título, categoría o usuario">
  </div>

  <!-- Galería por categorías -->
  <h1 class="titulo-galeria animada">
    📚 Biblioteca <span class="cola-gato"><img src="{{ asset('imagenes/Cola_de_gato.png') }}" alt=""></span>
  </h1>
  <div class="decoracion-linea animada-linea"></div>

<div id="galeria-categorias" class="galeria-categorias">
  @foreach ($libros as $categoria => $librosCategoria)
    <div class="categoria-seccion">
      <h3 id="categoria-{{ strtolower($categoria) }}">📚 {{ ucfirst($categoria) }}</h3>

      <div class="gallery">
        @foreach ($librosCategoria as $libro)
          <div class="container">
            <img src="{{ asset('storage/' . $libro->imagen) }}" alt="{{ $libro->titulo }}">
            <p class="categoria">Categoría: {{ $libro->categoria }}</p>
            <p class="usuario">Subido por: {{ $libro->usuario->name ?? 'usuario' }}</p>
            <button class="ver-btn">Ver</button>
          </div>
        @endforeach
      </div>
    </div>
  @endforeach
</div>



  <div class="modal">
    <img src="" alt="full-img" class="full-img" />
    <p class="caption"></p>
  </div>

  <script src="{{ asset('js/Home.js') }}"></script>

  <footer class="footer">
    <p>© 2025 Sociedad Literaria del Minino. Todos los derechos reservados.</p>
    <p>Hecho con 🐾 y libros.</p>
  </footer>

</body>
</html>
