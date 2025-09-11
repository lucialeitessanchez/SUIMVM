/*document.addEventListener('DOMContentLoaded', function () {
    //const element = document.getElementById('sdh_sdh_1_2_id_nomenclador');
    const element = document.querySelectorAll('select[multiple]');
    const choices = new Choices(element, {
      removeItemButton: true,
      placeholderValue: 'Seleccione',
      searchEnabled: true,
      shouldSort: false,
      itemSelectText: '',
      renderSelectedChoices: 'always',
      removeItems: true,
      duplicateItemsAllowed: false,
  });*/
  document.addEventListener('DOMContentLoaded', function () {
    const elements = document.querySelectorAll('select[multiple]');

    elements.forEach(function(element) {
        new Choices(element, {
            removeItemButton: true,
            placeholderValue: 'Seleccione',
            searchEnabled: true,
            shouldSort: false,
            itemSelectText: '',
            renderSelectedChoices: 'always',
            removeItems: true,
            duplicateItemsAllowed: false,
        });
    });

  
    // Resetear selects comunes si querés asegurarte de que no queden seleccionados
    document.querySelectorAll('select').forEach(select => {
      if (!select.multiple) {
        select.selectedIndex = 0;
      }
    });


});
