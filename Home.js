
const modal = document.querySelector(".modal");
const previews = document.querySelectorAll(".gallery img");
const original = document.querySelector(".full-img");
const caption = document.querySelector(".caption");

// Abrir modal al hacer clic en imagen
previews.forEach((preview) => {
    preview.addEventListener("click", () => {
        abrirModal(preview);
    });
});

// Abrir modal al hacer clic en botón "Ver"
const verBtns = document.querySelectorAll(".ver-btn");

verBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        const container = btn.closest(".container");
        const img = container.querySelector("img");
        abrirModal(img);
    });
});

// Función reutilizable para abrir el modal
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

// Cerrar modal al hacer clic fuera de la imagen
modal.addEventListener("click", (e) => {
    if (e.target.classList.contains("modal")) {
        modal.classList.remove("open");
        original.classList.remove("open");
    }
});

// Sidebar toggle
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("open");
}
