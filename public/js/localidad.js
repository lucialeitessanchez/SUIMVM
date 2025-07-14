document.addEventListener('DOMContentLoaded', function () {
    $('.select2-autocomplete').select2({
        placeholder: 'Seleccione una localidad',
        allowClear: true,
        language: "es" // opcional, para traducir
    });
});
