        
        fetch('microregion.json')
        .then(res => res.json())
        .then(data => {
            const localidadSelect = document.getElementById('localidadHecho');
            const departamentoInput = document.getElementById('departamentoHecho');
            const microregionInput = document.getElementById('microregionHecho');

            data.sort((a, b) => a.localidad_nombre.localeCompare(b.localidad_nombre)); //ordena alfabeticamente el select
            // Llenar el select de localidades
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.localidad_nombre;
                option.textContent = item.localidad_nombre;
                localidadSelect.appendChild(option);
            });

            // Al seleccionar una localidad, mostrar depto y microregión
            localidadSelect.addEventListener('change', () => {
                const selected = data.find(item => item.localidad_nombre === localidadSelect.value);
                if (selected) {
                    departamentoInput.value = selected.departamento_nombre;
                    microregionInput.value = selected.microregion_nro;
                } else {
                    departamentoInput.value = '';
                    microregionInput.value = '';
                }
            });
        })
        .catch(error => console.error('Error cargando localidades:', error));
