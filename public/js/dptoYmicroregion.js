document.addEventListener('DOMContentLoaded', function () {
    
    const localidadSelect = document.getElementById('caso_localidad');
    const departamentoInput = document.getElementById('departamento');
    const microInput=document.getElementById('microregion');

    localidadSelect.addEventListener('change', function () {
        const selectedId = this.value;
        if (!selectedId) return;

            
        const fetchUrl = window.localidadInfoTemplate.replace('PLACEHOLDER', selectedId);
        fetch(fetchUrl)
            .then(async response => {
                const text = await response.text();
                console.log('Respuesta cruda:', text);

                try {
                    const data = JSON.parse(text);
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
                } catch (error) {
                    console.error('No se pudo parsear JSON:', error);
                    console.error('Respuesta inválida:', text);
                }
            })
            .catch(error => {
                console.error('Error al obtener el departamento:', error);
            });
    });
});
