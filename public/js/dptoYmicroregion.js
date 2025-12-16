document.addEventListener('DOMContentLoaded', function () {

    // Intentar obtener el campo de localidad de Caso o de Organismo
    const localidadSelect =
        document.getElementById('caso_localidad') ||
        document.getElementById('organismo_localidad');

    // Si no existe ninguno, no seguimos ejecutando el script
    if (!localidadSelect) {
        console.warn("No existe ni #caso_localidad ni #organismo_localidad en esta vista.");
        return;
    }

    const departamentoInput = document.getElementById('departamento');
    const microInput = document.getElementById('microregion');

    function actualizarDepartamentoYMicroregion(localidadId) {
        const fetchUrl = window.localidadInfoTemplate.replace('PLACEHOLDER', localidadId);

        fetch(fetchUrl)
            .then(response => response.json())
            .then(data => {
                departamentoInput.value = data.departamento ?? '';
                microInput.value = data.microregion ?? '';
            })
            .catch(error => {
                console.error('Error al obtener el departamento:', error);
            });
    }

    // Escuchar cambios del select (Select2)
    $(localidadSelect).on('change', function () {
        const selectedId = this.value;
        if (!selectedId) return;

        actualizarDepartamentoYMicroregion(selectedId);
    });

    // Si ya tiene valor cargado al entrar
    if (localidadSelect.value) {
        actualizarDepartamentoYMicroregion(localidadSelect.value);
    }
});
