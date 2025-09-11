    document.addEventListener('DOMContentLoaded', function () {
        const fechaInput = document.getElementById('mpa_form_mpa_6');
        const diaCampo = document.getElementById('mpa_form_mpa_6a');

        const diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado','Domingo'];

        fechaInput.addEventListener('change', function () {
            const fechaSeleccionada = new Date(this.value);
            if (!isNaN(fechaSeleccionada)) {
                const dia = diasSemana[fechaSeleccionada.getDay()];
                diaCampo.value = dia;
            } else {
                diaCampo.value = '';
            }
        });
    });

