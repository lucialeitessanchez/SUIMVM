document.addEventListener('DOMContentLoaded', function () {

   // Symfony arma la URL completa con el nombre de la ruta
   
   
    const nrodocInput = document.getElementById('nrodoc');

    nrodocInput.addEventListener('blur', function () {
        const nrodoc = nrodocInput.value;
       
        if (nrodoc.trim() === '') return;
        const url = window.verificarDniUrlTemplate.replace('PLACEHOLDER', encodeURIComponent(nrodoc));
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.existe) {
                    alert('Este número de documento ya está registrado.');
                    nrodocInput.classList.add('is-invalid');
                } else {
                    nrodocInput.classList.remove('is-invalid');
                }
            })
            .catch(error => {
                console.error('Error al verificar el DNI:', error);
            });
    });
});

