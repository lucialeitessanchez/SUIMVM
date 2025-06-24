document.addEventListener('DOMContentLoaded', function () {
    const element = document.getElementById('gob_locales_gobloc14');
    const element2 = document.getElementById('gob_locales_gobloc12');

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
  const choices2 = new Choices(element2, {
    removeItemButton: true,
    placeholderValue: 'Seleccione',
    searchEnabled: true,
    shouldSort: false,
    itemSelectText: '',
    renderSelectedChoices: 'always',
    removeItems: true,
    duplicateItemsAllowed: false,
});
})