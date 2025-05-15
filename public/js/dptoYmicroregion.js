        document.addEventListener('DOMContentLoaded', function () {
            console.log(document.getElementById('caso_localidadIdLocalidad'));  
        const localidadSelect = document.getElementById('caso_localidadIdLocalidad');
        const departamentoInput = document.getElementById('departamento');

        localidadSelect.addEventListener('change', function () {
            const selectedId = this.value;
          
            if (!selectedId) return;

            fetch(`/localidad/${selectedId}/info`)
                .then(response => response.json())
                .then(data => {
                    if (data.departamento !== undefined) {
                        departamentoInput.value = data.departamento;
                    } else {
                        departamentoInput.value = '';
                    }
                })
                .catch(error => {
                    console.error('Error al obtener el departamento:', error);
                });
        });
        });