   //const urlBuscar = '{{ path("buscar_localidades") }}';

const urlBuscar = document.getElementById('caso_localidad').dataset.url;
   $('#caso_localidad').select2({
    ajax: {
        url: urlBuscar,
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                term: params.term
            };
        },
        processResults: function (data) {
            return {
                results: data.results
            };
        },
        cache: true
    },
    placeholder: 'Seleccione...',
    minimumInputLength: 2
});

