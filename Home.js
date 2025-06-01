window.addEventListener("DOMContentLoaded", () => {
  const contenedorGaleria = document.getElementById("galeria-categorias");
  const libros = JSON.parse(localStorage.getItem("libros")) || [];

  // 👉 Actualizar nombre y foto del perfil si existen en localStorage
  const perfil = JSON.parse(localStorage.getItem("perfil_usuario"));
  if (perfil) {
    const nombreElemento = document.getElementById("user-name");
    const fotoElemento = document.getElementById("foto-perfil-menu");

    if (nombreElemento) nombreElemento.textContent = perfil.nombre || "Usuario";
    if (fotoElemento && perfil.foto) fotoElemento.src = perfil.foto;
  }

  // 👉 Activar botón de cerrar sesión
  const btnCerrarSesion = document.getElementById("logout-btn");
  if (btnCerrarSesion) {
    btnCerrarSesion.addEventListener("click", () => {
      const confirmar = confirm("¿Deseas cerrar sesión?");
      if (confirmar) {
        localStorage.removeItem("perfil_usuario");
        alert("Sesión cerrada correctamente.");
        window.location.href = "index.html";
      }
    });
  }

  const categoriasMap = {};

  // Agrupar libros por categoría
  libros.forEach((libro) => {
    const categoria = libro.categoria;
    if (!categoriasMap[categoria]) {
      categoriasMap[categoria] = [];
    }
    categoriasMap[categoria].push(libro);
  });

  // Crear secciones por cada categoría con sus libros
  Object.keys(categoriasMap).forEach((categoria) => {
    const seccion = document.createElement("section");
    seccion.classList.add("categoria-seccion");

    const idCategoria = `categoria-${categoria.toLowerCase().replace(/\s+/g, '-')}`;
    seccion.id = idCategoria;

    const titulo = document.createElement("h2");
    titulo.textContent = `📚 ${capitalizar(categoria)}`;
    seccion.appendChild(titulo);

    const galeria = document.createElement("div");
    galeria.classList.add("gallery");

    categoriasMap[categoria].forEach((libro) => {
      const container = document.createElement("div");
      container.className = "container";

      const img = document.createElement("img");
      img.src = libro.portada;
      img.alt = libro.titulo;

      const categoriaTexto = document.createElement("p");
      categoriaTexto.className = "categoria";
      categoriaTexto.textContent = `Categoría: ${libro.categoria}`;

      const usuario = document.createElement("p");
      usuario.className = "usuario";
      usuario.textContent = `Subido por: ${libro.usuario || "Anónimo"}`;

      const boton = document.createElement("button");
      boton.className = "ver-btn";
      boton.textContent = "Ver";
      boton.addEventListener("click", () => {
        abrirModal(img);
        const libroRegistrado = {
          titulo: libro.titulo,
          categoria: libro.categoria,
          usuario: libro.usuario || "Anónimo",
          portada: libro.portada,
          fecha: new Date().toLocaleString()
        };
        registrarLectura(libroRegistrado);
      });

      container.appendChild(img);
      container.appendChild(categoriaTexto);
      container.appendChild(usuario);
      container.appendChild(boton);
      galeria.appendChild(container);
    });

    seccion.appendChild(galeria);
    contenedorGaleria.appendChild(seccion);
  });

  actualizarEventosModal();
  activarBuscador();
});

function capitalizar(texto) {
  return texto.charAt(0).toUpperCase() + texto.slice(1).replace("-", " ");
}

// MODAL
const modal = document.querySelector(".modal");
const original = document.querySelector(".full-img");
const caption = document.querySelector(".caption");

function abrirModal(imagen) {
  modal.classList.add("open");
  original.classList.add("open");

  const originalUrl = new URL(imagen.src);
  const originalSize = imagen.getAttribute("data-original");

  if (originalSize) {
    originalUrl.searchParams.set("w", originalSize);
  }

  original.src = originalUrl.toString();
  caption.textContent = imagen.alt;
}

modal.addEventListener("click", (e) => {
  if (e.target.classList.contains("modal")) {
    modal.classList.remove("open");
    original.classList.remove("open");
  }
});

function toggleSidebar() {
  document.getElementById("sidebar").classList.toggle("open");
}

function actualizarEventosModal() {
  const previews = document.querySelectorAll(".gallery img");
  previews.forEach((preview) => {
    preview.addEventListener("click", () => abrirModal(preview));
  });
}

function activarBuscador() {
  const inputBuscador = document.getElementById("buscador");
  if (!inputBuscador) return;

  inputBuscador.addEventListener("input", () => {
    const termino = inputBuscador.value.toLowerCase();
    const secciones = document.querySelectorAll(".categoria-seccion");

    secciones.forEach(seccion => {
      const libros = seccion.querySelectorAll(".container");
      let hayCoincidencias = false;

      libros.forEach(container => {
        const titulo = container.querySelector("img").alt.toLowerCase();
        const categoria = container.querySelector(".categoria")?.textContent.toLowerCase() || '';
        const usuario = container.querySelector(".usuario")?.textContent.toLowerCase() || '';

        const coincide = titulo.includes(termino) || categoria.includes(termino) || usuario.includes(termino);
        container.style.display = coincide ? "flex" : "none";
        if (coincide) hayCoincidencias = true;
      });

      seccion.style.display = hayCoincidencias ? "block" : "none";
    });
  });
}

// Registrar libro en historial de lectura sin duplicados
function registrarLectura(libro) {
  const historial = JSON.parse(localStorage.getItem("historial_lectura")) || [];
  const yaExiste = historial.some(item => item.titulo === libro.titulo);
  if (!yaExiste) {
    historial.push(libro);
    localStorage.setItem("historial_lectura", JSON.stringify(historial));
  }
}
