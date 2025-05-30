
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
  });

