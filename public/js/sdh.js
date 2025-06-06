document.addEventListener('DOMContentLoaded', function () {
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