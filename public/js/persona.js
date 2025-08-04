document.addEventListener('DOMContentLoaded', function () {

   // Symfony arma la URL completa con el nombre de la ruta
   const nrodocInput = document.getElementById('nrodoc');

    nrodocInput.addEventListener('blur', function () {
        let nrodoc = nrodocInput.value.trim();
       
        if (nrodoc === '') return;
         // Completa con ceros a la izquierda hasta 8 dígitos
         nrodoc = nrodoc.padStart(8, '0');
         nrodocInput.value = nrodoc;

        // Si es 00000000, mostrar advertencia, pero seguir
        if (nrodoc === '00000000') {
            alert('El número de documento 00000000 se considera sin dato.Verifique');
            return;
        }

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

