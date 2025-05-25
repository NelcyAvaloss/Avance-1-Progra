<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administrador</title>
<link rel="stylesheet" href="{{ asset('css/Admin.css') }}">


</head>
<body>
  <header>
    <h1>Panel de Administración</h1>
    <button onclick="logout()">Cerrar sesión</button>
  </header>

  <nav>
    <ul>
      <li><a href="#usuarios">👤 Gestión de usuarios</a></li>
      <li><a href="#libros">📚 Gestión de libros</a></li>
      <li><a href="#reportes">📈 Reportes</a></li>
    </ul>
  </nav>

  <main>
    <!-- Sección de usuarios -->
    <section id="usuarios">
  <h2>👤 Lista de Usuarios Registrados</h2>
  <input type="text" id="busqueda-usuario" placeholder="Buscar usuario...">
  <div id="lista-usuarios">
    <div>
      <span class="nombre-usuario">usuario123</span> (usuario)
      <div>
        <button class="eliminar">Eliminar</button>
        <button class="restringir">Restringir</button>
        <button class="ver">Ver</button>
      </div>
    </div>
    <div>
      <span class="nombre-usuario">admin</span> (administrador)
      <div>
        <button class="eliminar">Eliminar</button>
        <button class="restringir">Restringir</button>
        <button class="ver">Ver</button>
      </div>
    </div>
    <div>
      <span class="nombre-usuario">lectoraGata</span> (usuario)
      <div>
        <button class="eliminar">Eliminar</button>
        <button class="restringir">Restringir</button>
        <button class="ver">Ver</button>
      </div>
    </div>
  </div>
</section>


    <!-- Sección de libros -->
    <section id="libros">
  <h2>📚 Libros Subidos</h2>
  <input type="text" id="busqueda-libro" placeholder="Buscar libro...">

  <!-- ✅ Este div es necesario para que el estilo se aplique correctamente -->
  <div id="lista-libros">
    <div class="libro-card">
      <div class="libro-info">
        <span class="titulo-libro">El Quinto Infierno</span>
        <span class="subido-por">Subido por: <strong>usuario202</strong></span>
      </div>
      <div class="libro-acciones">
        <button class="eliminar">Eliminar</button>
        <button class="restringir">Restringir</button>
        <button class="ver">Ver</button>
      </div>
    </div>

    <div class="libro-card" >
      <div class="libro-info">
        <span class="titulo-libro">Cuentos de Medianoche</span>
        <span class="subido-por">Subido por: <strong>usuario123</strong></span>
      </div>
      <div class="libro-acciones">
        <button class="eliminar">Eliminar</button>
        <button class="restringir">Restringir</button>
        <button class="ver">Ver</button>
      </div>
    </div>
  </div>
</section>



    <!-- Sección de reportes -->
    <section id="reportes">
      <h2>📈 Reportes y estadísticas</h2>
      <p>En construcción...</p>
    </section>
  </main>

  {{ asset('js/Admin.js') }}
</body>
</html>
