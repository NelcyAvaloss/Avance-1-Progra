<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sociedad Literaria Del Minino</title>
        <link rel="stylesheet" href="{{ asset('css/Home.css') }}">


</head>
<body>

<!-- Botón para abrir el menú -->
<button class="open-btn" onclick="toggleSidebar()">☰ Menú</button>

<!-- Menú lateral -->
<div id="sidebar" class="sidebar">
  <div class="user-profile">
    <div id="User-Foto">
      <img src="https://i.pinimg.com/736x/68/75/8e/68758ec65c8169b489ecf69b747f963f.jpg" alt="Foto de perfil">
    </div>
    <p id="user-name">Cat Kayn</p>
  </div>

  <!-- Usa una lista UL para los elementos li -->
  <ul>
    <li><a href="Home.html">🏠 Inicio</a></li>
    <li><a href="#">✏️ Editar Perfil</a></li>
<li><a href="{{ route('libros') }}">📚 Mis libros</a></li>
    <li><a href="#">🖼️ Galería</a></li>
    <li><a href="#">📞 Contacto</a></li>
    <li><a href="#">⚙️ Soporte</a></li>
  </ul>

  <!-- Botón de cerrar sesión -->
  <button id="logout-btn" class="logout-button">🔒 Cerrar Sesión</button>
</div>



<!-- Contenido de la galeria -->
<div class="Encabezado">
    <img src="Gatitos.jpg" id="Sociedad_literaria" alt="">
</div>


<!-- Seccion de lista por categoría -->
<section class="catalogo-categorias">
  <h2>Categorías de Libros</h2>
  <div class="categorias-grid">
    <div class="categoria-card fantasia">📖 Fantasía</div>
    <div class="categoria-card terror">👻 Terror</div>
    <div class="categoria-card aventura">🗺️ Aventura</div>
    <div class="categoria-card romance">💖 Romance</div>
    <div class="categoria-card ciencia-ficcion">🛸 Ciencia Ficción</div>
    <div class="categoria-card misterio">🕵️ Misterio</div>
    <div class="categoria-card historia">🏛️ Historia</div>
    <div class="categoria-card suspenso">😱 Suspenso</div>
    <div class="categoria-card otros">📚 Otros</div>
  </div>
</section>



<!-- 🔍 Barra de búsqueda -->
<div class="busqueda-container">
  <input type="text" id="buscador" placeholder="🔍 Buscar por título, categoría o usuario">
</div>
    


<h1>Galería</h1>

<div class="gallery" id="gallery">

    <div class="container">
        <img src="https://i.pinimg.com/736x/5b/55/88/5b5588929b6f46d55f62e775c3e8d101.jpg" alt="Cada Historia Cuenta">
        <p class="categoria">Categoría: Fantasía</p>
        <p class="usuario">Subido por: usuario123</p>
        <button class="ver-btn">Ver</button>
    </div>
    <div class="container">
        <img src="https://marketplace.canva.com/EAFpYu-k3tQ/2/0/1003w/canva-tapa-de-libro-de-terror-tipogr%C3%A1fico-blanco-y-negro-Lq-PT-PGQS8.jpg" alt="Lo Que Esconde El Bosque">
        <p class="categoria">Categoría: Terror</p>
        <p class="usuario">Subido por: usuario456</p>
        <button class="ver-btn">Ver</button>
    </div>
    <div class="container">
        <img src="https://descubierta.es/wp-content/uploads/2025/03/dagasinnombre-tn.jpg" alt="La Daga Sin Nombre">
        <p class="categoria">Categoría: Aventura</p>
        <p class="usuario">Subido por: usuario789</p>
        <button class="ver-btn">Ver</button>
    </div>
    <div class="container">
        <img src="https://cordexizdesign.es/wp-content/uploads/2020/10/brujas_portada_predisenada.jpg" alt="Los Juicios De Salem">
        <p class="categoria">Categoría: Historia</p>
        <p class="usuario">Subido por: usuario101</p>
        <button class="ver-btn">Ver</button>
    </div>
    <div class="container">
        <img src="https://template.canva.com/EADwi4xAG6I/1/0/256w-JBWCAd5q564.jpg" alt="El Quinto Infierno">
        <p class="categoria">Categoría: Suspenso</p>
        <p class="usuario">Subido por: usuario202</p>
        <button class="ver-btn">Ver</button>
    </div>
    <div class="container">
        <img src="https://edit.org/editor/json/2023/11/29/7/c/7cb759135e64288d13bf3836b40860b7.webp" alt="El Laberinto De Los Susurros">
        <p class="categoria">Categoría: Misterio</p>
        <p class="usuario">Subido por: usuario303</p>
        <button class="ver-btn">Ver</button>
    </div>
    <div class="container">
        <img src="https://marketplace.canva.com/EAF9hSwMdHk/1/0/1003w/canva-portada-para-libro-de-suspenso-misterioso-azul-4pNQ9-H8JaY.jpg" alt="En El Bosque Mágico">
        <p class="categoria">Categoría: Fantasía</p>
        <p class="usuario">Subido por: usuario404</p>
        <button class="ver-btn">Ver</button>
    </div>
    
    <div class="modal">
        <img src="" alt="full-img" class="full-img" />
        <p class="caption"></p>
    </div>
</div>



   
<script src="{{ asset('js/Home.js') }}"></script>

</body>

<footer class="footer">
  <p>© 2025 Sociedad Literaria del Minino. Todos los derechos reservados.</p>
  <p>Hecho con 🐾 y libros.</p>
</footer>



</html>