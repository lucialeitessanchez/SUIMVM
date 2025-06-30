
    document.addEventListener('DOMContentLoaded', function () {
        const procesosHolder = document.getElementById('procesos-collection');
        const addProcesoBtn = document.getElementById('add-proceso');

        let indexProcesos = parseInt(procesosHolder.dataset.index);

        addProcesoBtn.addEventListener('click', function () {
            const prototype = procesosHolder.dataset.prototype;
            const newForm = prototype.replace(/__name__/g, indexProcesos);

            const newItem = document.createElement('div');
            newItem.classList.add('proceso-item', 'mb-3');
            newItem.innerHTML = newForm;

            procesosHolder.appendChild(newItem);
            indexProcesos++;
            procesosHolder.dataset.index = indexProcesos;
        });

        procesosHolder.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-proceso')) {
                event.preventDefault();
                event.target.closest('.proceso-item').remove();
            }
        });
    });

