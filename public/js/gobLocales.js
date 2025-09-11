document.addEventListener('DOMContentLoaded', function () {
    ['gob_locales_gobloc12','gob_locales_gobloc14', 'gob_locales_gobloc15', 'gob_locales_gobloc16a',
    'gob_locales_gobloc18','gob_locales_gobloc19'].forEach(id => {
    const element = document.getElementById(id);
    if (element) {
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
        element.dataset.choicesInitialized = 'true';
    }
});
   
})