document.addEventListener("DOMContentLoaded", function () {
    fetch("caso/caso/seleccionado")
        .then(res => res.json())
        .then(data => {
            if (data.success && data.id) {
                const span = document.getElementById("caso-seleccionado-id");
                if (span) {
                    span.textContent = data.id;
                }
            }
        })
        .catch(err => {
            console.error("Error al obtener el caso seleccionado:", err);
        });
});
