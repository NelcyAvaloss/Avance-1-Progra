<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administrador</title>
  <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
</head>
<body>

  <header>
    <h1>Panel de Bibliotecario</h1>
    <div class="botones-header">
      <a href="{{ route('home') }}" class="open-btn">Ir a Home</a>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
      </form>
    </div>
  </header>

  <nav>
    <ul>
      <li><a href="#usuarios">👤 Gestión de usuarios</a></li>
      <li><a href="#libros">📚 Gestión de libros</a></li>
      <li><a href="#Soporte">📈 Gestión de Reportes</a></li>
    </ul>
  </nav>

  <main>
    <!-- Sección de usuarios -->
    <section id="usuarios">
      <h2>👤 Lista de Usuarios Registrados</h2>
      <input type="text" id="busqueda-usuario" placeholder="Buscar usuario...">
      <div id="lista-usuarios">
        @foreach ($usuarios as $usuario)
          <div class="usuario-card">
            <span class="nombre-usuario">{{ $usuario->name }}</span> (usuario)
            <span class="estado-usuario">Estado:
              <strong class="estado-texto {{ $usuario->activo ? 'habilitado' : 'restringido' }}">
                {{ $usuario->activo ? 'Habilitado' : 'Restringido' }}
              </strong>
            </span>
            <div>
              <button class="eliminar">Eliminar</button>
              <button class="restringir">Restringir</button>
              <button class="habilitar">Habilitar</button>
              <button class="ver">Ver</button>
            </div>
          </div>
        @endforeach
      </div>
    </section>

    <!-- Sección de libros -->
    <section id="libros">
      <h2>📚 Libros Subidos</h2>
      <input type="text" id="busqueda-libro" placeholder="Buscar libro...">
      <select id="filtro-estado">
        <option value="">Todos</option>
        <option value="aprobado">Aprobado</option>
        <option value="restringido">Restringido</option>
      </select>

      <div id="lista-libros">
        @foreach ($libros as $libro)
          <div class="libro-card">
            <div class="libro-info">
              <span class="titulo-libro">{{ $libro->titulo }}</span>
              <span class="subido-por">Subido por: <strong>{{ $libro->usuario->name }}</strong></span>
              <span class="estado-libro">Estado: <strong class="estado-texto {{ $libro->estado }}">{{ ucfirst($libro->estado) }}</strong></span>
            </div>
            <div class="libro-acciones">
              <button class="eliminar">Eliminar</button>
              <button class="restringir">Restringir</button>
              <button class="aprobar">Aprobar</button>
              <button class="ver">Ver</button>
            </div>
          </div>
        @endforeach
      </div>
    </section>

    <!-- Sección de reportes -->
    <section id="Soporte">
      <h2>📈 Reportes De Soporte Técnico</h2>
      @forelse ($reportes as $reporte)
        <div class="reporte-card">
          <h3>📌 {{ $reporte->tipo }}</h3>
          <p><strong>Mensaje:</strong> {{ $reporte->mensaje }}</p>
          <p><strong>Correo:</strong> {{ $reporte->correo }}</p>
          <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($reporte->created_at)->format('d/m/Y') }}</p>
        </div>
      @empty
        <p>No hay reportes enviados aún.</p>
      @endforelse
    </section>
  </main>

  <script src="{{ asset('js/Admin.js') }}"></script>
</body>
</html>
