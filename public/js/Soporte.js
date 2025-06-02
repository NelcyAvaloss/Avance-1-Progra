document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('form-reporte');

  form.addEventListener('submit', e => {
    e.preventDefault();
    const mensaje = document.getElementById('mensaje').value.trim();
    const correo = document.getElementById('correo')?.value.trim() || 'No especificado';

    if (!mensaje) {
      alert("Por favor escribe tu mensaje.");
      return;
    }

    const nuevoReporte = {
      tipo: "Reporte de Usuario",
      mensaje: mensaje,
      correo: correo,
      fecha: new Date().toLocaleString()
    };

    const reportes = JSON.parse(localStorage.getItem("reportes")) || [];
    reportes.push(nuevoReporte);
    localStorage.setItem("reportes", JSON.stringify(reportes));

    alert("✅ Tu reporte fue enviado al administrador.");
    form.reset();
  });
});
