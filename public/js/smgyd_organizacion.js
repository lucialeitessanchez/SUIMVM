
    document.addEventListener('DOMContentLoaded', function () {
        const organizacionesHolder = document.getElementById('organizaciones-collection');
        const addOrganizacionBtn = document.getElementById('add-organizacion');

        let indexOrganizaciones = parseInt(organizacionesHolder.dataset.index);

        addOrganizacionBtn.addEventListener('click', function () {
            const prototype = organizacionesHolder.dataset.prototype;
            const newForm = prototype.replace(/__name__/g, indexOrganizaciones);

            const newItem = document.createElement('div');
            newItem.classList.add('organizacion-item', 'mb-3');
            newItem.innerHTML = newForm;

            organizacionesHolder.appendChild(newItem);
            indexOrganizaciones++;
            organizacionesHolder.dataset.index = indexOrganizaciones;
        });

        organizacionesHolder.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-organizacion')) {
                event.preventDefault();
                event.target.closest('.organizacion-item').remove();
            }
        });
    });

