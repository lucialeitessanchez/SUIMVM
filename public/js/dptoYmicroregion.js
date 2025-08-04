document.addEventListener('DOMContentLoaded', function () {
   // const localidadSelect = document.getElementById('caso_localidad');
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

        // Escuchar cuando select2 termine de hacer un cambio
        $(localidadSelect).on('change', function () {
            const selectedId = this.value;
            if (!selectedId) return;
    
            actualizarDepartamentoYMicroregion(selectedId);
        });
    
        if (localidadSelect.value) {
            actualizarDepartamentoYMicroregion(localidadSelect.value);
        }
});
