document.addEventListener("DOMContentLoaded", function () {
    const horaInput = document.getElementById('mpa_form_mpa_6b');
    const franjaHorariaSelect = document.getElementById('franjaHoraria');

    if (!horaInput || !franjaHorariaSelect) return;

    horaInput.addEventListener('input', () => {
        const value = horaInput.value; // formato "HH:MM"
        if (!value) return;

        const hora = parseInt(value.split(':')[0], 10);

        let franja = '';
        if (hora >= 0 && hora <= 12) {
            franja = 'Mañana';
        } else if (hora >= 13 && hora <= 19) {
            franja = 'Tarde';
        } else if ((hora >= 20 && hora <= 23)) {
            franja = 'Noche';
        }

        Array.from(franjaHorariaSelect.options).forEach(option => {
            option.selected = option.value === franja;
        });
    });
});
