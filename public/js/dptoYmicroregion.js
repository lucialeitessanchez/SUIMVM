document.addEventListener('DOMContentLoaded', function () {
    const localidadSelect = document.getElementById('caso_localidad');
    const departamentoInput = document.getElementById('departamento');
    const microInput = document.getElementById('microregion');

    function actualizarDepartamentoYMicroregion(localidadId) {
        const fetchUrl = window.localidadInfoTemplate.replace('PLACEHOLDER', localidadId);

        fetch(fetchUrl)
            .then(response => response.json())
            .then(data => {
                if (data.departamento !== undefined) {
                    departamentoInput.value = data.departamento;
                } else {
                    departamentoInput.value = '';
                }

                if (data.microregion !== undefined) {
                    microInput.value = data.microregion;
                } else {
                    microInput.value = '';
                }
            })
            .catch(error => {
                console.error('Error al obtener el departamento:', error);
            });
    }

    // Evento para cuando el usuario cambia la localidad
    localidadSelect.addEventListener('change', function () {
        const selectedId = this.value;
        if (!selectedId) return;

        actualizarDepartamentoYMicroregion(selectedId);
    });

    // 🚀 Llamada inicial si ya hay una localidad seleccionada (modo ver)
    if (localidadSelect.value) {
        actualizarDepartamentoYMicroregion(localidadSelect.value);
    }
});
