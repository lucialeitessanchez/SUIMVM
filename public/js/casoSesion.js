document.addEventListener("DOMContentLoaded", function () {
    const filas = document.querySelectorAll("#caso-body tr");
    filas.forEach(fila => {
        fila.addEventListener("click", function () {
            const id = this.querySelector("td[id='casoId']")?.textContent.trim();

            if (!id) {
                console.warn("No se encontró el ID en la fila.");
                return;
            }

            fetch(guardarCasoUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ idCaso: id })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        
                        icon: "success",
                        title: "Seleccionaste Caso " + id,
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                        popup: 'swal2-sm'
                        }
                        });
                } else {
                    console.error("Error desde el backend:", data.error);
                }
            })
            .catch(error => {
                console.error("Error en fetch:", error);
            });
        });
    });
});