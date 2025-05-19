document.addEventListener('DOMContentLoaded', () => {
    // Asumimos que le agregaste un id="form-caso" al formulario principal
    const form = document.getElementById('form-caso');
    // El cuerpo de la tabla debe tener un id específico, por ejemplo "tabla-casos-body"
    const tableBody = document.getElementById('tabla-casos-body');

        // Recuperamos los casos ya almacenados en localStorage o inicializamos un array vacío
        let casos = JSON.parse(localStorage.getItem('casos')) || [];
    
        // Función para renderizar la tabla con los casos
        function renderCasos() {
        tableBody.innerHTML = ''; // Limpiamos la tabla
        casos.forEach((caso, index) => {
            const row = document.createElement('tr');
            // Usamos cero a la izquierda para el número de caso (ej: Caso 001, Caso 002, etc.)
            const caseNumber = String(index + 1).padStart(3, '0');
            row.innerHTML = `
            <td>Caso ${caseNumber}</td>
            <td>${caso.fechaHecho || ''}</td>
            <td>${caso.localidadHecho || ''}</td>
            <td>${caso.institucionCarga || 'SMGyD'}</td>
            <td>
                <span class="badge text-bg-primary rounded-pill">${caso.actualizaciones || 0}</span>
                <i class="fas fa-eye"></i>
            </td>
            `;
            tableBody.appendChild(row);
        });
        }
    
        // Renderizamos los casos almacenados al cargar la página
        renderCasos();
    
        // Escuchamos el evento submit del formulario
        form.addEventListener('submit', (event) => {
        event.preventDefault(); // Evitamos el envío por default para poder manejarlo en JS
    
        // Obtenemos los datos del formulario usando FormData (asegurate de tener el atributo "name" en cada input)
        const formData = new FormData(form);
        const nuevoCaso = {};
    
        // Iteramos sobre los entries y creamos un objeto con los datos
        for (let [name, value] of formData.entries()) {
            nuevoCaso[name] = value;
        }
    
        // Asignamos algunos valores predeterminados si es necesario
        // Por ejemplo, si no se envía "institucionCarga", podemos asignar "SMGyD" por defecto
        if (!nuevoCaso.institucionCarga) {
            nuevoCaso.institucionCarga = "SMGyD";
        }
        // Agregamos un campo "actualizaciones" con valor inicial 0
        nuevoCaso.actualizaciones = 0;
    
        // Agregamos el nuevo caso al array y actualizamos el localStorage
        casos.push(nuevoCaso);
        localStorage.setItem('casos', JSON.stringify(casos));
    
        // Volvemos a renderizar la tabla para incluir el nuevo registro
        renderCasos();
    
        // Reiniciamos el formulario (opcional)
        form.reset();
        });
    });
    