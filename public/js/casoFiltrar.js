document.addEventListener('DOMContentLoaded', function () {
    const btnBuscar = document.getElementById('btnBuscarCasos');
  
    btnBuscar.addEventListener('click', function () {
      const criterio = document.querySelector('input[name="criterioBusqueda"]:checked')?.value;
      const valor = document.getElementById('inputBusqueda').value.trim().toLowerCase();
      const filas = document.querySelectorAll('#tablaCasos tbody tr');
  
      if (!criterio || valor === '') {
        // Mostrar todas las filas si no hay filtro
        filas.forEach(f => f.style.display = '');
        return;
      }
  
      filas.forEach(fila => {
        const caso = fila.querySelector('.col-caso')?.textContent.toLowerCase() || '';
        const nombre = fila.querySelector('.col-nombre')?.textContent.toLowerCase() || '';
        const localidad = fila.querySelector('.col-localidad')?.textContent.toLowerCase() || '';
  
        let coincide = false;
  
        if (criterio === 'caso' && caso.includes(valor)) {
          coincide = true;
        } else if (criterio === 'apellido' && nombre.includes(valor)) {
          coincide = true;
        } else if (criterio === 'localidad' && localidad.includes(valor)) {
          coincide = true;
        }
  
        fila.style.display = coincide ? '' : 'none';
      });
    });

    const btnLimpiar = document.getElementById('btnLimpiarFiltros');
    btnLimpiar.addEventListener('click', function () {
    // Limpiar input
    document.getElementById('inputBusqueda').value = '';

    // Desmarcar radios
    const radios = document.querySelectorAll('input[name="criterioBusqueda"]');
    radios.forEach(radio => radio.checked = false);

    // Mostrar todas las filas
    const filas = document.querySelectorAll('#tablaCasos tbody tr');
    filas.forEach(fila => fila.style.display = '');
    });
  });