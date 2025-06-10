document.addEventListener('DOMContentLoaded', function () {
    const element = document.getElementById('sdh_id_nomenclador');

    const choices = new Choices(element, {
      removeItemButton: true,
      placeholderValue: 'Seleccione',
      searchEnabled: true,
      shouldSort: false,
      itemSelectText: '',
      renderSelectedChoices: 'always',
      removeItems: true,
      duplicateItemsAllowed: false,
  });
  
    // Resetear selects comunes si querés asegurarte de que no queden seleccionados
    document.querySelectorAll('select').forEach(select => {
      if (!select.multiple) {
        select.selectedIndex = 0;
      }
    });
 // Rango
 const slider = document.querySelector('input[type="range"][name$="[sdh_5_2a]"]');
 const etiquetaEl = document.getElementById('etiqueta-rango');

 const etiquetas = ['No', 'Parcialmente', 'Sí'];
 const clases = ['range-no', 'range-parcial', 'range-si'];

 function actualizarRango(valor) {
     if (etiquetaEl) {
         etiquetaEl.innerText = etiquetas[valor] || 'Seleccione una opción';
     }

     // Quitar clases anteriores
     slider.classList.remove(...clases);

     // Agregar la clase correspondiente
     const clase = clases[valor];
     if (clase) {
         slider.classList.add(clase);
     }
 }

 if (slider) {
     actualizarRango(slider.value); // inicial
     slider.addEventListener('input', function () {
         actualizarRango(this.value);
     });
 }

});
