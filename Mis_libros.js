document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('form-libro');
  const listaLibros = document.getElementById('libros-subidos');

  // Guardar si se está editando y el índice
  let editIndex = null;

  // Función para crear un contenedor de libro
  function crearLibroDOM(libro, index) {
    const div = document.createElement('div');
    div.classList.add('container');

    // Imagen de portada
    const img = document.createElement('img');
    img.src = libro.portada;
    img.alt = libro.titulo;

    // Info (Título, descripción y categoría)
    const info = document.createElement('div');
    info.classList.add('info');
    info.innerHTML = `<strong>${libro.titulo}</strong>
                      <em>${libro.categoria}</em><br>
                      <p>${libro.descripcion}</p>`;

    // Botones acciones
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

  // Lista donde guardamos libros (en memoria)
  let libros = [];

  // Mostrar todos los libros en la galería
  function renderizarLibros() {
    listaLibros.innerHTML = '';
    libros.forEach((libro, i) => {
      listaLibros.appendChild(crearLibroDOM(libro, i));
    });
  }

  // Función para leer imagen y devolver URL para mostrar en <img>
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

  // Manejar envío del formulario (subir o editar libro)
  form.addEventListener('submit', async e => {
    e.preventDefault();

    // Datos del formulario
    const titulo = form.titulo.value.trim();
    const descripcion = form.descripcion.value.trim();
    const categoria = form.categoria.value;
    const portadaInput = form.portada;
    const archivoInput = form.archivo;

    if (!titulo || !descripcion || !categoria) {
      alert('Por favor completa todos los campos.');
      return;
    }

    // Leer imagen de portada
    let portadaURL;

    // Si estamos editando, solo cambiamos portada si se selecciona uno nuevo
    if (editIndex !== null && portadaInput.files.length === 0) {
      portadaURL = libros[editIndex].portada; // mantiene la portada actual
    } else {
      portadaURL = await leerArchivo(portadaInput);
      if (!portadaURL) {
        alert('Por favor sube una imagen de portada válida.');
        return;
      }
    }

    // Leer archivo libro (aquí solo leemos el nombre, para mostrarlo podrías agregar más funcionalidad)
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
      archivoNombre
    };

    if (editIndex === null) {
      // Nuevo libro
      libros.push(nuevoLibro);
    } else {
      // Editar libro existente
      libros[editIndex] = nuevoLibro;
      editIndex = null;
      form.querySelector('button[type="submit"]').textContent = 'Subir libro';
    }

    form.reset();
    renderizarLibros();
  });

  // Función eliminar libro
  function eliminarLibro(index) {
    if (confirm(`¿Eliminar el libro "${libros[index].titulo}"?`)) {
      libros.splice(index, 1);
      renderizarLibros();
      if(editIndex === index){
        form.reset();
        editIndex = null;
        form.querySelector('button[type="submit"]').textContent = 'Subir libro';
      }
    }
  }

  // Función iniciar edición
  function iniciarEdicion(index) {
    const libro = libros[index];
    editIndex = index;

    form.titulo.value = libro.titulo;
    form.descripcion.value = libro.descripcion;
    form.categoria.value = libro.categoria;

    // Para el input file no se puede asignar un valor, se deja vacío
    form.portada.value = '';
    form.archivo.value = '';

    form.querySelector('button[type="submit"]').textContent = 'Guardar cambios';

    // Scroll al formulario para facilitar edición
    form.scrollIntoView({ behavior: 'smooth' });
  }

  // Render inicial (si quieres mostrar los containers ya en HTML, puedes limpiar ese HTML para evitar duplicados)
  renderizarLibros();
});





