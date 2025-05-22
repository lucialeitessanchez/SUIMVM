   document.addEventListener('DOMContentLoaded', function () {
        const switchInput = document.getElementById('caj_2b');
        const filaSi = document.getElementById('fila-caj-si');
        const filaNo = document.getElementById('fila-caj-no');

        const switchInput3 = document.getElementById('caj_3d');
        const filaSi3 = document.getElementById('fila-caj3-si');
        const filaNo3 = document.getElementById('fila-caj3-no');

        function toggleFilas() {
            if (switchInput.checked) {
                filaSi.style.display = 'flex';
                filaNo.style.display = 'none';
            } else {
                filaSi.style.display = 'none';
                filaNo.style.display = 'flex';
            }
        }
        function toggleFilas3() {
            if (switchInput3.checked) {
                filaSi3.style.display = 'flex';
                filaNo3.style.display = 'none';
            } else {
                filaSi3.style.display = 'none';
                filaNo3.style.display = 'flex';
            }
        }
             // Inicializar los estados cuando se cargue la página
            toggleFilas();
            toggleFilas3();

               // Escuchar cambios
              switchInput.addEventListener('change', toggleFilas);
              switchInput3.addEventListener('change', toggleFilas3);
//---------
              const slider = document.querySelector('input[type="range"][name$="[caj_4b]"]');
              const etiquetaEl = document.getElementById('etiqueta-rango');

               const etiquetas = ['No', 'Parcialmente', 'Sí'];
               const clases = ['range-no', 'range-parcial', 'range-si'];
               function actualizarRango(valor) {
                if (etiquetaEl) {
                    etiquetaEl.innerText = etiquetas[valor] || 'Seleccione una opción';
                }
        
                // Quitar clases anteriores
                slider.classList.remove(...clases);
        
                // Agregar la clase correspondiente
                const clase = clases[valor];
                if (clase) {
                    slider.classList.add(clase);
                }
            }
              if (slider) {
                actualizarRango(slider.value); // inicial
                slider.addEventListener('input', function () {
                    actualizarRango(this.value);
                });
              }
        
    });

