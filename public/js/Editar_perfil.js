// Mostrar/ocultar contraseña con ícono
function togglePassword(id, btn) {
  const input = document.getElementById(id);
  const isVisible = input.type === "text";
  input.type = isVisible ? "password" : "text";
  btn.textContent = isVisible ? "👁️" : "🙈";
}

// Imagen de perfil (vista previa)
const imagenInput = document.getElementById("foto");
const vistaPrevia = document.getElementById("preview-img");

imagenInput.addEventListener("change", function () {
  const file = imagenInput.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = () => {
      vistaPrevia.src = reader.result;
    };
    reader.readAsDataURL(file);
  }
});

// Selección de categorías favoritas (botones seleccionables)
const botonesCategorias = document.querySelectorAll("#categorias-opciones button");
const inputCategorias = document.getElementById("categorias");

botonesCategorias.forEach(btn => {
  btn.addEventListener("click", () => {
    btn.classList.toggle("selected");
    const seleccionadas = Array.from(botonesCategorias)
      .filter(b => b.classList.contains("selected"))
      .map(b => b.getAttribute("data-cat"));
    inputCategorias.value = JSON.stringify(seleccionadas);
  });
});

// Guardar datos del perfil y redirigir
document.getElementById("form-perfil").addEventListener("submit", function (e) {
  e.preventDefault();

  const password = document.getElementById("contraseña").value;
  const confirmar = document.getElementById("confirmar").value;

  if (password !== confirmar) {
    alert("Las contraseñas no coinciden.");
    return;
  }

  const datos = {
    nombre: document.getElementById("nombre").value,
    correo: document.getElementById("correo").value,
    universidad: document.getElementById("universidad").value,
    rol: document.getElementById("rol").value,
    idioma: document.getElementById("idioma").value,
    tema: document.getElementById("tema").value,
    categorias: JSON.parse(document.getElementById("categorias").value || "[]"),
    notificaciones: document.getElementById("notificaciones").checked,
    contrasena: password,
    foto: vistaPrevia.src
  };

  localStorage.setItem("perfil_usuario", JSON.stringify(datos));
  window.location.href = "Perfil_Actualizado.html"; // Redirigir a nueva página
});

// Cancelar cambios
document.getElementById("cancelar").addEventListener("click", () => {
  if (confirm("¿Estás seguro de cancelar? Los cambios no se guardarán.")) {
    location.reload();
  }
});

// Eliminar cuenta
document.getElementById("eliminar").addEventListener("click", () => {
  if (confirm("¿Estás seguro de eliminar tu cuenta? Esta acción es irreversible.")) {
    localStorage.removeItem("perfil_usuario");
    alert("Cuenta eliminada.");
    location.href = "Home.html";
  }
});
