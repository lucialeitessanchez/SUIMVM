
    const edadInput = document.getElementById('edad');
    const franjaEtariaSelect = document.getElementById('franjaEtaria');

    edadInput.addEventListener('input', () => {
        const edad = parseInt(edadInput.value);

        let franja = '';
        if (edad >= 0 && edad <= 15) {
            franja = '0-15 años';
        } else if (edad >= 16 && edad <= 30) {
            franja = '16-30 años';
        } else if (edad >= 31 && edad <= 50) {
            franja = '31-50 años';
        } else if (edad >= 51 && edad <= 70) {
            franja = '51-70 años';
        } else if (edad >= 71) {
            franja = '71 años o más';
        }

        // Buscar y seleccionar la opción correspondiente
        Array.from(franjaEtariaSelect.options).forEach(option => {
            option.selected = option.value === franja;
        });
    });
