    document.addEventListener('DOMContentLoaded', function () {
        const collectionHolder = document.getElementById('familiares-collection');
        const addButton = document.getElementById('add-familiar');

        // Inicializamos el índice con la cantidad de formularios ya existentes
        let index = parseInt(collectionHolder.dataset.index);

        addButton.addEventListener('click', function () {
            // Obtenemos el prototipo HTML del formulario embebido
            const prototype = collectionHolder.dataset.prototype;

            // Reemplazamos __name__ con el índice actual
            const newForm = prototype.replace(/__name__/g, index);

            // Creamos el div contenedor del nuevo formulario
            const newItem = document.createElement('div');
            newItem.classList.add('familiar-item', 'mb-3');
            newItem.innerHTML = newForm + `
                <button type="button" class="btn btn-danger btn-sm mt-2 remove-familiar">Eliminar</button>
            `;

            collectionHolder.appendChild(newItem);
            index++;
            collectionHolder.dataset.index = index;
        });

        // Delegación de eventos para eliminar formularios
        collectionHolder.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-familiar')) {
                event.preventDefault();
                event.target.closest('.familiar-item').remove();
            }
        });
    });

