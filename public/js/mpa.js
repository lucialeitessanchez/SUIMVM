
  document.addEventListener('DOMContentLoaded', function () {
   
    const select = document.getElementById('mpa_form_mpa_3');
    const fieldA = document.getElementById('mpa_form_mpa_3a');
    const fieldB = document.getElementById('mpa_form_mpa_3b');
    const extraFields = document.getElementById('criminalidad_extra_fields');

    function toggleExtraFields() {
      if (select && select.value === 'En contexto de criminalidad organizada') {
        extraFields.classList.remove('d-none');
        extraFields.classList.add('d-flex'); // o 'd-block' según tu diseño
        fieldA.disabled = false;
        fieldB.disabled = false;
      } else {
        extraFields.classList.remove('d-flex');
        extraFields.classList.add('d-none');
        fieldA.value = '';
        fieldB.value = '';
        fieldA.disabled = true;
        fieldB.disabled = true;
      }
    }

    if (select) {
      select.addEventListener('change', toggleExtraFields);
      toggleExtraFields(); // al cargar la página
    }

    
      const input = document.getElementById('mpa_15a_input');
      const button = document.getElementById('add_violencia_btn');
      const list = document.getElementById('mpa_15a_badges'); // ahora apunta al contenedor de badges

      const hiddenField = document.getElementById('tiposViolencia');
  
      const tiposViolencia = [];
  
      function renderLista() {
          list.innerHTML = '';
  
          tiposViolencia.forEach((texto, index) => {
        const badge = document.createElement('span');
        badge.className = 'badge bg-primary position-relative';
        badge.textContent = texto;

        const eliminarBtn = document.createElement('button');
        eliminarBtn.innerHTML = '&times;';
        eliminarBtn.type = 'button';
        eliminarBtn.className = 'btn-close btn-close-white btn-sm position-absolute top-0 end-0';
        eliminarBtn.style.fontSize = '0.7rem';
        eliminarBtn.style.transform = 'translate(50%, -50%)';
        eliminarBtn.addEventListener('click', () => {
            tiposViolencia.splice(index, 1);
            actualizarEstado();
        });

        badge.appendChild(eliminarBtn);
        list.appendChild(badge);
    });
      }
  
      function actualizarEstado() {
          renderLista();
          hiddenField.value = JSON.stringify(tiposViolencia);
      }
  
      function agregarTipo() {
          const valor = input.value.trim();
          if (valor !== '' && !tiposViolencia.includes(valor)) {
              tiposViolencia.push(valor);
              input.value = '';
              input.focus();
              actualizarEstado();
          }
      }
  
      // Click en el botón
      button.addEventListener('click', agregarTipo);
  
      // Enter en el input
      input.addEventListener('keypress', function (e) {
          if (e.key === 'Enter') {
              e.preventDefault();
              agregarTipo();
          }
      });
 
  
});




