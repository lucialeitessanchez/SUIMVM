document.addEventListener('DOMContentLoaded', function () {
    const etiquetasPorCampo = {
        'sdh_5_2a': {
            etiquetas: ['No', 'Parcialmente', 'Sí'],
            clases: ['range-no', 'range-parcial', 'range-si']
        },
        'caj_4b': {
            etiquetas: ['No', 'Parcialmente', 'Sí'],
            clases: ['range-no', 'range-parcial', 'range-si']
        },
        
        'gobloc13': {
            etiquetas: ['Bajo', 'Medio', 'Alto', 'Crítico'],
            clases: ['range-bajo', 'range-medio', 'range-alto', 'range-critico']
        }
    };

    Object.entries(etiquetasPorCampo).forEach(([campo, config]) => {
        const sliders = document.querySelectorAll(`input[type="range"][name$="[${campo}]"]`);
        
        sliders.forEach(slider => {
            const wrapper = slider.closest('.rango-wrapper');
            const etiquetaEl = wrapper ? wrapper.querySelector('.etiqueta-rango') : null;

            function actualizarRango(valor) {
                if (etiquetaEl) {
                    etiquetaEl.innerText = config.etiquetas[valor] || 'Seleccione una opción';
                }

                slider.classList.remove(...config.clases);
                const clase = config.clases[valor];
                if (clase) {
                    slider.classList.add(clase);
                }
            }

            actualizarRango(slider.value);
            slider.addEventListener('input', function () {
                actualizarRango(this.value);
            });
        });
    });
});
