document.addEventListener('DOMContentLoaded', function () {
    const switchInput = document.getElementById('caj_2b');
    const filaSi = document.getElementById('fila-caj-si');
    const filaNo = document.getElementById('fila-caj-no');

    const switchInput3 = document.getElementById('caj_3d');
    const filaSi3 = document.getElementById('fila-caj3-si');
    const filaNo3 = document.getElementById('fila-caj3-no');

    function limpiarCampos(fila) {
        const campos = fila.querySelectorAll('input, select, textarea');
        campos.forEach(campo => {
            if (campo.type === 'checkbox' || campo.type === 'radio') {
                campo.checked = false;
            } else {
                campo.value = '';
            }
        });
    }

    function toggleFilas() {
        if (switchInput.checked) {
            filaSi.style.display = 'flex';
            filaNo.style.display = 'none';
            limpiarCampos(filaNo);
        } else {
            filaSi.style.display = 'none';
            filaNo.style.display = 'flex';
            limpiarCampos(filaSi);
        }
    }

    function toggleFilas3() {
        if (switchInput3.checked) {
            filaSi3.style.display = 'flex';
            filaNo3.style.display = 'none';
            limpiarCampos(filaNo3);
        } else {
            filaSi3.style.display = 'none';
            filaNo3.style.display = 'flex';
            limpiarCampos(filaSi3);
        }
    }

    // Inicializar los estados cuando se cargue la página
    toggleFilas();
    toggleFilas3();

    // Escuchar cambios
    switchInput.addEventListener('change', toggleFilas);
    switchInput3.addEventListener('change', toggleFilas3);

});
