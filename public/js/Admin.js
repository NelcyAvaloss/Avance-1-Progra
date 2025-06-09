document.addEventListener('DOMContentLoaded', () => {
  // Cierre de sesión
  window.logout = function () {
    const confirmar = confirm("¿Deseas cerrar sesión?");
    if (confirmar) {
      alert("Sesión cerrada correctamente.");
      // window.location.href = "login.html";
    }
  };

  const listaLibros = document.getElementById('lista-libros');
  const libros = JSON.parse(localStorage.getItem('libros')) || [];

  libros.forEach(libro => {
    const card = document.createElement('div');
    card.className = 'libro-card';

    card.innerHTML = `
      <div class="libro-info">
        <span class="titulo-libro">${libro.titulo}</span>
        <span class="subido-por">Subido por: <strong>${libro.usuario || 'Anónimo'}</strong></span>
        <span class="estado-libro">Estado: <strong>Aprobado</strong></span>
      </div>
      <div class="libro-acciones">
        <button class="eliminar">Eliminar</button>
        <button class="restringir">Restringir</button>
        <button class="aprobar">Aprobar</button>
        <button class="ver">Ver</button>
      </div>
    `;

    listaLibros.appendChild(card);
  });

  // Delegación de eventos para botones
  listaLibros.addEventListener('click', e => {
    const btn = e.target;
    const card = btn.closest('.libro-card');
    const titulo = card.querySelector('.titulo-libro')?.textContent;
    const estado = card.querySelector('.estado-libro strong');

    if (btn.classList.contains('eliminar')) {
      if (confirm(`¿Eliminar el libro "${titulo}"?`)) {
        card.remove();
      }
    }

    if (btn.classList.contains('restringir')) {
      if (confirm(`¿Restringir el libro "${titulo}"?`)) {
        estado.textContent = 'Restringido';
      }
    }

    if (btn.classList.contains('aprobar')) {
      if (confirm(`¿Aprobar el libro "${titulo}"?`)) {
        estado.textContent = 'Aprobado';
      }
    }

    if (btn.classList.contains('ver')) {
      alert(`Información del libro: ${titulo}`);
    }
  });
});


document.addEventListener('DOMContentLoaded', () => {
  const contenedorReportes = document.getElementById('Soporte');

  const reportes = JSON.parse(localStorage.getItem('reportes')) || [];

  if (reportes.length === 0) {
    contenedorReportes.innerHTML += "<p>No hay reportes enviados aún.</p>";
    return;
  }

  reportes.forEach(reporte => {
    const div = document.createElement("div");
    div.className = "reporte-card";
    div.innerHTML = `
      <h3>📌 ${reporte.tipo}</h3>
      <p><strong>Mensaje:</strong> ${reporte.mensaje}</p>
      <p><strong>Correo:</strong> ${reporte.correo}</p>
      <p><strong>Fecha:</strong> ${reporte.fecha}</p>
    `;
    contenedorReportes.appendChild(div);
  });
});


