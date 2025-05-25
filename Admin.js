document.addEventListener('DOMContentLoaded', () => {
  // Botón Cerrar sesión con confirmación
  const cerrarSesionBtn = document.querySelector('header button');
  if (cerrarSesionBtn) {
    cerrarSesionBtn.addEventListener('click', () => {
      const confirmar = confirm("¿Estás seguro de que deseas cerrar sesión?");
      if (confirmar) {
        alert("Sesión cerrada correctamente.");
        // Redirigir si deseas:
        // window.location.href = "/login";
      } else {
        alert("Cierre de sesión cancelado.");
      }
    });
  }

  // Botón Eliminar con confirmación
  document.querySelectorAll('.eliminar').forEach(btn => {
    btn.addEventListener('click', () => {
      const confirmar = confirm("¿Estás seguro de que deseas eliminar este elemento?");
      if (confirmar) {
        const tarjeta = btn.closest('div').parentElement;
        tarjeta.remove();
      } else {
        alert("Operación cancelada.");
      }
    });
  });

  // Botón Restringir
  document.querySelectorAll('.restringir').forEach(btn => {
    btn.addEventListener('click', () => {
      alert("Este usuario ha sido restringido temporalmente.");
    });
  });

  // Botón Ver
  document.querySelectorAll('.ver').forEach(btn => {
    btn.addEventListener('click', () => {
      const padre = btn.closest('div').previousElementSibling;
      if (padre) {
        const nombre = padre.querySelector('.nombre-usuario')?.textContent ||
                       padre.querySelector('.titulo-libro')?.textContent || 'Elemento';
        alert(`Información del elemento: ${nombre.trim()}`);
      }
    });
  });
});
