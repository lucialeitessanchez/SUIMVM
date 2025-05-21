    document.addEventListener('DOMContentLoaded', function () {
        const switchInput = document.getElementById('caj_2b');
        const filaSi = document.getElementById('fila-caj-si');
        const filaNo = document.getElementById('fila-caj-no');
        function toggleFilas() {
            if (switchInput.checked) {
                filaSi.style.display = 'flex';
                filaNo.style.display = 'none';
            } else {
                filaSi.style.display = 'none';
                filaNo.style.display = 'flex';
            }
        }

        switchInput.addEventListener('change', toggleFilas);
        toggleFilas(); // Ejecutar al cargar
    });

