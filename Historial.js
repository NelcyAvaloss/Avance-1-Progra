document.addEventListener("DOMContentLoaded", () => {
  const lista = document.getElementById("lista-historial");
  const historial = JSON.parse(localStorage.getItem("historial_lectura")) || [];

  if (historial.length === 0) {
    const mensaje = document.createElement("li");
    mensaje.textContent = "Aún no has leído ningún libro.";
    mensaje.style.textAlign = "center";
    mensaje.style.color = "#555";
    lista.appendChild(mensaje);
    return;
  }

  historial.forEach((libro, index) => {
    const item = document.createElement("li");

    const img = document.createElement("img");
    img.src = libro.portada || "https://via.placeholder.com/80x100";
    img.alt = libro.titulo;

    const info = document.createElement("div");
    info.classList.add("historial-info");

    const titulo = document.createElement("h3");
    titulo.textContent = libro.titulo;

    const fecha = document.createElement("p");
    fecha.textContent = `📅 Fecha: ${libro.fecha || "Fecha desconocida"}`;

    // 🔘 Botones
    const acciones = document.createElement("div");
    acciones.classList.add("historial-acciones");

    const verBtn = document.createElement("button");
    verBtn.textContent = "👁️ Ver de nuevo";
    verBtn.classList.add("ver-btn");
    verBtn.addEventListener("click", () => {
      mostrarModal(libro);
    });

    const eliminarBtn = document.createElement("button");
    eliminarBtn.textContent = "🗑️ Eliminar";
    eliminarBtn.classList.add("delete-btn");
    eliminarBtn.addEventListener("click", () => {
      if (confirm(`¿Eliminar "${libro.titulo}" del historial?`)) {
        historial.splice(index, 1);
        localStorage.setItem("historial_lectura", JSON.stringify(historial));
        location.reload();
      }
    });

    acciones.appendChild(verBtn);
    acciones.appendChild(eliminarBtn);

    info.appendChild(titulo);
    info.appendChild(fecha);
    info.appendChild(acciones);

    item.appendChild(img);
    item.appendChild(info);
    lista.appendChild(item);
  });
});

// Muestra la imagen en un modal simple
function mostrarModal(libro) {
  const modal = document.createElement("div");
  modal.classList.add("modal");
  modal.innerHTML = `
    <div class="modal-content">
      <img src="${libro.portada}" alt="${libro.titulo}" />
      <p>${libro.titulo}</p>
      <button onclick="document.body.removeChild(this.parentNode.parentNode)">Cerrar</button>
    </div>
  `;
  document.body.appendChild(modal);
}
