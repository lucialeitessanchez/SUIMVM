document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('familiaresReferencia-collection');
    const addButton = document.getElementById('add-familiarReferencia');

    if (!container || !addButton) return;

    let index = parseInt(container.dataset.index, 10);

    addButton.addEventListener('click', function () {
        const prototype = container.dataset.prototype;
        const newForm = prototype.replace(/__name__/g, index);
        index++;
        container.dataset.index = index;

        const div = document.createElement('div');
        div.classList.add('familiarReferencia-item', 'mb-3'); // importante para que el botón "Eliminar" sepa qué borrar
        div.innerHTML = newForm;

        container.appendChild(div);
    });

    // Escuchar clics en cualquier botón eliminar (incluye los que vienen del server y los nuevos)
    document.addEventListener('click', function (e) {
        if (e.target && e.target.closest('.remove-familiar')) {
            e.preventDefault();
            const item = e.target.closest('.familiar-referencia-item');
            if (item) item.remove();
        }
    });
});
