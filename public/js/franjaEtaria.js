document.addEventListener("DOMContentLoaded", function () {

const edadInput = document.getElementById('caso_edad');

const franjaEtaria = document.getElementById('caso_franjaEtaria');

edadInput.addEventListener('input', () => {
    const edad = parseInt(edadInput.value);

    let franja = '';
    if (edad >= 0 && edad <= 12) {
        franja = '0-12 años';
    } else if (edad >= 13 && edad <= 17) {
        franja = '13-17 años';
    } else if (edad >= 18 && edad <= 29) {
        franja = '18-29 años';
    } else if (edad >= 30 && edad <= 39) {
        franja = '30-39 años';
    } else if (edad>=40 && edad <=49) {
        franja = '40-49 años';
    } else if (edad>=50 && edad <=59)  {
        franja = '50-59 años';
    } else if (edad >= 60) {
        franja = '60 años o más';
    }

    // Buscar y seleccionar la opción correspondiente
    document.getElementById('caso_franjaEtaria').value = franja;
    
});
});