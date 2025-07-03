document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('familiaresReferencia');
    const addButton = document.getElementById('add-familiaresReferencia');

    if (!container || !addButton) return;

    let index = parseInt(container.dataset.index, 10);

    addButton.addEventListener('click', function () {
        const prototype = container.dataset.prototype;
        const newForm = prototype.replace(/__name__/g, index);
        index++;
        container.dataset.index = index;

        const div = document.createElement('div');
        div.classList.add('mb-3');
        div.innerHTML = newForm;

        const deleteBtn = document.createElement('button');
        deleteBtn.innerHTML = '<i class="bi bi-trash"></i> Eliminar';
        deleteBtn.type = 'button';
        deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'mt-2');
        deleteBtn.addEventListener('click', () => div.remove());

        div.appendChild(deleteBtn);
        container.appendChild(div);
    });
});
