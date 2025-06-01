document.addEventListener('DOMContentLoaded', () => {
  // Cierre de sesión
  window.logout = function () {
    const confirmar = confirm("¿Deseas cerrar sesión?");
    if (confirmar) {
      alert("Sesión cerrada correctamente.");
      // window.location.href = "login.html"; // si tienes login
    }
  };

  // Eliminar elementos
  document.querySelectorAll('.eliminar').forEach(btn => {
    btn.addEventListener('click', () => {
      if (confirm("¿Eliminar este elemento?")) {
        btn.closest('div').parentElement.remove();
      }
    });
  });

  // Restringir
  document.querySelectorAll('.restringir').forEach(btn => {
    btn.addEventListener('click', () => {
      alert("Elemento restringido.");
      const estado = btn.closest('.libro-card')?.querySelector('.estado-libro strong');
      if (estado) estado.textContent = "Restringido";
    });
  });

  // Habilitar
  document.querySelectorAll('.habilitar').forEach(btn => {
    btn.addEventListener('click', () => {
      alert("Usuario habilitado.");
    });
  });

  // Ver
  document.querySelectorAll('.ver').forEach(btn => {
    btn.addEventListener('click', () => {
      const padre = btn.closest('div').previousElementSibling;
      const nombre = padre?.querySelector('.nombre-usuario')?.textContent ||
                     padre?.querySelector('.titulo-libro')?.textContent || 'Elemento';
      alert(`Información: ${nombre.trim()}`);
    });
  });

  // Historial
  document.querySelectorAll('.historial').forEach(btn => {
    btn.addEventListener('click', () => {
      const usuario = btn.closest('div').previousElementSibling?.textContent || 'Usuario';
      alert(`Mostrando historial de: ${usuario.trim()}`);
    });
  });

  // Aprobar
  document.querySelectorAll('.aprobar').forEach(btn => {
    btn.addEventListener('click', () => {
      alert("Libro aprobado.");
      const estado = btn.closest('.libro-card')?.querySelector('.estado-libro strong');
      if (estado) estado.textContent = "Aprobado";
    });
  });
});

