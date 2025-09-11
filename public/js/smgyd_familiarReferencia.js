
document.addEventListener('DOMContentLoaded', function () {
    const familiaresHolder = document.getElementById('familiaresReferencia-collection');
    const addFamiliarBtn = document.getElementById('add-familiarReferencia');

    let indexFamiliares = parseInt(familiaresHolder.dataset.index);

    addFamiliarBtn.addEventListener('click', function () {
        const prototype = familiaresHolder.dataset.prototype;
        const newForm = prototype.replace(/__name__/g, indexFamiliares);

        const newItem = document.createElement('div');
        newItem.classList.add('familiar-item', 'mb-3');
        newItem.innerHTML = newForm;

        familiaresHolder.appendChild(newItem);
        indexFamiliares++;
        familiaresHolder.dataset.index = indexFamiliares;
    });

    familiaresHolder.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-familiar')) {
            event.preventDefault();
            event.target.closest('.familiar-item').remove();
        }
    });
});



/*document.addEventListener('DOMContentLoaded', function () {
    const collectionHolder = document.getElementById('smgyd_familiaresReferencia');
    const addButton = document.getElementById('add-familiarReferencia');

    // Obtenemos el prototype y el índice actual
    const prototype = collectionHolder.dataset.prototype;
    let index = collectionHolder.dataset.index
        ? parseInt(collectionHolder.dataset.index, 10)
        : collectionHolder.children.length;

    const addForm = () => {
        const newFormHtml = prototype.replace(/__name__/g, index);
        const newFormDiv = document.createElement('div');
        newFormDiv.classList.add('border', 'p-3', 'mb-2', 'position-relative');
        newFormDiv.innerHTML = newFormHtml;

        // Botón de eliminar
        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-sm btn-danger position-absolute top-0 end-0 m-2';
        removeButton.innerHTML = 'Eliminar';
        removeButton.addEventListener('click', () => {
            newFormDiv.remove();
        });

        newFormDiv.appendChild(removeButton);
        collectionHolder.appendChild(newFormDiv);

        index++;
        collectionHolder.dataset.index = index;
    };

    addButton.addEventListener('click', addForm);
});*/

