document.addEventListener('DOMContentLoaded', function() {
    // Obtenemos el input de tipo file por su ID
    const fileInput = document.getElementById('mpa_archivos_input_js_hook');
    // Obtenemos el contenedor donde mostraremos la vista previa
    const previewContainer = document.getElementById('archivos_preview_container');

    // Verificamos que ambos elementos existan en la página
    if (fileInput && previewContainer) {
        // Añadimos un "escuchador" de eventos para cuando el usuario seleccione archivos
        fileInput.addEventListener('change', function() {
            previewContainer.innerHTML = ''; // Limpiamos el contenedor por si ya había previsualizaciones

            const files = fileInput.files; // Obtenemos la lista de archivos seleccionados

            if (files.length === 0) {
                return; // Si no hay archivos, no hacemos nada
            }

            // Iteramos sobre cada archivo seleccionado
            Array.from(files).forEach(file => {
                const fileWrapper = document.createElement('div'); // Contenedor para cada archivo
                fileWrapper.classList.add('p-2', 'border', 'rounded', 'd-flex', 'align-items-center');
                fileWrapper.style.minWidth = '150px';
                fileWrapper.style.maxWidth = '250px';
                fileWrapper.style.overflow = 'hidden';
                fileWrapper.style.whiteSpace = 'nowrap';
                fileWrapper.style.textOverflow = 'ellipsis';
                fileWrapper.style.gap = '5px'; // Espacio entre el icono/imagen y el texto

                const fileNameSpan = document.createElement('span'); // Para el nombre del archivo
                fileNameSpan.classList.add('text-truncate'); // Clase de Bootstrap para truncar texto largo
                fileNameSpan.textContent = file.name;
                fileNameSpan.title = file.name; // El nombre completo se muestra al pasar el ratón

                // Lógica para mostrar imágenes o iconos según el tipo de archivo
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader(); // Objeto para leer el contenido del archivo
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result; // La imagen se carga desde la URL de datos
                        img.style.maxWidth = '40px';
                        img.style.maxHeight = '40px';
                        img.classList.add('img-thumbnail'); // Estilo de miniatura de Bootstrap
                        fileWrapper.prepend(img); // Agrega la imagen al principio del contenedor
                    };
                    reader.readAsDataURL(file); // Lee el archivo como una URL de datos
                } else if (file.type === 'application/pdf') {
                    const icon = document.createElement('i');
                    icon.classList.add('bi', 'bi-file-earmark-pdf-fill', 'text-danger', 'fs-3'); // Icono de PDF
                    fileWrapper.prepend(icon);
                } else {
                    const icon = document.createElement('i');
                    icon.classList.add('bi', 'bi-file-earmark', 'fs-3'); // Icono genérico de archivo
                    fileWrapper.prepend(icon);
                }
                
                fileWrapper.appendChild(fileNameSpan); // Agrega el nombre del archivo
                previewContainer.appendChild(fileWrapper); // Agrega el contenedor del archivo al contenedor principal
            });
        });
    }
});