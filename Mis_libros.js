
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('form-libro');
  const listaLibros = document.getElementById('libros-subidos');

  let editIndex = null;

  function crearLibroDOM(libro, index) {
    const div = document.createElement('div');
    div.classList.add('container');

    const img = document.createElement('img');
    img.src = libro.portada;
    img.alt = libro.titulo;

    const info = document.createElement('div');
    info.classList.add('info');
    info.innerHTML = `<strong>${libro.titulo}</strong>
                      <em>${libro.categoria}</em><br>
                      <p>${libro.descripcion}</p>`;

    const actions = document.createElement('div');
    actions.classList.add('actions');

    const btnEditar = document.createElement('button');
    btnEditar.classList.add('edit-btn');
    btnEditar.textContent = '✏️ Editar';
    btnEditar.addEventListener('click', () => iniciarEdicion(index));

    const btnEliminar = document.createElement('button');
    btnEliminar.classList.add('delete-btn');
    btnEliminar.textContent = '🗑️ Eliminar';
    btnEliminar.addEventListener('click', () => eliminarLibro(index));

    actions.appendChild(btnEditar);
    actions.appendChild(btnEliminar);

    div.appendChild(img);
    div.appendChild(info);
    div.appendChild(actions);

    return div;
  }

  // 🔄 Obtener libros desde localStorage
  let libros = JSON.parse(localStorage.getItem('libros')) || [];

  function renderizarLibros() {
    listaLibros.innerHTML = '';
    libros.forEach((libro, i) => {
      listaLibros.appendChild(crearLibroDOM(libro, i));
    });
  }

  function leerArchivo(inputFile) {
    return new Promise((resolve, reject) => {
      if (inputFile.files && inputFile.files[0]) {
        const reader = new FileReader();
        reader.onload = e => resolve(e.target.result);
        reader.onerror = err => reject(err);
        reader.readAsDataURL(inputFile.files[0]);
      } else {
        resolve(null);
      }
    });
  }

  form.addEventListener('submit', async e => {
    e.preventDefault();

    const titulo = form.titulo.value.trim();
    const descripcion = form.descripcion.value.trim();
    const categoria = form.categoria.value;
    const portadaInput = form.portada;
    const archivoInput = form.archivo;

    if (!titulo || !descripcion || !categoria) {
      alert('Por favor completa todos los campos.');
      return;
    }

    let portadaURL;

    if (editIndex !== null && portadaInput.files.length === 0) {
      portadaURL = libros[editIndex].portada;
    } else {
      portadaURL = await leerArchivo(portadaInput);
      if (!portadaURL) {
        alert('Por favor sube una imagen de portada válida.');
        return;
      }
    }

    const archivoNombre = archivoInput.files[0]?.name || (editIndex !== null ? libros[editIndex].archivoNombre : '');

    if (!archivoNombre) {
      alert('Por favor sube el archivo del libro.');
      return;
    }

    const nuevoLibro = {
      titulo,
      descripcion,
      categoria,
      portada: portadaURL,
      archivoNombre,
      usuario: 'usuario_actual' // Cambia esto por el nombre del usuario si lo tienes disponible
    };

    if (editIndex === null) {
      libros.push(nuevoLibro);
    } else {
      libros[editIndex] = nuevoLibro;
      editIndex = null;
      form.querySelector('button[type="submit"]').textContent = 'Subir libro';
    }

    // ✅ Guardar en localStorage
    localStorage.setItem('libros', JSON.stringify(libros));

    form.reset();
    renderizarLibros();
  });

  function eliminarLibro(index) {
    if (confirm(`¿Eliminar el libro "${libros[index].titulo}"?`)) {
      libros.splice(index, 1);
      localStorage.setItem('libros', JSON.stringify(libros)); // ✅ Actualizar localStorage
      renderizarLibros();
      if (editIndex === index) {
        form.reset();
        editIndex = null;
        form.querySelector('button[type="submit"]').textContent = 'Subir libro';
      }
    }
  }

  function iniciarEdicion(index) {
    const libro = libros[index];
    editIndex = index;

    form.titulo.value = libro.titulo;
    form.descripcion.value = libro.descripcion;
    form.categoria.value = libro.categoria;
    form.portada.value = '';
    form.archivo.value = '';

    form.querySelector('button[type="submit"]').textContent = 'Guardar cambios';
    form.scrollIntoView({ behavior: 'smooth' });
  }

  // Mostrar al iniciar
  renderizarLibros();
});
